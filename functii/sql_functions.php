<?php

function conectare_bd($host = 'localhost', $username = 'root', $passwd = '', $dbname = '3dprinting')
{
    return mysqli_connect($host, $username, $passwd, $dbname);
}

function inregistrare($nume, $prenume, $email, $parola)
{
    $link = conectare_bd();
    $nume = test_data($nume);
    $prenume = test_data($prenume);
    $email = test_data($email);
    $parola = test_data($parola);
    $nume = mysqli_real_escape_string($link, $nume);
    $prenume = mysqli_real_escape_string($link, $prenume);
    $email = mysqli_real_escape_string($link, $email);
    $parola = mysqli_real_escape_string($link, $parola);
    $parola = md5($parola);
    $result = check($email);
    if($result){
        return false;
    }
    $query = "INSERT INTO utilizator VALUES (NULL, '$nume', '$prenume', '$email', '$parola')";
    return mysqli_query($link, $query);
}

function test_data($input)
{
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    return $input;
}

function check($email)
{
    $link = conectare_bd();
    $query = "SELECT * FROM utilizator WHERE email = '$email'";
    $result = mysqli_query($link, $query);
    $rezultat = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $rezultat;
}

function conectare($email, $parola)
{
    $link = conectare_bd();
    $email = test_data($email);
    $email = mysqli_real_escape_string($link, $email);
    $parola = test_data($parola);
    $parola = mysqli_real_escape_string($link, $parola);
    $verific = check($email);
    if ($verific){
        return md5($parola) == check($email)['parola'];
    }else{
        return false;
    }
}

function nume_dupa_email($email)
{
    $link = conectare_bd();
    $query = "SELECT * from utilizator WHERE email = '$email'";
    $result = mysqli_query($link, $query);
    return mysqli_fetch_array($result, MYSQLI_ASSOC);
}

function adauga_produse($denumire, $pret, $imagine)
{
    $link = conectare_bd();
    $denumire = test_data($denumire);
    $pret = test_data($pret);
    $imagine = test_data($imagine);
    $denumire = mysqli_real_escape_string($link, $denumire);
    $pret = mysqli_real_escape_string($link, $pret);
    $imagine = mysqli_real_escape_string($link, $imagine);
    if (verifica_produs($denumire)['denumire']){
        return false;
    }
    $query = "INSERT INTO produs VALUES (NULL, '$denumire', '$pret', '$imagine')";
    return mysqli_query($link, $query);
}

function verifica_produs($denumire)
{
    $link = conectare_bd();
    $query = "SELECT * FROM produs WHERE denumire = '$denumire'";
    $result = mysqli_query($link, $query);
    return mysqli_fetch_array($result, MYSQLI_ASSOC);
}

function preia_produse()
{
    $link = conectare_bd();
    $query = "SELECT * FROM produs";
    $result = mysqli_query($link, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function id_produs($id)
{
    $link = conectare_bd();
    $query = "SELECT * FROM produs WHERE id = $id";
    $result = mysqli_query($link, $query);
    return mysqli_fetch_array($result, MYSQLI_ASSOC);
}