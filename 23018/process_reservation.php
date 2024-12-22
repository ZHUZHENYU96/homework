<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "flightinfo";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}


if(isset($_POST['userID']) && isset($_POST['year']) && isset($_POST['month']) && isset($_POST['day']) && isset($_POST['flight_name']) && isset($_POST['classlevel'])) {
    $userID = $_POST['userID'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $flight_name = $_POST['flight_name'];
    $classlevel = $_POST['classlevel'];


    $sql = "SELECT flight_ID FROM flightlist WHERE flight_name='$flight_name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $flight_ID = $row['flight_ID'];

        
        $sql = "INSERT INTO reservations (userID, year, month, day, flight_ID, classlevel) VALUES ('$userID', '$year', '$month', '$day', '$flight_ID', '$classlevel')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('予約しました！');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "フライトなし";
    }
} else {
    echo "データ不足";
}

$conn->close();
?>
