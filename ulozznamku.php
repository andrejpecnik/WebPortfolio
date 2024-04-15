<?php
include("secret.php");
$spojeni = mysqli_connect($server, $jmeno, $heslo, $databaze);
?>

<pre>
    <?php
        var_dump($_POST);
        /*ESCAPE specialnych znakov - aby sa nam tam niekto nenabural (SQL injection -typ utoku)*/

        $datum = mysqli_real_escape_string($spojeni, $_POST['datum']);
        $vysledok = mysqli_real_escape_string($spojeni, $_POST['znamka']);
        $predmet = mysqli_real_escape_string($spojeni, $_POST['predmet']);
        $vyucujuci = mysqli_real_escape_string($spojeni, $_POST['vyucujuci']);


        $sql = "INSERT INTO vysledky (datum, vysledok, predmet, vyucujuci)
        VALUES ('".$datum."','".$vysledok."','".$predmet."','".$vyucujuci."');";

        if (mysqli_query($spojeni, $sql)) {
            header("Location: index.php#tabulkavysledkov");
            die();
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    ?>
</pre>