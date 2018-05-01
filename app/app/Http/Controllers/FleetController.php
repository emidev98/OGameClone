<?php

namespace App\Http\Controllers;

use App\Planet;
use App\Travel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FleetController extends Controller
{

    public function __construct()
    {

    }

    public function index(Planet $planet)
    {
        return view('fleet.fleet', ["planet" => $planet, "fleetLines" => $planet->fleet->fleetLines]);
    }
}
