<?php

namespace App\Http\Controllers;

use App\Planet;
use App\Travel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{

  public function __construct()
  {
      
  }

  public function index()
  {
      return view('resources.resources');
  }
}
