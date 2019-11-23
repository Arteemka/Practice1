<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Document</title>
</head>
<body>
<?php
$host = 'localhost'; // адрес сервера 
$db = 'railwal_station'; // имя базы данных
$user = 'root'; // имя пользователя
$password = '';
 
             
$link= mysql_connect($host, $user, $pass)//параметры в скобках ("хост", "имя пользователя", "пароль")
or die("<p>Ошибка подключения к базе данных! " . mysql_error() . "</p>");

mysql_select_db($db)//параметр в скобках ("имя базы, с которой соединяемся")
 or die("<p>Ошибка выбора базы данных! ". mysql_error() . "</p>");

     
        // если запрос POST 
        if( isset($_POST['send_b'])){
         
            $id_r = $_REQUEST['id_r'];
           // экранирования символов для mysql
        $prichina_zad = $_REQUEST['prichina_zad'];
        $vremya_zad = $_REQUEST['vremya_zad'];
        $kol_sdan_bilet = $_REQUEST['kol_sdan_bilet'];
        
   
    $query ="UPDATE zaredzh_reis SET 
    prichina_zad='$prichina_zad',
    vremya_zad='$vremya_zad',
    kol_sdan_bilet='$kol_sdan_bilet'
   WHERE id_r='$id_r'";
     
             
        
     $result = mysql_query($query) or die("Ошибка " . mysql_error($link)); 
         
        //     if($result)
        //         echo "<span style='color:blue;'>Данные обновлены</span>";
        //         exit('<meta http-equiv="refresh" content="2; url=http://dsdas/Kyrsavyia/edit.php" />');
        }
         
        // если запрос GET
        if(isset($_GET['id']))
        {   
            $id = mysql_real_escape_string($_GET['id']);
             
            // создание строки запроса
            $query ="SELECT * FROM zaredzh_reis WHERE id_r = '$id'";
            // выполняем запрос
            $result = mysql_query($query) or die("Ошибка " . mysql_error($link)); 
            //если в запросе более нуля строк
            if($result && mysql_num_rows($result)>0) 
            {
                $row = mysql_fetch_row($result); 
        $prichina_zad = $row[0];
        $vremya_zad = $row[1];
        $kol_sdan_bilet = $row[2];   
       

        echo "
        <form method='POST' >
        <div class='modal-content-add-text'>
    <p class='add-text'>Редактировать</p>
</div>
<div class='modal-edit'>
<label class='label-db number'>Причина Задержки</label>
<input class='input-db-edit' name='prichina_zad' type='text' value='$prichina_zad'>
<label class='label-db type'>Время Задержки</label>
<input class='input-db-edit' name='vremya_zad' type='text' value='$vremya_zad'>
<label class='label-db kol'>Кол-во сданных</label>
<input class='input-db-edit' name='kol_sdan_bilet' type='text' value='$kol_sdan_bilet'>
<input type=hidden name='id_r' type='text' value='$id'>                 
<button type='submit'  name = 'send_b' class='editbutb'>Редакиторовать</button>
        </div>
        </form>
        ";
                mysql_free_result($result);
            }
        }
        // закрываем подключение
        mysql_close($link);
   
?>


<div>
        <table id="table">
            <thead class="tr">

                <tr class= 'num'>
                <th>
                       Причина  <br> Задержки
                    </th>
                    <th>
                       Время  <br> Задержки
                    </th>
                    <th>
                       Количество сданных  <br> Билетов
                    </th>
                    <th>
                        Номер<br> Рейса
                    </th>
                    
                   
                   
                </tr>

            </thead>
            <?php
 
 $host = 'localhost'; // адрес сервера 
 $database = 'railwal_station'; // имя базы данных
 $user = 'root'; // имя пользователя
 $password = '';
            
 $link = mysqli_connect($host, $user, $password, $database) 
 or die("Ошибка " . mysqli_error($link)); 
  // экранирования символов для mysql
           //  mysql_select_db($db)//параметр в скобках ("имя базы, с которой соединяемся")
           //   or die("<p>Ошибка выбора базы данных! ". mysql_error() . "</p>");
            $query ="SELECT * FROM zaredzh_reis";
             
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($con)); 
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                   
                    echo "<tr class='num'> ";
                        for ($j = 0 ; $j <4  ; ++$j) echo "<td>$row[$j]</td>";
                    echo "</a></tr>";
                    
                }
                echo "</table>";
                 
                // очищаем результат
                mysqli_free_result($result);
            }
             
            mysqli_close($link);
            ?>
        </table>
    </div>
    <button class="back" type="button">Назад</button>
    
<script src="./js/zaderzh.js"></script>

</body>
</html>