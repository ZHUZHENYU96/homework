<!DOCTYPE html>
<html>
<head>
    <title>神戸航空 - 搭乗者名簿検索</title>
    <style>
        body {
            background-color: #add8e6; 
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
        .input-field {
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #008080; 
        }
        .search-button {
            padding: 10px 20px;
            background-color: #008080; 
            border: none;
            border-radius: 5px;
            color: #ffffff; 
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
        }
        .search-button:hover {
            background-color: #006060; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">神戸航空 - 搭乗者名簿</div>
        <form action="passengerlist.php" method="GET">
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
            <button type="submit" class="search-button">検索</button>
        </form>
    </div>
</body>
</html>
