<!DOCTYPE html>
<html>
<head>
    <title>神戸航空 - 登録</title>
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
        <div class="login-form">
            <form action="mypage.php" method="GET">
                <input type="text" name="username" class="input-field" placeholder="ユーザー名" required><br>
                <input type="password" name="password" class="input-field" placeholder="パスワード" required><br>
                <button type="submit" class="login-button">ログイン</button>
            </form>
            <a href="register.php" class="btn-link">新規登録</a>
            <a href="adminlogin.php" class="btn-link">管理者ログイン</a>
        </div>
    </div>
</body>
</html>
