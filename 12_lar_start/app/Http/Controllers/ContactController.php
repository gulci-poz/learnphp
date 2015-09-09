<?php namespace App\Http\Controllers;

class ContactController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public function contact() {
        return "Contact me!";
    }

}