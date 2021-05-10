<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width:100%;
            margin: auto;
            padding: 5px;
            font-family: 'Indie Flower', cursive;
        }

        #container {
            display: flex;
            flex-flow: row nowrap;
        }

        /*design home page*/
        #logo {
            width: 12rem;
            top: 1rem;
            position: absolute;
        }

        #div1 {
            background-color: black;
            height: 34rem;
            width: 34rem;
            position: absolute;
            top: 16rem;
            left: 53rem;
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        /*here welcome*/
        h1 {
            color:white;
            padding: 31%;
            position: relative;
            letter-spacing: 2px;
            bottom: 8rem;
            left: 3rem;
            display: flex;
            flex-flow: row;
        }

        /*name user*/
        span {
            color: white;
            position: relative;
            left: 13rem;
            bottom: 17rem;
            font-size: 34px;
            padding: 0;
            display: flex;
            flex-flow: row;
            justify-content: space-between;
            font-weight: bold;
        }

        a {
            background-color: #d43c4c;
            text-decoration-line: none;
            bottom: 11rem;
            width: 11rem;
            height: 3rem;
            position: relative;
            text-align: center;
            border-radius: 2rem;
            border-color: #d43c4c;
            display: block;
            padding: 3%;
            font-family: cursive;
            font-size: 13px;
            font-weight: bold;
            top: 38rem;
            left: 67rem;
            z-index: 1000;
        }

        #btnAddArticle button {
            background-color: #d43c4c;
            color: white;
            width: 11rem;
            height: 3rem;
            left: 67rem;
            position: relative;
            border-radius: 2rem;
            border-color: #d43c4c;
            top: 40rem;
            font-weight: bold;
            z-index: 1000;
        }

        /*images design*/
        #cercle {
            width: 14rem;
            height: 14rem;
            border-radius: 7rem;
            background: #d43c4c;
            position: absolute;
            top: 9rem;
            left: 80rem;
        }

        #img2 {
            height: 537px;
            width: 537px;
            object-position: 100% 50%;
            background-image: url("/assets/img/img2.jpg");
            background-position: 50% 50%;
            margin: -661px auto 0 81px;
            border-radius: 50% !important;
            background-size: cover;
            position: absolute;
            top: 53rem;
            left: 26rem;
            z-index: 1000;
        }

        #img3 {
            height: 17rem;
            width: 17rem;
            object-position: 100% 50%;
            background-image: url("/assets/img/img4.png");
            background-position: 50% 50%;
            border-radius: 50% !important;
            background-size: cover;
            position: absolute;
            top: 46rem;
            left: 23rem;
        }

        #img4 {
            height: 13rem;
            width: 13rem;
            object-position: 100% 50%;
            background-image: url("/assets/img/img5.png");
            background-position: 50% 50%;
            border-radius: 50% !important;
            background-size: cover;
            position: absolute;
            top: 25rem;
            right: 77rem;
        }

        #img5 {
            height: 10rem;
            width: 10rem;
            object-position: 100% 50%;
            background-image: url("/assets/img/img3.png");
            background-position: 50% 50%;
            border-radius: 50% !important;
            background-size: cover;
            position: absolute;
            top: 46rem;
            right: 87rem;
        }

        /*btn share*/
        .containerShare {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            filter: url('#goo');
        }

        .btnShare {
            z-index: 99;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 16rem;
            height: 3rem;
            background-color: #d43c4c;
            border-radius: 20px;
            color: #FFF;
            font-size: 20px;
            letter-spacing: 1px;
            font-weight: bold;
            font-family: cursive;
            bottom: 44rem;
            left: 71rem
        }

        .social {
            opacity: 0;
            position: relative;
            margin: 8px;
            width: 40px;
            height: 40px;
            border-radius: 100%;
            display: inline-block;
            color: #FFF;
            font-size: 20px;
            text-align: center;
        }

        i {
            margin-top: 10px;
        }

        a {
            color: #FFF;
        }

        .twitter {
            background: #00aced;
            position: absolute;
            bottom: 43rem;
            left: 72rem;
        }

        .facebook {
            background: #3b5998;
            position: absolute;
            bottom: 43rem;
            left: 76rem;
        }

        .google {
            background: #dd4b39;
            position: absolute;
            bottom: 43rem;
            left: 80rem;
        }

        .youtube {
            background: #bb0000;
            position: absolute;
            bottom: 43rem;
            left: 84rem;
        }

        .clicked {
            opacity: 1;
            transition: 1.2s all ease;
            transform: translateY(56px);
        }
        #pUsername {
            color: white;
            display: flex;
            flex-direction: row;
            bottom: 13rem;
            left: 12rem;
            position: relative;
            font-size: 33px;
        }

    </style>
</head>
<?php
require_once '../View/_partials/header.php';
?>

<div id="container">
    <div>
        <img src="/assets/img/logo.png" alt="mon super logo" id="logo">
    </div>
    <div id="cercle"></div>
    <div id="div1">
        <h1>Bienvenue sur ma page acceuil !</h1>
        <p id="pUsername">Mon nom est Elodie <span><?= $username ?></span></p>
    </div>

    <!--article-->
    <div class="article">
        <div>
            <a href="/index.php?controller=articles">Consulter la liste de nos articles</a>
        </div>
        <div id='btnAddArticle'>
            <!--add a here-->
            <button type="submit" id="addArticle"> Ajouter un article </button>
        </div>
    </div>
    <!--design image-->
    <div id="img2"></div>
    <div id="img3"></div>
    <div id="img4"></div>
    <div id="img5"></div>

    <!--animation btn share-->
    <div class="containerShare">
        <div class="btnShare">Share</div>
        <div class="social twitter"><i class="fa fa-twitter"></i></div>
        <div class="social facebook"><i class="fa fa-facebook"></i></div>
        <div class=" social google"><i class="fa fa-google-plus"></i></div>
        <div class="social youtube"><i class="fa fa-youtube"></i></div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg">
        <defs>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="8" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                <feBlend in="SourceGraphic" in2="goo" />
            </filter>
        </defs>
    </svg>
</div>
<?php
require_once '../View/_partials/footer.php';