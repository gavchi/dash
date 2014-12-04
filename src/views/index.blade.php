<!doctype html>
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DASHBOARD ANALYTICS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!-- build:css styles/vendor.css -->
    <!-- bower:css -->

    <!-- endbower -->
    <!-- endbuild -->
    <!-- build:css(.tmp) styles/main.css -->
    <link rel="stylesheet" href="{{asset("packages/whynot/dashboard/fonts/proximanova/stylesheet.css")}}">
    <link rel="stylesheet" href="{{asset("packages/whynot/dashboard/js/plugins/nouislider/jquery.nouislider.css")}}">
    <link rel="stylesheet" href="{{asset("packages/whynot/dashboard/js/plugins/WOW/css/libs/animate.css")}}">

    <link rel="stylesheet" href="{{asset("packages/whynot/dashboard/css/main.css")}}">
    <!-- endbuild -->
</head>
<body>
    <script src="{{asset("packages/whynot/dashboard/js/bower_components/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("packages/whynot/dashboard/js/charts.js")}}"></script>
    <div class="cap jsCap"></div>
    <div class="header">
        <div class="header__handle jsHeaderHandle"></div>
        <div class="header__inner jsHeader">
            <div class="header__head">
                <div class="container">
                    <div class="header__head-cell">
                        <ul class="header__head-list">
                            <li><div class="date jsDateLeft"><div class="date__icon date__icon-calendar"></div>20.06</div></li>
                            <li><div class="date jsTimeLeft"><div class="date__icon date__icon-clock"></div>14.03</div></li>
                        </ul>
                    </div>
                    <div class="header__head-cell logo">DASHBOARD ANALYTICS</div>
                    <div class="header__head-cell text-right">
                        <ul class="header__head-list header__head-list_right">
                            <li><div class="date jsTimeRight"><div class="date__icon date__icon-clock"></div>14.03</div></li>
                            <li><button class="btn btn_empty date jsDateUpdate jsDateUpdateRight"><div class="btn__icon date__icon date__icon-update jsDataUpdate"></div>Обновить</button></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header__body">
                <div class="container">
                    <div class="header__body-pic">
                        <img class="coffee-steam" src="{{asset("packages/whynot/dashboard/images/coffee-steam.gif")}}" height="57" width="64">
                        <img class="coffee-steam retina-2x" src="{{asset("packages/whynot/dashboard/images/coffee-steam@2x.gif")}}" height="57" width="64" alt="">
                        <div class="header__body-logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content jsContent">
        <div class="container">
            <div class="distance">
                <div class="h3 text-center">Выберите за какой период отобразить аналитику</div>
                <div class="distance-slider">
                    <div class="distance-slider__inner">
                        <div class="jsSlider"></div>
                    </div>
                </div>
                <div class="text-center">
                    <a class="btn jsDateUpdate btn_tour"><span class="btn__icon btn__icon-update"></span>Перейти</a>
                </div>
            </div>
            <div class="dashboard jsUpdateContent">
                <div class="dashboard__inner">
                    <div id="board" data-wow-duration=".7s" data-wow-delay="2.1s" class="dashboard__row cf wow fadeInDown">
                        {{$widgets}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="footer__table">
                <div class="footer__cell">
                    <p>Digital Agency</p>
                    <a href="/" title="WhyNot?!" class="whynot"></a>
                </div>
                <div class="footer__cell text-right">2014 г.</div>
            </div>
        </div>
    </div>

    <!-- build:js scripts/vendor.js -->
    <!-- bower:js -->

    <script src="{{asset("packages/whynot/dashboard/js/plugins/nouislider/jquery.nouislider.min.js")}}"></script>
    <script src="{{asset("packages/whynot/dashboard/js/plugins/highcharts/js/highcharts.js")}}"></script>
    <script src="{{asset("packages/whynot/dashboard/js/plugins/Sortable/Sortable.js")}}"></script>
    <!-- endbower -->
    <!-- endbuild -->
    <!--[if lt IE 10]>
        <script src="{{asset("packages/whynot/dashboard/js/plugins/WOW/dist/wow.js")}}"></script>
        <script>new WOW({ mobile: false }).init();</script>
    <![endif]-->
    <!--[if !IE]>-->
        <script src="{{asset("packages/whynot/dashboard/js/plugins/WOW/dist/wow.js")}}"></script>
        <script>new WOW({ mobile: false }).init();</script>
    <!--<![endif]-->

    <!-- build:js({app,.tmp}) scripts/main.js -->
    <script src="{{asset("packages/whynot/dashboard/js/main.js")}}"></script>
    <!-- endbuild -->
</body>
</html>
