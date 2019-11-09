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
        if( isset($_POST['send_o'])){
         
            $id_otd = $_REQUEST['id_otd'];
           // экранирования символов для mysql
        $fio_nach_otd = $_REQUEST['fio_nach_otd'];
        $name_otd = $_REQUEST['name_otd'];
       
   
    $query ="UPDATE otdeli SET 
    fio_nach_otd='$fio_nach_otd',
    name_otd='$name_otd'
   WHERE id_otd='$id_otd'";
     
             
        
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
            $query ="SELECT * FROM otdeli WHERE id_otd = '$id'";
            // выполняем запрос
            $result = mysql_query($query) or die("Ошибка " . mysql_error($link)); 
            //если в запросе более нуля строк
            if($result && mysql_num_rows($result)>0) 
            {
                $row = mysql_fetch_row($result); 
        $fio_nach_otd = $row[1];
        $name_otd = $row[2];
       

        echo "
            <form method='POST' >
            <div class='modal-content-add-text'>
        <p class='add-text'>Редактировать</p>
    </div>
    <div class='modal-edit'>
    <input type='hidden' name='id_otd' value='$id' />
    <label class='label-db number'>Фио Начальника</label>
    <input class='input-db-edit' name='fio_nach_otd' type='text' value='$fio_nach_otd'>
    <label class='label-db type'>Имя отдела</label>
    <input class='input-db-edit' name='name_otd' type='text' value='$name_otd'> 
               
<button type='submit'  name = 'send_o' class='editbut'>Редакиторовать</button>
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
                        Фио<br> Начальника
                    </th>
                    <th>
                        Название <br> Отделения
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
            $query ="SELECT * FROM otdeli";
             
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($con)); 
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                   
                    echo "<tr class='num'> ";
                        for ($j = 1 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
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
    
<script src="./js/editotd.js"></script>

</body>
</html>