<?php
require_once 'functii/sql_functions.php';
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $parola = $_POST['parola'];
    if (strlen(trim($email)) > 0 && strlen(trim($parola)) > 0) {
        $prenume = nume_dupa_email($email)['prenume'];
        conectare($email, $parola);
        if (conectare($email, $parola)) {
            if (isset($_SESSION['logare_esuata'])) {
                unset($_SESSION['logare_esuata']);
            }
            $_SESSION['utilizator'] = $prenume;
        } else {
            $_SESSION['logare_esuata'] = "Logare esuata";
        }
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("location:index.php");
}

if (isset($_GET['id_prod'])) {
    $id = $_GET['id_prod'];
    if (isset($_SESSION['cos'][$id])) {
        $_SESSION['cos'][$id] ++;
    } else {
        $_SESSION['cos'][$id] = 1;
    }
}

if (isset($_GET['sterge'])) {
    $id = $_GET['sterge'];
    if ($_SESSION['cos'][$id] > 1) {
        $_SESSION['cos'][$id] --;
    } else {
        unset($_SESSION['cos'][$id]);
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <?php
        if (isset($_SESSION['utilizator'])) {
            print '<link rel="stylesheet" type="text/css" href="css/style_c.css" />';
        } else {
            print '<link rel="stylesheet" type="text/css" href="css/style_n.css" />';
        }
        ?>
    </head>
    <body>
        <?php
        if (isset($_SESSION['utilizator'])) {
            require_once 'templates/template_c.php';
        } else {
            require_once 'templates/template_n.php';
        }
        ?>
    </body>
</html>
