<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administratora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="baner">
        <h3>Portal Społecznościowy - panel administratora</h3>
    </div>
    <div class="lewy">
        <h4>Uzytkownicy</h4>
        <?php
        $conn = mysqli_connect("localhost","root","","dane4");
        $pytanie = "SELECT id,imie,nazwIsko,rok_urodzenia,zdjecie FROM osoby LIMIT 30";
        $query = mysqli_query($conn,$pytanie);
        while($wynik = mysqli_fetch_row($query))
        {
            $wiek = Date("Y") - $wynik[3];
            echo "<p>";
            echo "$wynik[0].$wynik[1],$wynik[2],$wiek lat";
            echo "</p>";
        }
        mysqli_close($conn);
        ?>
        <a href="settings.html">inne ustawienia</a>
    </div>
    <div class="prawy">
        <h4>Podaj Id uzytkownika</h4>
        <form action="users.php" method="post">
            <input type="number" name="ID" id="">
            <button>ZOBACZ</button>
        </form>
        <?php
            $conn = mysqli_connect("localhost","root","","dane4");
            $pytanie = "SELECT osoby.id,osoby.imie,osoby.nazwisko,osoby.rok_urodzenia,osoby.opis,osoby.zdjecie,hobby.nazwa FROM osoby,hobby WHERE hobby.id = osoby.Hobby_id AND osoby.id = '$_POST[ID]'";
            $query = mysqli_query($conn,$pytanie);
            while($wynik = mysqli_fetch_row($query))
            {
                $POSTID = '$_POST[ID]';
                echo "<h2>$_POST[ID],$wynik[1],$wynik[2]</h2>";
                echo "<img src=".$wynik[5]." alt=".$POSTID.">";
                echo "<p>$wynik[3]</p>";
                echo "<p>$wynik[4]</p>";
                echo "<p>$wynik[6]</p>";
            }
            mysqli_close($conn);
        ?>
    </div>
    <footer>Strone wykonał:00000000000</footer>
</body>
</html>