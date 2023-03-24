<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle Artikel</title>
</head>
<body>
<table>
    <tr><th>Bezeichnung</th><th>Beschreibung</th><th>Preis</th><th>Einstelldatum</th><th>Zustand</th><th>email</th><th>TEL</th></tr>
    <?php foreach ($artikel as $a) { ?>
        <tr>
            <th><?php echo $a->getBezeichnung()?></th>
            <th><?php echo $a->getBeschreibung()?></th>
            <th><?php echo $a->getPreis()?></th>
            <th><?php echo $a->getEinstelldatum()?></th>
            <th><?php echo $a->getZustand()["zustand"]?></th>
            <th><?php echo $a->getPerson()->getEmail()?></th>
            <th><?php echo $a->getPerson()->getTelefonnr()?></th>


        </tr>
    <?php } ?>
</table>
<a href="index.php?aktion=alleArtikel&od=0"> Order By Neu</a><br>
<a href="index.php?aktion=alleArtikel&od=1"> Order By Gebraucht</a>



</body>

</html>