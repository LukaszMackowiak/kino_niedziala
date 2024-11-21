<?php
$polaczenie = mysqli_connect('localhost','root','','kino');

if(!$polaczenie)
{
    echo "Błąd połączenia z serwerem MySQL";

    exit;
}

$zapytanie = mysqli_query($polaczenie,'SELECT rezerwacje.miejsce FROM rezerwacje;');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KINO "Za rogiem"</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="main">
        <div id="baner">
            <img src="baner.jpg" alt="baner" />
        </div>
    </div>

    <div class="left">
        <ul>
            <li><a href="index.html">Stona główna</a></li>
        </ul>
        <hr>
        <form action="rezerwacje.php" method="post">
            <label for="date">Data i godzina seansu<br>
        <input type="date" name="date" id="date"/>
        <input type="time" name="hour" id="hour"/>
    <button type="submit">Pokaż</button></label>
        </form>
    </div>

    <div class="right">

    <?php
    $data = $_POST["date"];
    $godzina = $_POST["hour"];
    ?>

    <table>
        <?php
            
                for($i=0;$i<300;$i++){

                    if ($i%20==0){
                        echo "<tr>";
                    }

                    while($wiersze=mysqli_fetch_array($zapytanie))
                    {
                        echo "<td>"."$wiersze[miejsce]"."</td>";
                    }

                    if ($i%20==0){
                        echo "</tr>";
                    }

                }
        ?>
</table>

    </div>

    <div class="footer">
        <h5>Egzamin INF.03 - AUTOR: Łukasz Maćkowiak 5i</h5>
    </div>
</body>
</html>