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

<div id="rectangle"></div>
<form method = "POST" >
        <ul>
            <li><input class="pointd" name="pdep" type="text" placeholder="Откуда"></li>
            <li><input class="pointa" name="parr" type="text" placeholder="Куда"></li>
            <li><input class="timed" name="tdep" type="text" placeholder="Время покупки нач"></li>
            <li><input class="timea" name="tarr" type="text" placeholder="Время покупки кон"></li>
            <li><button type="submit" name="find" class="button_f"  >Найти</button></li>
        </ul>
</form>
<?php   
            $host = 'localhost'; // адрес сервера 
            $database = 'railwal_station'; // имя базы данных
            $user = 'root'; // имя пользователя
            $password = '';
            
            $con = mysqli_connect($host, $user, $password, $database)//параметры в скобках ("хост", "имя пользователя", "пароль")
            or die("<p>Ошибка подключения к базе данных! " . mysql_error() . "</p>");
            if ( isset($_POST['find'])){
      
            $tdep = $_REQUEST['tdep'];
            $tarr = $_REQUEST['tarr'];
            $pdep= $_REQUEST['pdep'];
            $parr = $_REQUEST['parr'];
           //  mysql_select_db($db)//параметр в скобках ("имя базы, с которой соединяемся")
           //   or die("<p>Ошибка выбора базы данных! ". mysql_error() . "</p>");
            $query ="SELECT raspisanie.id_r, bileti.status_bil, bileti.fio_owner, bileti.vrem_buy, raspisanie.marshrut_nach, raspisanie.marshrut_kon,raspisanie.stoim_bilet, raspisanie.kol_bilet,CASE  WHEN raspisanie.stoim_bilet < 500 THEN 'Дешевый'
            WHEN raspisanie.stoim_bilet BETWEEN 500 AND 2000 THEN 'Средний'
            ELSE 'Дорогой'
        END as Type  FROM bileti, raspisanie where raspisanie.id_r = bileti.id_r and raspisanie.marshrut_nach = '$pdep' and raspisanie.marshrut_kon = '$parr' and (bileti.vrem_buy >= '$tdep' and bileti.vrem_buy <= '$tarr')
    HAVING raspisanie.kol_bilet >= 500
    ORDER BY raspisanie.stoim_bilet";
            
         
             
            $result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con)); 
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                echo"<table id='tableo'>  <thead class='tr'> 
                <tr class= 'num'>
                    <th>
                        Статус  <br> Билета
                    </th>
                    <th>
                        Фио <br> Владельца
                    </th>
                    <th>
                        Время <br> Покупки
                    </th>
                    <th>
                        Пункт <br> начала
                    </th>
                    <th>
                        пункт <br> прибытия
                    </th>
                    <th>
                        Стоимость <br> билета
                    </th>
                    <th>
                    количество <br> билетов
                </th>
                <th>
                    тип<br> билета
                </th>
                </tr>

            </thead> ";
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                   
                    echo "<tr class='num'> ";
                        for ($j = 1 ; $j < 9 ; ++$j) echo "<td>$row[$j]</td>";
                    echo "</a></tr>";
                    
                }
                echo "</table>";
                 
                // очищаем результат
                mysqli_free_result($result);
            }
             
            mysqli_close($con);
        }
            ?>
            <button class="back" type="button">Назад</button>
<script src="./js/find.js"></script>

</body>
</html>