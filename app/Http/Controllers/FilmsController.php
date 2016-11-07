<?php

namespace Films\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Films\Film;
use Films\Http\Requests;

class FilmsController extends Controller
{
    public function home(){
        $films = DB::table('films')->get();
        shuffle($films);
        return view('welcome',compact('films'));
    }

    public function actual(){
        $films = DB::table('films')->where('actual',1)->get();
        shuffle($films);
        return view('welcome',compact('films'));
    }

    public function notActual(){
        $films = DB::table('films')->where('actual',0)->get();
        shuffle($films);
        return view('welcome',compact('films'));
    }

    public function hdrezka($name){
        $url = Film::getHdrezka($name);
        echo $url;
    }
}
