<?php
     class Gener{
         //генератор пользователей
         function creatPeople(){
            global $link;
            //формирование имени пользователся и почты
            $characters = 'abcdefghijklmnopqrstuv';
            $randstring = '';
            $randomMail='';
            for ($i = 0; $i < 6; $i++) {
                $randstring = $randstring.$characters[rand(0, strlen($characters)-1)];
                $randomMail = $randomMail.$characters[rand(0, strlen($characters)-1)];
            }   
            $select="INSERT INTO information(Login, Mail) VALUES ('".$randstring."','".$randomMail."@gmail.com')";
            
            //выполнение запроса и его проверка
            if (mysqli_query($link, $select)) {
                echo "New record created successfully";
            } 
            else{
                echo "Error: " . $select . "<br>" . mysqli_error($link);
            }
            
         }
         //вывод всей иформации
         function output(){
            global $link;
            $select = "SELECT * FROM information";
            $select1 = "SELECT * FROM `changes`";
            $result=mysqli_query($link, $select);
            echo "<h2>Info update</h2>";
            while($row = $result->fetch_assoc()) {
                echo "Name: " . $row["Login"]. " - Mail: " . $row["Mail"]. "<br>";
            }
            $result=mysqli_query($link, $select1);
            echo "<h2>Update</h2>";
            while($row = $result->fetch_assoc()) {
                echo "timeData: " . $row["timeData"]. " - Ip: " . $row["Ip"]. " - Field " . $row["fiel"]." - Old " . $row["Old"]. " - New " . $row["New"]."<br>";
            }
         } 
     } 
    
 
?>


