<?php
require('config.php');
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

$sql = "INSERT INTO Inschrijving(Homeclub
                        ,Lidmaatschap
                        ,Looptijd
                        ,Extra
                        ,Email)
                VALUES (:homeclub
                        ,:lidmaatschap
                        ,:looptijd
                        ,:extra
                        ,:mail)";

$statement = $pdo->prepare($sql);
// $statement->bindValue(':Id', $_POST['Id'], PDO::PARAM_STR);
$statement->bindValue(':homeclub', $_POST['homeclub'], PDO::PARAM_STR);
$statement->bindValue(':lidmaatschap', $_POST['lid'], PDO::PARAM_STR);
$statement->bindValue(':looptijd', $_POST['tijd'], PDO::PARAM_STR);
$statement->bindValue(':extra', $_POST['extra'], PDO::PARAM_STR);
$statement->bindValue(':mail', ($_POST['email']), PDO::PARAM_STR);

$result = $statement->execute();
if ($result) {
    echo "Er is een nieuw record gemaakt in de database.";
    header('Refresh:2; url=read.php');
} else {
    echo "Er is geen nieuw record gemaakt.";
    header('Refresh:2; url=read.php');
}
