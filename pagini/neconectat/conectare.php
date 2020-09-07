<h1>Conectare</h1>

<form method="post">
    <table>
        <tr>
            <td>Email:</td>
            <td>
                <input type="email" placeholder="Your email" name="email"/> 
            </td>
        </tr>

        <tr>
            <td>Parola:</td>
            <td>
                <input type="password" placeholder="Your password" name="parola"/> 
            </td>
        </tr>

        <tr>
            <td>
                <input type="submit"  name="login" value="Conectare"/> 
            </td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $parola = $_POST['parola'];
    if (strlen(trim($email)) > 0 && strlen(trim($parola)) > 0) {
        if (isset($_SESSION['logare_esuata'])) {
            print $_SESSION['logare_esuata'];
        }
    } else {
        print "Completati toate campurile";
    }
}
