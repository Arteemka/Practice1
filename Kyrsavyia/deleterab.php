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
                        ид Отдела 
                    </th>
                    <th>
                        ид Бригады 
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
                        for ($j = 1 ; $j < 11 ; ++$j) echo "<td>$row[$j]</td>";
                    echo "</a></tr>";
                    
                }
                echo "</table>";
                 
                // очищаем результат
                mysqli_free_result($result);
            }
             
            mysqli_close($link);
            ?>
            <?php 
 $host = 'localhost'; // адрес сервера 
 $db = 'railwal_station'; // имя базы данных
 $user = 'root'; // имя пользователя
 $password = '';
 
 $link = mysql_connect($host, $user, $pass)//параметры в скобках ("хост", "имя пользователя", "пароль")
 or die("<p>Ошибка подключения к базе данных! " . mysql_error() . "</p>");
 
 mysql_select_db($db)//параметр в скобках ("имя базы, с которой соединяемся")
  or die("<p>Ошибка выбора базы данных! ". mysql_error() . "</p>");

 if(isset($_POST['button-no'])) {

}elseif(isset($_POST['id'])){
 
    $id = mysql_real_escape_string( $_POST['id']);
     
    $query ="DELETE FROM rabotniki WHERE id_rab = '$id'";
    $result = mysql_query( $query) or die("Ошибка " . mysql_error($link)); 
    $sql = "SET @i :=0";
    $s = "UPDATE rabotniki SET  id_rab = (@i := @i + 1)";
    $g = "ALTER TABLE rabotniki AUTO_INCREMENT = 1";

    $resul = mysql_query( $sql) or die("Ошибка " . mysql_error($link)); 
    $v = mysql_query( $s) or die("Ошибка " . mysql_error($link)); 
    $n = mysql_query( $g) or die("Ошибка " . mysql_error($link)); 
   // $m = mysql_query( $h) or die("Ошибка " . mysql_error($link)); 
    mysql_close($link);
    exit('<meta http-equiv="refresh" content="0; url=http://dsdas/Kyrsavyia/deleterab.php" />');
   
}
 
if(isset($_GET['id']))
{   
    $id = htmlentities($_GET['id']);
    echo "
   <div class='modal-delete'>
       <div class='modal-content-delete'>
           <div class='d1'>
               <span class='closes'>&times;</span>
           </div>
           <h2>Вы точно желаете удалить?</h2>
           <form method='POST'>
        <input type='hidden' name='id' value='$id' />
           <button type='submit'class='button-yes'>ДА</button>
           </form>
           <button  class='button-no'>Нет</button>
          
       </div>
   </div>";
    
    }
    ?>
 
        </table>
    </div>
    <button class="back" type="button">Назад</button>
<script src="./js/delrab.js"></script>

</body>
</html>