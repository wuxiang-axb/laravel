<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//商品详情页面
class GoodsController extends Controller
{
   public function index()
   {
   		return view('home.goods');
   }
}
