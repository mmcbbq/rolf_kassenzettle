<?php
if (!isset($vonBerechnung)){
    for ($j = 0; $j < 3; $j++) {
        $artikel[$j] = '';
        $einzelpreis[$j] = '';
        $anzahl[$j] = '';
        $preis[$j] = '';
        $mwst[$j] = 7;
    }
    $gesamtsumme = '';
    $siebenPro = '';
    $neunzehnPro = '';
} else {
    $gesamtsumme = number_format($gesamtsumme,2,",");
    $siebenPro = number_format($siebenPro,2,",");
    $neunzehnPro = number_format($neunzehnPro,2,",");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kassenzettel</title>
    <style>

    </style>
</head>
<body>
<h1>Kassenzettel <?php echo date('d.m.y H:i:s') ?></h1>
<form action="kassenzettelBrechnung.php" method="post">
    <table>
        <thead>
        <th>Artikel</th>
        <th>Einzelpreis</th>
        <th>Anzahl</th>
        <th>MwSt.</th>
        <th><?php if(isset($vonBerechnung)) echo "Preis"; ?></th>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < 3; $i++) {
            ?>
            <tr>
                <td><input type="text" name="artikel[]" value="<?php echo $artikel[$i]; ?>"></td>
                <td><input type="text" name="einzelpreis[]" value="<?php echo $einzelpreis[$i]; ?>"></td>
                <td><input type="text" name="anzahl[]" value="<?php echo $anzahl[$i]; ?>"></td>
                <td><label><input type="radio" name="mwst[<?php echo $i ?>]" value="7" <?php if ($mwst[$i] == 7)  echo "checked" ?>>7% </label>
                    <label><input type="radio" name="mwst[<?php echo $i ?>]" value="19" <?php $text = $mwst[$i] == 19 ?  "checked" :  ""; echo $text?>>19% </label>
                </td>
                <td style="text-align: center"><?php echo number_format((float)$preis[$i],2,",") ; ?></td>
            </tr>
            <?php
        }


        ?>

        <tr>
            <td colspan="2" rowspan="3"><input type="submit"></td>
            <?php if (isset($vonBerechnung))echo "<td colspan='2'>Gesamtsumme</td><td> $gesamtsumme </td>" ?>
        </tr>
        <?php if (isset($vonBerechnung)) {?>
        <tr><td colspan="2">davon 7%</td><td><?php echo $siebenPro; ?> </td> </tr>
        <tr><td colspan="2">davon 19%</td><td><?php echo $neunzehnPro; ?> </td> </tr>
        <?php } ?>


        </tbody>

    </table>
</form>
</body>
</html>

