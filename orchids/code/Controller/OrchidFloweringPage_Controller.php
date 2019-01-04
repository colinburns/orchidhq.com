<?php
/**
 * Created by PhpStorm.
 * User: colinburns
 * Date: 2018-12-23
 * Time: 1:26 PM
 */

class OrchidFloweringPage extends Page
{
    private static $db = array();

    private static $has_one = array();

    private static $description = 'This page is used to display the Orchids that should be flowering this month (and maybe next month)';
}

class OrchidFloweringPage_Controller extends Page_Controller
{

    private static $allowed_actions = array(

    );

    public static $url_handlers = array(

    );

    public function init()
    {
        parent::init();
        Requirements::block($this->themeDir() . '/javascript/main.js');
    }

    public function OrchidFloweringThisMonth() {
        $month = date("F");
        $orchids = Orchid::get()->filter(array('FloweringMonth:PartialMatch' => $month));
        return $orchids;
    }

    public function OrchidFloweringNextMonth() {
        $month = date("F", strtotime("next month"));
        $orchids = Orchid::get()->filter(array('FloweringMonth:PartialMatch' => $month));
        return $orchids;
    }

    public function MonthName() {
        $month = date("F");
        return $month;
    }

    public function NextMonthName() {
        $month = date("F", strtotime("next month"));
        return $month;
    }

}
