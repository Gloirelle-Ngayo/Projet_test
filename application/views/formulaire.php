<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
    <form action="<?php echo base_url().'index.php/Formulaire/validation' ?>" enctype="multipart/form-data" method="post">
        <div>
            <label for="nom">nom</label>
            <input type="text" id='nom' name="nom" value=" <?php echo set_value('nom'); ?>">
            <?php echo form_error('nom'); ?>
        </div>
        <div>
            <label for="prenom">prenom</label>
            <input type="text" id='prenom' name="prenom" value=" <?php echo set_value('prenom'); ?>">
            <?php echo form_error('prenom'); ?>
        </div>
        <div>
            <label for="age">age</label>
            <input type="text" id='age' name="age" value=" <?php echo set_value('age'); ?>">
            <?php echo form_error('age'); ?>
        </div>
        <div>
            <label for="image">image</label>
            <input type="file" id='image' name="image" value=" <?php echo set_value('image'); ?>">
            <?php echo form_error('image'); ?>
        </div>
        <div>
            <input type="submit" id='nom' value='envoyer'>
        </div>
    </form>
</body>
</html>