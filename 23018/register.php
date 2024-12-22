<!DOCTYPE html>
<html>
<head>
    <title>神戸航空 - 新規登録</title>
    <style>
        body {
            background-color: #f0fff0;
            font-family: Arial, sans-serif;
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
        }
        .register-form {
            margin-top: 50px;
        }
        .input-field {
            margin: 10px;
            padding: 10px;
            width: 300px;
            border-radius: 5px;
            border: 1px solid #008000;
        }
        .register-button {
            padding: 10px 20px;
            background-color: #008000;
            border: none;
            border-radius: 5px;
            color: #ffffff; 
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
        }
        .register-button:hover {
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
        <div class="register-form">
            <form action="register.php" method="POST">
                <input type="text" name="username" class="input-field" placeholder="ユーザネームを入力して" required><br>
                <input type="password" name="password" class="input-field" placeholder="パスワードを入力して" required><br>
                <button type="submit" class="register-button">新規登録</button>
            </form>
            <p>戻る <a href="login.php" class="btn-link">登録</a></p>
        </div>
    </div>

    <?php
 
    if(isset($_POST['username']) && isset($_POST['password'])) {
  
        $servername = "localhost";
        $username = "root";
        $password = ""; 
        $dbname = "flightinfo";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("データベースに失敗: " . $conn->connect_error);
        }

        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href = 'login.php';</script>"; 
        } else {
            echo "<p>新規登録失敗しました。</p>";
        }

        $conn->close();
    }
    ?>

</body>
</html>
