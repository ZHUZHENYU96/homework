<!DOCTYPE html>
<html>
<head>
    <title>新しい予約</title>
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
        .input-field {
            margin: 10px;
            padding: 10px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid #008000; 
        }
        .reserve-button {
            padding: 10px 20px;
            background-color: #008000; 
            border: none;
            border-radius: 5px;
            color: #ffffff; 
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
        }
        .reserve-button:hover {
            background-color: #006400; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">神戸航空</div>
        <form action="process_reservation.php" method="POST">
            <select name="year" class="input-field">
                <option value="2024">2024</option>
            </select>
            <select name="month" class="input-field">
                <option value="3">3</option>
            </select>
            <select name="day" class="input-field">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            <select name="flight_name" class="input-field">
                <option value="RAC861">RAC861</option>
                <option value="RAC867">RAC867</option>
                <option value="RAC862">RAC862</option>
                <option value="RAC868">RAC868</option>
            </select>
            <select name="classlevel" class="input-field">
                <option value="0">ビジネス</option>
                <option value="1">エコノミー</option>
            </select>
            <input type="hidden" name="userID" value="<?php echo isset($_GET['userID']) ? $_GET['userID'] : ''; ?>">
            <input type="submit" value="予約" class="reserve-button">
        </form>
    </div>
</body>
</html>
