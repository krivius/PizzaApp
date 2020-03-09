<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>My Pizza App</title>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="shortcun icon" href="favicon.ico" type="image/x-icon">



    <script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
</head>
<body>

    <div id="wrapper">
        <div id="header-wrapper">
            <div id="header" class="container">
                <div id="logo">
                    <h1><a href="#"><img src="/images/PizzaExpressLogo.png"></a></h1>
                </div>
                <div id="menu">
                    <ul>
                        <li class="{{ Request::path() === '/' ? 'current_page_item' : '' }} "><a href="/">Menu</a></li>
                        <li  class="{{ Request::path() === 'special-offers' ? 'current_page_item' : '' }} "><a href="/special-offers">Special offers</a></li>
                        <li  class="{{ Request::path() === 'cart' ? 'current_page_item' : '' }} "><a href="/cart" id="cartBtn">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>


        @yield('content')


        <div id="footer-content-wrapper">
            <div id="footer-content">
                <div id="fbox1">
                    <h2>Fusce ultrices fringilla</h2>
                    <ul class="style1">
                        <li class="first"><a href="#">Maecenas luctus lectus at sapien</a></li>
                        <li><a href="#">Etiam rhoncus volutpat erat</a></li>
                    </ul>
                </div>
                <div id="fbox2">
                    <h2>Nulla luctus eleifend</h2>
                    <ul class="style1">
                        <li class="first"><a href="#">Maecenas luctus lectus at sapien</a></li>
                        <li><a href="#">Etiam rhoncus volutpat erat</a></li>
                    </ul>
                </div>
                <div id="fbox3">
                    <h2>Maecenas luctus lectus</h2>
                    <ul class="style1">
                        <li class="first"><a href="#">Maecenas luctus lectus at sapien</a></li>
                        <li><a href="#">Etiam rhoncus volutpat erat</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="footer">
            <p>&copy; Untitled. All rights reserved. Images by <a href="http://fotogrph.com/">Fotogrph</a>. Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
        </div>
s
    </div>

    @yield('mainMenu')


</body>
</html>
