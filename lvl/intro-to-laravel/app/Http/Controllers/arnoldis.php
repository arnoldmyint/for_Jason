<?php
/**
 * Created by PhpStorm.
 * User: arnoldmyint
 * Date: 2016-12-01
 * Time: 1:26 AM
 */

namespace App\Http\Controllers;


class arnoldis extends Controller
{
    public function great(){
     $name = "arnold";
        return View('email/hello')->with('name', $name);
    }


    public function  getContactUs(){
        return View('contact');
    }
}