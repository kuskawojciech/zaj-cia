<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/table.css">
    <title>Użytkownicy</title>
</head>
<body>
    <h4>Użytkownicy</h4> 
    <table>
        <tr>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Data urodzenia</th>
            <th>Miasto</th>
            <th>Województwo</th>
            <th>Państwo</th>
        </tr>
    
<?php
    require_once "../scripts/connect.php";
    $sql = "select firstName, lastName, birthday, city, state, country from users join cities on cities.id=users.city_id join states on cities.state_id=states.id join countries on states.country_id=countries.id;";

    $result = $conn->query($sql);
    while($user = $result->fetch_assoc()){
        echo <<< TABLEUSERS
        <tr>
            <td>$user[firstName] </td>
            <td>$user[lastName] </td>
            <td>$user[birthday] </td>
            <td>$user[city] </td>
            <td>$user[state] </td>
            <td>$user[country] </td>
        </tr>
        
        TABLEUSERS;
    }
   echo "</table>";
$conn->close();
?>
</body>
</html>