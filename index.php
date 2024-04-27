<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meine Firma</title>
</head>
<body>
    <?php
        $host = "localhost";
        $dbase = "firmaxyz";

        $user = "root";
        $pwd = "";
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbase", "$user", "$pwd");
            print("Datenbank geöffnet<br />");
        }
        catch(PDOException $e) {
            print("Da hat etwas nicht geklappt!<br />");
        }
        // SQL Befehl generieren
        $sql = "SELECT * FROM abteilung;";

        // Abfrage vorbereiten
        $stm = $pdo->query($sql);

        // Abfrage an DBMS abschicken und Ergebnis speichern
        $rows = $stm->fetchAll();

        $number = 1;
        foreach ($rows as $row) {
            $id = $row['AbteilungsID'];
            print("$number.Zeile: <br />");
            print("<a href='abteilung.php?abteilung=$id' target='_blank'>");
                print("Inhalt: $row[0] - $row[1]");
            print("</a>");
            print("<br />");
            $number++;
        }
    ?>
</body>
</html>