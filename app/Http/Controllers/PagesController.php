<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contact;

class PagesController extends Controller
{
  public function home () {

    return view('home');
  }

  public function map () {

    return view('map');
  }
}
