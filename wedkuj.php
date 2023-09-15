<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link a href="styl_1.css" rel="stylesheet">
    <title>Wędkowanie</title>
</head>

<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <div id="left">
        <div id="left1">
            <h3>
                Ryby zamieszkujące rzeki
            </h3>
            <ol>
                <?php
                //połączenie z bazą danych
                $db = mysqli_connect("localhost", "root", "", "wedkowanie");
                //zapytanie do bazy danych 
                $sql = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby LEFT JOIN lowisko ON lowisko.Ryby_id = ryby.id WHERE lowisko.rodzaj = 3;";
                $result = mysqli_query($db, $sql);
                // Pętla wyświetlająca wyniki w formie listy 
                while ($w = mysqli_fetch_row($result)) {
                    echo "<li>" . $w[0] . " pływa w rzece " . $w[1] . ", " . $w[2] . "</li>";
                }
                ?>
            </ol>
        </div>
        <div id="left2">
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <tr>
                    <th>L.p.</th>
                    <th>Gatunek</th>
                    <th>Występowanie</th>
                </tr>
                <?php
                $sql = "SELECT id, nazwa, wystepowanie FROM ryby where ryby.styl_zycia = 1;";
                $result = mysqli_query($db, $sql);
                $i = 1;
                while ($w = mysqli_fetch_row($result)) {
                    echo "<tr><td>" . $i . "</td><td>" . $w[1] . "</td><td>" . $w[2] . "</td></tr>";
                    $i++;
                }
                mysqli_close($db);
                ?>
            </table>

        </div>
    </div>
    <div id="right">
        <img src="ryba1.jpg" alt="Sum">
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <footer>
        <p>Stronę wykonał: 17</p>
    </footer>
</body>

</html>