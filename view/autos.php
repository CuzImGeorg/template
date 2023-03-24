<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<table>
    <tr><th>Targa</th><th>Hersteller</th><th>Model</th><th>Löschen</th></tr>
    <?php foreach ($autos as $a) { ?>
        <tr>
            <th><?php echo $a->getTarga()?></th>
            <th><?php echo $a->getHersteller()?></th>
            <th><?php echo $a->getModel()?></th>
            <th><a href="index.php?aktion=delauto&pid=<?php echo $_GET['id'] ?>&id=<?php echo $a->getId()?>">Löschen</a></th>

        </tr>
    <?php } ?>
</table>
<form method="post" action="index.php?aktion=addAuto&id=<?php echo $_GET['id']?>" name="addAuto">
    <input type="number" id="aid" name="aid">
    <button type="submit" style="margin-top: 10px; ">Add</button>
</form>
</body>

</html>