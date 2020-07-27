<?php

namespace GoogleBooksSample\Http\Controllers;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        $data = [];



        return view('index', $data);
    }
}
