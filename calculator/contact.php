<?php
// Dit deel van de code verwerkt de formuliergegevens als het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verzamelen van formuliergegevens
    $gender = $_POST['operator'];
    $voornaam = $_POST['Voornaam'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $achternaam = $_POST['Achternaam'];
    $email = $_POST['email'];

    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $geboortedatum = $day . "/" . $month . "/" . $year;
    $extra_info = $_POST['Extra_info'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactpagina</title>
    <link rel="stylesheet" type="text/css" href="css/Contactpage.css">
</head>
<body>
<div class="contact-page">
    <form method="post" action="">
        <ul> 
            <li>
                <label>Gender</label>
                <select name="operator">
                    <option value=""></option>
                    <option value="man" <?php if (isset($gender) && $gender == "man") echo "selected"; ?>>man</option>
                    <option value="vrouw" <?php if (isset($gender) && $gender == "vrouw") echo "selected"; ?>>vrouw</option>
                    <option value="wil liever niet zeggen" <?php if (isset($gender) && $gender == "wil liever niet zeggen") echo "selected"; ?>>wil liever niet zeggen</option>
                </select>
            </li>
            <li>
                <label>Voornaam</label>
                <input type="text" name="Voornaam" value="<?php echo isset($voornaam) ? htmlspecialchars($voornaam) : ''; ?>" required>
            </li>
            <li>
                <label>Tussenvoegsel</label>
                <input type="text" name="tussenvoegsel" value="<?php echo isset($tussenvoegsel) ? htmlspecialchars($tussenvoegsel) : ''; ?>">
            </li>
            <li>
                <label>Achternaam</label>
                <input type="text" name="Achternaam" value="<?php echo isset($achternaam) ? htmlspecialchars($achternaam) : ''; ?>" required>
            </li> 
            <li>
                <label>E-mail</label>
                <input type="text" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
            </li>
            <li>
            <label for="day">Dag:</label>
            <input type="number" id="day" name="day" min="1" max="31" required>
            
            <label for="month">Maand:</label>
            <input type="number" id="month" name="month" min="1" max="12" required>

            <label for="year">Jaar:</label>
            <input type="number" id="year" name="year" min="1900" max="" required>
            </li>
            <li>
                <label>Extra info</label>
                <input type="text" name="Extra_info" value="<?php echo isset($extra_info) ? htmlspecialchars($extra_info) : ''; ?>" required>            
            </li>
            <li>
                <input type="submit" name="Verzenden" value="Verzenden">
                <input type="reset" name="Reset" value="Reset">
            </li>
        </ul> 
    </form>

        <?php
        // Als formulier is verzonden, toon de ingevulde gegevens
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<h3>Persoonlijke gegevens:</h3>";
            echo "Gender: " . htmlspecialchars($gender) . "<br>";
            echo "Voornaam: " . htmlspecialchars($voornaam) . "<br>";
            echo "Tussenvoegsel: " . htmlspecialchars($tussenvoegsel) . "<br>";
            echo "Achternaam: " . htmlspecialchars($achternaam) . "<br>";
            echo "E-mail: " . htmlspecialchars($email) . "<br>";
            echo "Geboortedatum: " . htmlspecialchars($geboortedatum) . "<br>";
            echo "Extra info: " . htmlspecialchars($extra_info) . "<br>";
        }
        ?>
    </div>   
</body>
</html>