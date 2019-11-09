<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./css/sty.css">
    <title>Document</title>
</head>
<body>

<div  class="modal3"> 
<form method='POST' >
            <div class='modal-content-add-text'>
                
        <p class='add-text'>Техническая бригада</p>
        <span class="close">&times;</span>
    </div>
    <div class='modal-cancel'>
    <input type="hidden" name='id_lok' class='id_lok' />
    <label class='label-db cancel'>Вбор бригады</label>
    <select name="id_brig" class='otd'>
                        <option value="" selected="selected">Выбор Бригады</option>
                        <option VALUE="1">Ремонтный состав</option>      
                        <option VALUE="2"> Локомотивный состав</option>
                        <option VALUE="3"> Диспетчерский состав</option> 
                        <option VALUE="4">Бугалтерский состав</option> 
                        <option VALUE="5"> Административный состав</option> 
                        <option VALUE="6"> Справочная служба состав</option> 
                        <option VALUE="7"> Прог. обеспечения состав</option>  
                    </select>                
<button type='submit'  name = 'send_tehlok' class='cancelbutt'>Добавить</button>
            </div>
            </form>
</div>
 <?php

 
if(isset($_POST['send_tehlok'])){
 
    $host = 'localhost'; // адрес сервера 
$database = 'railwal_station'; // имя базы данных
$user = 'root'; // имя пользователя
$password = '';
 
    
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link)); 
    // экранирования символов для mysql
    $id_lok= $_REQUEST['id_lok'];
    $id_brig= $_REQUEST['id_brig'];

    
    // создание строки запроса
    $query ="INSERT INTO lokomotivi_teh_brigad (
    id_lok,
    id_brig
  )" .
    "VALUES(
    '$id_lok',
    '$id_brig' );";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:blue;'>Данные добавлены</span>";
        exit('<meta http-equiv="refresh" content="2; url=http://dsdas/Kyrsavyia/index.php" />');
    }
    // закрываем подключение
    mysqli_close($link);
}
?> 


<div >
<div class="right-click-area">
        <table id="table">
            <thead class="tr">

                <tr class= 'num'>
                    <th>
                        Дата технического  <br> осмотра
                    </th>
                    <th>
                        Дата последнего <br> осмотра
                    </th>
                    <th>
                        Количество <br> рементов
                    </th>
                    <th>
                        Количество <br> рейсов
                    </th>
                    <th>
                        Возраст <br> локамотива
                    </th>
                   
                </tr>

            </thead>
            
            <tbody>
           
            
                
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
                        for ($j = 1 ; $j < 6 ; ++$j) echo "<td>$row[$j]</td>";
                    echo "</a></tr>";
                    
                }                
                 
                // очищаем результат
                mysqli_free_result($result);
            }
             
            mysqli_close($link);
            ?>
              
               
             </tbody>
        </table>
        <ul class="right-click-menu">
            <li id="l1">Техническая бригада</li>
        </ul>
       
        </div>
    </div>
  
    
    
    <button class="back" type="button">Назад</button>
<script src="./js/lokomotiv.js"></script>

</body>
</html>