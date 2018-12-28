<?php

class OrchidForm extends Form {

    /**
     * Our constructor only requires the controller and the name of the form
     * method. We'll create the fields and actions in here.
     *
     */
    public function __construct($controller, $name, $OrchidID = null) {

        $colourSelection = COLOUR_SELECTION;
        $monthSelection = MONTH_SELECTION;

        if($OrchidID != null) {
            $Orchid = Orchid::get()->byID($OrchidID);
            $idField = HiddenField::create('OrchidID', 'OrchidID')->setValue($OrchidID);
            $file = Image::get()->byID($Orchid->OrchidPhotoID);
            $currentImage = LiteralField::create('CurrentImage', '<img src="assets/orchid-photos/'.$file->Filename.'" style="max-width:200px;" />');
            $imageField = FileField::create('OrchidPhoto', 'Upload a different Orchid Photo (use camera)<span style="color:darkred;"> - will overwrite the image above</span>');
            $potNumberField = NumericField::create('PotNumber', 'Pot Number')->setAttribute('placeholder', 'Enter the Orchid Pot number here')->setValue($Orchid->PotNumber);
            $breedField = TextField::create('Breed', 'Breed')->setAttribute('placeholder', 'Enter the breed of the orchid')->setValue($Orchid->Breed);
            $typeField = TextField::create('Type', 'Type')->setAttribute('placeholder', 'Enter the type of the orchid')->setValue($Orchid->Type);
            $commonNameField = TextField::create('CommonName', 'Common Name')->setAttribute('placeholder', 'Enter the common name of the orchid')->setValue($Orchid->CommonName);
            $flowerColour = CheckboxSetField::create('FlowerColour', 'Flower Colour')->setSource($colourSelection)->setValue(json_decode($Orchid->FlowerColour));
            $floweringMonth = CheckboxSetField::create('FloweringMonth', 'Flowering Month')->setSource($monthSelection)->setValue(json_decode($Orchid->FloweringMonth));
        } else {
            $idField = HiddenField::create('OrchidID', 'OrchidID')->setValue(0);
            $currentImage = LiteralField::create('CurrentImage', '');
            $imageField = FileField::create('OrchidPhoto', 'Upload your Orchid Photo (use camera)');
            $potNumberField = NumericField::create('PotNumber', 'Pot Number')->setAttribute('placeholder', 'Enter the Orchid Pot number here');
            $breedField = TextField::create('Breed', 'Breed')->setAttribute('placeholder', 'Enter the breed of the orchid');
            $typeField = TextField::create('Type', 'Type')->setAttribute('placeholder', 'Enter the type of the orchid');
            $commonNameField = TextField::create('CommonName', 'Common Name')->setAttribute('placeholder', 'Enter the common name of the orchid');
            $flowerColour = CheckboxSetField::create('FlowerColour', 'Flowering Colour')->setSource($colourSelection);
            $floweringMonth = CheckboxSetField::create('FloweringMonth', 'Flowering Month')->setSource($monthSelection);
        }

        $fields = new FieldList(
            $idField,
            $currentImage,
            $imageField,
            $potNumberField,
            $breedField,
            $typeField,
            $commonNameField,
            $flowerColour,
            $floweringMonth
        );

        $actions = new FieldList(
            FormAction::create('processOrchidForm')
        );

        $required = new RequiredFields(array(
            'PotNumber'
        ));

        // now we create the actual form with our fields and actions defined
        // within this class
        parent::__construct($controller, $name, $fields, $actions, $required);

        // any modifications we need to make to the form.
        $this->setFormMethod('POST', true);
        $this->setAttribute('enctype', "multipart/form-data");

        $this->addExtraClass('footer-newsletter-form');
        $this->disableSecurityToken();


    }
}
