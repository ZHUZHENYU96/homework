<!DOCTYPE html>
<html>
<head>
    <title>管理者ページ</title>
    <style>
        body {
            background-color: #f0f8ff; 
            font-family: Arial, sans-serif;
            color: #008080; 
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
            color: #008080; 
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
            border: 1px solid #008080; 
        }
        .login-button {
            padding: 10px 20px;
            background-color: #008080; 
            border: none;
            border-radius: 5px;
            color: #ffffff; 
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
        }
        .login-button:hover {
            background-color: #006060;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">管理者ページ</div>
        <?php
        if(isset($_GET['admin_name']) && isset($_GET['admin_password'])) {
            
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "flightinfo";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("データベースに失敗: " . $conn->connect_error);
            }

            $admin_name = $_GET['admin_name'];
            $admin_password = $_GET['admin_password'];

            $sql = "SELECT * FROM admin WHERE admin_name='$admin_name' AND admin_password='$admin_password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
                echo "<h1>ようこそ " . $admin_name . "！</h1>";
                echo "<div class='message'><h2>管理者機能</h2>";
                echo "<button onclick=\"window.location.href='passenger_inquiry.php'\">搭乗者名簿を検索する</button></div>";
                
            } else {
                
                echo "<p class='message'>管理者ユーザネーム又はパスワードが間違い！</p>";
            }

            $conn->close();
        } else {
            echo "<p class='message'>管理者ユーザネーム又はパスワードを入力して。</p>";
        }
        ?>
    </div>
</body>
</html>
