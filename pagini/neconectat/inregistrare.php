<h1>Inregistrare</h1>

<form method="post">
    <table>

        <tr>
            <td>Nume:</td>
            <td>
                <input type="text" placeholder="Your last name" name="nume"/> 
            </td>
        </tr>
        
        <tr>
            <td>Prenume:</td>
            <td>
                <input type="text" placeholder="Your first name" name="prenume"/> 
            </td>
        </tr>


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
                <input type="submit"  name="register" value="Inregistrare"/> 
            </td>
        </tr>
    </table>
</form>

<?php
require_once 'functii/sql_functions.php';
if (isset($_POST['register'])){
    $prenume = $_POST['prenume'];
    $nume = $_POST['nume'];
    $email = $_POST['email'];
    $parola = $_POST['parola'];
    if (strlen(trim($nume)) > 0 && strlen(trim($nume)) > 0 && strlen(trim($email)) > 0 && strlen(trim($parola)) > 0){
       $result = inregistrare($nume, $prenume, $email, $parola);
        if($result){
            $_SESSION['utilizator'] = $prenume;
            header("location:index.php");
        }else{
            print "Esuare la inregistrare";
        }
    }else{
        print "Campurile nu sunt completate";
    }
}