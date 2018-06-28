<?php

require_once 'connect.php';

$link = mysqli_connect($host, $user, $password, $db);

echo "<form method='GET' action='search.php'>
<p>Enter bus id: <input type='text' name='bus' value='$Bus_id'></p>
<p>Enter passenger id: <input type='text' name='pass' value='$Passenger_id'></p>
<p><input type='submit' name='enter' value='Search'></p>
</form>";

$Bus_id = strtr($_GET['bus'], '*', '%');
$Passenger_id = strtr($_GET['pass'], '*', '%');

if (isset($_GET['enter'])) {

    $sql="SELECT Bus_id, Passenger_id
    FROM Transportation
    WHERE Bus_id LIKE '%$Bus_id%' AND Passenger_id LIKE '%$Passenger_id%'";

    $result = mysqli_query($link, $sql);

    echo "<table border='1'>
    <tr> 
    <th>Bus_id</th>
    <th>Passenger_id</th>
    </tr>";

    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['Bus_id'] . "</td>";
        echo "<td>" . $row['Passenger_id'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

mysqli_close($link);
?>

