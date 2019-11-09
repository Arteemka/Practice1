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
        if( isset($_POST['send_br'])){
         
            $id_brig = $_REQUEST['id_brig'];
           // экранирования символов для mysql
        $type_brigad = $_REQUEST['type_brigad'];
        $id_otd = $_REQUEST['id_otd'];
        $sred_zp = $_REQUEST['sred_zp'];
       
   
    $query ="UPDATE teh_brigad SET 
    type_brigad='$type_brigad',
    id_otd='$id_otd',
    sred_zp='$sred_zp'
   WHERE id_brig='$id_brig'";
     
             
        
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
            $query ="SELECT * FROM teh_brigad WHERE id_brig = '$id'";
            // выполняем запрос
            $result = mysql_query($query) or die("Ошибка " . mysql_error($link)); 
            //если в запросе более нуля строк
            if($result && mysql_num_rows($result)>0) 
            {
                $row = mysql_fetch_row($result); 
        $type_brigad = $row[1];
        $id_otd = $row[2];
        $sred_zp = $row[3];
       

        echo "
            <form method='POST' >
            <div class='modal-content-add-text'>
        <p class='add-text'>Редактировать</p>
    </div>
    <div class='modal-edit'>
    <input type='hidden' name='id_brig' value='$id' />
    <label class='label-db number'>Тип Бригады</label>
    <input class='input-db-edit' name='type_brigad' type='text' value='$type_brigad'>
    <label class='label-db otdeledit'>Выбор отдела</label>
    <select name='id_otd' class='otd'>
                        <option value='' selected='selected'>Выбор отдела</option>
                        <option VALUE='1'>Ремонтный</option>      
                        <option VALUE='2'> Локомотивный</option>
                        <option VALUE='3'> Диспетчерский</option> 
                        <option VALUE='4'> Экономики и финансов</option> 
                        <option VALUE='5'> Административный</option> 
                        <option VALUE='6'> Справочная служба</option> 
                        <option VALUE='7'> Программного обеспечения</option>  
                    </select> 
    <label class='label-db sred_zap'>Средняя зарплата</label>
    <input class='input-db-edit' name='sred_zp' type='text' value='$sred_zp'> 
               
<button type='submit'  name = 'send_br' class='editbutt'>Редакиторовать</button>
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
                        Тип<br> Бригады
                    </th>
                    <th>
                        Отдел
                    </th>
                    <th>
                        Средняя <br> Зарплата
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
            $query ="SELECT * FROM teh_brigad";
             
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($con)); 
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                   
                    echo "<tr class='num'> ";
                        for ($j = 1 ; $j < 4 ; $j++)
                        
                    if($row[$j] == 1){
                        echo "<td>$row[1]</td>";
                            echo "<td>Ремонтный</td>";
                            echo "<td>$row[3]</td>";
                        } elseif ($row[$j] == 2){
                            echo "<td>$row[1]</td>";
                            echo "<td>Локомотивный</td>";
                            echo "<td>$row[3]</td>";
                        }elseif ($row[$j] == 3){
                            echo "<td>$row[1]</td>";
                            echo "<td>Диспетчерский</td>";
                            echo "<td>$row[3]</td>";
                        }
                        elseif ($row[$j] == 4){
                            echo "<td>$row[1]</td>";
                            echo "<td>Экономики и финансов</td>";
                            echo "<td>$row[3]</td>";
                        }
                        elseif ($row[$j] == 5){
                            echo "<td>$row[1]</td>";
                            echo "<td>Административный</td>";
                            echo "<td>$row[3]</td>";
                        }
                        elseif ($row[$j] == 6){
                            echo "<td>$row[1]</td>";
                            echo "<td>Справочная служба</td>";
                            echo "<td>$row[3]</td>";
                        }
                        elseif ($row[$j] == 7){
                            echo "<td>$row[1]</td>";
                            echo "<td>Программного обеспечения</td>";
                            echo "<td>$row[3]</td>";
                        }

                           
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
<script src="./js/editbrigada.js"></script>

</body>
</html>