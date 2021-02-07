<?php
    class Construct{

        //добавление номера пользователю
        function UpdateUsers($Name, $Mail){
            global $link;
            //формирование времени
            $time= date("Y")."-".date("m")."-".date("d")." ".date("h:i:s");
            //Запросы для поиска в базе данных
            $selectName="SELECT Mail FROM information WHERE Login='".$Name."'";
            $selectMail="SELECT idPeople,Login FROM information WHERE Mail='".$Mail."'";
            //Поиск по бд
            $result= $link->query($selectMail); 
            $result1= $link->query($selectName);
            $row=mysqli_fetch_all($result);
            $row1=mysqli_fetch_all($result1);
            
            //проверка на совпадение
            //Смена имени по почте
            if(!empty ($row)&&empty ($row1)){
                $selectMail="UPDATE information SET Login = '".$Name."' WHERE Mail = '".$Mail."' ";
                mysqli_query($link, $selectMail);
                $selectMailAdd="INSERT INTO `changes` (idPeople, timeData, Ip, fiel, Old, New) VALUES (".$row[0][0].",'".$time."', '".$_SERVER['REMOTE_ADDR']."','Name','".$row[0][1]."','".$Name."')";
                if (mysqli_query($link, $selectMailAdd)) {
                    echo "New record created successfully";
                } 
                else{
                    echo "Error: " . $selectMailAdd . "<br>" . mysqli_error($link);
                }
            }
            //Сменаа почты по имени
            elseif(empty ($row)&&!empty ($row1)){
                    $selectName="UPDATE information SET Mail = '".$Mail."' WHERE Login = '".$Name."' ";
                    mysqli_query($link, $selectName);
                    $selectNameAdd="INSERT INTO `changes` (idPeople, timeData, Ip, fiel, Old, New) VALUES (".$row1[0][0].",'".$time."', '".$_SERVER['REMOTE_ADDR']."','mail','".$row1[0][1]."','".$Mail."')";
                    if ( mysqli_query($link, $selectNameAdd)) {
                        echo "New record created successfully";
                    } 
                    else{
                        echo "Error: " . $selectName . "<br>" . mysqli_error($link);
                    }
            }
            else{
                    echo "Нет таких данных";
            }
            
        }
        
    }

    function get_ip(){
	$value = '';
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$value = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$value = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} elseif (!empty($_SERVER['REMOTE_ADDR'])) {
		$value = $_SERVER['REMOTE_ADDR'];
	}
  
	return $value;
}
?>

