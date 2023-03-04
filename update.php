<?php

require("config.php");

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        // echo "Er is een verbinding met de mysql-server";
    } else {
        echo "Er is een interne server-error, neem contact op met de beheerder";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // var_dump($_POST['Id']);
    // var_dump($_POST);
    // Maak een sql update-query en vuur deze af op de database

    try {
        $sql = "UPDATE Inschrijving
                    SET Homeclub = :homeclub,
                        Lidmaatschap = :lidmaatschap,
                        Looptijd = :looptijd,
                        Extra = :extra,
                        Email = :mail
                    WHERE  Id = :Id";

        $statement = $pdo->prepare($sql);

        $statement->bindValue(':Id', $_POST['Id'], PDO::PARAM_INT);
        $statement->bindValue(':homeclub', $_POST['homeclub'], PDO::PARAM_STR);
        $statement->bindValue(':lidmaatschap', $_POST['lid'], PDO::PARAM_STR);
        $statement->bindValue(':looptijd', $_POST['tijd'], PDO::PARAM_STR);
        $statement->bindValue(':extra', $_POST['extra'], PDO::PARAM_STR);
        $statement->bindValue(':mail', ($_POST['email']), PDO::PARAM_STR);

        $statement->execute();

        echo "Het updaten is gelukt";
        header('Refresh:3; url=read.php');
    } catch (PDOException $e) {
        echo "Het updaten is niet gelukt";
        header('Refresh:3; url=read.php');
    }
    // Stuur de gebruiker door naar de read.php pagina voor het overzicht met een header(Refresh) functie;
    exit();
}
$sql = "SELECT  Id
                        ,Homeclub
                        ,Lidmaatschap
                        ,Looptijd
                        ,Extra
                        ,Email
                    FROM Inschrijving
                    WHERE  Id = :Id";
// Maak de sql-query klaar om de $_GET['Id'] waarde te koppelen aan de placeholder :Id
$statement = $pdo->prepare($sql);

// Koppel de waarde $_GET['Id'] aan de placeholder :Id
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);


// Voer de query uit
$statement->execute();

// Haal het resultaat op met fetch en stop het object in de variabele $result
$result = $statement->fetch(PDO::FETCH_OBJ);
// var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BasicFit</title>
</head>

<body>
    <h1>Update info</h1>

    <form action="update.php" method="post">
        <input type="text" name="Id" value="<?php echo $result->Id; ?>" hidden>
        <label for="homeclub">Kies je homeclub:</label><br>
        <select class="select" name="homeclub" value="<?php echo $result->Homeclub; ?>">
            <option value="1">Moreelsehoek 2</option>
            <option value="2">HerculesPlein 375</option>
            <option value="3">Van Heuven Goedhartplein 13</option>
            <option value="4">Europaplein 705</option>
            <option value="5">Franciscusdreef 80</option>
            <option value="6">Middenwetering 21</option>
            <option value="7">Zonnebaan 22</option>
        </select><br>
        <label for="lidmaatschap">Selecteer een lidmaatschap</label><br>
        <input type="radio" name="lid" value="<?php echo $result->Lidmaatschap; ?>">Comfort
        <input type="radio" name="lid" value="<?php echo $result->Lidmaatschap; ?>">Premium
        <input type="radio" name="lid" value="<?php echo $result->Lidmaatschap; ?>">All in <br>

        <label for="looptijd">Looptijd:</label><br>
        <input type="radio" name="tijd" id="jaar" value="<?php echo $result->Looptijd; ?>">Jaarlidmaatschap
        <input type="radio" name="tijd" id="flex" value="<?php echo $result->Looptijd; ?>">Flex optie <br>

        <label for="extra">Selecteer je extra's</label><br>
        <input type="checkbox" name="extra" id="water" value="<?php echo $result->Extra; ?>">Yanga sportwater €2,50 per 4 weken <br>
        <input type="checkbox" name="extra" id="online" value="<?php echo $result->Extra; ?>">Pesonal online coach €60,00 eenmalig <br>
        <input type="checkbox" name="extra" id="intro" value="<?php echo $result->Extra; ?>">Personal training intro €25,00 eenmalig <br>

        <label for="mail">E-mail</label><br>
        <input type="email" name="email" value="<?php echo $result->Email; ?>"><br>

        <input type="submit" value="Sla Op">
        <input type="reset" value="Reset">

        <input type="hidden" name="timestamp" value="<?= time() ?>">

    </form>
    </form>

    <script src="eheh.js"></script>

</body>

</html>
</body>

</html>