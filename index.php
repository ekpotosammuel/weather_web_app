<?php

$report = '';
if (isset($_POST['submit'])) {
    if ($_POST['lat'] == '' and $_POST['lon'] == '') {
    } else {

        $lat = $_POST['lat'];
        $lon = $_POST['lon'];
        $key = '5a4fc5d12aecdadb7869cb3a3608f3f8';

        $data = file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$key");
        // print_r($data);
        $weather_data = json_decode($data, true);

        // convert temperature to kelvin 
        $temp = $weather_data['main']['temp'] - 273;

        $report = "Today's weather is " . $temp . "in " . $weather_data['sys']['country'] . " with wind speed of " . $weather_data['wind']['speed'];
    }
}


// $dtat = 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>

</head>

<body>

    <form action="index.php" method="POST">
        <div>
            <h2 class="">weather</h2>
            <!-- <input id="city" name="city" type="text" placeholder="enter city name to view weather condition"> -->
            <input id="lat" name="lat" type="text" placeholder="">
            <input id="lon" name="lon" type="text" placeholder="">
            <button type="submit" id="submit" name="submit"> submit</button>
        </div>
    </form>
    <div>
        <!-- <?php if ($report) : ?> -->
        <?php echo $report ?>
        <!-- <?php endif; ?> -->
    </div>


</body>

</html>