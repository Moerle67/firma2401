<!doctype html>
<html lang="de">

<head>
    <title>Abteilung</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <!-- place navbar here -->
        <div class="container shadow bg-danger-subtle">
            <div class="row">
                <div class="col text-center">
                    <h1>Abteilung</h1>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php
                    $abteilung = $_GET['abteilung'];
                    print("Es wurde die Abteilung '$abteilung' übergeben.<br />");
                    // Datenbankzugriff
                    include("datenbank.php");

                    // SQL generieren
                    // Rakete nehmen
                    $sql = "SELECT * FROM abteilung WHERE AbteilungsID='$abteilung'";
                    // Abfrage vorbereiten (Rakete in Flasche)
                    $stm = $pdo->query($sql);
                    // Abfrage durchführen (Rakete abfeuern)
                    $row = $stm->fetch();
                    // var_dump($row);
                    $bezeichnung = $row["Abteilungsbezeichnung"];
                    $leiter = $row["Abteilungsleiter"];
                    print("Abteilungsbezeichnung: $bezeichnung <br />");
                    print("Abteilungsleiter: $leiter");
                    ?>
                </div>
            </div>
            <div class="row">
                <hr />
                <form action="save.php" method="POST">
                    <input type="hidden" value="<?php print($abteilung);?>" name="id">
                    <div class="mb-3">
                        <label for="eingabeAbteilung" class="form-label">Abteilungsbezeichnung</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="eingabeAbteilung" 
                            name = "bezeichnung" 
                            aria-describedby="abteilungHelp"
                            required 
                            value="<?php print($bezeichnung);?>"
                        >
                        <div id="abteilungHelp" class="form-text">Bitte hier die neue Abteilungsbezeichnung eintragen.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Speichern</button>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <div class="container shadow bg-success-subtle">
            <div class="row">
                <div class="col text-center">
                    &copy; Moerlisoft 2024
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>