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

if(isset($_POST['send_b']) ){
  
        // экранирования символов для mysql
        $status_bil = $_REQUEST['status_bil'];
        $type_bil = $_REQUEST['type_bil'];
        $vrem_buy = $_REQUEST['vrem_buy'];
        $fio_owner = $_REQUEST['fio_owner']; 
        $sex = $_REQUEST['sex'];
        $age_ow = $_REQUEST['age_ow'];
        $nomer_bagazh = $_REQUEST['nomer_bagazh'];
        $id_r = $_REQUEST['id_r'];
        $id_bil = $_REQUEST['id_bil'];
        
       
   
    $query ="UPDATE bileti SET 
    status_bil='$status_bil',
    type_bil='$type_bil',
    vrem_buy='$vrem_buy',
    fio_owner='$fio_owner',
    sex='$sex',
    age_ow='$age_ow',
    nomer_bagazh='$nomer_bagazh',
    id_r ='$id_r' WHERE id_bil='$id_bil'";
     
    // выполняем запрос
   // if($result)
    //         echo "<span style='color:blue;'>Данные обновлены</span>";
    //         exit('<meta http-equiv="refresh" content="2; url=http://dsdas/Kyrsavyia/edit.php" />');
   
    // закрываем подключение
   
   
}
 
// если запрос GET
if(isset($_GET['id']))
{   
    $id = mysql_real_escape_string($_GET['id']);
     
    // создание строки запроса
    $query ="SELECT * FROM bileti WHERE id_bil = '$id'";
    // выполняем запрос
    $result = mysql_query($query) or die("Ошибка " . mysql_error($link)); 
    //если в запросе более нуля строк
    if($result && mysql_num_rows($result)>0) 
    {
        $row = mysql_fetch_row($result); // получаем первую строку
        $status_bil = $row[1];
        $type_bil = $row[2];
        $vrem_buy = $row[3];
       $fio_owner = $row[4];
        $sex = $row[5];
        $age_ow  = $row[6];
        $nomer_bagazh= $row[7];
        $id_r=$row[8];
       
        echo "
            <form method='POST' >
            <div class='modal-content-add-text'>
        <p class='add-text'>Редактировать</p>
    </div>
    <div class='modal-edit'>
    <input type='hidden' name='id_bil' value='$id' />
    <label class='label-db number'>Тип билета</label>
    <input class='input-db-edit' name='status_bil' type='text' value='$status_bil'>
    <label class='label-db type'>Тип билета</label>
    <input class='input-db-edit' name='type_bil' type='text' value='$type_bil'>
    <label class='label-db dep'>Время покупки</label>
    <input class='input-db-edit' name='vrem_buy' type='text' value='$vrem_buy'>
    <label class='label-db arr'>ФИО Владельца</label>
    <input class='input-db-edit' name='fio_owner' type='text' value='$fio_owner'>
    <label class='label-db start'>пол</label>
    <input class='input-db-edit' name='sex' type='text' value='$sex'>
    <label class='label-db end'>Возраст</label>
    <input class='input-db-edit' name='age_ow' type='text' value='$age_ow'>
    <label class='label-db numbag'>Номер багажа</label>
    <input class='input-db-edit' name='nomer_bagazh' type='text' value='$nomer_bagazh'>
    <input type='hidden' class='input-db-edit ' name='id_r' type='text' value='$id_r'> 
    
               
<button type='submit'  name = 'send_b' class='editbutt'>Редакиторовать</button>
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
                        Статус <br> Билета
                    </th>
                    <th>
                        Тип <br> Билета
                    </th>
                    <th>
                        Время <br> Покупки
                    </th>
                    <th>
                        Фио <br> Владельца
                    </th>
                    <th>
                       Пол
                    </th>
                    <th>
                        Возраст
                    </th>
                    <th>
                        Номер <br> Багажа
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
            $query ="SELECT * FROM bileti";
             
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($con)); 
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                   
                    echo "<tr class='num'> ";
                        for ($j = 1 ; $j < 8; ++$j) echo "<td>$row[$j]</td>";
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
    
<script src="./js/editbil.js"></script>

</body>
</html>