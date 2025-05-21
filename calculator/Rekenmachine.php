<?php
$resultaat = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $getal1 = $_POST['number1'];
    $getal2 = $_POST['number2'];
    $bewerking = $_POST['operator'];

    if (!is_numeric($getal1) || !is_numeric($getal2)) {
        $resultaat = "Voer alleen nummers in!";
    } else {
    switch ($bewerking) {

        case '+':
            $resultaat = $getal1 + $getal2;
            break;

        case '-':
            $resultaat = $getal1 - $getal2;
            break;

        case '*':
            $resultaat = $getal1 * $getal2;
            break;

            case '/':
                if ($getal2 == 0) {
                    $resultaat = "Dit is niet mogelijk!";
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
if ($resultaat !== null)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekenmachine</title>
    <link rel="stylesheet" type="text/css" href="css/test.css">
    
</head>
<body>

    <div class="container">
    
        <div class="top-part">

        <?php echo $resultaat; ?>

        </div>
    

        <div class="bottom-part">

            <form action="" method="post">
            <ul>
            <li>

                <label>getal 1</label>
                <input type="text" name="number1" value="" placeholder="getal 1" required>

            </li>

            <li>

                <label>Rekensom</label>
                    <select name="operator">
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="x">x</option>
                        <option value="/">/</option>
                    </select>
           
            </li>

            <li>

                <label>getal 2</label>
                <input type="text" name="number2" value="" placeholder="getal 2" required>

            </li>

            <li>

                <input type="submit" name="berekenen" value="berekenen">

            </il>
        </ul>
        </div>
    </div>

</body>

</html>