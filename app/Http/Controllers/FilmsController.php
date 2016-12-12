<?php

namespace Films\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Films\Film;
use Films\Http\Requests;
use Illuminate\Support\Facades\Auth;

class FilmsController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function catalogue(){
       $films = DB::select('select * from films inner join catalogue on films.id = catalogue.film_id 
                            where catalogue.user_id = ?',[Auth::user()->id]);
        shuffle($films);
        return view('catalogue',compact('films'));
    }

    public function actual(){
        $films = DB::select('select * from films inner join catalogue on films.id = catalogue.film_id
                             where catalogue.user_id = ? AND catalogue.actual = 1',[Auth::user()->id]);
        shuffle($films);
        return view('catalogue',compact('films'));
    }

    public function notActual(){
        $films = DB::select('select * from films inner join catalogue on films.id = catalogue.film_id 
                             where catalogue.user_id = ? AND catalogue.actual = 0',[Auth::user()->id]);
        shuffle($films);
        return view('catalogue',compact('films'));
    }

}
