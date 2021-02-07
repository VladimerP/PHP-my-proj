<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  </head>
   <?php
    require_once 'connection.php';
    require_once 'generator.php';
    require_once 'Reconstruction.php';
    
 ?>
<body>
    <h3>Генератор пользователей</h3>
    <form method="post">
        <input type="submit" name="nazvanie_knopki" value="Генератор пользоватлей" />
    </form>
    <h3>Работа с базой </h3>
    <form method="post">
        <p>Mail <input type="input" name="email" value="" /></p>
        <p>Name <input type="input" name="name" value="" /></p>
        <p><textarea id="confirmationText" class="text" cols="40" rows ="10"></textarea></p>
        <input type="submit" name="Save" value="Save" />
    </form>
    <?php

    $Construct=new Construct();
    $Genric=new Gener();
    
    //Генератор записей
    if( isset( $_POST['nazvanie_knopki'] ) )
    {
        $Genric->creatPeople();
        $Genric->output();
    }
    //Изменить запись
    elseif( isset( $_POST['Save'] ) ){
        $Construct->UpdateUsers($_POST['name'], $_POST['email']); 
        $Genric->output();
    }

    

    ?>

</body>

</html>

