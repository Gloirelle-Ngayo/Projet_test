<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>information de: <?= $aff['prenom'] ?> </title>
</head>
<body>
   <div>
        <img style='heigth:50px; width:50px' src="<?= base_url().'images/'.$aff['image'] ?>" alt="">
   </div>
    <div>
        <p>nom: <?= $aff['nom'] ?></p>
        <p>prenom: <?= $aff['prenom'] ?></p>
        <p>age: <?= $aff['age']." ".'ans'?></p>
    </div>
</body>
</html>