<?php
//подключение базы данных
$link= mysqli_connect('localhost', 'root','','bd_inf');
if(mysqli_connect_errno()){
    echo'Error('.mysqli_connect_errno().')'.mysqli_connect_error();
    exit();
}
 
?>


