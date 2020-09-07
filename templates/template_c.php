<header id="banner"></header>
<div id="fundal">
    <h1 id="h1">Bine ai venit,<?php print $_SESSION['utilizator']; ?></h1>
    <hr>
    
    <nav id="meniu">
        <ul>
            <li><a href="index.php">Adauga produse</a></li>
            <li><a href="index.php?page=1">Cos de cumparaturi</a></li>
            <li><a href="index.php?page=2">Vizualizare produse</a></li>
            <li><a href="index.php?logout">Deconectare</a></li>
        </ul>
    </nav>

    <hr>

    <section id="sectiune">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 1) {
                require_once 'pagini/conectat/cos_cumparaturi.php';
            } elseif ($page == 2) {
                require_once 'pagini/conectat/vizualizare_produse.php';
            } else {
                require_once 'pagini/eroare.php';
            }
        } else {
            require_once 'pagini/conectat/adauga_produse.php';
        }
        ?>
    </section>
    <footer id="subsol">&copy;Design&Style</footer>
</div>


