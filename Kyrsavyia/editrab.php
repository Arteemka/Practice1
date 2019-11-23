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

if(isset($_POST['send_rb']) ){
 
    $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
        // экранирования символов для mysql
        $fio = $_REQUEST['fio'];
        $type = $_REQUEST['type'];
        $stazh = $_REQUEST['stazh'];
        $sex = $_REQUEST['sex']; 
        $age = $_REQUEST['age'];
        $deti = $_REQUEST['deti'];
        $zar_pl = $_REQUEST['zar_pl'];
        $date_med = $_REQUEST['date_med'];
        $id_otd = $_REQUEST['id_otd'];
        $id_br = $_REQUEST['id_br'];
        $id = $_REQUEST['id_rab'];
   
    $query ="UPDATE rabotniki SET fio='$fio',
    type='$type',
    stazh='$stazh',
   sex='$sex',
    age='$age',
    deti='$deti',
    zar_pl='$zar_pl',
    date_med='$date_med',
    id_otd='$id_otd',
    id_br='$id_br' WHERE id_rab='$id'";
     $result = mysql_query($query) or die("Ошибка " . mysql_error($link)); 
    // вы if($result)
        //         echo "<span style='color:blue;'>Данные обновлены</span>";
        //         exit('<meta http-equiv="refresh" content="2; url=http://dsdas/Kyrsavyia/edit.php" />');
   
}
 
// если запрос GET
if(isset($_GET['id']))
{   
    $id = mysql_real_escape_string($_GET['id']);
     
    // создание строки запроса
    $query ="SELECT * FROM rabotniki WHERE id_rab = '$id'";
    // выполняем запрос
    $result = mysql_query($query) or die("Ошибка " . mysql_error($link)); 
    //если в запросе более нуля строк
    if($result && mysql_num_rows($result)>0) 
    {
        $row = mysql_fetch_row($result); // получаем первую строку
        $fio = $row[1];
        $type = $row[2];
        $stazh = $row[3];
       $sex = $row[4];
        $age = $row[5];
        $deti  = $row[6];
        $zarp_pl= $row[7];
        $date_med = $row[8];
      
        echo "
            <form method='POST' >
            <div class='modal-content-add-text'>
        <p class='add-text'>Редактировать</p>
    </div>
    <div class='modal-edit'>
    <input type='hidden' name='id_rab' value='$id' />
    <label class='label-db number'>ФИО</label>
    <input class='input-db-edit' name='fio' type='text' value='$fio'>
    <label class='label-db type'>Должность</label>
    <input class='input-db-edit' name='type' type='text' value='$type'>
    <label class='label-db dep'>Стаж</label>
    <input class='input-db-edit' name='stazh' type='text' value='$stazh'>
    <label class='label-db arr'>пол</label>
    <input class='input-db-edit' name='sex' type='text' value='$sex'>
    <label class='label-db start'>Возраст</label>
    <input class='input-db-edit' name='age' type='text' value='$age'>
    <label class='label-db end'>Дети</label>
    <input class='input-db-edit' name='deti' type='text' value='$deti'>
    <label class='label-db st'>Зарплата</label>
    <input class='input-db-edit' name='zar_pl' type='text' value='$zar_pl'>
    <label class='label-db count'>Дата медстраховки</label>
    <input class='input-db-edit ' name='date_med' type='text' value='$date_med'> 
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
                    <select name='id_br' class='otd'>
                        <option value='' selected='selected'>Выбор Бригады</option>
                        <option VALUE='1'>Ремонтный состав</option>      
                        <option VALUE='2'> Локомотивный состав</option>
                        <option VALUE='3'> Диспетчерский состав</option> 
                        <option VALUE='4'>Бугалтерский состав</option> 
                        <option VALUE='5'> Административный состав</option> 
                        <option VALUE='6'> Справочная служба состав</option> 
                        <option VALUE='7'> Прог. обеспечения состав</option>  
                    </select>   
               
<button type='submit'  name = 'send_rb' class='editbuttt'>Редакиторовать</button>
            </div>
            </form>
            ";
         
            mysql_free_result($result);
        }
    }
 
?>

<div>
        <table id="table">
            <thead class="tr">

                <tr class= 'num'>
                    <th>
                       ФИО
                    </th>
                    <th>
                        Тип 
                    </th>
                    <th>
                        Стаж
                    </th>
                    <th>
                        Пол
                    </th>
                    <th>
                        Возраст
                    </th>
                    <th>
                       Дети
                    </th>
                    <th>
                       Зарплата
                    </th>
                    <th>
                       Дата <br> медстраховки
                    </th>
                    <th>
                        Отдел
                    </th>
                    <th>
                    Бригада
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
            $query ="SELECT * FROM rabotniki";
             
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($con)); 
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                   
                    echo "<tr class='num'> ";
                        for ($j = 1 ; $j <2; ++$j) 
                        if($row[9] == 1){
                            echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            echo "<td>$row[3]</td>";
                            echo "<td>$row[4]</td>";
                            echo "<td>$row[5]</td>";
                            echo "<td>$row[6]</td>";
                            echo "<td>$row[7]</td>";
                            echo "<td>$row[8]</td>";
                                echo "<td>Ремонтный</td>";
                                echo "<td>Ремонтный состав</td>";
                            } elseif ($row[9] == 2){
                                echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            echo "<td>$row[3]</td>";
                            echo "<td>$row[4]</td>";
                            echo "<td>$row[5]</td>";
                            echo "<td>$row[6]</td>";
                            echo "<td>$row[7]</td>";
                            echo "<td>$row[8]</td>";
                                echo "<td>Локомотивный</td>";
                                echo "<td>Локомотивный состав</td>";
                            }elseif ($row[9] == 3){
                                echo "<td>$row[1]</td>";
                                echo "<td>$row[2]</td>";
                                echo "<td>$row[3]</td>";
                                echo "<td>$row[4]</td>";
                                echo "<td>$row[5]</td>";
                                echo "<td>$row[6]</td>";
                                echo "<td>$row[7]</td>";
                                echo "<td>$row[8]</td>";
                                echo "<td>Диспетчерский</td>";
                                echo "<td>Диспетчерский состав</td>";
                            }
                            elseif ($row[9] == 4){
                                echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            echo "<td>$row[3]</td>";
                            echo "<td>$row[4]</td>";
                            echo "<td>$row[5]</td>";
                            echo "<td>$row[6]</td>";
                            echo "<td>$row[7]</td>";
                            echo "<td>$row[8]</td>";
                                echo "<td>Экономики и финансов</td>";
                                echo "<td>Бугалтерский состав</td>";
                            }
                            elseif ($row[9] == 5){
                                echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            echo "<td>$row[3]</td>";
                            echo "<td>$row[4]</td>";
                            echo "<td>$row[5]</td>";
                            echo "<td>$row[6]</td>";
                            echo "<td>$row[7]</td>";
                            echo "<td>$row[8]</td>";
                                echo "<td>Административный</td>";
                                echo "<td>Административный состав</td>";
                            }
                            elseif ($row[9] == 6){
                                echo "<td>$row[1]</td>";
                                echo "<td>$row[2]</td>";
                                echo "<td>$row[3]</td>";
                                echo "<td>$row[4]</td>";
                                echo "<td>$row[5]</td>";
                                echo "<td>$row[6]</td>";
                                echo "<td>$row[7]</td>";
                                echo "<td>$row[8]</td>";
                                echo "<td>Справочная служба</td>";
                                echo "<td>Справочная служба состав</td>";
                            }
                            elseif ($row[9] == 7){
                                echo "<td>$row[1]</td>";
                                echo "<td>$row[2]</td>";
                                echo "<td>$row[3]</td>";
                                echo "<td>$row[4]</td>";
                                echo "<td>$row[5]</td>";
                                echo "<td>$row[6]</td>";
                                echo "<td>$row[7]</td>";
                                echo "<td>$row[8]</td>";
                                echo "<td>Программного обеспечения</td>";
                                echo "<td>Программного обеспечения состав</td>";
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
<script src="./js/editrab.js"></script>

</body>
</html>