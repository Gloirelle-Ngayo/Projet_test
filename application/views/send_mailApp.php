<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style1.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/aos-master/dist/aos.css'?>">
    <title>Send_Email</title>
</head>
<body>

<form action="<?php echo base_url().'index.php/Send/validation'?>" 
data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000" method="post">

<?php
        if (strlen($send)>1) {
            echo "<p class ='alert alert-success fs-5 text-center' role='alert'> $send ! </p>";
        }
    ?>
    <div id="gloire1" class=" container row">
        <div id="gloire2">  
            <label for="emailExp">Adresse mail:</label>
            <input type="email" id="emailExp" name="emailexp" required>
        </div>
        <div id="objet">
            <label for="textObjet"> Objet :</label>
            <input type="text" id="textObjet" name="textobjet" required>
        </div>
    
        <div id="contenuID">
            <label for="Contenu">Contenu :</label>
            <textarea name="contenu" id="Contenu" cols="30" rows="10" required></textarea>
        </div>
        <div class="divbtn">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
</form>
    <div id="listUser">
            <p><a href="<?php echo base_url('index.php/Send/login_user') ?>">Cliquez pour voir la liste des utlisateurs</a></p>
    </div>
<script src="<?php echo base_url().'assets/js/bootstrap.bundle.min.js'?>"></script>
<script src="<?php echo base_url().'assets/aos-master/dist/aos.js' ?>"></script>
<script src="<?php echo base_url().'assets/js/script.js'?>"></script>
<script>
    AOS.init();
</script>
</body>
</html>