<?php 

require_once 'model/CarParkInfoDAO.php';

if (isset($_POST['btn'])) {
    if (isset($_POST['cp_id'])) {
        $selected = $_POST['cp_id'];
    } else {
        echo "Please select a carpark ID";
    }
}

?>

<!doctype html>
<html lang="en">

<head>

    <title>Car Park Information</title>

        <style>
            body {
                background-image: url("./image/parkhappy.png");
                width: 40;
                height: 40;
            }
        </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Autocomplete - Default functionality</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
  

    $.getJSON("https://data.gov.sg/api/action/datastore_search?resource_id=139a3035-e624-4f56-b63f-89ae28d4ae4c&limit=3000", function(data) {
        var carparks = [];
        records = data.result.records;
        len = records.length;
        for (var i=0; i < len; i++) {
            carparks.push(records[i].address + ' - ' + records[i].car_park_no);
        }

        $( "#carparks" ).autocomplete({
            source: carparks
        });
    });

    </script>
</head>

<body>

<form method='POST'>
    <div class="ui-widget"> Select a Carpark: 
    <?php
        if (isset($_POST['cp_id'])) {
            echo "<input id='carparks' name='cp_id' value= '$selected' size='50'>";
        } else {
            echo "<input id='carparks' name='cp_id' size='50'>";
        }

    ?>
        <input type='submit' name='btn' value='Get Parking Lot Availability'>
    </div>
</form>

<?php
    if (isset($_POST['cp_id'])) {
?>

    <br>

    <table border='2'>

    <tr>
        <th>CarPark</th>
        <th>Total Lots</th>
        <th>Lot Type</th>
        <th>Available Lots</th>
    </tr>

    <tr>

        <?php

        echo "<td>$selected</td>";
        $selected_arr = explode(" - ", $selected);
        $CPIdao = new CarParkInfoDAO($selected_arr[1]);
        $selected_carpark_info = $CPIdao->getCarParkInfo();
        echo "<td>{$selected_carpark_info['total_lots']}</td>";
        echo "<td>{$selected_carpark_info['lot_type']}</td>";
        echo "<td>{$selected_carpark_info['lots_available']}</td>";

        ?>

    </tr>

    </table>

<?php
    }
?>

</body>
</html>