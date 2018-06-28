<?php
require_once 'Connect.php';

$link = mysqli_connect($host, $user, $password, $db)
or die ("Не удалось подключиться к БД. Ошибка " . mysqli_error($link));

echo ("You  have connected to the DataBase.<br>");

$q1 = "SELECT * FROM Transportation INNER JOIN Bus ON Transportation.Bus_id = Bus.Bus_id INNER JOIN Passenger 
    ON Transportation.Passenger_ID = Passenger.Passenger_ID";

$result = mysqli_query($link, $q1);

echo "<table border='1'>
    <tr> 
    <th>Bus_id</th>
    <th>Passenger_id</th>
    <th>Duration</th>
    <th>Type</th>
    <th>Usability</th>
    <th>Seats</th>
    <th>Passenger_Name</th>
    <th>Load_time</th>
    <th>Unload_time</th>
    </tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Bus_id'] . "</td>";
    echo "<td>" . $row['Passenger_id'] . "</td>";
    echo "<td>" . $row['Duration'] . "</td>";
    echo "<td>" . $row['Type'] . "</td>";
    echo "<td>" . $row['usability'] . "</td>";
    echo "<td>" . $row['seats'] . "</td>";
    echo "<td>" . $row['Passenger_Name'] . "</td>";
    echo "<td>" . $row['Load_time'] . "</td>";
    echo "<td>" . $row['Unload_time'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($link);