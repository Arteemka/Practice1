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
<div  class="modal"> 
<form method='POST' >
            <div class='modal-content-add-text'>
                
        <p class='add-text'>Задержка рейса</p>
        <span class="close">&times;</span>
    </div>
    <div class='modal-zad'>
    <input type="hidden" name='id_r' class='id_r'  />
    <label class='label-db zader'>Причина задержки</label>
    <input class='input-db' name='prichina_zad' type='text'>
    <label class='label-db vrem-zad'>Время задержки</label>
    <input class='input-db' name='vremya_zad' type='text'>
    <label class='label-db kol-sdan'>Кол-во сданных билетов</label>
    <input class='input-db' name='kol_sdan_bilet' type='text'>
<button type='submit'  name = 'send_zad' class='editbutt'>Добавить</button>
            </div>
            </form>
</div>
<div  class="modal2"> 
<form method='POST' >
            <div class='modal-content-add-text'>
                
        <p class='add-text'>Отмена рейса</p>
        <span class="close">&times;</span>
    </div>
    <div class='modal-cancel'>
    <input type="hidden" name='id_rr' class='id_rr' />
    <label class='label-db cancel'>Причина отмены</label>
    <input class='input-db' name='cancel' type='text'>
<button type='submit'  name = 'send_cancel' class='cancelbutt'>Добавить</button>
            </div>
            </form>
</div>
<div  class="modal4"> 
<form method='POST' >
            <div class='modal-content-add-text'>
                
        <p class='add-text'>Билеты</p>
        <span class="close">&times;</span>
    </div>
    <div class='modal-cancel'>
    <input type="hidden" name='id_rrr' class='id_rrr' />
    <input class="input-db" name="status_bil" type="text" placeholder="Статус билета">
                    <input class="input-db" name="type_bil" type="text" placeholder="Тип билета">
                    <input class="input-db" name="vrem_buy" type="text" placeholder="Время покупки">
                    <input class="input-db" name="fio_owner" type="text" placeholder="ФИО Владельца">
                    <input class="input-db" name="sex" type="text" placeholder="пол">
                    <input class="input-db" name="age_ow" type="text" placeholder="возраст">
                    <input class="input-db" name="nomer_bagazh" type="text" placeholder="Номер Багажа">              
                    <button type='submit'  name = 'send_b' class='bbutt'>Добавить</button>
            </div>
            </form>
</div>

<div class="raspisanie_loko">
<table id="table">
<thead class="tr">

<tr class= 'nume'>
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

            
            <tbody class = "tb">
           
            
                
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
                   
                    echo "<tr class='nume'> ";
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
</div>
<?php

 
if(isset($_POST['con'])){
 
    $host = 'localhost'; // адрес сервера 
$database = 'railwal_station'; // имя базы данных
$user = 'root'; // имя пользователя
$password = '';
 
    
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link)); 
    // экранирования символов для mysql
    $id_r= $_REQUEST['id_rrrr'];
    $id_lok= $_REQUEST['id_lokk'];

    
    // создание строки запроса
    $query ="INSERT INTO raspisanie_lokomotivi (
    id_r,
    id_lok
  )" .
    "VALUES(
    '$id_r',
    '$id_lok' );";
     
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

<?php

 
if(isset($_POST['send_b'])  ){
 
    $host = 'localhost'; // адрес сервера 
$database = 'railwal_station'; // имя базы данных
$user = 'root'; // имя пользователя
$password = '';
 
    
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link)); 
    // экранирования символов для mysql
  
    $status_ticket = $_REQUEST['status_bil'];
    $type_ticket = $_REQUEST['type_bil'];
    $time_buy = $_REQUEST['vrem_buy'];
    $fio = $_REQUEST['fio_owner']; 
    $sex = $_REQUEST['sex'];
    $age = $_REQUEST['age_ow'];
    $num = $_REQUEST['nomer_bagazh'];
    $id = $_REQUEST['id_rrr'];
        
    // создание строки запроса
    $query ="INSERT INTO bileti (status_bil,
    type_bil,
    vrem_buy,
    fio_owner,
    sex,
    age_ow,
    nomer_bagazh,id_r)" .
    "VALUES('$status_ticket','$type_ticket ',
    '$time_buy' ,
    '$fio ',
    '$sex ',
    '$age ',
    '$num',
    '$id ' );";
     
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
 <?php

 
if(isset($_POST['send_zad'])){
 
    $host = 'localhost'; // адрес сервера 
$database = 'railwal_station'; // имя базы данных
$user = 'root'; // имя пользователя
$password = '';
 
    
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link)); 
    // экранирования символов для mysql
    $id_r= $_REQUEST['id_r'];
    $prichina_zad= $_REQUEST['prichina_zad'];
    $vremya_zad = $_REQUEST['vremya_zad'];
    $kol_sdan_bilet = $_REQUEST['kol_sdan_bilet'];
    
    // создание строки запроса
    $query ="INSERT INTO zaredzh_reis (
    prichina_zad,
    vremya_zad,
    kol_sdan_bilet,
    id_r)" .
    "VALUES(
    '$prichina_zad',
    '$vremya_zad',
    '$kol_sdan_bilet',
    '$id_r' );";
     
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
<?php

 
if(isset($_POST['send_cancel'])){
 
    $host = 'localhost'; // адрес сервера 
$database = 'railwal_station'; // имя базы данных
$user = 'root'; // имя пользователя
$password = '';
 
    
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link)); 
    // экранирования символов для mysql
    $id_r= $_REQUEST['id_rr'];
    $cancel= $_REQUEST['cancel'];
 
    
    // создание строки запроса
    $query ="INSERT INTO otmen_reis (
    prichina_otmen,id_r)" .
    "VALUES(
    '$cancel',
    '$id_r' );";
     
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
            
            <tbody class="t">
           
            
                
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
                 
                // очищаем результат
                mysqli_free_result($result);
            }
             
            mysqli_close($link);
            ?>
              
               
             </tbody>
        </table>
        <ul class="right-click-menu">
            <li id="l1">Задержка рейса</li>
            <li id="l2">Отмена рейса</li>
            <li id="l3">Билеты</li>
            <li id="l4">Расписание локомотива</li>
        </ul>
       
        </div>
    </div>
  

    <button class="back" type="button">Назад</button>
    <div  class="modal6"> 
<form method='POST' >
    <input type="hidden" name='id_rrrr' class='id_rrrr' />
    <input type="hidden" name='id_lokk' class='id_lokk' />
    <button class="connect" name= "con"  type="submit">Соединить</button>

            </form>
</div>
<script src="./js/flights.js"></script>

</body>
</html>