<?php
/**
 * Created by PhpStorm.
 * User: arnoldmyint
 * Date: 2016-11-24
 * Time: 2:31 AM
 */

class BankAccount{
    public $balanceDollars;
    public $PIN;
    public $accountNumber;
    public $overdraftDollars;

}

$ba = new BankAccount();
//var_dump($ba);
var_dump(get_object_vars($ba));
echo "<br>";
echo "<br>";

class Book{
    private $authorFirstName;
    private $authorLastName;
    private $description;
    private $title;
    private $ISBN;
    private $publishedYear;
    private $publishedMonth;
    private $publishedDay;
    private $weightKg;
    private $numberOfPages;
    private $isHardCover;

    function helloworld(){
        echo "This is a function within a book!";
    }
}

$b = new Book();
var_dump($b);
var_dump(get_object_vars($b));
echo $b->helloworld();

echo "<br>";
echo "<br>";

class Student
{
    private $studentNumber;
    private $firstName;
    private $lastName;
    private $birthYear;
    private $birthMonth;
    private $birthDay;
}
$s = new Student();
//var_dump($s);