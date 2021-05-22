<?php

// /*
// INSTRUCTIONS
// ============

    // 1.  Add code to autoload CarParkInfoDAO.php which is in sub-folder "model".
    spl_autoload_register(
        function($class){
            require_once "model/$class.php";
        }
      );
    
    // 2. check if the Car Park ID is selected by user
    //    otherwise, display error message
    if (isset($_POST['carpark'])) {
        $selected = $_POST['carpark'];
    } else {
        echo "Please select a carpark ID";
    }

    $dao = new CarParkInfoDAO($selected);
    

?>

<!DOCTYPE html>
<html>

  <head>
          <title>Car Park Information</title>

          <style>
              body {
                  background-image: url("./image/parkhappy.png");
              }
              table {
                    border: 1px solid black;
                }

            th,td {
                border: 1px solid black; 
                text-align: center;
            }
          </style>

  </head>

  <body>
        <h1>Cark Parking Availability</h1>

        <!-- 3. Add your HTML + PHP Code here to show the Car Park Data -->
        <table border='1'>
        
        <tr>
            <th>CarPark ID</th>
            <th>Total Lots</th>
            <th>Lot Type</th>
            <th>Available Lots</th>
        </tr>

        <tr>

            <?php

            echo "<td>$selected</td>";
            $selected_carpark_info = $dao->getCarParkInfo();
            echo "<td>{$selected_carpark_info['total_lots']}</td>";
            echo "<td>{$selected_carpark_info['lot_type']}</td>";
            echo "<td>{$selected_carpark_info['lots_available']}</td>";

            ?>
        
        </tr>
        
        
        </table>
    
  </body>
</html>