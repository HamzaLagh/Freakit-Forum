<?php

namespace App\Http\Controllers;

use App\Mail\profileMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InformationsController extends Controller
{
    public function index(Request $request)
    {
        return view('Settings');
    }
}
