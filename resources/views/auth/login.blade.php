<head>
    <meta charset="utf-8">
    <title>Каталог фильмов</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="icon" href="http://s1.iconbird.com/ico/2013/11/504/w128h1281385326527video.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://d1a3f4spazzrp4.cloudfront.net/login/style-login/style.f9b6ed7902ad25100d2032f04b0189e8.css">
    <link rel="stylesheet" href="https://d1a3f4spazzrp4.cloudfront.net/uber-fonts/2.0.1/superfine.css"/>
</head>
<body style="background-image: url(http://www.1zoom.net/big2/807/255075-Sepik.jpg);">
<div class="content text--center soft--top" style="background-color:whitesmoke">

    <div class="push-gutter--sides push-small--top">
        <section class="signup-top" style="height:300px">
            <div class="signup-top-images">
                <img src ="http://s1.iconbird.com/ico/2013/11/504/w128h1281385326527video.png">
            </div>
            <div class="signup-top-text" style="margin-top:0px">
                <div class="signup-top-text-subtitle">
                    <p>Добро пожаловать на сайт посвященный фильмам.</p>
                    <p>Наш сайт представляет собой твою персональную коллекцию фильмов!</p>
                    <p>Добавляй понравившиеся фильмы, чтобы не забыть посмотреть их в свободное время.
                        Добавляй любимые фильмы в свою коллекцию, чтобы пересмотреть их снова!</p>
                </div>
            </div>
        </section>

        <div id="login-content">
            <p class="primary-font primary-font--semibold background-line push--top push--bottom">
                <span>Вход</span>
            </p>

            <form method="post" action="http://localhost" novalidate>
                <div class="form-group push-tiny--top flush--bottom" id="input-container">
                    @if (session('status'))
                        <p style="color:red">{{ session('status') }}</p>
                    @endif
                    <input type="email"  name="email"
                           class="text-input square--bottom "
                           placeholder="Адрес эл.почты"
                           value="" id="email" />
                </div>

                <div class="form-group push--bottom">
                    <input type="password" name="password"
                           value=""
                           class="text-input square--top "
                           placeholder="Пароль" id="password"/>
                </div>
                <button id="login-submit" class="btn btn--large btn--full" type="submit">
                    Вход</button>
            </form>

            <hr class="push--top push-small--bottom" id="signin-signup-separator"/>

    <!--        <p class="text--center push-small--bottom">
                <a href="https://auth.uber.com/login/forgot-password" class="forgot-password">
                    Забыл пароль
                </a>
            </p>
     -->
            <p class="text--center">
                У вас нет аккаунта?
                <a id="sign_up_link" href="http://localhost/register">
                    Регистрация
                </a>
            </p>
        </div>
    </div>
</div>
</body>
</html>