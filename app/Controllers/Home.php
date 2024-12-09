<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function homepage(){
        return view('home');
    }
    public function makeoffer(){
        return view('postOffer');
    }

    public function offrepage(){
        return view('offredetails');
    }

    public function pendingoffers(){
        return view('pendingoffers');
    }
}
