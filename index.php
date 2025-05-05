<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
 <link rel="stylesheet" href="grand.css">
<title>Kūno masės skaičiuoklė</title> 
</head> 
<body> 

<h2>Duomenų įvedimas</h2>

<form method="post">
    <label for="svoris">Įveskite svorį (kg):</label>
    <input type="number" id="svoris" name="svoris" step="0.1" required>
    
    <label for="ugis">Įveskite ūgį (cm):</label>
    <input type="number" id="ugis" name="ugis" step="0.1" required>

    <input type="submit" name="skaiciuoti" value="Skaičiuoti KMI">
</form>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (!empty($_POST["svoris"]) && !empty($_POST["ugis"])) {
        $svoris = floatval($_POST["svoris"]);
        $ugis = floatval($_POST["ugis"]) / 100; 

      
        $kmi = $svoris / ($ugis * $ugis);
        $kmi = round($kmi, 2);

       
        if ($kmi < 18.5) {
            $rezultatas = "Nepakankamas svoris";
        } elseif ($kmi >= 18.5 && $kmi < 24.9) {
            $rezultatas = "Normalus svoris";
        } elseif ($kmi >= 25 && $kmi < 29.9) {
            $rezultatas = "Antsvoris";
        } else {
            $rezultatas = "Nutukimas";
        }

        echo "<p>Jūsų KMI: <strong>$kmi</strong></p>";
        echo "<p>KMI kategorija: <strong>$rezultatas</strong></p>";
    } else {
        echo "<p style='color:red;'>Įveskite abu duomenis!</p>";
    }
}
?>

</body> 
</html>
