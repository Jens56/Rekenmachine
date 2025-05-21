<?php
$resultaat = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $getal1 = $_POST['number1'];
    $getal2 = $_POST['number2'];
    $bewerking = $_POST['operator'];

    // Controleer of beide getallen numeriek zijn, afhankelijk van de gekozen bewerking
    if (!is_numeric($getal1) || ($bewerking != "euro naar Deense kronen" && $bewerking != "Deense kronen naar euro" && !is_numeric($getal2))) {
        $resultaat = "Voer alleen nummers in!";
    } else {
        if ($bewerking == "euro naar Deense kronen") {
            $koers = 1.47; // 1 euro = 1,47 DKK
            $resultaat = $getal1 * $koers; // Formule van euro's naar Deense kronen
            $resultaat = number_format($resultaat, 2); // Resultaat afronden op 2 decimalen
        }
        elseif ($bewerking == "Deense kronen naar euro") {
            $koers = 1.47; // 1 euro = 1,47 DKK
            $resultaat = $getal1 / $koers;  // Formule van Deense kronen naar euro's
            $resultaat = number_format($resultaat, 2); // Resultaat afronden op 2 decimalen
        }
        // Voor de BMI-berekening
        elseif ($bewerking == "bmi") {
            $gewicht = $getal1;
            $lengte = $getal2;
            // Controleer of lengte groter is dan 0
            if ($lengte <= 0) {
                $resultaat = "Lengte moet groter zijn dan 0!";
            } else {
                // Bereken de BMI
                $bmi = $gewicht / ($lengte * $lengte);
                $resultaat = number_format($bmi, 2); // BMI afronden op 2 decimalen
            }
        }
        else {
            // Voert de rekensommen uit
            switch ($bewerking) {
                case '+':
                    $resultaat = $getal1 + $getal2;
                    break;
                case '-':
                    $resultaat = $getal1 - $getal2;
                    break;
                case 'x':
                    $resultaat = $getal1 * $getal2;
                    break;
                case '/':
                    if ($getal2 == 0) {
                        $resultaat = "Delen door nul is niet mogelijk!";
                    } else {
                        $resultaat = $getal1 / $getal2;
                    }
                    break;
                default:
                    $resultaat = "Ongeldige bewerking.";
                    break;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekenmachine</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container">
    
    <div class="top-part">
            <!-- Toon het resultaat van de bewerking of foutmelding -->
        <?php if ($resultaat !== null) { echo "<h2>Resultaat: " . $resultaat . "</h2>"; } ?>
    </div>
    

    <div class="bottom-part">
        <!-- Formulier voor invoer -->
        <form action="" method="post">
            <ul>
                <li>
                    <label>Getal 1</label>
                    <input type="text" name="number1" value="" placeholder="Getal 1" required>
                </li>

                <li>
                        <label>Rekensom</label>
                    <select name="operator">
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="x">x</option>
                        <option value="/">/</option>
                        <option value="euro naar Deense kronen">Euro naar Deense Kronen</option>
                        <option value="Deense kronen naar euro">Deense Kronen naar Euro</option>
                        <option value="bmi">BMI Berekening</option>
                    </select>
                </li>

                <li>
                    <label>Getal 2 (indien van toepassing)</label>
                    <input type="text" name="number2" value="" placeholder="Getal 2">
                </li>

                <li>
                    <input type="submit" name="berekenen" value="Berekenen">
                    <input type="reset" name="Reset" value="Reset">
                </li>
            </ul>
        </form>
    </div>
</div>
</body>