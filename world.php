<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';
$country= $_GET['country'];//Get country to search for
$all=$_GET['all'];
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
if(isset($all) == true && isset($country) == true)
{
    if($all == 'true')
    {
        $stmt = $conn->query('SELECT * FROM countries');
    }
    else
    {
        $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    }
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo '<ul>';
    foreach ($results as $row) {
      echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
    }
    echo '</ul>';
}
else
{
    echo ' ';
}
