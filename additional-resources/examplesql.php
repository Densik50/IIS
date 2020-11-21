<?php


//toto by malo byt pripojenie na server eva - treba tam udaje z Wis - Hesla - ucet databaze sql
$db = mysqli_init();
//$conn = mysqli_real_connect($db, 'localhost', 'xcimme00', '3omgever', 'xcimme00', 0, '/var/run/mysql/mysql.sock');
if(!$conn)
{
    die('cannot connect '.mysqli_connect_error());
}
echo "Connected successfully";


//query vykona akciu nad specifikovanou databazou
//mysqli_query(INSERT INTO OSOBA VALUES (1, 'Jan', 'Novak', 'jno@gmail.com', '0908568985', 'Nové Zámky'););
//$sql je konkretna poziadavka (prikazy) ulozena do premennej
$sql = "SELECT * FROM OSOBA;";

//toto len vypise tabulku - debug
if($result = mysqli_query($conn, $sql))
{
    if(mysqli_num_rows($result) > 0)
    {
        echo "<table>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Meno</th>";
                echo "<th>Priezvisko</th>";
                echo "<th>Email</th>";
                echo "<th>Tel</th>";
                echo "<th>Mesto</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
                echo "<td>" . $row['OsobaID'] . "</td>";
                echo "<td>" . $row['Meno'] . "</td>";
                echo "<td>" . $row['Priezvisko'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Telefon'] . "</td>";
                echo "<td>" . $row['Mesto'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        mysqli_free_result($result);
    } 
    else
    {
        echo "No records matching your query were found.";
    }
} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>