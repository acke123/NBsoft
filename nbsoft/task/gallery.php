<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box
        }

        body {
            font-family: Verdana, sans-serif;
            margin: 0
        }

        .mySlides {
            display: none
        }

        img {
            vertical-align: middle;
        }

        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .numbertext {
            color: black;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #0d6efd;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        @keyframes fade {
            from {
                opacity: .4
            }
            to {
                opacity: 1
            }
        }

        @media only screen and (max-width: 300px) {
            .prev, .next, .text {
                font-size: 11px
            }
        }

        .button {
            background-color: #0d6efd;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="jumbotron text-center">
    <h2>Gallery</h2>
</div>
<div class="slideshow-container">
    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="../image/PHP-logo.svg.png" style="width:100%">
    </div>
    <div class="mySlides fade center">
        <div class="numbertext">2 / 3</div>
        <img src="../image/Unofficial_JavaScript_logo_2.svg.png" style="width:100%">
    </div>
    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="../image/1024px-MySQL.ff87215b43fd7292af172e2a5d9b844217262571.png" style="width:100%">
    </div>
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
</div>
<br>
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>
<div class="col-6 offset-3 center">
    <a class="button" href="../index.php" role="button">Home Page</a>
</div>

<script src="../js/slide.js"></script>
</body>
</html>
