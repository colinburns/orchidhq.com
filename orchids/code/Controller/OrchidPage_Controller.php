<?php
/**
 * Created by PhpStorm.
 * User: colinburns
 * Date: 2018-12-23
 * Time: 1:26 PM
 */

class OrchidPage extends Page
{
    private static $db = array();

    private static $has_one = array();

    private static $description = 'This page is used to add/edit/view & delete Orchids';
}

class OrchidPage_Controller extends Page_Controller
{

    private static $allowed_actions = array(
        'upload',
        'OrchidList',
        'OrchidCreate',
        'OrchidEdit',
        'OrchidView',
        'OrchidDelete',
        'OrchidForm',
        'processOrchidForm',
        'validatepotnumber'
    );

    public static $url_handlers = array(
        'list/$type' => 'OrchidList',
        'create' => 'OrchidCreate',
        'edit/$OrchidID' => 'OrchidEdit',
        'view/$OrchidID' => 'OrchidView',
        'delete/$OrchidID' => 'OrchidDelete'
    );

    public function init()
    {
        parent::init();
        Requirements::block($this->themeDir() . '/javascript/main.js');
        $params = $this->request->params();
        if($params['Action'] == '') {
            $this->redirect('/orchid/list');
        }
    }

    public function OrchidList()
    {
        $Orchids = Orchid::get();
        return $this->customise(
            array(
                'Orchids' => $Orchids
            )
        )->renderWith('ListLayout');
    }

    public function OrchidCreate()
    {
        $request = $this;
        DB::Query('DELETE FROM Orchid WHERE ID = 0');
        return $this->customise(
            array(
                'OrchidCreateForm' => $this->OrchidForm($request)
            )
        )->renderWith('CreateLayout');
    }

    public function OrchidForm($request, $OrchidID = null)
    {
        $form = OrchidForm::create($this, 'OrchidForm', $OrchidID);
        $form->addExtraClass('orchid-form');
        return $form;

    }

    public function processOrchidForm()
    {

        $postVariables = $this->request->postVars();
        if(array_key_exists('OrchidID', $postVariables) && $postVariables['OrchidID'] > 0) {
            $orchid = Orchid::get()->byID($postVariables['OrchidID']);
        } else {
            $orchid = Orchid::create();
        }
        $orchid->PotNumber = $this->request->postVar('PotNumber');
        $orchid->Breed = $this->request->postVar('Breed');
        $orchid->Type = $this->request->postVar('Type');
        $orchid->CommonName = $this->request->postVar('CommonName');
        $orchid->FlowerColour = json_encode(array_values($this->request->postVar('FlowerColour')));
        $orchid->FloweringMonth = json_encode(array_values($this->request->postVar('FloweringMonth')));
        $orchid->Notes = $this->request->postVar('Notes');

//        try {
            if ($recordId = $orchid->write()) {
                /****
                 * Lets now upload the photo of the orchid
                 */
                if (key_exists('OrchidPhoto', $postVariables)) {
                    $fileUpload = $postVariables['OrchidPhoto'];
                    $folder = Folder::find_or_make('orchid-photos/'.$recordId);
                    $fileType = explode('/', $fileUpload['type']);
                    $filename = 'orchid-pot-number-id-' . $recordId . '.'.$fileType[1];
                    $pathToFile = Controller::join_links(Director::baseFolder(), ASSETS_DIR, 'orchid-photos/'. $folder->Title, $filename);

                    if (move_uploaded_file($fileUpload['tmp_name'], $pathToFile)) {
                        $image = Image::create();
                        $image->ParentID = $folder->ID;
                        $image->Title = "OrchidPotNumberID-".$recordId;
                        $image->Name = $filename;
                        $image->Filename = $folder->Title . '/' . $filename;
                        $imageID = $image->write();
                        $orchid->OrchidPhotoID = $imageID;
                        $orchid->write();
                    }
                }

                return $this->redirect('orchid/list/successful');
            }

//        } catch (Exception $e) {
//            DB::Query('DELETE FROM Orchid WHERE ID = 0');
//            if (strpos($e->getMessage(), 'Duplicate') === false || strpos($e->getMessage(),
//                    'PotNumberUniqueID') === false) {
//                return $this->redirect('orchid/list/unsuccessful');
//            } else {
//                return $this->redirect('orchid/list/duplicate');
//            }
//
//        }

    }

    public function OrchidEdit()
    {
        $OrchidID = $this->request->param('OrchidID');
        $request = $this;
        return $this->customise(
            array(
                'OrchidCreateForm' => $this->OrchidForm($request, $OrchidID)
            )
        )->renderWith('CreateLayout');
    }

    public function OrchidView()
    {
        $OrchidID = $this->request->param('OrchidID');
        $Orchid = Orchid::get()->byID($OrchidID);
        return $this->customise(array(
            'Orchid' => $Orchid
        ))->renderWith('ViewLayout');
    }
    public function OrchidDelete()
    {
        $OrchidID = $this->request->param('OrchidID');
        $Orchid = Orchid::get()->byID($OrchidID);
        $Orchid->delete();
        return $this->redirect('/orchid/list/');
    }

    public function validatepotnumber($request) {
        $potNumber = $request->requestVar('PotNumber');

        // check for existing user with same username
        if (Orchid::get()->filter('PotNumber', $potNumber)->count()) {
            return $this->httpError(400, 'Pot Number '.$potNumber.' - already exists in the system');
        } else {
            return $this->getResponse()->setBody('');
        }
    }

}
