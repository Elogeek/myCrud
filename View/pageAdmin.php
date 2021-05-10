<?php
require_once $_SESSION['DOCUMENT_ROOT'] . '../View/_partials/header.php';
?>
<style>
    img {
        width: 8rem;
        position: absolute;
        left: 1rem;
    }

    .containerAdmin {
        width: 100%;
        font-family: cursive;
    }

    #right {
        float: right;
        background-color: white;
        width: 50%;
    }

    #left {
        float: left;
        background-color: #32323e;
        color: white;
        width: 16%;
        height: 100vh;
        display: flex;
        flex-flow: column;
        justify-content: space-around;
        padding: 1rem;
        margin-top: 6rem;
        text-align: center;
    }

    #left div:hover {
        background-color: #d43c4c;
        height: 3rem;
        padding: 1rem;
    }

    .menuAdmin {
        display: flex;
        flex-flow: row;
        justify-content: flex-end;
    }

    #right {
        float: right;
        height: 100vh;
        width: 80%;
        margin-top: 6rem;
    }

    #right span {
        text-align: center;
        display: flex;
        flex-flow: column;
    }

</style>
<div class="containerAdmin">
    <img src="../assets/img/logo.png" alt="Mon super logo">

    <div class="menuAdmin">
        <button type="submit">Se déconnecter</button>
    </div>

    <div id="left">

        <div>
            <i class="far fa-newspaper"></i>
            Rédiger un article
        </div>
        <div>
            <i class="fas fa-trash-alt"></i>
            Supprimer un article
        </div>
        <div>
            <i class="fas fa-user"></i>
            Mes users
            <!--dès qu'on click dessus, renverra la liste des users-->
        </div>
        <div>
            <i class="fas fa-user-slash"></i>
            Supprimer un user
        </div>

    </div>
    <div id="right">
        <span>Blabla .... it's finish !!!</span>
    </div>

</div>




