<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abteilung Detail</title>
</head>
<body>
    <h1>Abteilung</h1>
    <?php
        $abteilung = $_GET['abteilung'];
        print("Kürzel: $abteilung<br />");
        $host = "localhost";
        $dbase = "firmaxyz";

        $user = "root";
        $pwd = "";
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbase", "$user", "$pwd");
            // print("Datenbank geöffnet<br />");
        }
        catch(PDOException $e) {
            print("Da hat etwas nicht geklappt!<br />");
        }

        $sql = "SELECT * FROM abteilung WHERE abteilungsid='$abteilung';";
        $stm = $pdo->query($sql);
        $row = $stm->fetch();

        $bezeichnung =  $row['Abteilungsbezeichnung'];
        $chef = $row['Abteilungsleiter'];

        $sql = "SELECT vorname, nachname FROM mitarbeiter WHERE mitarbeiterid=$chef;";
        $row = $pdo->query($sql)->fetch();

        
        $vorname = $row['vorname'];
        $nachname = $row['nachname'];

        print("Bezeichnung: $bezeichnung<br />");
        print("Vorgesetzter: $vorname $nachname<br />");
    ?>
</body>
</html>