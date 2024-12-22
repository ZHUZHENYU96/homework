<!DOCTYPE html>
<html>
<head>
    <title>神戸航空</title>
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
        .login-btn {
            float: right;
            margin-top: 20px;
            margin-right: 20px;
            padding: 10px 20px;
            background-color: #ffffff; 
            border: 1px solid #008000; 
            border-radius: 5px;
            text-decoration: none;
            color: #008000;
        }
        .login-btn:hover {
            background-color: #008000;
            color: #ffffff; 
        }
        .search-container {
            margin-top: 50px;
        }
        .search-label {
            font-size: 24px;
            color: #008000;
        }
        .search-select {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #008000; 
        }
        .search-button {
            padding: 10px 20px;
            background-color: #008000;
            border: none;
            border-radius: 5px;
            color: #ffffff; 
            font-size: 18px;
            cursor: pointer;
        }
        .search-button:hover {
            background-color: #006400; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">神戸航空</div>
        <a href="login.php" class="login-btn">登録 </a>
        <div class="search-container">
            <div class="search-label">予約状況</div>
            <form action="reservations_inquiry.php" method="GET">
                <select name="departure" class="search-select" required>
                    <option value="" disabled selected>出発地を選んで</option>
                    <option value="那覇">那覇</option>
                    <option value="南大東">南大東</option>
                </select>
                <select name="destination" class="search-select" required>
                    <option value="" disabled selected>目的地を選んで</option>
                    <option value="那覇">那覇</option>
                    <option value="南大東">南大東</option>
                </select>
                <select name="departure_time" class="search-select" required>
                    <option value="" disabled selected>時間を選んで</option>
                    <option value="09:35">09:35</option>
                    <option value="14:55">14:55</option>
                    <option value="11:10">11:10</option>
                    <option value="17:15">17:15</option>
                </select>
                <button type="submit" class="search-button">検索する</button>
            </form>
        </div>
    </div>
</body>
</html>
