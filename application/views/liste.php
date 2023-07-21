
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            border: 1px solid black;
        }
        table,tr,th,td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Nom</td>
                <td>Prenom</td>
                <td>image</td>
                <td>Age</td>
                <td colspan="3">Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($affiche as $row): ?>
            <tr>
                <td><?= $row->id ?></td>
                <td> <?= $row->nom ?> </td>
                <td> <?= $row->prenom ?> </td>
                <td><img style="height:50px; width:50px;" src="<?= base_url().'images/'. $row->image?>" alt="une image"></td>
                <td> <?= $row->age ?> </td>
                <td> <a href="<?= base_url().'index.php/Formulaire/delete/'.$row->id ?>">delete</a></td>
                <td> <a href="<?= base_url().'index.php/Formulaire/modif/'.$row->id ?>">update</a></td>
                <td> <a href="<?= base_url().'index.php/Formulaire/view/'.$row->id ?>">view</a></td>
            </tr>
            <?php endforeach; ?>

           <?php  
              /*  foreach ($affiche as $row) { 
                    echo '<tr>';
                    echo '<td>'.$row->id.'</td>';
                    echo '<td>'.$row->nom.'</td>';
                    echo '<td>'.$row->prenom.'</td>';
                    echo '<td>'.$row->age.'</td>';
                // echo "<td><a href=\"base_url().index.php/Formulaire/delete='' \"></a>.$row->age.</td>";
                    echo '</tr>';
                }*/
            ?>
        </tbody>
    </table>
</body>
</html>