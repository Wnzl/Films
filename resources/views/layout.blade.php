<!DOCTYPE html>
<html>
<head>
    @yield('title')

    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="icon" href="http://s1.iconbird.com/ico/2013/11/504/w128h1281385326527video.png" type="image/x-icon" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <style>
        html, body {
            height: 100%;
        }

        .hdrezka{
            color:black;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Roboto Slab', serif;
        }

        .flip-container {
            perspective: 1000px;

        }

        .flip-container:hover .flipper, .flip-container.hover .flipper {
            transform: rotateY(180deg);
        }

        .flip-container, .front, .back {
            width: 260px;
            height: 470px;
        }


        .flipper {
            transition: 0.6s;
            transform-style: preserve-3d;
            position: relative;
        }

        .front, .back {
            backface-visibility: hidden;
            padding: 5px 8px;
            position: absolute;
            top: 0;
            left: 0;
        }

        .front {
            z-index: 2;
            /* for firefox 31 */
            transform: rotateY(0deg);
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            background-color: white;
        }

        .back {
            transform: rotateY(180deg);
            box-shadow: 0 16px 32px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            color: black;
            background-color: white;
        }
        .p_low{
             color: red;
         }
        .p_middle{
            color: orange;
        }
        .p_high{
            color: green;
        }

        nav {
            padding: 24px;
            text-align: center;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            background-color: #333;
        }
        .link-3 {
            transition: 0.5s;
            color: #ffffff;
            font-size: 35px;
            text-decoration: none;
            padding: 0 10px;
            margin: 0 10px;
        }
        .link-3:hover {
            background-color: #111;
            color: #EEA200;
            padding: 24px 10px;
        }


        /*** Кнопки ***/

        .btn {
            z-index: 2;
            display: inline-block;
            vertical-align: top;
            margin: 2px;
            padding: 0;
            border: none;
            border-radius: 2px;
            background-color: transparent;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            text-align: center;
            text-transform: uppercase;
            cursor: pointer;
            padding-left: 14px;
            padding-right: 14px;
            font-size: 13px;
            font-size: 0.8125rem;
            line-height: 36px;
            -webkit-transition-property: box-shadow;
            -moz-transition-property: box-shadow;
            transition-property: box-shadow;
            -webkit-transition-duration: .5s;
            -moz-transition-duration: .5s;
            transition-duration: .5s;
            position:absolute;
            right:100px;
            bottom:100px;
        }
        .btn, .btn:hover, .btn:active, .btn:focus {
            text-decoration: none;
            outline: none;
        }
        .btn::-moz-focus-inner {
            border: 0;
            padding: 0;
        }
        /*** Цвета шрифта кнопок без фона ***/
        .btn-flat.btn-red,
        .btn-icon.btn-red {
            color: #f44336;
        }
        /*** Тень кнопок ***/
        .btn-raised,
        .btn-fab {
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }
        /*** Изменение при наведении ***/
        .btn-raised:hover,
        .btn-flat:hover,
        .btn-fab:hover,
        .btn-icon:hover {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.4);
        }
        /*** Кнопки с фоном ***/
        .btn-raised.btn-red,
        .btn-fab.btn-red {
            color: #fff;
            background-color: #f44336;
        }
        /*** Кнопки с иконками ***/
        .btn-icon,
        .btn-fab {
            border-radius: 50%;
            padding: 0;
            height: 80px;
            width: 80px;
            line-height: 0;
        }

        .popup {
            padding:5px 15px 15px;
            position:fixed;
            top:100px;
            left:50%;
            overflow:hidden;
            border:1px solid #ccc;
            background:#fff;
            -moz-border-radius:15px;
            -webkit-border-radius:15px;
            border-radius:15px;
            z-index:100;
        }
        .popup h2 {
            font:bold 18px/32px Arial, san-serif;
        }
        .popup a.close {
            width:16px;
            height:16px;
            display:block;
            text-indent:-9999px;
            position:absolute;
            top:10px;
            right:10px;
        }

        .reg_form {
            margin-left:-200px;
            width:400px;
        }
        .reg_form form {
            margin-top:10px;
        }
        .reg_form label {
            width:100px;
            height:26px;
            font:bold 12px/26px Arial, san-serif;
            display:inline-block;
            vertical-align:top;
            *display:inline;
            *zoom:1;
        }
        .reg_form input[type=text], .reg_form input[type=password] {
            margin-bottom:10px;
            padding:0 3px;
            width:274px;
            height:22px;
            font:bold 12px/26px Arial, san-serif;
            border:1px solid #ccc;
        }
        .reg_form input[type=submit] {
            margin:10px 15px 0 0;
            padding:3px 10px;
            float:right;
            background:#ccc;
            border:0;
            -moz-border-radius:3px;
            -webkit-border-radius:3px;
            border-radius:3px;
            font:bold 10px Arial, san-serif;
            text-transform:uppercase;
            position:relative;
            cursor:pointer;
        }
        .reg_form input[type=submit]:hover {
            color:#fff;
        }

        #overlay {
            width:100%;
            height:100%;
            position:fixed;
            top:0;
            left:0;
            display:none;
            background:#000;
            opacity:.8;
        }
    </style>

    <script type="text/javascript">

        function addFilm(){
            document.getElementById('window').style.display = "block";
        }
        function closeWindow(){
            document.getElementById('window').style.display = "none";
        }
    </script>

</head>
<body bgcolor="#dcdcdc">
<nav>
        <a class="link-3" href="http://localhost/catalogue">Все</a>
        <a class="link-3" href="http://localhost/catalogue/actual">Актуальные</a>
        <a class="link-3" href="http://localhost/catalogue/notActual">Просмотренные</a>
        <a class="link-3" href="http://localhost/logout">Выйти из системы</a>
</nav>

<button class="btn btn-red btn-fab" onclick="addFilm()"><i class="fa fa-plus" style="font-size:40px"></i></button>
    <div class="popup reg_form" style="display:none;" id="window">
        <a onclick="closeWindow()" style="cursor: pointer;">X</a>
        <h2>Введите ID фильма на кинопоиске чтобы добавить</h2>
        <form method="post" action="">
            <label for="ID">Введите ID:</label>
            <input type="text" name="film_id" />
            <input type="submit" value="Добавить" />
        </form>
    </div>

    @yield('content')
</body>
</html>
