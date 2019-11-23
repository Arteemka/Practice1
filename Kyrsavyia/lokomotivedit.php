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
$database = 'railwal_station'; // имя базы данных
$user = 'root'; // имя пользователя
$password = '';
 
             
$link= mysql_connect($host, $user, $password)//параметры в скобках ("хост", "имя пользователя", "пароль")
or die("<p>Ошибка подключения к базе данных! " . mysql_error() . "</p>");

mysql_select_db($database)//параметр в скобках ("имя базы, с которой соединяемся")
 or die("<p>Ошибка выбора базы данных! ". mysql_error() . "</p>"); 

if(isset($_POST['send_l']) ){
  
        // экранирования символов для mysql
        $date_teh_osm = $_REQUEST['date_teh_osm'];
        $date_remont_last = $_REQUEST['date_remont_last'];
        $kol_remont = $_REQUEST['kol_remont'];
        $kol_reis = $_REQUEST['kol_reis']; 
        $age_lok = $_REQUEST['age_lokk'];  
        $id_lok = $_REQUEST['id_lok'];       
       
   
    $query ="UPDATE lokomotivi SET 
    date_teh_osm='$date_teh_osm',
    date_remont_last='$date_remont_last',
    kol_remont='$kol_remont',
    kol_reis='$kol_reis',
    age_lok='$age_lok' WHERE lokomotivi.id_lok='$id_lok'";
     $result = mysql_query($query) or die("Ошибка " . mysql_error($link)); 
//     // выполняем запрос
//    if($result)
//             echo "<span style='color:blue;'>Данные обновлены</span>";
//             exit('<meta http-equiv="refresh" content="2; url=http://dsdas/Kyrsavyia/lokomotivedit.php" />');
   
//     // закрываем подключение
   
   
}
 
// если запрос GET
if(isset($_GET['id']))
{   
    $id_lok = mysql_real_escape_string($_GET['id']);
     
    // создание строки запроса
    $query ="SELECT * FROM lokomotivi WHERE id_lok = '$id_lok'";
    // выполняем запрос
    $result = mysql_query($query) or die("Ошибка " . mysql_error($link)); 
    //если в запросе более нуля строк
    if($result && mysql_num_rows($result)>0) 
    {
        $row = mysql_fetch_row($result); // получаем первую строку
        $date_teh_osm = $row[1];
        $date_remont_last = $row[2];
        $kol_remont = $row[3];
       $kol_reis = $row[4];
        $age_lok = $row[5];
      
       
        echo "
            <form method='POST' >
            <div class='modal-content-add-text'>
        <p class='add-text'>Редактировать</p>
    </div>
    <div class='modal-edit'>
    <input type='hidden' name='id_lok' value='$id_lok' />
    <label class='label-db number'>Дата осмотра</label>
    <input class='input-db-edit' name='date_teh_osm' type='text' value='$date_teh_osm'>
    <label class='label-db type'>Последний ремонт</label>
    <input class='input-db-edit' name='date_remont_last' type='text' value='$date_remont_last'>
    <label class='label-db dep'>Кол ремонтов</label>
    <input class='input-db-edit' name='kol_remont' type='text' value='$kol_remont'>
    <label class='label-db arr'>Кол Рейсов</label>
    <input class='input-db-edit' name='kol_reis' type='text' value='$kol_reis'>
    <label class='label-db age_lok'>Возраст</label>
    <input class='input-db-edit' name='age_lokk' type='text' value='$age_lok'> 
               
<button type='submit'  name = 'send_l' class='editbutt'>Редакиторовать</button>
            </div>
            </form>
            ";
         
            mysql_free_result($result);
        }
    }
    // закрываем подключение
   
?>

<div>
        <table id="table">
            <thead class="tr">

                <tr class= 'num'>
                    <th>
                        Дата <br> Техосмотра
                    </th>
                    <th>
                        Дата <br>последнего емонта
                    </th>
                    <th>
                       Количество <br> Ремонтов
                    </th>
                    <th>
                        Количество <br> Рейсов
                    </th>
                    <th>
                        Возраст <br> Локомотива
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
            $query ="SELECT * FROM lokomotivi";
             
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($con)); 
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                   
                    echo "<tr class='num'> ";
                        for ($j = 1 ; $j < 6; ++$j) echo "<td>$row[$j]</td>";
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
    
<script src="./js/editlokomotiv.js"></script>

</body>
</html>