<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noleggio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.jpg" type="image/x-icon">
</head>
<body>
    
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["invia"])) {
        
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $dataInizio = $_POST["data_inizio"];
        $dataFine = $_POST["data_fine"];
        $oreGiornaliere = $_POST["ore"];

        $costoOrario = 15;
        $percentualeSconto = 0.10;

        if($oreGiornaliere > 0) {
            $data1 = new DateTime($dataInizio);
            $data2 = new DateTime($dataFine);

            if($data1 > $data2) {
                echo "Errore: La data di fine deve essere successiva o uguale alla data di inizio.";
                exit;
            }
            $diff = $data1->diff($data2);
            $giorni = $diff->days + 1; 
            $oreTotali = $giorni * $oreGiornaliere;
            $costoLordo = $oreTotali * $costoOrario;

            if($oreTotali > 24) {
                $sconto = $costoLordo * $percentualeSconto;
                $costoTotale = $costoLordo - $sconto;
                
                echo "Salve " . $nome . " " . $cognome . ", il costo totale del noleggio è: " . $costoTotale . "€ (sconto applicato del 10%), Buona Giornata!!";
            } else {
                $costoTotale = $costoLordo;
                
                echo "Salve " . $nome . " " . $cognome . ", il costo totale del noleggio è: " . $costoTotale . " €, Buona Giornata!!";
            }
            
        } else {
            echo "Errore: Le ore giornaliere devono essere maggiori di 0.";
            exit;
        }
    } else {
        echo "Errore: Dati non inviati correttamente.";
    }
} else {
    echo "Errore: Metodo di richiesta non valido.";
}

?>