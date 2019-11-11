<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class PagesController extends Controller
{

    public function index(){

        $title='Welcome to Sean laravel Blog';

        return view('pages.index', compact('title'));
    }

    public function about(){

        return view('pages.about');
    }

    public function services(){


        return view('pages.services');
    }

    

}
