<h1>Vizualizare produse</h1>

<table class="tabel" border="2">
    <tr>
        <th>Imagine</th>
        <th>Denumire</th>
        <th>Pret</th>
        <th>Cumpara</th>
    </tr>

<?php
$produse = preia_produse();
foreach ($produse as $produs) {
    ?>
<tr>
    <td><img src="imagini/<?php print $produs['imagine'];?>" width="100px"/></td>
    <td><?php print $produs['denumire'];?></td>
    <td><?php print $produs['pret'];?></td>
    <td>
        <a href="index.php?page=2&&id_prod=<?php print $produs['id']; ?>" class="cos">Adauga in cos</a>
    </td>
</tr>

<?php
}
?>
</table>
