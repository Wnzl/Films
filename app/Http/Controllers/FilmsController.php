<?php

namespace Films\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Films\Film;
use Films\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Eadanilenko\KinopoiskInfo\KinopoiskInfo;
use Eadanilenko\KinopoiskInfo\Movie;



class FilmsController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function addFilm(Request $request){
        try {
            //eto pezdec sorry
            require_once base_path('vendor/kinoparser/src/KinopoiskInfo.php');
            require_once base_path('vendor/kinoparser/src/Movie.php');
            require_once base_path('vendor/kinoparser/src/MovieNotFoundException.php');
            require_once base_path('vendor/kinoparser/vendor/pherum/snoopy/src/Snoopy.php');
            $kinopoisk = new KinopoiskInfo(1);
            $movie = $kinopoisk->getMovieFromId($request->input('film_id'));
            try {
                DB::insert('insert into films (id,name_ru,year,description,rating) values(?,?,?,?,?)',
                    [(int)$movie->id, (string)$movie->name, (int)$movie->year, (string)$movie->description, substr($movie->imdbRating, 0, 3)]);
                DB::insert('insert into catalogue(film_id,user_id,actual) values(?,?,?)', [$movie->id, Auth::user()->id, 1]);
                return redirect('http://localhost/catalogue')->with('status', "Фильм был успешно добавлен!");
            }catch (\Illuminate\Database\QueryException $ex){
                if(count(DB::select('select * from catalogue where user_id = ? and film_id = ?',[Auth::user()->id, $movie->id])))
                    return redirect('http://localhost/catalogue')->with('status',"Фильм уже есть в каталоге!");
                else {
                    DB::insert('insert into catalogue(film_id,user_id,actual) values(?,?,?)', [$movie->id, Auth::user()->id, 1]);
                    return redirect('http://localhost/catalogue')->with('status', "Фильм был успешно добавлен!");
                }
            }
        }
        catch (\Eadanilenko\KinopoiskInfo\MovieNotFoundException $e){
            return redirect('http://localhost/catalogue')->with('status',"Фильм не был найден!");
        }
    }

    public function catalogue(){
       $films = DB::select('select * from films inner join catalogue on films.id = catalogue.film_id 
                            where catalogue.user_id = ? ORDER BY films.rating DESC',[Auth::user()->id]);
        return view('catalogue',compact('films'));
    }

    public function actual(){
        $films = DB::select('select * from films inner join catalogue on films.id = catalogue.film_id
                             where catalogue.user_id = ? AND catalogue.actual = 1 ORDER BY films.rating DESC',[Auth::user()->id]);
        return view('catalogue',compact('films'));
    }

    public function notActual(){
        $films = DB::select('select * from films inner join catalogue on films.id = catalogue.film_id 
                             where catalogue.user_id = ? AND catalogue.actual = 0 ORDER BY films.rating DESC',[Auth::user()->id]);
        return view('catalogue',compact('films'));
    }

    public function deleteFilm($id){
        echo $id;

    }

    public function actualityChange($film_id)
    {
        $actual = DB::select('select actual from catalogue where user_id = ? and film_id = ?', [Auth::user()->id, $film_id]);
        if ($actual[0]->actual == 1) {
            DB::update('update catalogue set actual = 0 where film_id = ? AND user_id = ?', [$film_id, Auth::user()->id]);
            return back()->with('status', "Изменения внесены!");
        } else {
            DB::update('update catalogue set actual = 1 where film_id = ? AND user_id = ?', [$film_id, Auth::user()->id]);
            return back()->with('status', "Изменения внесены!");
        }
    }

}
