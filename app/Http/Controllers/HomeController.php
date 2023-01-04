<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;

class HomeController extends Controller
{
    //
    public function index(){
        return view('front.index');
    }
//     public function about(){
//       return view('front.pages.about');
//   }
//   public function contact(){
//     return view('front.pages.contact');
// }
//     public function show($slug){

//       if(!View::exists("front.pages.$slug")){
//         abort(404);
//       }

//       return view("front.pages.$slug") ;
//     }
 }
