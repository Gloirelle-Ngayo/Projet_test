<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style1.css'?>">
    <title>Send_Email</title>
</head>
<body>
<form action="<?php echo base_url().'index.php/Send/validation'?>" enctype="multipart/form-data" method="post">
    <div id="gloire1" class=" container row">
        <div id="gloire2">  
            <label for="emailExp">Adresse de l'expéditeur :</label>
            <input type="email" id="emailExp" name="emailExp" value=" <?php echo set_value('emailExp'); ?>" required>
            <?php echo form_error('emailExp'); ?>
        </div>
        <div class="p-4">
            <label for="emailDest">Adresse du destinataire :</label>
            <input type="email" id="emailDest" name="emailDest" value=" <?php echo set_value('emailDest'); ?>" required>
            <?php echo form_error('emailDest'); ?>
        </div>
    
        <div id="objet">
            <label for="textObjet">Objet :</label>
            <input type="text" id="textObjet" name="textObjet" value=" <?php echo set_value('textObjet'); ?>" required>
            <?php echo form_error('textObjet'); ?>
        </div>
    
        <div id="contenuID">
            <label for="Contenu">Contenu :</label>
            <textarea name="Contenu" id="Contenu" cols="30" rows="10" value=" <?php echo set_value('Contenu'); ?>" required></textarea>
            <?php echo form_error('Contenu'); ?>
        </div>
        <div class="divbtn">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
</form>

<script src="<?php echo base_url().'assets/js/bootstrap.bundle.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/script.js'?>"></script>
</body>
</html>