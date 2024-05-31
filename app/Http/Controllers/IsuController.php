<?php

namespace App\Http\Controllers;

use App\Models\Isu;
use Illuminate\Http\Request;

class IsuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tetapan.isu');
    }

    /**
     * Show the form for creating a new resource.
     */
}
