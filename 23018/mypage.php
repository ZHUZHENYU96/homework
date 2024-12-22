<!DOCTYPE html>
<html>
<head>
    <title>マイページ</title>
    <style>
        body {
            background-color: #f0fff0;
            font-family: Arial, sans-serif;
            color: #008000;
            font-size: 16px;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            padding-top: 50px;
        }
        .title {
            font-size: 36px;
            font-weight: bold;
            color: #008000; 
            margin-bottom: 20px;
        }
        .message {
            font-size: 20px;
            margin-bottom: 20px;
        }
        .login-form {
            margin-top: 50px;
        }
        .input-field {
            margin: 10px;
            padding: 10px;
            width: 300px;
            border-radius: 5px;
            border: 1px solid #008000;
        }
        .login-button {
            padding: 10px 20px;
            background-color: #008000;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
        }
        .login-button:hover {
            background-color: #006400;
        }
        .btn-link {
            text-decoration: none;
            color: #008000;
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">神戸航空</div>
        <?php
        if(isset($_GET['username']) && isset($_GET['password'])) {
            
            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $dbname = "flightinfo";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("データベースに失敗: " . $conn->connect_error);
            }

            $username = $_GET['username'];
            $password = $_GET['password'];

            $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
                $row = $result->fetch_assoc();
                $userID = $row['userID'];

                
                echo "<h1>ようこそ！" . $username . "！</h1>";
                echo "<a href='myreservations.php?userID=$userID' class='login-button'>私の予約</a>";
                echo "<a href='newreservations.php?userID=$userID' class='login-button'>新しい予約</a>";
            } else {
                
                echo "<p class='message'>ユーザネーム又はパスワードが間違い！</p>";
            }

            $conn->close();
        } else {
            echo "<p class='message'>ユーザネームとパスワードを書いてください。</p>";
        }
        ?>
    </div>
</body>
</html>
