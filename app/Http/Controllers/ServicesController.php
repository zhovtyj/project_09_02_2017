<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->paginate(100);
        return view('service.index')->withServices($services);
    }
}
