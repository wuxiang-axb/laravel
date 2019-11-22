<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//分页类
class TypesController extends Controller
{
    public function index()
    {
    	return view('home.types');
    }
}
