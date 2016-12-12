<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>
        Регистрация
    </title>
    <link rel="shortcut icon" href="http://s1.iconbird.com/ico/2013/11/504/w128h1281385326527video.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta property="og:image" content="//d1a3f4spazzrp4.cloudfront.net/facebook/hd_shareimage.png">

    <link rel="stylesheet" type="text/css" href="https://d1a3f4spazzrp4.cloudfront.net/free-candy/stylesheets/base_signup_lite.ae640fe34bfc4fe0cab30488da40fbb8.css">
    <link rel="stylesheet" type="text/css" href="https://d1a3f4spazzrp4.cloudfront.net/free-candy/stylesheets/base_signup_creditcardicon.88151d024f2ce3580b5b1992ea7dfc43.css">
    <link rel="stylesheet" href="https://d1a3f4spazzrp4.cloudfront.net/free-candy/external/stylesheets/uber-fonts/3.0.0/superfine.239ba149d8e233e0c2017ed772bc8973.css"/>

    <script type="text/javascript">
        function enableButton(button) {
            var pass = document.forms["form-signup"]["password"].value;
            var email = document.forms["form-signup"]["email"].value;
            var login = document.forms["form-signup"]["login"].value;
            var fail = "";
            if (pass == "" || pass.length < 5)
                fail += "Введите пароль";
            if (login == "" || login.length < 3)
                fail += "Введите логин";
            if(email == "" || email == null)
                fail += "Введите эмейл";
            if(fail == "")
                button.className = "btn btn-primary js-submit enable";
            else
                button.className = "btn btn-primary js-submit disabled";
        }
    </script>
</head>

<body>

<section class="wrapper">
    <section class="content ">
        <div class="signup-wrapper">

            <section class="signup-top" style="height:120px">
                <div class="signup-top-images">
                    <img src ="http://s1.iconbird.com/ico/2013/11/504/w128h1281385326527video.png">
                </div>
                <div class="signup-top-text" style="margin-top:0px">
                    <div class="signup-top-text-title">
                        Регистрация аккаунта
                    </div>
                    <div class="signup-top-text-subtitle">
                        <p>Добро пожаловать на сайт посвященный фильмам.</p>
                        <p>Создайте аккаунт — и у вас появится возможность создать свой личный каталог фильмов и делиться им с друзьями!</p>
                    </div>
                </div>
            </section>

            <section class="signup-form">
                <article class="form-container">
                    <form id="form-signup" action="http://localhost/register" method="POST" autocomplete="on">

                        <div class="signup-form-section account">
                            <div class="signup-form-section-title"><p>Заполните данные</p></div>
                            <div class="signup-form-section-required">Обязательно к заполнению</div>

                            <div class="form-group required ">
                                <label for="login">Имя пользователя</label>
                                <input type="text" value="" name="login" id="login"
                                       placeholder="Минимум 3 символа" onchange="enableButton(sub)"
                                >
                            </div>
                            <div class="form-group required ">
                                @if (session('status'))
                                    <p style="color:red">{{ session('status') }}</p>
                                @endif
                                <label for="email">Эл. почта</label>
                                <input type="email" value="" name="email" id="email"
                                       placeholder="name@example.com" onchange="enableButton(sub)"
                                >
                            </div>
                            <div class="form-group required ">
                                <label for="password">Пароль</label>
                                <input type="password" value="" name="password" id="password"
                                       placeholder="Минимум 5 символов" onchange="enableButton(sub)"
                                >
                            </div>
                        </div>

                        <div class="signup-form-section submit">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" name="sub" class="btn btn-primary js-submit disabled" >Создать аккаунт</button>
                                </div>
                                <div class="signup-form-section-notice">Просим заполнить все обязательные (<span class="star">*</span>) поля.</div>
                            </div>
                        </div>

                    </form>
                </article>
            </section>
        </div>
    </section>
</section>
</body>
</html>