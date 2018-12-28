<?php

/**
 * DataObject to store the orchid details
 */
class Orchid extends DataObject {

    private static $db = array(
        'PotNumber' => 'Int',
        'Breed' => 'Varchar(255)',
        'Type' => 'Varchar(255)',
        'CommonName' => 'Varchar(255)',
        'FlowerColour' => 'Varchar(255)', // We can have multiple colours stored in a single field. We'll display this as a list the user can check if colour included
        'FloweringMonth' => 'Varchar(255)' // We can have multiple months stored in a single field. These will be stored a comma separated data.
    );

    private static $has_one = array(
        'OrchidPhoto' => 'Image',
    );

    private static $indexes = array(
        'PotNumberIndex' => array(
            'type' => 'index',
            'value' => '"PotNumber"'
        ),
        'PotNumberUniqueID' => array(
            'type' => 'unique',
            'value' => 'PotNumber'
        )
    );

    public function canView($member = null) {
        return Permission::check("CMS_ACCESS_LeftAndMain");
    }

    public function canEdit($member = null) {
        return Permission::check("CMS_ACCESS_LeftAndMain");
    }

    public function canDelete($member = null) {
        return Permission::check("CMS_ACCESS_LeftAndMain");
    }

    public function canCreate($member = null) {
        return Permission::check("CMS_ACCESS_LeftAndMain");
    }

}