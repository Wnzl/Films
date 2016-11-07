<?php

namespace Films;

use Illuminate\Database\Eloquent\Model;

include 'simple_html_dom.php';

class Film extends Model
{
    public static function getHdrezka($film){
        $html = file_get_html('https://www.kinopoisk.ru/index.php?kp_query='.$film);
        echo $html->find('div[class = shadow]', 0)
            ->children(1)
            ->children(1);

//        foreach($html->find('div.element most_wanted') as $element)
//            echo $element->innertext.'<br>';
//        return $film."url";
    }
}
