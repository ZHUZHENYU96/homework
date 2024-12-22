<!DOCTYPE html>
<html>
<head>
    <title>私の予約</title>
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
            color: #008000; 
            margin-bottom: 20px; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd; 
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">私の予約</div>
        <?php
       
        $userID = $_GET['userID'];

        
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "flightinfo";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("データベースに失敗: " . $conn->connect_error);
        }

        
        $sql = "SELECT r.year, r.month, r.day, r.flight_ID, r.classlevel, f.flight_name 
                FROM reservations AS r 
                JOIN flightlist AS f ON r.flight_ID = f.flight_ID 
                WHERE r.userID = '$userID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            echo "<table>";
            echo "<tr><th>年</th><th>月</th><th>日</th><th>便名</th><th>座席クラス</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['year']."</td>";
                echo "<td>".$row['month']."</td>";
                echo "<td>".$row['day']."</td>";
                echo "<td>".$row['flight_name']."</td>";
                echo "<td>".($row['classlevel'] == 0 ? 'ビジネス' : 'エコノミー')."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>あなたはいま予約がありません。</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
