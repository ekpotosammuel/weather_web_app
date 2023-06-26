<?php

$report = '';
if (isset($_POST['submit'])) {
    // echo 'button clicked';
    if ($_POST['lat'] == '' and $_POST['lon'] == '') {
        // echo 'fill all filed';
    } else {

        $lat = $_POST['lat'];
        $lon = $_POST['lon'];
        $key = '5a4fc5d12aecdadb7869cb3a3608f3f8';

        $data = file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$key");
        // print_r($data);
        $weather_data = json_decode($data, true);
        // print_r($weather_data);
        // echo $weather_data['main']['temp'];
        // convert temperature to kelvin 
        $temp = $weather_data['main']['temp'] - 273;
        // echo $temp;
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
    <!-- <link rel="stylesheet" href="../dist/output.css"> -->
    <!-- <link href="/dist/output.css" rel="stylesheet"> -->
</head>

<body>
    <!-- <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1> -->
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