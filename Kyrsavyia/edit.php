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
        if( isset($_POST['send_r'])){
         
            $id = $_REQUEST['id_r'];
           // экранирования символов для mysql
        $num_train = $_REQUEST['nomer_poezd'];
        $type_train = $_REQUEST['type_poezd'];
        $dep = $_REQUEST['otprav'];
        $arrival = $_REQUEST['prib']; 
        $start = $_REQUEST['marshrut_nach'];
        $end = $_REQUEST['marshrut_kon'];
        $cost = $_REQUEST['stoim_bilet'];
        $count = $_REQUEST['kol_bilet'];
        $time_route = $_REQUEST['vremya_marsh'];
   
    $query ="UPDATE raspisanie SET nomer_poezd='$num_train',
    type_poezd='$type_train ',
    otprav='$dep',
   prib='$arrival',
    marshrut_nach='$start',
    marshrut_kon='$end ',
    stoim_bilet='$cost',
    kol_bilet='$count ',
    vremya_marsh='$time_route' WHERE id_r='$id'";
     
             
        
     $result = mysql_query($query) or die("Ошибка " . mysql_error($link)); 
         
            if($result)
                echo "<span style='color:blue;'>Данные обновлены</span>";
                exit('<meta http-equiv="refresh" content="2; url=http://dsdas/Kyrsavyia/edit.php" />');
        }
         
        // если запрос GET
        if(isset($_GET['id']))
        {   
            $id = mysql_real_escape_string($_GET['id']);
             
            // создание строки запроса
            $query ="SELECT * FROM raspisanie WHERE id_r = '$id'";
            // выполняем запрос
            $result = mysql_query($query) or die("Ошибка " . mysql_error($link)); 
            //если в запросе более нуля строк
            if($result && mysql_num_rows($result)>0) 
            {
                $row = mysql_fetch_row($result); 
        $num_train = $row[1];
        $type_train = $row[2];
        $dep = $row[3];
       $arrival = $row[4];
        $start = $row[5];
        $end  = $row[6];
        $cost= $row[7];
        $count = $row[8];
        $time_route= $row[9];

        echo "
            <form method='POST' >
            <div class='modal-content-add-text'>
        <p class='add-text'>Редактировать</p>
    </div>
    <div class='modal-edit'>
    <input type='hidden' name='id_r' value='$id' />
    <label class='label-db number'>Номер поезда</label>
    <input class='input-db-edit' name='nomer_poezd' type='text' value='$num_train'>
    <label class='label-db type'>Тип поезда</label>
    <input class='input-db-edit' name='type_poezd' type='text' value='$type_train'>
    <label class='label-db dep'>Отправление</label>
    <input class='input-db-edit' name='otprav' type='text' value='$dep'>
    <label class='label-db arr'>Прибытие</label>
    <input class='input-db-edit' name='prib' type='text' value='$arrival'>
    <label class='label-db start'>Начальный пункт</label>
    <input class='input-db-edit' name='marshrut_nach' type='text' value='$start'>
    <label class='label-db end'>Конечный маршрут</label>
    <input class='input-db-edit' name='marshrut_kon' type='text' value='$end'>
    <label class='label-db st'>Стоимость билета</label>
    <input class='input-db-edit' name='stoim_bilet' type='text' value='$cost'>
    <label class='label-db count'>Количество билетов</label>
    <input class='input-db-edit ' name='kol_bilet' type='text' value='$count'> 
    <label class='label-db time'>Время в пути</label>  
    <input class='input-db-edit' name='vremya_marsh' type='text' value='$time_route'>  
               
<button type='submit'  name = 'send_r' class='editbutt'>Редакиторовать</button>
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
                        Номер <br> Поезда
                    </th>
                    <th>
                        Тип <br> поезда
                    </th>
                    <th>
                        Пукт <br> отправление
                    </th>
                    <th>
                        Пункт <br> прибытия
                    </th>
                    <th>
                        маршрут <br> начала
                    </th>
                    <th>
                        конечный <br> маршрут
                    </th>
                    <th>
                        стоимость <br> билета
                    </th>
                    <th>
                        количество <br> билетов
                    </th>
                    <th>
                        время <br> маршрута
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
            $query ="SELECT * FROM raspisanie";
             
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($con)); 
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                   
                    echo "<tr class='num'> ";
                        for ($j = 1 ; $j < 10 ; ++$j) echo "<td>$row[$j]</td>";
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
<script src="./js/editdel.js"></script>

</body>
</html>