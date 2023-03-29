<?php 
    require APPROOT  .'/views/includes/head.php';
 ?>

<table border=1>
    <thead>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Aantalpunten</th>
        <th>Datum</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>

<a href="<?= URLROOT;?>/homepages/index">home</a>


<?php require APPROOT  .'/views/includes/footer.php'; ?>
