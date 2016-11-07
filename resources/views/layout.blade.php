<!DOCTYPE html>
<html>
<head>
    @yield('title')

    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

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
    </style>

</head>
<body bgcolor="#dcdcdc">
<nav>
        <a class="link-3" href="http://localhost">Все</a>
        <a class="link-3" href="http://localhost/actual">Актуальные</a>
        <a class="link-3" href="http://localhost/notActual">Просмотренные</a>
</nav>
    @yield('content')

</body>
</html>
