<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!--
Ziel: 3 Radio Knöpfe, 3 Checkboxen, select-option, select-option-multiple, 2 text-Felder und ein submit-Knopf zu erstellen
-->
<form action="empfang.php" method="post">
    <p>Please select your favorite Web language:</p>
    <input type="radio" id="html" name="fav_language" value="HTML" checked>
    <label for="html">HTML</label><br>
    <input type="radio" id="css" name="fav_language" value="CSS">
    <label for="css">CSS</label><br>
    <input type="radio" id="javascript" name="fav_language" value="JavaScript">
    <label for="javascript">JavaScript</label><br>
    <input type="checkbox" id="vehicle1" name="vehicle[]" value="Bike">
    <label for="vehicle1"> I have a bike</label><br>
    <input type="checkbox" id="vehicle2" name="vehicle[]" value="Car">
    <label for="vehicle2"> I have a car</label><br>
    <label> <input type="checkbox" name="vehicle[]" value="Boat">I have a boat</label>
    <br>
    <label for="cars">Choose all cars:</label>

    <select name="cars[]" id="cars" multiple size="2">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="mercedes" selected>Mercedes</option>
        <option value="audi">Audi</option>
    </select>
    <label>Name: <input type="text" name="name[]"></label>
    <label>Alias: <input type="text" name="name[]"></label>
    <br><input type="submit">
</form>
</body>
</html>
