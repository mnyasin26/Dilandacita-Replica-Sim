<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IssuesController extends Controller
{
    public function index()
    {
        return view('admin.penerbitan');
    }
}
