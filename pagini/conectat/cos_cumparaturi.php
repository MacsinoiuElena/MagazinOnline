<h1>Cos de cumparaturi</h1>
<?php
if (isset($_SESSION['cos']) && $_SESSION['cos'] != null) {
    $suma = 0;
    ?>

    <table border="2px" class="tabel">
        <tr>
            <th>Denumire</th>
            <th>Cantitate</th>
            <th>Pret</th>
            <th>Sterge</th>
        </tr>
        <?php
        foreach ($_SESSION['cos'] as $id_prod => $cantitate) {
            $prod = id_produs($id_prod);
            $suma = $suma + $prod['pret'] * $cantitate;
            ?>
            <tr>
                <td><?php print $prod['denumire']; ?></td>
                <td><?php print $cantitate; ?></td>
                <td><?php print $prod['pret']; ?></td>
                <td><a href="index.php?page=1&&sterge=<?php print $id_prod; ?>" class="cos">Sterge</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <p id="graf">
        <?php
        print "Total plata:" . $suma;
        ?>
    </p>
    <?php
} else {
    ?>
    <p class="paragraf">
        <?php
        print "Cosul este gol";
        ?>
    </p>
    <?php
}
    
    