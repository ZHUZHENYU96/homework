<!DOCTYPE html>
<html>
<head>
    <title>予約状況</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: green;
        }
        .triangle {
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 20px solid red;
        }
        .cross {
            font-size: 20px;
            color: red;
        }
    </style>
</head>
<body>
    <?php
  
    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "flightinfo";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("データベースに失敗しました: " . $conn->connect_error);
    }


    $departure = $_GET['departure'];
    $destination = $_GET['destination'];
    $time = $_GET['departure_time'];


    $sql = "SELECT flight_name, departure_time, businessclass_number, economyclass_number FROM flightlist WHERE departure='$departure' AND destination='$destination' AND departure_time='$time'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
 
        echo "<table><tr><th>便名</th><th>出発時間</th><th>ビジネスクラス</th><th>エコノミークラス</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["flight_name"]. "</td><td>" . $row["departure_time"]. "</td><td>" . generateIcon($row["businessclass_number"]). "</td><td>" . generateIcon($row["economyclass_number"]). "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "このフライトはありません";
    }

    function generateIcon($num) {
        if ($num >= 2) {
            return "<div class='circle'></div>";
        } elseif ($num == 1) {
            return "<div class='triangle'></div>";
        } else {
            return "<div class='cross'>&times;</div>";
        }
    }

    $conn->close();
    ?>
</body>
</html>
