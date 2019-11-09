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

 
if(isset($_POST['send'])){
 
    $host = 'localhost'; // адрес сервера 
$database = 'railwal_station'; // имя базы данных
$user = 'root'; // имя пользователя
$password = '';
 
    
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link)); 
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
   

     
    // создание строки запроса
    $query ="INSERT INTO raspisanie (nomer_poezd,
    type_poezd,
    otprav,
   prib,
    marshrut_nach,
    marshrut_kon,
    stoim_bilet,
    kol_bilet,
    vremya_marsh)" .
    "VALUES('$num_train','$type_train ',
    '$dep' ,
    '$arrival ',
    '$start ',
    '$end ',
    '$cost',
    '$count ',
    '$time_route' );";
     
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
    $id = $_REQUEST['id_r'];
        
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
if(isset($_POST['send_o'])){
 
 $host = 'localhost'; // адрес сервера 
$database = 'railwal_station'; // имя базы данных
$user = 'root'; // имя пользователя
$password = '';

 
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link)); 
 // экранирования символов для mysql

 $fio_otd = $_REQUEST['fio_nach_otd'];
 $name_otd = $_REQUEST['name_otd'];
 
     
 // создание строки запроса
 $query ="INSERT INTO otdeli (fio_nach_otd,
 name_otd
)" .
 "VALUES('$fio_otd','$name_otd ' );";
  
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

 
if(isset($_POST['send_br'])){
 
    $host = 'localhost'; // адрес сервера 
$database = 'railwal_station'; // имя базы данных
$user = 'root'; // имя пользователя
$password = '';
 
    
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link)); 
    // экранирования символов для mysql
  
    $type_brigad= $_REQUEST['type_brigad'];
    $id_otd = $_REQUEST['id_otd'];
    $sred_zp = $_REQUEST['sred_zp'];
    
    // создание строки запроса
    $query ="INSERT INTO teh_brigad (
    type_brigad,
    id_otd,
    sred_zp)" .
    "VALUES(
    '$type_brigad',
    '$id_otd',
    '$sred_zp' );";
     
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

 
if(isset($_POST['send_r'])){
 
    $host = 'localhost'; // адрес сервера 
$database = 'railwal_station'; // имя базы данных
$user = 'root'; // имя пользователя
$password = '';
 
    
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
    
    // создание строки запроса
    $query ="INSERT INTO rabotniki (
    fio,
    type,
    stazh,
    sex,
    age,
    deti,
    zar_pl,
    date_med,
    id_otd,
    id_br)" .
    "VALUES(
    '$fio',
    '$type',
    '$stazh' ,
    '$sex ',
    '$age ',
    '$deti ',
    '$zar_pl',
    '$date_med',
    '$id_otd',
    '$id_br' );";
     
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

 
if(isset($_POST['send_loko'])  ){
 
    $host = 'localhost'; // адрес сервера 
$database = 'railwal_station'; // имя базы данных
$user = 'root'; // имя пользователя
$password = '';
 
    
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link)); 
    // экранирования символов для mysql
  
    $date_teh_osm = $_REQUEST['date_teh_osm'];
    $date_remont_last= $_REQUEST['date_remont_last'];
    $kol_remont = $_REQUEST['kol_remont'];; 
    $kol_reis = $_REQUEST['kol_reis'];
    $age_lok = $_REQUEST['age_lok'];
    $id_lok = $_REQUEST['id_lok'];
        
    // создание строки запроса
    $query ="INSERT INTO lokomotivi (date_teh_osm,
    date_remont_last,
    kol_remont,
    kol_reis,
    age_lok,
    id_lok)" .
    "VALUES('$date_teh_osm',
    '$date_remont_last',
    '$kol_remont' ,
    '$kol_reis',
    '$age_lok',
    '$id_lok');";
     
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
    <div class="modal_menu">
<div class="content" ></div>
    <div class="block">
        <button class="add" type="button">Добавить</button>
        <button class="edit" type="button">Редактировать</button>
        <button class="delete" type="button">Удалить</button>
        <button class="zap" type="button">Запрос</button>
        <button class="flights" type="button">Рейсы</button>
        <button class="lokomotiv" type="button">локомотив</button>
</div>
</div>
<div class="modal_edit">
    <button class="shedule" type="button">Расписание</button>
        <button class="ticket" type="button">Билеты</button>
        <button class="department" type="button">Отдел</button>
        <button class="worker" type="button">Работник</button>
        <button class="teh_team" type="button">Техническая бригада</button>
        <button class="loko" type="button">Локомотив</button>
</div>

<div class="modal_delete">
<button class="sheduled" type="button">Расписание</button>
        <button class="ticketd" type="button">Билеты</button>
        <button class="departmentd" type="button">Отдел</button>
        <button class="workerd" type="button">Работник</button>
        <button class="teh_teamd" type="button">Техническая бригада</button>
        <button class="loko" type="button">Локомотив</button>
</div>
</div>
<div class="modal-add">
<div class="content_raspisanie"></div>
    <div class="block_raspisanie">
        <form method = "POST">
                    <input class="input-db" name="nomer_poezd" type="text" placeholder="№ поезда">
                    <input class="input-db" name="type_poezd" type="text" placeholder="Тип поезда">
                    <input class="input-db" name="otprav" type="text" placeholder="отправление">
                    <input class="input-db" name="prib" type="text" placeholder="прибытие">
                    <input class="input-db" name="marshrut_nach" type="text" placeholder="Начальный пункт">
                    <input class="input-db" name="marshrut_kon" type="text" placeholder="Конечный пункт">
                    <input class="input-db" name="stoim_bilet" type="text" placeholder="Стоимость билета">
                    <input class="input-db" name="kol_bilet" type="text" placeholder="Количество билетов">   
                    <input class="input-db" name="vremya_marsh" type="text" placeholder="Время поездки">  
                               
                <button type="submit"  name = "send" class="div_add raspisanie">Добавить</button>
        </form>
</div>
<div class="content_bileti"></div>
    <div class="block_bileti">
        <form method="POST">
                    <input class="input-db" name="status_bil" type="text" placeholder="Статус билета">
                    <input class="input-db" name="type_bil" type="text" placeholder="Тип билета">
                    <input class="input-db" name="vrem_buy" type="text" placeholder="Время покупки">
                    <input class="input-db" name="fio_owner" type="text" placeholder="ФИО Владельца">
                    <input class="input-db" name="sex" type="text" placeholder="пол">
                    <input class="input-db" name="age_ow" type="text" placeholder="возраст">
                    <input class="input-db" name="nomer_bagazh" type="text" placeholder="Номер Багажа">
                    <input class="input-db" name="id_r" type="text" placeholder="ид расписания">                
                <button type="submit" name="send_b" class="div_add bileti">Добавить</button>
        </form>
</div>
<div class="content_otdel"></div>
    <div class="block_otdel">
        <form method="POST">
                    <input class="input-db" name="fio_nach_otd" type="text" placeholder="ФИО Начльника">
                    <input class="input-db" name="name_otd" type="text" placeholder="Имя отдела">                                   
                <button type="submit" name = "send_o" class="div_add otdelb">Добавить</button>
        </form>
</div>
<div class="content_rab"></div>
    <div class="block_rab">
        <form method="POST">
                    <input class="input-db" name="fio" type="text" placeholder="ФИО">
                    <input class="input-db" name="type" type="text" placeholder="Должность">      
                    <input class="input-db" name="stazh" type="text" placeholder="Стаж">
                    <input class="input-db" name="sex" type="text" placeholder="пол">  
                    <input class="input-db" name="age" type="text" placeholder="Возраст">
                    <input class="input-db" name="deti" type="text" placeholder="Дети "> 
                    <input class="input-db" name="zar_pl" type="text" placeholder="Зарплата">       
                    <input class="input-db" name="data_med" type="text" placeholder="Дата медстраховки">
                    <select name="id_otd" class='otd'>
                        <option value="" selected="selected">Выбор отдела</option>
                        <option VALUE="1">Ремонтный</option>      
                        <option VALUE="2"> Локомотивный</option>
                        <option VALUE="3"> Диспетчерский</option> 
                        <option VALUE="4"> Экономики и финансов</option> 
                        <option VALUE="5"> Административный</option> 
                        <option VALUE="6"> Справочная служба</option> 
                        <option VALUE="7"> Программного обеспечения</option>  
                    </select>  
                    <select name="id_br" class='otd'>
                        <option value="" selected="selected">Выбор Бригады</option>
                        <option VALUE="1">Ремонтный состав</option>      
                        <option VALUE="2"> Локомотивный состав</option>
                        <option VALUE="3"> Диспетчерский состав</option> 
                        <option VALUE="4">Бугалтерский состав</option> 
                        <option VALUE="5"> Административный состав</option> 
                        <option VALUE="6"> Справочная служба состав</option> 
                        <option VALUE="7"> Прог. обеспечения состав</option>  
                    </select>                            
                <button type="submit" name="send_r" class="div_add rab">Добавить</button>
        </form>
</div>

<div class="content_teh_brig"></div>
    <div class="block_teh_brig">
        <form method="POST">
                    <input class="input-db" name="type_brigad" type="text" placeholder="Тип Бригады">
                    <select name="id_otd" class='otd'>
                        <option value="" selected="selected">Выбор отдела</option>
                        <option VALUE="1">Ремонтный</option>      
                        <option VALUE="2"> Локомотивный</option>
                        <option VALUE="3"> Диспетчерский</option> 
                        <option VALUE="4"> Экономики и финансов</option> 
                        <option VALUE="5"> Административный</option> 
                        <option VALUE="6"> Справочная служба</option> 
                        <option VALUE="7"> Программного обеспечения</option>  
                    </select> 
                    <input class="input-db" name="sred_zp" type="text" placeholder="Средняя зарплата">   
                                              
                <button type="submit" name="send_br" class="div_add rab">Добавить</button>
        </form>
</div>
<div class="content_lokomotiv"></div>
    <div class="block_lokomotiv">
        <form method="POST">
                    <input class="input-db" name="date_teh_osm" type="text" placeholder="Дата осмотра">
                    <input class="input-db" name="date_remont_last" type="text" placeholder="Дата последнего ремонта">   
                    <input class="input-db" name="kol_remont" type="text" placeholder="Количество ремонтов">   
                    <input class="input-db" name="kol_reis" type="text" placeholder="Количество рейсов">   
                    <input class="input-db" name="age_lok" type="text" placeholder="Возраст локомотива">
                <button type="submit" name="send_loko" class="div_add rab">Добавить</button>
        </form>
</div>
</div>
</div>





<script src="./js/script.js"></script>
</body>

</html>