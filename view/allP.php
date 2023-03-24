<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <table>
        <tr><th>Nachname</th><th>Vorname</th><th>Nickname</th><th>Autos</th></tr>
        <?php foreach ($personen as $p) { ?>
        <tr>
            <th><?php echo $p->getNachname()?></th>
            <th><?php echo $p->getVorname()?></th>
            <th><?php echo $p->getNick()?></th>
            <th><a href="index.php?aktion=autos&id=<?php echo $p->getId()?>">Autos</a></th>
            <th><a href="index.php?aktion=adr&id=<?php echo $p->getId()?>">Addressen</a></th>

        </tr>
        <?php } ?>
    </table>


</body>

</html>