<?php
    $login = $_POST["login"];
    $senha = $_POST["psw"];

    if($login == "admin" && $senha == "senha"){
        echo file_get_contents("../HTML/Inside.html");
    }
?>