<h1>Adauga produse</h1>
<form method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Denumire produs:</td>
            <td>
                <input type="text" name="denumire" />
            </td>
        </tr>

        <tr>
            <td>Pret produs:</td>
            <td>
                <input type="text" name="pret" />
            </td>
        </tr>

        <tr>
            <td>Imagine produs:</td>
            <td>
                <input type="file" name="imagine" />
            </td>
        </tr>

        <tr>
            <td>
                <input type="submit" name="adauga" value="Adauga" />
            </td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['adauga'])) {
    $denumire = $_POST['denumire'];
    $pret = $_POST['pret'];
    if (strlen(trim($denumire)) > 0 && strlen(trim($pret)) > 0) {
        if (isset($_FILES['imagine'])) {
            if ($_FILES['imagine']['error'] == 0) {
                switch ($_FILES['imagine']['type']) {
                    case "image/jpg":
                    case "image/jpeg":
                    case "image/png":
                    case "image/bmp":
                    case "image/gif":
                        $nume_nou = uniqid() . $_FILES['imagine']['name'];
                        $salvare_server = move_uploaded_file($_FILES['imagine']['tmp_name'], "imagini/" . $nume_nou);
                        if ($salvare_server) {
                            $salvare_bd = adauga_produse($denumire, $pret, $nume_nou);
                            if ($salvare_bd) {
                                ?>
                                <p class="paragraf">
                                    <?php print "Produs incarcat cu succes" ?></p>
                                <?php
                            } else {
                                unlink('imagini/' . $nume_nou);
                                ?>
                                <p class="paragraf"><?php print "Eroare la incarcarea in baza de date"; ?></p>
                                <?php
                            }
                        }
                        break;
                    default:
                        ?>
                        <p class="paragraf">
                            <?php
                            print"Imaginea nu e in formatul cerut";
                            break;
                            ?>
                        </p>
                    <?php
                }
            } else {
                ?>
                <p class="paragraf">
                    <?php print "A aparut o eroare"; ?>
                </p>
                <?php
            }
        } else {
            ?>
            <p class="paragraf">
                <?php print "Eroare"; ?>
            </p>
            <?php
        }
    } else {
        ?>

        <p class="paragraf">
            <?php
            print "Nu ati completat toate campurile";
            ?>
        </p>
        <?php
    }
}
?>

