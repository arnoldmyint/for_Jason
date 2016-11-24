<?php
/**
 * Created by PhpStorm.
 * User: arnoldmyint
 * Date: 2016-11-24
 * Time: 3:05 AM
 */

class Human{
    private $firstName;
    public function getFirstName(){
        return $this->firstName;
    }
    public function setFirstName($newFirstName){ if((is_string($newFirstName)) && (strlen($newFirstName) > 0) && (strlen($newFirstName) < 32) &&
        (preg_match("/[a-zA-Z]/", $newFirstName))) {
        $this->firstName = $newFirstName;
        echo "$newFirstName is valid";
    }else{
        echo "$newFirstName is not valid";
    } }
}
$h = new Human();
$h->setFirstName(true);
echo $h->getFirstName() . '<br />';
$h->setFirstName(6.7);
echo $h->getFirstName() . '<br />';
$array = array("one", "two", "three");
$h->setFirstName($array);
echo $h->getFirstName() . '<br />';
