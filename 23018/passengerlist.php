<!DOCTYPE html>
<html>
<head>
    <title>搭乗者名簿</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            font-size: 16px;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 50px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flightinfo";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("データベースに失敗: " . $conn->connect_error);
}


$year = $_GET['year'];
$month = $_GET['month'];
$day = $_GET['day'];
$flight_name = $_GET['flight_name'];


$flight_query = "SELECT flight_ID FROM flightlist WHERE flight_name = '$flight_name'";
$flight_result = $conn->query($flight_query);

if ($flight_result->num_rows > 0) {
    $row = $flight_result->fetch_assoc();
    $flight_ID = $row['flight_ID'];

    
    $passenger_query = "SELECT r.userID, r.classlevel, u.username
                        FROM reservations r
                        INNER JOIN user u ON r.userID = u.userID
                        WHERE r.year = $year AND r.month = $month AND r.day = $day AND r.flight_ID = $flight_ID";

    $passenger_result = $conn->query($passenger_query);

    if ($passenger_result->num_rows > 0) {
        
        echo "<h1>搭乗者名簿</h1>";
        echo "<p>日付: " . $year . "年" . $month . "月" . $day . "日</p>";
        echo "<p>便名: " . $flight_name . "</p>";
        echo "<table border='1'>";
        echo "<tr><th>座席クラス</th><th>顧客番号</th><th>氏名</th></tr>";

        
        while ($row = $passenger_result->fetch_assoc()) {
            $class = ($row['classlevel'] == 0) ? "ビジネス" : "エコノミー";
            echo "<tr><td>" . $class . "</td><td>" . $row['userID'] . "</td><td>" . $row['username'] . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "搭乗者なし。";
    }
} else {
    echo "指定したフライトはありません。";
}


$conn->close();
?>

    </div>
</body>
</html>
