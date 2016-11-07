@extends('layout')

@section('title')
    <title> Каталог фильмов</title>
@endsection

@section('content')
 <?php   $counter = 1; ?>

 <div style="width:1250px; margin:0 auto;">
    <table cellpadding="25">
        <tr>
    @foreach($films as $film)
                <td>
                    <a class="hdrezka" href="https://www.kinopoisk.ru/film/<?php echo $film->id?>">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                        <div class="flipper">
                            <div class="front">
                        <img src="https://www.kinopoisk.ru/images/film_big/<?php echo $film->id?>.jpg"
                             alt="Film" width="260" height="350">
                                <div style="padding: 0px 10px 4px 5px;font-size:18px">
                            <h4><?php echo $film->name_ru?></h4>
                           <div style="float:left"> <p><?php echo $film->year?></p></div>
                                <div style="float:right; ">
                                    <?php
                                        if($film->rating <=4)
                                            echo "<p class=\"p_low\">";
                                        elseif($film->rating >4 && $film->rating <= 7)
                                            echo "<p class=\"p_middle\">";
                                        elseif($film->rating > 7)
                                            echo "<p class=\"p_high\">";
                                        ?>
                                    <b><?php echo $film->rating?>/10</b></p>
                                    </div>
                        </div>
                                </div>
                            <div class="back" style="overflow: auto">
                                <?php echo $film->description?>
                    </div>
                    </div>
                    </div>
                    </a>
                </td>
                <?php
                $counter++;
                if($counter%4==1){
        echo "</tr><tr>";
    }
    ?>
    @endforeach
        </tr>
    </table>
@endsection