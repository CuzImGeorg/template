<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adressen</title>
</head>
<body>
<table>
    <tr><th>Targa</th><th>Hersteller</th><th>Model</th><th>Löschen</th></tr>
    <?php foreach ($adress as $a) { ?>
        <tr>
            <th><?php echo $a->getStraße()?></th>
            <th><?php echo $a->getHausNr()?></th>
            <th><?php echo $a->getPlz()?></th>
            <th><?php echo $a->getOrt()?></th>

            <th><a href="index.php?aktion=delauto&pid=<?php echo $_GET['id'] ?>&id=<?php echo $a->getId()?>">Löschen</a></th>

        </tr>
    <?php } ?>
</table>
<form method="post" action="index.php?aktion=addadr&id=<?php echo $_GET['id']?>" name="addAdr">
    <input type="text" id="str" name="str" placeholder="Straße" style="margin-bottom: 10px"><br>
    <input type="text" id="hnr" name="hnr" placeholder="Hausnummer" style="margin-bottom: 10px"><br>
    <input type="text" id="plz" name="plz" placeholder="Plz" style="margin-bottom: 10px"><br>
    <input type="text" id="ort" name="ort" placeholder="Ort" style="margin-bottom: 10px"><br>


    <button type="submit" style="margin-top: 10px; ">Add</button>
</form>
</body>

</html>