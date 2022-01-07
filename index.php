<?php

error_reporting(0);

require_once('weather.php');


require_once('database.php');

date_default_timezone_set('Europe/Kiev');

$time =  date('Y-m-d h:i:s');
$cityname = $weather->getCityName();
$temperature = $weather->getTemperature();
$clouds = $weather->getClouds();
$wind = $weather->getWind();

//$db->execute("INSERT INTO `weather` SET `datetime` = '0000-00-00 00:00:00', `city` = 'Kanev', `temperature` = 70, `clouds` = 'Scattered Clouds', `wind` = 6.87 ");
$query = "INSERT INTO `weather` SET `datetime` = '$time', `city` = '$cityname', `temperature` = '$temperature', `clouds` = '$clouds', `wind` = '$wind' ";
$db->execute($query);

$results = $db->query("SELECT * FROM `weather`");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Pleshny Wheather</title>
</head>

<body>
    <div class="wrapper">
        <div class="content">
            <div class="imagebox">
              <a href="results.php"><img src="img/123.jpg" width="189" height="255" alt=""></a> 
            </div>
            <div>
            <a href="results.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Go To Results</a>
            <hr>
            </div>
            <h1>Pleshny Wheather</h1>
            <?php if($weather->showResult && $weather->showError2 == false) : ?>         
            <hr>
            <div class="clouds">
                <span>City: <?php echo $weather->getCityName(); ?></span>
            </div>
            <div class="teperature">
                <span>Temperature: <?php echo $weather->getTemperature(); ?></span>
            </div>
            <div class="clouds">
                <span><?php echo $weather->getClouds(); ?></span>
            </div>
            <div class="clouds">
                <span>Wind: <?php echo $weather->getWind(); ?> m/s</span>
            </div>
            <hr>
            <?php endif; ?>
            <div class="form">
                <form id="form" action="index.php" method="post">
                    <div>
                        <input type="hidden" value="1" name="getData" id="cityname">
                    </div>
                    <div>
                        <input type="hidden" value="1" name="showResult" id="cityname">
                    </div>
                    <div>
                        <label for="cityname">Tape City Name:</label>
                    </div>
                    <br>
                    <div>
                        <input id="cityname" type="text" name="cityname" id="cityname">
                    </div>
                    <br>
                    <div>
                        <input type="submit" class="btn btn-primary" value="Get Weather">
                    </div>
                </form>
                <div class="error_wrapper">
                    <p class="error"><?php echo $weather->getError(); ?></p>
                </div>
            </div>
            
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- <script src="js/script.js"></script> -->
</body>
</html>