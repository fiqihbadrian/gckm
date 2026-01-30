<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rumah;

class RumahController extends Controller
{
    public function index()
    {
        $rumahs = Rumah::all();
        return view('rumah.index', compact('rumahs'));
    }
}