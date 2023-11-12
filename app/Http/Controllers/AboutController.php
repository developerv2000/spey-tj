<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
  public function index()
  {
    return view('about.index');
  }

  public function history()
  {
    return view('about.history');
  }

  public function wealth()
  {
    return view('about.wealth');
  }

  public function career()
  {
    return view('about.career');
  }
}
