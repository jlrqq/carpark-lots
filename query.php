<?php
    /* Get the latest carpark availability in Singapore: - 
    Retrieved every minute - Use the date_time parameter to retrieve 
    the latest carpark availability at that moment in time - 
    Detailed carpark information can be found at 
    https://data.gov.sg/dataset/hdb-carpark-information 
    */

    // 1.  Add code here to fix the "Class 'CarParkListDAO' not found error.
    spl_autoload_register(
      function($class){
          require_once "model/$class.php";
      }
    );

    
    // 2. Instantiate a CarParkListDAO object
    $dao = new CarParkListDAO();
    // var_dump($dao);
?>

<!DOCTYPE html>
<html>

  <head>
          <title>Car Park Information</title>

          <style>
              body {
                  background-image: url("./image/parkhappy.png");
              }
          </style>

  </head>

  <body>
      <h1>Cark Parking Availability Query System</h1>

      <!-- 3. Add your HTML + PHP Code here to show a list of Car Park IDs -->
      
      <!-- var_dump($carpark_ids); -->

      <form action='display.php' method='POST'>

      <select name='carpark'>

        <?php
        $carpark_ids = $dao->getCarParkNos();
        foreach ($carpark_ids as $carpark_id) {
          echo "<option value='$carpark_id'>$carpark_id</option>";
        }
        ?>

      </select>

      <input type='submit' value='Get Parking Lot Availability'>

      </form>

      

  </body>
</html>

<?php

    /* This is the JSON object returned from data.gov.sg

    {
  "items": [
    {
      "timestamp": "2019-02-13T00:49:28+08:00",
      "carpark_data": [
        {
          "carpark_info": [
            {
              "total_lots": "83",
              "lot_type": "C",
              "lots_available": "35"
            }
          ],
          "carpark_number": "HE12",
          "update_datetime": "2019-02-13T00:47:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "583",
              "lot_type": "C",
              "lots_available": "433"
            }
          ],
          "carpark_number": "HLM",
          "update_datetime": "2019-02-13T00:48:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "322",
              "lot_type": "C",
              "lots_available": "174"
            }
          ],
          "carpark_number": "RHM",
          "update_datetime": "2019-02-13T00:47:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "97",
              "lot_type": "C",
              "lots_available": "75"
            }
          ],
          "carpark_number": "BM29",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "96",
              "lot_type": "C",
              "lots_available": "70"
            }
          ],
          "carpark_number": "Q81",
          "update_datetime": "2019-02-13T00:48:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "173",
              "lot_type": "C",
              "lots_available": "132"
            }
          ],
          "carpark_number": "C20",
          "update_datetime": "2019-02-13T00:47:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "228",
              "lot_type": "C",
              "lots_available": "171"
            }
          ],
          "carpark_number": "FR3M",
          "update_datetime": "2019-02-13T00:47:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "289",
              "lot_type": "C",
              "lots_available": "115"
            }
          ],
          "carpark_number": "C32",
          "update_datetime": "2019-02-13T00:48:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "332",
              "lot_type": "C",
              "lots_available": "147"
            }
          ],
          "carpark_number": "C6",
          "update_datetime": "2019-02-13T00:43:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "273",
              "lot_type": "C",
              "lots_available": "70"
            }
          ],
          "carpark_number": "TG2",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "543",
              "lot_type": "C",
              "lots_available": "219"
            }
          ],
          "carpark_number": "BP1",
          "update_datetime": "2019-02-13T00:46:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "133",
              "lot_type": "C",
              "lots_available": "43"
            }
          ],
          "carpark_number": "TG1",
          "update_datetime": "2019-02-13T00:48:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "189",
              "lot_type": "C",
              "lots_available": "114"
            }
          ],
          "carpark_number": "TGM2",
          "update_datetime": "2019-02-13T00:47:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "138",
              "lot_type": "C",
              "lots_available": "4"
            }
          ],
          "carpark_number": "TE14",
          "update_datetime": "2019-02-13T00:47:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "48",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BM3",
          "update_datetime": "2019-02-13T00:48:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "612",
              "lot_type": "C",
              "lots_available": "121"
            }
          ],
          "carpark_number": "BM9",
          "update_datetime": "2018-12-17T07:42:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "154",
              "lot_type": "C",
              "lots_available": "63"
            }
          ],
          "carpark_number": "HG44",
          "update_datetime": "2019-02-13T00:47:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "80",
              "lot_type": "C",
              "lots_available": "44"
            }
          ],
          "carpark_number": "HG64",
          "update_datetime": "2019-02-13T00:47:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "308",
              "lot_type": "C",
              "lots_available": "105"
            }
          ],
          "carpark_number": "PM27",
          "update_datetime": "2019-02-13T00:47:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "302",
              "lot_type": "C",
              "lots_available": "68"
            }
          ],
          "carpark_number": "PM28",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "221",
              "lot_type": "C",
              "lots_available": "66"
            }
          ],
          "carpark_number": "TM36",
          "update_datetime": "2019-02-13T00:47:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "238",
              "lot_type": "C",
              "lots_available": "71"
            }
          ],
          "carpark_number": "TM37",
          "update_datetime": "2019-02-13T00:47:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "362",
              "lot_type": "C",
              "lots_available": "116"
            }
          ],
          "carpark_number": "T50",
          "update_datetime": "2019-02-13T00:47:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "351",
              "lot_type": "C",
              "lots_available": "78"
            }
          ],
          "carpark_number": "T51",
          "update_datetime": "2019-02-13T00:47:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "249",
              "lot_type": "C",
              "lots_available": "204"
            }
          ],
          "carpark_number": "TM43",
          "update_datetime": "2019-02-13T00:47:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "30",
              "lot_type": "C",
              "lots_available": "20"
            }
          ],
          "carpark_number": "T15",
          "update_datetime": "2019-02-13T00:47:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "107",
              "lot_type": "C",
              "lots_available": "52"
            }
          ],
          "carpark_number": "T16",
          "update_datetime": "2019-02-13T00:47:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "245",
              "lot_type": "C",
              "lots_available": "65"
            }
          ],
          "carpark_number": "T17",
          "update_datetime": "2019-02-13T00:47:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "84",
              "lot_type": "C",
              "lots_available": "59"
            }
          ],
          "carpark_number": "T18",
          "update_datetime": "2019-02-13T00:47:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "197",
              "lot_type": "C",
              "lots_available": "89"
            }
          ],
          "carpark_number": "B9",
          "update_datetime": "2019-02-13T00:47:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "511",
              "lot_type": "C",
              "lots_available": "193"
            }
          ],
          "carpark_number": "B10",
          "update_datetime": "2019-02-13T00:47:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "208",
              "lot_type": "C",
              "lots_available": "61"
            }
          ],
          "carpark_number": "B14",
          "update_datetime": "2018-10-29T09:18:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "163",
              "lot_type": "C",
              "lots_available": "101"
            }
          ],
          "carpark_number": "WCB",
          "update_datetime": "2019-02-13T00:46:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "96",
              "lot_type": "C",
              "lots_available": "56"
            }
          ],
          "carpark_number": "ACB",
          "update_datetime": "2019-02-13T00:44:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "38",
              "lot_type": "C",
              "lots_available": "19"
            }
          ],
          "carpark_number": "CY",
          "update_datetime": "2019-02-13T00:44:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "408",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "AM46",
          "update_datetime": "2019-02-13T00:48:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "205",
              "lot_type": "C",
              "lots_available": "103"
            }
          ],
          "carpark_number": "A12",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "363",
              "lot_type": "C",
              "lots_available": "58"
            }
          ],
          "carpark_number": "BE45",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "293",
              "lot_type": "C",
              "lots_available": "110"
            }
          ],
          "carpark_number": "BE39",
          "update_datetime": "2019-02-13T00:48:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "339",
              "lot_type": "C",
              "lots_available": "121"
            }
          ],
          "carpark_number": "BE40",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "320",
              "lot_type": "C",
              "lots_available": "181"
            }
          ],
          "carpark_number": "RCB",
          "update_datetime": "2017-03-31T12:00:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "56",
              "lot_type": "C",
              "lots_available": "5"
            }
          ],
          "carpark_number": "CR29",
          "update_datetime": "2019-02-13T00:47:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "352",
              "lot_type": "C",
              "lots_available": "288"
            }
          ],
          "carpark_number": "KLM",
          "update_datetime": "2019-02-13T00:46:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "270",
              "lot_type": "C",
              "lots_available": "17"
            }
          ],
          "carpark_number": "SE34",
          "update_datetime": "2019-02-13T00:48:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "65",
              "lot_type": "C",
              "lots_available": "61"
            }
          ],
          "carpark_number": "KB7",
          "update_datetime": "2019-02-13T00:46:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "195",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SE31",
          "update_datetime": "2019-02-13T00:48:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "15",
              "lot_type": "C",
              "lots_available": "2"
            }
          ],
          "carpark_number": "J56",
          "update_datetime": "2019-02-13T00:47:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "360",
              "lot_type": "C",
              "lots_available": "341"
            }
          ],
          "carpark_number": "J57",
          "update_datetime": "2019-02-13T00:47:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "13",
              "lot_type": "C",
              "lots_available": "9"
            }
          ],
          "carpark_number": "J57L",
          "update_datetime": "2019-02-13T00:47:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "118",
              "lot_type": "C",
              "lots_available": "43"
            }
          ],
          "carpark_number": "J33",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "105",
              "lot_type": "C",
              "lots_available": "26"
            }
          ],
          "carpark_number": "J34",
          "update_datetime": "2019-02-13T00:47:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "500",
              "lot_type": "C",
              "lots_available": "226"
            }
          ],
          "carpark_number": "BL8",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "310",
              "lot_type": "C",
              "lots_available": "1"
            }
          ],
          "carpark_number": "J36",
          "update_datetime": "2019-02-13T00:48:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "226",
              "lot_type": "C",
              "lots_available": "150"
            }
          ],
          "carpark_number": "J54",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "131",
              "lot_type": "C",
              "lots_available": "93"
            }
          ],
          "carpark_number": "J55",
          "update_datetime": "2019-02-13T00:46:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "393",
              "lot_type": "C",
              "lots_available": "107"
            }
          ],
          "carpark_number": "J43",
          "update_datetime": "2019-02-13T00:44:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "63",
              "lot_type": "C",
              "lots_available": "35"
            }
          ],
          "carpark_number": "J46",
          "update_datetime": "2019-02-13T00:48:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "239",
              "lot_type": "C",
              "lots_available": "50"
            }
          ],
          "carpark_number": "KB1",
          "update_datetime": "2019-02-13T00:47:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "677",
              "lot_type": "C",
              "lots_available": "375"
            }
          ],
          "carpark_number": "GBM",
          "update_datetime": "2019-02-13T00:47:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "187",
              "lot_type": "C",
              "lots_available": "44"
            }
          ],
          "carpark_number": "SE14",
          "update_datetime": "2019-02-13T00:48:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "591",
              "lot_type": "C",
              "lots_available": "333"
            }
          ],
          "carpark_number": "SE50",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "209",
              "lot_type": "C",
              "lots_available": "76"
            }
          ],
          "carpark_number": "J40",
          "update_datetime": "2019-02-13T00:48:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "340",
              "lot_type": "C",
              "lots_available": "59"
            }
          ],
          "carpark_number": "JM1",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "188",
              "lot_type": "C",
              "lots_available": "61"
            }
          ],
          "carpark_number": "J32",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "368",
              "lot_type": "C",
              "lots_available": "153"
            }
          ],
          "carpark_number": "A11",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "383",
              "lot_type": "C",
              "lots_available": "159"
            }
          ],
          "carpark_number": "TR1",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "344",
              "lot_type": "C",
              "lots_available": "163"
            }
          ],
          "carpark_number": "JBM",
          "update_datetime": "2019-02-13T00:49:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "33",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "TE2",
          "update_datetime": "2019-02-13T00:49:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "95",
              "lot_type": "C",
              "lots_available": "34"
            }
          ],
          "carpark_number": "CR31",
          "update_datetime": "2019-02-13T00:47:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "365",
              "lot_type": "C",
              "lots_available": "168"
            }
          ],
          "carpark_number": "J1",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "199",
              "lot_type": "C",
              "lots_available": "96"
            }
          ],
          "carpark_number": "J2",
          "update_datetime": "2019-02-13T00:47:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "313",
              "lot_type": "C",
              "lots_available": "146"
            }
          ],
          "carpark_number": "J3",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1174",
              "lot_type": "C",
              "lots_available": "272"
            }
          ],
          "carpark_number": "T37",
          "update_datetime": "2019-02-13T00:47:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "92",
              "lot_type": "C",
              "lots_available": "22"
            }
          ],
          "carpark_number": "KB3",
          "update_datetime": "2019-02-13T00:46:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "160",
              "lot_type": "C",
              "lots_available": "98"
            }
          ],
          "carpark_number": "KBM",
          "update_datetime": "2019-02-13T00:47:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "168",
              "lot_type": "C",
              "lots_available": "71"
            }
          ],
          "carpark_number": "J4",
          "update_datetime": "2019-02-13T00:45:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "390",
              "lot_type": "C",
              "lots_available": "144"
            }
          ],
          "carpark_number": "TGM1",
          "update_datetime": "2019-02-13T00:49:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "208",
              "lot_type": "C",
              "lots_available": "76"
            }
          ],
          "carpark_number": "TG3",
          "update_datetime": "2019-02-13T00:47:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "176",
              "lot_type": "C",
              "lots_available": "67"
            }
          ],
          "carpark_number": "TG6",
          "update_datetime": "2019-02-13T00:47:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "362",
              "lot_type": "C",
              "lots_available": "163"
            }
          ],
          "carpark_number": "TG7",
          "update_datetime": "2019-02-13T00:48:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "54",
              "lot_type": "C",
              "lots_available": "22"
            }
          ],
          "carpark_number": "CR30",
          "update_datetime": "2019-02-13T00:47:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "144",
              "lot_type": "C",
              "lots_available": "26"
            }
          ],
          "carpark_number": "RCM",
          "update_datetime": "2019-02-13T00:47:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "298",
              "lot_type": "C",
              "lots_available": "88"
            }
          ],
          "carpark_number": "EPM",
          "update_datetime": "2019-02-13T00:49:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "553",
              "lot_type": "C",
              "lots_available": "234"
            }
          ],
          "carpark_number": "TGM3",
          "update_datetime": "2019-02-13T00:47:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "66",
              "lot_type": "C",
              "lots_available": "55"
            }
          ],
          "carpark_number": "KB14",
          "update_datetime": "2019-02-13T00:46:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "350",
              "lot_type": "C",
              "lots_available": "62"
            }
          ],
          "carpark_number": "J41",
          "update_datetime": "2019-02-13T00:44:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "245",
              "lot_type": "C",
              "lots_available": "143"
            }
          ],
          "carpark_number": "JBM2",
          "update_datetime": "2019-02-13T00:49:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "256",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "J39",
          "update_datetime": "2019-02-13T00:44:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "677",
              "lot_type": "C",
              "lots_available": "82"
            }
          ],
          "carpark_number": "J52",
          "update_datetime": "2019-02-13T00:44:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "633",
              "lot_type": "C",
              "lots_available": "41"
            }
          ],
          "carpark_number": "J51",
          "update_datetime": "2019-02-13T00:44:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "217",
              "lot_type": "C",
              "lots_available": "69"
            }
          ],
          "carpark_number": "J53",
          "update_datetime": "2019-02-13T00:44:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "866",
              "lot_type": "C",
              "lots_available": "208"
            }
          ],
          "carpark_number": "T19",
          "update_datetime": "2019-02-13T00:47:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "504",
              "lot_type": "C",
              "lots_available": "47"
            }
          ],
          "carpark_number": "J49",
          "update_datetime": "2019-02-13T00:44:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "712",
              "lot_type": "C",
              "lots_available": "87"
            }
          ],
          "carpark_number": "J27",
          "update_datetime": "2019-02-13T00:44:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "50",
              "lot_type": "C",
              "lots_available": "1"
            }
          ],
          "carpark_number": "TB14",
          "update_datetime": "2019-02-13T00:50:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "501",
              "lot_type": "C",
              "lots_available": "236"
            }
          ],
          "carpark_number": "U19",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "95",
              "lot_type": "C",
              "lots_available": "56"
            }
          ],
          "carpark_number": "U6",
          "update_datetime": "2019-02-13T00:48:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "159",
              "lot_type": "C",
              "lots_available": "40"
            }
          ],
          "carpark_number": "U45",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "171",
              "lot_type": "C",
              "lots_available": "147"
            }
          ],
          "carpark_number": "BBM7",
          "update_datetime": "2019-02-13T00:46:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "459",
              "lot_type": "C",
              "lots_available": "115"
            }
          ],
          "carpark_number": "BE12",
          "update_datetime": "2019-02-13T00:48:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "475",
              "lot_type": "C",
              "lots_available": "72"
            }
          ],
          "carpark_number": "HG41",
          "update_datetime": "2019-02-13T00:47:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "513",
              "lot_type": "C",
              "lots_available": "47"
            }
          ],
          "carpark_number": "HG43",
          "update_datetime": "2019-02-13T00:47:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "175",
              "lot_type": "C",
              "lots_available": "20"
            }
          ],
          "carpark_number": "MN1",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "441",
              "lot_type": "C",
              "lots_available": "307"
            }
          ],
          "carpark_number": "MNRM",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "394",
              "lot_type": "C",
              "lots_available": "167"
            }
          ],
          "carpark_number": "MN2",
          "update_datetime": "2019-02-13T00:48:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "448",
              "lot_type": "C",
              "lots_available": "215"
            }
          ],
          "carpark_number": "C7",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "54",
              "lot_type": "C",
              "lots_available": "33"
            }
          ],
          "carpark_number": "C17",
          "update_datetime": "2019-02-13T00:39:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "551",
              "lot_type": "C",
              "lots_available": "507"
            }
          ],
          "carpark_number": "C20M",
          "update_datetime": "2019-02-13T00:39:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "217",
              "lot_type": "C",
              "lots_available": "182"
            }
          ],
          "carpark_number": "T41",
          "update_datetime": "2019-02-13T00:47:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "82",
              "lot_type": "C",
              "lots_available": "47"
            }
          ],
          "carpark_number": "T42",
          "update_datetime": "2019-02-13T00:47:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "259",
              "lot_type": "C",
              "lots_available": "217"
            }
          ],
          "carpark_number": "TM42",
          "update_datetime": "2019-02-13T00:47:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "718",
              "lot_type": "C",
              "lots_available": "219"
            }
          ],
          "carpark_number": "J48",
          "update_datetime": "2019-02-13T00:44:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "57",
              "lot_type": "C",
              "lots_available": "46"
            }
          ],
          "carpark_number": "BH1",
          "update_datetime": "2019-02-13T00:46:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "50",
              "lot_type": "C",
              "lots_available": "45"
            }
          ],
          "carpark_number": "BH2",
          "update_datetime": "2019-02-13T00:45:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "172",
              "lot_type": "C",
              "lots_available": "163"
            }
          ],
          "carpark_number": "BKE7",
          "update_datetime": "2019-02-13T00:48:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "150",
              "lot_type": "C",
              "lots_available": "68"
            }
          ],
          "carpark_number": "BR5",
          "update_datetime": "2019-02-13T00:45:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "233",
              "lot_type": "C",
              "lots_available": "93"
            }
          ],
          "carpark_number": "BRM3",
          "update_datetime": "2019-02-13T00:46:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "300",
              "lot_type": "C",
              "lots_available": "196"
            }
          ],
          "carpark_number": "BRM4",
          "update_datetime": "2019-02-13T00:46:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "M16",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "M20",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "200",
              "lot_type": "C",
              "lots_available": "135"
            }
          ],
          "carpark_number": "M35",
          "update_datetime": "2019-02-13T00:49:12"
        },
        {
          "carpark_info": [
            {
              "total_lots": "15",
              "lot_type": "C",
              "lots_available": "10"
            }
          ],
          "carpark_number": "M36",
          "update_datetime": "2019-02-13T00:47:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "30",
              "lot_type": "C",
              "lots_available": "9"
            }
          ],
          "carpark_number": "M37",
          "update_datetime": "2019-02-13T00:47:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "M38",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "121"
            }
          ],
          "carpark_number": "MM3",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "220",
              "lot_type": "C",
              "lots_available": "118"
            }
          ],
          "carpark_number": "MP12",
          "update_datetime": "2019-02-13T00:47:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "396",
              "lot_type": "C",
              "lots_available": "277"
            }
          ],
          "carpark_number": "MP13",
          "update_datetime": "2019-02-13T00:47:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "522",
              "lot_type": "C",
              "lots_available": "274"
            }
          ],
          "carpark_number": "MP1M",
          "update_datetime": "2019-02-13T00:45:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "270",
              "lot_type": "C",
              "lots_available": "52"
            }
          ],
          "carpark_number": "PP1",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "212",
              "lot_type": "C",
              "lots_available": "132"
            }
          ],
          "carpark_number": "PP2",
          "update_datetime": "2019-02-13T00:46:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "339",
              "lot_type": "C",
              "lots_available": "94"
            }
          ],
          "carpark_number": "PP3",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "171",
              "lot_type": "C",
              "lots_available": "7"
            }
          ],
          "carpark_number": "PP4",
          "update_datetime": "2019-02-13T00:46:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "321",
              "lot_type": "C",
              "lots_available": "81"
            }
          ],
          "carpark_number": "PP5",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "128",
              "lot_type": "C",
              "lots_available": "66"
            }
          ],
          "carpark_number": "TP10",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "50",
              "lot_type": "C",
              "lots_available": "16"
            }
          ],
          "carpark_number": "TP14",
          "update_datetime": "2019-02-13T00:45:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "668",
              "lot_type": "C",
              "lots_available": "585"
            }
          ],
          "carpark_number": "TP16",
          "update_datetime": "2019-02-13T00:49:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "126",
              "lot_type": "C",
              "lots_available": "88"
            }
          ],
          "carpark_number": "TP17",
          "update_datetime": "2019-02-13T00:48:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "106",
              "lot_type": "C",
              "lots_available": "92"
            }
          ],
          "carpark_number": "TP18",
          "update_datetime": "2019-02-13T00:48:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "72",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "TP2",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "81",
              "lot_type": "C",
              "lots_available": "49"
            }
          ],
          "carpark_number": "TPMG",
          "update_datetime": "2019-02-13T00:48:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "288",
              "lot_type": "C",
              "lots_available": "78"
            }
          ],
          "carpark_number": "TP36",
          "update_datetime": "2019-02-13T00:48:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "242",
              "lot_type": "C",
              "lots_available": "90"
            }
          ],
          "carpark_number": "TPM4",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "292",
              "lot_type": "C",
              "lots_available": "178"
            }
          ],
          "carpark_number": "TPM5",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "306",
              "lot_type": "C",
              "lots_available": "141"
            }
          ],
          "carpark_number": "TPM6",
          "update_datetime": "2019-02-13T00:48:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "235",
              "lot_type": "C",
              "lots_available": "136"
            }
          ],
          "carpark_number": "TP27",
          "update_datetime": "2019-02-13T00:48:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "600",
              "lot_type": "C",
              "lots_available": "254"
            }
          ],
          "carpark_number": "TPMN",
          "update_datetime": "2019-02-13T00:48:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "509",
              "lot_type": "C",
              "lots_available": "47"
            }
          ],
          "carpark_number": "TPMP",
          "update_datetime": "2019-02-13T00:48:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "68",
              "lot_type": "C",
              "lots_available": "14"
            }
          ],
          "carpark_number": "WDB1",
          "update_datetime": "2019-02-13T00:48:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "823",
              "lot_type": "C",
              "lots_available": "269"
            }
          ],
          "carpark_number": "Y23",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "181",
              "lot_type": "C",
              "lots_available": "63"
            }
          ],
          "carpark_number": "Y24",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "47",
              "lot_type": "C",
              "lots_available": "14"
            }
          ],
          "carpark_number": "Y56",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "404",
              "lot_type": "C",
              "lots_available": "218"
            }
          ],
          "carpark_number": "BBM1",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "27"
            }
          ],
          "carpark_number": "BBM8",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BJ10",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BJ11",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BJ12",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "17"
            }
          ],
          "carpark_number": "BJ17",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "29"
            }
          ],
          "carpark_number": "BJ18",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "669",
              "lot_type": "C",
              "lots_available": "359"
            }
          ],
          "carpark_number": "BJ28",
          "update_datetime": "2019-02-13T00:47:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "15"
            }
          ],
          "carpark_number": "BJ3",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "63"
            }
          ],
          "carpark_number": "BJ33",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "450",
              "lot_type": "C",
              "lots_available": "189"
            }
          ],
          "carpark_number": "BJ42",
          "update_datetime": "2019-02-13T00:48:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "232",
              "lot_type": "C",
              "lots_available": "159"
            }
          ],
          "carpark_number": "BJ45",
          "update_datetime": "2019-02-13T00:45:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "192",
              "lot_type": "C",
              "lots_available": "115"
            }
          ],
          "carpark_number": "CK21",
          "update_datetime": "2019-02-13T00:46:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "93",
              "lot_type": "C",
              "lots_available": "25"
            }
          ],
          "carpark_number": "U48",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "39",
              "lot_type": "C",
              "lots_available": "4"
            }
          ],
          "carpark_number": "U5",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "493",
              "lot_type": "C",
              "lots_available": "206"
            }
          ],
          "carpark_number": "JM14",
          "update_datetime": "2019-02-13T00:47:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "471",
              "lot_type": "C",
              "lots_available": "93"
            }
          ],
          "carpark_number": "JM12",
          "update_datetime": "2019-02-13T00:47:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "226",
              "lot_type": "C",
              "lots_available": "31"
            }
          ],
          "carpark_number": "W39",
          "update_datetime": "2019-02-13T00:48:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "735",
              "lot_type": "C",
              "lots_available": "147"
            }
          ],
          "carpark_number": "PL67",
          "update_datetime": "2019-02-13T00:48:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "19"
            }
          ],
          "carpark_number": "W2",
          "update_datetime": "2017-12-04T10:54:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "53"
            }
          ],
          "carpark_number": "W1",
          "update_datetime": "2017-12-04T10:54:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "400",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "U9",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "651",
              "lot_type": "C",
              "lots_available": "303"
            }
          ],
          "carpark_number": "U26",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "625",
              "lot_type": "C",
              "lots_available": "241"
            }
          ],
          "carpark_number": "U25",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "U24T",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "397",
              "lot_type": "C",
              "lots_available": "153"
            }
          ],
          "carpark_number": "U24",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "43"
            }
          ],
          "carpark_number": "U23",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "37"
            }
          ],
          "carpark_number": "U22",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "39"
            }
          ],
          "carpark_number": "U21",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "18"
            }
          ],
          "carpark_number": "U2",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "355",
              "lot_type": "C",
              "lots_available": "164"
            }
          ],
          "carpark_number": "J45",
          "update_datetime": "2019-02-13T00:44:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "127",
              "lot_type": "C",
              "lots_available": "7"
            }
          ],
          "carpark_number": "TM25",
          "update_datetime": "2019-02-13T00:47:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "126",
              "lot_type": "C",
              "lots_available": "9"
            }
          ],
          "carpark_number": "TM26",
          "update_datetime": "2019-02-13T00:47:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "237",
              "lot_type": "C",
              "lots_available": "159"
            }
          ],
          "carpark_number": "TM27",
          "update_datetime": "2019-02-13T00:47:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "266",
              "lot_type": "C",
              "lots_available": "86"
            }
          ],
          "carpark_number": "J37",
          "update_datetime": "2019-02-13T00:44:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "60",
              "lot_type": "C",
              "lots_available": "30"
            }
          ],
          "carpark_number": "BM1",
          "update_datetime": "2019-02-13T00:47:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "53",
              "lot_type": "C",
              "lots_available": "32"
            }
          ],
          "carpark_number": "BM2",
          "update_datetime": "2019-02-13T00:48:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "460",
              "lot_type": "C",
              "lots_available": "289"
            }
          ],
          "carpark_number": "BM26",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "220",
              "lot_type": "C",
              "lots_available": "132"
            }
          ],
          "carpark_number": "BWM",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "156",
              "lot_type": "C",
              "lots_available": "8"
            }
          ],
          "carpark_number": "TBMT",
          "update_datetime": "2019-02-13T00:48:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "383",
              "lot_type": "C",
              "lots_available": "312"
            }
          ],
          "carpark_number": "TPM",
          "update_datetime": "2019-02-13T00:47:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "334",
              "lot_type": "C",
              "lots_available": "241"
            }
          ],
          "carpark_number": "U29",
          "update_datetime": "2019-02-13T00:40:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "19",
              "lot_type": "C",
              "lots_available": "18"
            }
          ],
          "carpark_number": "U27",
          "update_datetime": "2019-02-13T00:40:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "300",
              "lot_type": "C",
              "lots_available": "34"
            }
          ],
          "carpark_number": "U18",
          "update_datetime": "2019-02-13T00:40:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "135",
              "lot_type": "C",
              "lots_available": "19"
            }
          ],
          "carpark_number": "U30",
          "update_datetime": "2019-02-13T00:40:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "25",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "EPML",
          "update_datetime": "2015-12-30T10:38:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "298",
              "lot_type": "C",
              "lots_available": "123"
            }
          ],
          "carpark_number": "TE25",
          "update_datetime": "2019-02-13T00:48:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "146",
              "lot_type": "C",
              "lots_available": "13"
            }
          ],
          "carpark_number": "TE3",
          "update_datetime": "2019-02-13T00:49:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "34",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "TE4",
          "update_datetime": "2019-02-13T00:50:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "23",
              "lot_type": "C",
              "lots_available": "2"
            }
          ],
          "carpark_number": "U28",
          "update_datetime": "2019-02-13T00:40:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "59",
              "lot_type": "C",
              "lots_available": "38"
            }
          ],
          "carpark_number": "A15",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "49",
              "lot_type": "C",
              "lots_available": "5"
            }
          ],
          "carpark_number": "BM28",
          "update_datetime": "2019-02-13T00:47:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "44",
              "lot_type": "C",
              "lots_available": "40"
            }
          ],
          "carpark_number": "BM30",
          "update_datetime": "2019-02-13T00:47:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "292",
              "lot_type": "C",
              "lots_available": "120"
            }
          ],
          "carpark_number": "BTM",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "494",
              "lot_type": "C",
              "lots_available": "294"
            }
          ],
          "carpark_number": "BTM2",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "334",
              "lot_type": "C",
              "lots_available": "121"
            }
          ],
          "carpark_number": "SAM2",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "251",
              "lot_type": "C",
              "lots_available": "86"
            }
          ],
          "carpark_number": "TBM2",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "242",
              "lot_type": "C",
              "lots_available": "35"
            }
          ],
          "carpark_number": "TJ34",
          "update_datetime": "2019-02-13T00:49:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "246",
              "lot_type": "C",
              "lots_available": "41"
            }
          ],
          "carpark_number": "U31",
          "update_datetime": "2019-02-13T00:40:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "399",
              "lot_type": "C",
              "lots_available": "100"
            }
          ],
          "carpark_number": "BL13",
          "update_datetime": "2019-02-13T00:47:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "246",
              "lot_type": "C",
              "lots_available": "127"
            }
          ],
          "carpark_number": "HG10",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "217"
            }
          ],
          "carpark_number": "W3",
          "update_datetime": "2018-12-20T03:59:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "227",
              "lot_type": "C",
              "lots_available": "32"
            }
          ],
          "carpark_number": "BJ65",
          "update_datetime": "2019-02-13T00:46:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "68",
              "lot_type": "C",
              "lots_available": "12"
            }
          ],
          "carpark_number": "CK19",
          "update_datetime": "2019-02-13T00:46:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "16",
              "lot_type": "C",
              "lots_available": "8"
            }
          ],
          "carpark_number": "CK4",
          "update_datetime": "2019-02-13T00:46:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "922",
              "lot_type": "C",
              "lots_available": "303"
            }
          ],
          "carpark_number": "CK42",
          "update_datetime": "2019-02-13T00:46:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "306",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "CK7",
          "update_datetime": "2019-02-13T00:46:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "108",
              "lot_type": "C",
              "lots_available": "22"
            }
          ],
          "carpark_number": "TW1",
          "update_datetime": "2019-02-13T00:46:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "355",
              "lot_type": "C",
              "lots_available": "18"
            }
          ],
          "carpark_number": "TW2",
          "update_datetime": "2019-02-13T00:46:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "338",
              "lot_type": "C",
              "lots_available": "64"
            }
          ],
          "carpark_number": "TW3",
          "update_datetime": "2019-02-13T00:46:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "353",
              "lot_type": "C",
              "lots_available": "286"
            }
          ],
          "carpark_number": "BL18M",
          "update_datetime": "2016-02-04T18:15:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "342",
              "lot_type": "C",
              "lots_available": "240"
            }
          ],
          "carpark_number": "B16",
          "update_datetime": "2019-02-13T00:49:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "383",
              "lot_type": "C",
              "lots_available": "184"
            }
          ],
          "carpark_number": "B17",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "413",
              "lot_type": "C",
              "lots_available": "161"
            }
          ],
          "carpark_number": "B20",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "120",
              "lot_type": "C",
              "lots_available": "64"
            }
          ],
          "carpark_number": "B42",
          "update_datetime": "2019-02-13T00:49:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "74",
              "lot_type": "C",
              "lots_available": "41"
            }
          ],
          "carpark_number": "B45",
          "update_datetime": "2019-02-13T00:46:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "513",
              "lot_type": "C",
              "lots_available": "478"
            }
          ],
          "carpark_number": "B6",
          "update_datetime": "2019-02-13T00:49:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "120",
              "lot_type": "C",
              "lots_available": "74"
            }
          ],
          "carpark_number": "B63",
          "update_datetime": "2019-02-13T00:49:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "43",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "B65",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "86",
              "lot_type": "C",
              "lots_available": "43"
            }
          ],
          "carpark_number": "B7",
          "update_datetime": "2019-02-13T00:48:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "39",
              "lot_type": "C",
              "lots_available": "28"
            }
          ],
          "carpark_number": "B70",
          "update_datetime": "2019-02-13T00:49:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "253",
              "lot_type": "C",
              "lots_available": "131"
            }
          ],
          "carpark_number": "B71",
          "update_datetime": "2019-02-13T00:48:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "126",
              "lot_type": "C",
              "lots_available": "105"
            }
          ],
          "carpark_number": "B7A",
          "update_datetime": "2019-02-13T00:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "105",
              "lot_type": "C",
              "lots_available": "63"
            }
          ],
          "carpark_number": "B8",
          "update_datetime": "2019-02-13T00:49:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "244",
              "lot_type": "C",
              "lots_available": "230"
            }
          ],
          "carpark_number": "B80",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "551",
              "lot_type": "C",
              "lots_available": "397"
            }
          ],
          "carpark_number": "B84",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "120",
              "lot_type": "C",
              "lots_available": "120"
            }
          ],
          "carpark_number": "B88M",
          "update_datetime": "2015-03-03T05:02:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "75",
              "lot_type": "C",
              "lots_available": "75"
            }
          ],
          "carpark_number": "B90",
          "update_datetime": "2015-03-03T05:02:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "75",
              "lot_type": "C",
              "lots_available": "75"
            }
          ],
          "carpark_number": "B90M",
          "update_datetime": "2015-03-03T05:02:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "114",
              "lot_type": "C",
              "lots_available": "40"
            }
          ],
          "carpark_number": "CC5",
          "update_datetime": "2019-02-13T00:48:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "37",
              "lot_type": "C",
              "lots_available": "25"
            }
          ],
          "carpark_number": "CC6",
          "update_datetime": "2019-02-13T00:48:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "341",
              "lot_type": "C",
              "lots_available": "87"
            }
          ],
          "carpark_number": "B30",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "414",
              "lot_type": "C",
              "lots_available": "221"
            }
          ],
          "carpark_number": "B31",
          "update_datetime": "2019-02-13T00:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "20",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "TJ28",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "458",
              "lot_type": "C",
              "lots_available": "226"
            }
          ],
          "carpark_number": "TJ31",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "384",
              "lot_type": "C",
              "lots_available": "241"
            }
          ],
          "carpark_number": "TJ37",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "842",
              "lot_type": "C",
              "lots_available": "829"
            }
          ],
          "carpark_number": "TJSF",
          "update_datetime": "2018-08-28T17:22:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "115",
              "lot_type": "C",
              "lots_available": "82"
            }
          ],
          "carpark_number": "AM16",
          "update_datetime": "2019-02-13T00:49:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "91",
              "lot_type": "C",
              "lots_available": "12"
            }
          ],
          "carpark_number": "AM32",
          "update_datetime": "2019-02-13T00:48:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "464",
              "lot_type": "C",
              "lots_available": "32"
            }
          ],
          "carpark_number": "BJ2",
          "update_datetime": "2019-02-13T00:46:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "590",
              "lot_type": "C",
              "lots_available": "334"
            }
          ],
          "carpark_number": "CK48",
          "update_datetime": "2019-02-13T00:46:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "350",
              "lot_type": "C",
              "lots_available": "210"
            }
          ],
          "carpark_number": "BE8",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "200",
              "lot_type": "C",
              "lots_available": "200"
            }
          ],
          "carpark_number": "SE11",
          "update_datetime": "2019-02-13T00:48:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "554",
              "lot_type": "C",
              "lots_available": "505"
            }
          ],
          "carpark_number": "SE20",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "29",
              "lot_type": "C",
              "lots_available": "7"
            }
          ],
          "carpark_number": "SE21",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "20",
              "lot_type": "C",
              "lots_available": "11"
            }
          ],
          "carpark_number": "SE22",
          "update_datetime": "2019-02-13T00:48:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "192",
              "lot_type": "C",
              "lots_available": "166"
            }
          ],
          "carpark_number": "SE23",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "164",
              "lot_type": "C",
              "lots_available": "158"
            }
          ],
          "carpark_number": "SE24",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "340",
              "lot_type": "C",
              "lots_available": "319"
            }
          ],
          "carpark_number": "SE53",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "19",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SM9A",
          "update_datetime": "2016-04-25T17:56:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "28",
              "lot_type": "C",
              "lots_available": "2"
            }
          ],
          "carpark_number": "SM9B",
          "update_datetime": "2016-04-25T17:56:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "88",
              "lot_type": "C",
              "lots_available": "15"
            }
          ],
          "carpark_number": "FR4M",
          "update_datetime": "2019-02-13T00:39:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "90",
              "lot_type": "C",
              "lots_available": "11"
            }
          ],
          "carpark_number": "BJ31",
          "update_datetime": "2019-02-13T00:46:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "960",
              "lot_type": "C",
              "lots_available": "48"
            }
          ],
          "carpark_number": "BJ32",
          "update_datetime": "2019-02-13T00:46:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "142",
              "lot_type": "C",
              "lots_available": "19"
            }
          ],
          "carpark_number": "BJ34",
          "update_datetime": "2019-02-13T00:46:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "144",
              "lot_type": "C",
              "lots_available": "17"
            }
          ],
          "carpark_number": "BJ35",
          "update_datetime": "2019-02-13T00:46:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "144",
              "lot_type": "C",
              "lots_available": "14"
            }
          ],
          "carpark_number": "BJ36",
          "update_datetime": "2019-02-13T00:46:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1034",
              "lot_type": "C",
              "lots_available": "578"
            }
          ],
          "carpark_number": "BJ37",
          "update_datetime": "2019-02-13T00:46:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "53",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "TP31",
          "update_datetime": "2019-02-13T00:48:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "218",
              "lot_type": "C",
              "lots_available": "61"
            }
          ],
          "carpark_number": "BJ38",
          "update_datetime": "2019-02-13T00:46:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1129",
              "lot_type": "C",
              "lots_available": "378"
            }
          ],
          "carpark_number": "BJ39",
          "update_datetime": "2019-02-13T00:46:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "589",
              "lot_type": "C",
              "lots_available": "269"
            }
          ],
          "carpark_number": "BJ40",
          "update_datetime": "2019-02-13T00:46:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "702",
              "lot_type": "C",
              "lots_available": "289"
            }
          ],
          "carpark_number": "CK38",
          "update_datetime": "2019-02-13T00:46:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "942",
              "lot_type": "C",
              "lots_available": "505"
            }
          ],
          "carpark_number": "A38",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "158",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "A43",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "694",
              "lot_type": "C",
              "lots_available": "5"
            }
          ],
          "carpark_number": "CK8",
          "update_datetime": "2019-02-13T00:46:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "376",
              "lot_type": "C",
              "lots_available": "212"
            }
          ],
          "carpark_number": "CK8A",
          "update_datetime": "2019-02-13T00:46:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1005",
              "lot_type": "C",
              "lots_available": "327"
            }
          ],
          "carpark_number": "CK39",
          "update_datetime": "2019-02-13T00:46:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "874",
              "lot_type": "C",
              "lots_available": "376"
            }
          ],
          "carpark_number": "CK41",
          "update_datetime": "2019-02-13T00:46:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "311",
              "lot_type": "C",
              "lots_available": "90"
            }
          ],
          "carpark_number": "CK46",
          "update_datetime": "2019-02-13T00:46:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "692",
              "lot_type": "C",
              "lots_available": "210"
            }
          ],
          "carpark_number": "CK47",
          "update_datetime": "2019-02-13T00:46:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "400",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SE32",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "306",
              "lot_type": "C",
              "lots_available": "13"
            }
          ],
          "carpark_number": "SE33",
          "update_datetime": "2019-02-13T00:49:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "206",
              "lot_type": "C",
              "lots_available": "122"
            }
          ],
          "carpark_number": "SE39",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1004",
              "lot_type": "C",
              "lots_available": "88"
            }
          ],
          "carpark_number": "BJ43",
          "update_datetime": "2019-02-13T00:46:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "756",
              "lot_type": "C",
              "lots_available": "330"
            }
          ],
          "carpark_number": "CK22",
          "update_datetime": "2019-02-13T00:46:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "812",
              "lot_type": "C",
              "lots_available": "407"
            }
          ],
          "carpark_number": "CK36",
          "update_datetime": "2019-02-13T00:46:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "592",
              "lot_type": "C",
              "lots_available": "67"
            }
          ],
          "carpark_number": "CK37",
          "update_datetime": "2019-02-13T00:46:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "514",
              "lot_type": "C",
              "lots_available": "268"
            }
          ],
          "carpark_number": "A25",
          "update_datetime": "2019-02-13T00:48:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "151",
              "lot_type": "C",
              "lots_available": "56"
            }
          ],
          "carpark_number": "A81",
          "update_datetime": "2019-02-13T00:48:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "215",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "A82",
          "update_datetime": "2019-02-13T00:48:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "158",
              "lot_type": "C",
              "lots_available": "59"
            }
          ],
          "carpark_number": "A9",
          "update_datetime": "2019-02-13T00:48:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "108",
              "lot_type": "C",
              "lots_available": "33"
            }
          ],
          "carpark_number": "A98",
          "update_datetime": "2019-02-13T00:49:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "873",
              "lot_type": "C",
              "lots_available": "308"
            }
          ],
          "carpark_number": "BJ55",
          "update_datetime": "2019-02-13T00:47:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "557",
              "lot_type": "C",
              "lots_available": "119"
            }
          ],
          "carpark_number": "BJ56",
          "update_datetime": "2019-02-13T00:46:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "588",
              "lot_type": "C",
              "lots_available": "134"
            }
          ],
          "carpark_number": "CK44",
          "update_datetime": "2019-02-13T00:46:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "598",
              "lot_type": "C",
              "lots_available": "178"
            }
          ],
          "carpark_number": "CK45",
          "update_datetime": "2019-02-13T00:46:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "156",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SE35",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "450",
              "lot_type": "C",
              "lots_available": "38"
            }
          ],
          "carpark_number": "SE38",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "832",
              "lot_type": "C",
              "lots_available": "664"
            }
          ],
          "carpark_number": "SE40",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1208",
              "lot_type": "C",
              "lots_available": "733"
            }
          ],
          "carpark_number": "BJ30",
          "update_datetime": "2019-02-13T00:46:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "310",
              "lot_type": "C",
              "lots_available": "14"
            }
          ],
          "carpark_number": "CK16",
          "update_datetime": "2019-02-13T00:46:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "764",
              "lot_type": "C",
              "lots_available": "409"
            }
          ],
          "carpark_number": "CK49",
          "update_datetime": "2019-02-13T00:46:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "374",
              "lot_type": "C",
              "lots_available": "7"
            }
          ],
          "carpark_number": "CK50",
          "update_datetime": "2019-02-13T00:46:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "116",
              "lot_type": "C",
              "lots_available": "16"
            }
          ],
          "carpark_number": "CKT1",
          "update_datetime": "2019-02-13T00:46:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "945",
              "lot_type": "C",
              "lots_available": "123"
            }
          ],
          "carpark_number": "CK51",
          "update_datetime": "2019-02-13T00:46:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "203",
              "lot_type": "C",
              "lots_available": "2"
            }
          ],
          "carpark_number": "CK12",
          "update_datetime": "2019-02-13T00:46:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "323",
              "lot_type": "C",
              "lots_available": "16"
            }
          ],
          "carpark_number": "CK13",
          "update_datetime": "2019-02-13T00:46:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "183",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "CK17",
          "update_datetime": "2019-02-13T00:46:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "144",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "CK30",
          "update_datetime": "2019-02-13T00:46:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "592",
              "lot_type": "C",
              "lots_available": "389"
            }
          ],
          "carpark_number": "CK31",
          "update_datetime": "2019-02-13T00:46:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "786",
              "lot_type": "C",
              "lots_available": "332"
            }
          ],
          "carpark_number": "BJ41",
          "update_datetime": "2019-02-13T00:46:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "195",
              "lot_type": "C",
              "lots_available": "16"
            }
          ],
          "carpark_number": "CK20",
          "update_datetime": "2019-02-13T00:46:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "232",
              "lot_type": "C",
              "lots_available": "17"
            }
          ],
          "carpark_number": "CK23",
          "update_datetime": "2019-02-13T00:46:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "648",
              "lot_type": "C",
              "lots_available": "260"
            }
          ],
          "carpark_number": "CK34",
          "update_datetime": "2019-02-13T00:46:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "681",
              "lot_type": "C",
              "lots_available": "269"
            }
          ],
          "carpark_number": "CKM1",
          "update_datetime": "2019-02-13T00:46:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "472",
              "lot_type": "C",
              "lots_available": "85"
            }
          ],
          "carpark_number": "BJ1",
          "update_datetime": "2019-02-13T00:46:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1995",
              "lot_type": "C",
              "lots_available": "829"
            }
          ],
          "carpark_number": "BJ48",
          "update_datetime": "2019-02-13T00:46:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "472",
              "lot_type": "C",
              "lots_available": "203"
            }
          ],
          "carpark_number": "CK33",
          "update_datetime": "2019-02-13T00:46:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "195",
              "lot_type": "C",
              "lots_available": "137"
            }
          ],
          "carpark_number": "A37",
          "update_datetime": "2019-02-13T00:49:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "262",
              "lot_type": "C",
              "lots_available": "126"
            }
          ],
          "carpark_number": "A39",
          "update_datetime": "2019-02-13T00:49:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "142",
              "lot_type": "C",
              "lots_available": "34"
            }
          ],
          "carpark_number": "A68",
          "update_datetime": "2019-02-13T00:48:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "134",
              "lot_type": "C",
              "lots_available": "91"
            }
          ],
          "carpark_number": "A70",
          "update_datetime": "2019-02-13T00:48:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "185",
              "lot_type": "C",
              "lots_available": "98"
            }
          ],
          "carpark_number": "A71",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "670",
              "lot_type": "C",
              "lots_available": "246"
            }
          ],
          "carpark_number": "CK40",
          "update_datetime": "2019-02-13T00:46:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "417",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "A40",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "151",
              "lot_type": "C",
              "lots_available": "41"
            }
          ],
          "carpark_number": "A66",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "475",
              "lot_type": "C",
              "lots_available": "319"
            }
          ],
          "carpark_number": "A69",
          "update_datetime": "2019-02-13T00:49:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "12",
              "lot_type": "C",
              "lots_available": "1"
            }
          ],
          "carpark_number": "A30",
          "update_datetime": "2019-02-13T00:49:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "205",
              "lot_type": "C",
              "lots_available": "117"
            }
          ],
          "carpark_number": "AM80",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "230",
              "lot_type": "C",
              "lots_available": "30"
            }
          ],
          "carpark_number": "AM81",
          "update_datetime": "2019-02-13T00:49:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "372",
              "lot_type": "C",
              "lots_available": "147"
            }
          ],
          "carpark_number": "CC7",
          "update_datetime": "2019-02-13T00:49:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "357",
              "lot_type": "C",
              "lots_available": "192"
            }
          ],
          "carpark_number": "B88",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "253",
              "lot_type": "C",
              "lots_available": "252"
            }
          ],
          "carpark_number": "B71M",
          "update_datetime": "2016-03-09T15:26:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "556",
              "lot_type": "C",
              "lots_available": "214"
            }
          ],
          "carpark_number": "B66",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "191",
              "lot_type": "C",
              "lots_available": "23"
            }
          ],
          "carpark_number": "B53",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "299",
              "lot_type": "C",
              "lots_available": "74"
            }
          ],
          "carpark_number": "B52",
          "update_datetime": "2019-02-13T00:49:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "285",
              "lot_type": "C",
              "lots_available": "70"
            }
          ],
          "carpark_number": "B51",
          "update_datetime": "2019-02-13T00:48:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "64",
              "lot_type": "C",
              "lots_available": "15"
            }
          ],
          "carpark_number": "B45B",
          "update_datetime": "2015-08-19T13:50:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "75",
              "lot_type": "C",
              "lots_available": "14"
            }
          ],
          "carpark_number": "B45A",
          "update_datetime": "2015-08-19T13:50:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "197",
              "lot_type": "C",
              "lots_available": "35"
            }
          ],
          "carpark_number": "B35",
          "update_datetime": "2019-02-13T00:48:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "287",
              "lot_type": "C",
              "lots_available": "287"
            }
          ],
          "carpark_number": "B34",
          "update_datetime": "2019-02-13T00:48:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "129",
              "lot_type": "C",
              "lots_available": "59"
            }
          ],
          "carpark_number": "B33",
          "update_datetime": "2019-02-13T00:49:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "114",
              "lot_type": "C",
              "lots_available": "35"
            }
          ],
          "carpark_number": "B32",
          "update_datetime": "2019-02-13T00:47:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "48",
              "lot_type": "C",
              "lots_available": "27"
            }
          ],
          "carpark_number": "KB17",
          "update_datetime": "2019-02-13T00:45:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "197",
              "lot_type": "C",
              "lots_available": "97"
            }
          ],
          "carpark_number": "KB10",
          "update_datetime": "2019-02-13T00:47:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "197",
              "lot_type": "C",
              "lots_available": "79"
            }
          ],
          "carpark_number": "KB11",
          "update_datetime": "2019-02-13T00:47:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "65",
              "lot_type": "C",
              "lots_available": "33"
            }
          ],
          "carpark_number": "SD9",
          "update_datetime": "2019-02-13T00:47:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "269",
              "lot_type": "C",
              "lots_available": "175"
            }
          ],
          "carpark_number": "W54",
          "update_datetime": "2019-02-13T00:49:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "563",
              "lot_type": "C",
              "lots_available": "552"
            }
          ],
          "carpark_number": "BE23",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "365",
              "lot_type": "C",
              "lots_available": "135"
            }
          ],
          "carpark_number": "Y52M",
          "update_datetime": "2019-02-13T00:47:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "259",
              "lot_type": "C",
              "lots_available": "112"
            }
          ],
          "carpark_number": "Y9",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "60",
              "lot_type": "C",
              "lots_available": "28"
            }
          ],
          "carpark_number": "Y20",
          "update_datetime": "2019-02-13T00:46:12"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1194",
              "lot_type": "C",
              "lots_available": "481"
            }
          ],
          "carpark_number": "Y10",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "351",
              "lot_type": "C",
              "lots_available": "85"
            }
          ],
          "carpark_number": "PM30",
          "update_datetime": "2019-02-13T00:48:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "405",
              "lot_type": "C",
              "lots_available": "173"
            }
          ],
          "carpark_number": "PM3",
          "update_datetime": "2019-02-13T00:47:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "998",
              "lot_type": "C",
              "lots_available": "664"
            }
          ],
          "carpark_number": "TWM3",
          "update_datetime": "2019-02-13T00:46:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1272",
              "lot_type": "C",
              "lots_available": "628"
            }
          ],
          "carpark_number": "CK61",
          "update_datetime": "2019-02-13T00:47:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1318",
              "lot_type": "C",
              "lots_available": "878"
            }
          ],
          "carpark_number": "CK60",
          "update_datetime": "2019-02-13T00:46:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "384",
              "lot_type": "C",
              "lots_available": "206"
            }
          ],
          "carpark_number": "SK91",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "220",
              "lot_type": "C",
              "lots_available": "40"
            }
          ],
          "carpark_number": "SK75",
          "update_datetime": "2019-02-13T00:45:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "236",
              "lot_type": "C",
              "lots_available": "112"
            }
          ],
          "carpark_number": "SK74",
          "update_datetime": "2019-02-13T00:45:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "369",
              "lot_type": "C",
              "lots_available": "110"
            }
          ],
          "carpark_number": "SK88",
          "update_datetime": "2019-02-13T00:45:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "237",
              "lot_type": "C",
              "lots_available": "69"
            }
          ],
          "carpark_number": "SK71",
          "update_datetime": "2019-02-13T00:45:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "318",
              "lot_type": "C",
              "lots_available": "177"
            }
          ],
          "carpark_number": "SK43",
          "update_datetime": "2019-02-13T00:48:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "164",
              "lot_type": "C",
              "lots_available": "26"
            }
          ],
          "carpark_number": "SK70",
          "update_datetime": "2019-02-13T00:45:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "298",
              "lot_type": "C",
              "lots_available": "167"
            }
          ],
          "carpark_number": "SK92",
          "update_datetime": "2019-02-13T00:48:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "358",
              "lot_type": "C",
              "lots_available": "57"
            }
          ],
          "carpark_number": "SK80",
          "update_datetime": "2019-02-13T00:45:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "201",
              "lot_type": "C",
              "lots_available": "68"
            }
          ],
          "carpark_number": "SK72",
          "update_datetime": "2019-02-13T00:45:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "218",
              "lot_type": "C",
              "lots_available": "85"
            }
          ],
          "carpark_number": "SK73",
          "update_datetime": "2019-02-13T00:45:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "95",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SK83",
          "update_datetime": "2019-02-13T00:45:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "264",
              "lot_type": "C",
              "lots_available": "65"
            }
          ],
          "carpark_number": "SK86",
          "update_datetime": "2019-02-13T00:48:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "268",
              "lot_type": "C",
              "lots_available": "71"
            }
          ],
          "carpark_number": "SK78",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "237",
              "lot_type": "C",
              "lots_available": "77"
            }
          ],
          "carpark_number": "SK68",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "706",
              "lot_type": "C",
              "lots_available": "335"
            }
          ],
          "carpark_number": "SK3",
          "update_datetime": "2019-02-13T00:47:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "529",
              "lot_type": "C",
              "lots_available": "256"
            }
          ],
          "carpark_number": "SK58",
          "update_datetime": "2019-02-13T00:49:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "646",
              "lot_type": "C",
              "lots_available": "372"
            }
          ],
          "carpark_number": "SK62",
          "update_datetime": "2019-02-13T00:49:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "115",
              "lot_type": "C",
              "lots_available": "29"
            }
          ],
          "carpark_number": "SK87",
          "update_datetime": "2019-02-13T00:46:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "517",
              "lot_type": "C",
              "lots_available": "233"
            }
          ],
          "carpark_number": "CK3A",
          "update_datetime": "2019-02-13T00:46:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "314",
              "lot_type": "C",
              "lots_available": "28"
            }
          ],
          "carpark_number": "CK3",
          "update_datetime": "2019-02-13T00:46:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "367",
              "lot_type": "C",
              "lots_available": "44"
            }
          ],
          "carpark_number": "CK55",
          "update_datetime": "2019-02-13T00:46:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "20",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "CK29",
          "update_datetime": "2019-02-13T00:46:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "240",
              "lot_type": "C",
              "lots_available": "68"
            }
          ],
          "carpark_number": "CK28",
          "update_datetime": "2019-02-13T00:46:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "463",
              "lot_type": "C",
              "lots_available": "327"
            }
          ],
          "carpark_number": "AM22",
          "update_datetime": "2019-02-13T00:49:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "606",
              "lot_type": "C",
              "lots_available": "404"
            }
          ],
          "carpark_number": "AM20",
          "update_datetime": "2019-02-13T00:48:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "454",
              "lot_type": "C",
              "lots_available": "152"
            }
          ],
          "carpark_number": "AM18",
          "update_datetime": "2019-02-13T00:49:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "250",
              "lot_type": "C",
              "lots_available": "114"
            }
          ],
          "carpark_number": "A20",
          "update_datetime": "2019-02-13T00:48:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "89",
              "lot_type": "C",
              "lots_available": "17"
            }
          ],
          "carpark_number": "A65",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "497",
              "lot_type": "C",
              "lots_available": "213"
            }
          ],
          "carpark_number": "A60",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "195",
              "lot_type": "C",
              "lots_available": "22"
            }
          ],
          "carpark_number": "A50",
          "update_datetime": "2019-02-13T00:48:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "130",
              "lot_type": "C",
              "lots_available": "40"
            }
          ],
          "carpark_number": "HG22",
          "update_datetime": "2019-02-13T00:48:12"
        },
        {
          "carpark_info": [
            {
              "total_lots": "178",
              "lot_type": "C",
              "lots_available": "1"
            }
          ],
          "carpark_number": "CK25",
          "update_datetime": "2019-02-13T00:46:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "38",
              "lot_type": "C",
              "lots_available": "10"
            }
          ],
          "carpark_number": "CK24",
          "update_datetime": "2019-02-13T00:46:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "242",
              "lot_type": "C",
              "lots_available": "85"
            },
            {
              "total_lots": "0",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "STAM",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "479",
              "lot_type": "C",
              "lots_available": "87"
            }
          ],
          "carpark_number": "AM79",
          "update_datetime": "2019-02-13T00:49:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "216",
              "lot_type": "C",
              "lots_available": "104"
            }
          ],
          "carpark_number": "A34",
          "update_datetime": "2019-02-13T00:49:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1292",
              "lot_type": "C",
              "lots_available": "979"
            }
          ],
          "carpark_number": "AM96",
          "update_datetime": "2019-02-13T00:49:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "89",
              "lot_type": "C",
              "lots_available": "18"
            }
          ],
          "carpark_number": "A85",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "358",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "A72",
          "update_datetime": "2019-02-13T00:49:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "605",
              "lot_type": "C",
              "lots_available": "214"
            }
          ],
          "carpark_number": "A67",
          "update_datetime": "2019-02-13T00:48:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1052",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "JMSU",
          "update_datetime": "2018-11-30T11:23:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "644",
              "lot_type": "C",
              "lots_available": "443"
            }
          ],
          "carpark_number": "JMSC",
          "update_datetime": "2018-11-30T11:26:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "355",
              "lot_type": "C",
              "lots_available": "185"
            }
          ],
          "carpark_number": "BMVM",
          "update_datetime": "2019-02-13T00:47:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "145",
              "lot_type": "C",
              "lots_available": "74"
            }
          ],
          "carpark_number": "HE3",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "51",
              "lot_type": "C",
              "lots_available": "15"
            }
          ],
          "carpark_number": "TB2",
          "update_datetime": "2019-02-13T00:47:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "357",
              "lot_type": "C",
              "lots_available": "293"
            }
          ],
          "carpark_number": "JKM",
          "update_datetime": "2019-02-13T00:47:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "42",
              "lot_type": "C",
              "lots_available": "15"
            }
          ],
          "carpark_number": "JKS",
          "update_datetime": "2019-02-13T00:47:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "755",
              "lot_type": "C",
              "lots_available": "525"
            }
          ],
          "carpark_number": "SPM",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "192",
              "lot_type": "C",
              "lots_available": "92"
            }
          ],
          "carpark_number": "FR2C",
          "update_datetime": "2019-02-13T00:39:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "424",
              "lot_type": "C",
              "lots_available": "112"
            }
          ],
          "carpark_number": "GM1A",
          "update_datetime": "2019-02-13T00:39:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "506",
              "lot_type": "C",
              "lots_available": "138"
            }
          ],
          "carpark_number": "AR5M",
          "update_datetime": "2019-02-13T00:39:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "62",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "AR9",
          "update_datetime": "2019-02-13T00:39:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "449",
              "lot_type": "C",
              "lots_available": "230"
            }
          ],
          "carpark_number": "C5",
          "update_datetime": "2019-02-13T00:39:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "320",
              "lot_type": "C",
              "lots_available": "118"
            }
          ],
          "carpark_number": "C9",
          "update_datetime": "2019-02-13T00:39:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "235",
              "lot_type": "C",
              "lots_available": "28"
            }
          ],
          "carpark_number": "U46",
          "update_datetime": "2019-02-13T00:40:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "436",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "U15",
          "update_datetime": "2019-02-13T00:40:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "130",
              "lot_type": "C",
              "lots_available": "43"
            }
          ],
          "carpark_number": "U3",
          "update_datetime": "2019-02-13T00:40:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "125",
              "lot_type": "C",
              "lots_available": "1"
            }
          ],
          "carpark_number": "U32",
          "update_datetime": "2019-02-13T00:40:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "325",
              "lot_type": "C",
              "lots_available": "269"
            }
          ],
          "carpark_number": "B75",
          "update_datetime": "2019-02-13T00:49:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "115",
              "lot_type": "C",
              "lots_available": "8"
            }
          ],
          "carpark_number": "U38",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "208",
              "lot_type": "C",
              "lots_available": "64"
            }
          ],
          "carpark_number": "U10",
          "update_datetime": "2019-02-13T00:46:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "347",
              "lot_type": "C",
              "lots_available": "170"
            }
          ],
          "carpark_number": "C8",
          "update_datetime": "2019-02-13T00:47:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "543",
              "lot_type": "C",
              "lots_available": "524"
            }
          ],
          "carpark_number": "J60M",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "578",
              "lot_type": "C",
              "lots_available": "529"
            }
          ],
          "carpark_number": "J38",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "352",
              "lot_type": "C",
              "lots_available": "106"
            }
          ],
          "carpark_number": "UBKM",
          "update_datetime": "2019-02-13T00:47:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "284",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "UBK2",
          "update_datetime": "2019-02-13T00:47:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "144",
              "lot_type": "C",
              "lots_available": "52"
            }
          ],
          "carpark_number": "UBK5",
          "update_datetime": "2019-02-13T00:45:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "76",
              "lot_type": "C",
              "lots_available": "45"
            }
          ],
          "carpark_number": "HE8",
          "update_datetime": "2016-02-15T15:12:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "300",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "U17",
          "update_datetime": "2019-02-13T00:40:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "200",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "U4",
          "update_datetime": "2019-02-13T00:40:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "511",
              "lot_type": "C",
              "lots_available": "103"
            }
          ],
          "carpark_number": "U1",
          "update_datetime": "2019-02-13T00:40:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "4",
              "lot_type": "C",
              "lots_available": "3"
            }
          ],
          "carpark_number": "TGML",
          "update_datetime": "2019-02-13T00:49:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "12",
              "lot_type": "C",
              "lots_available": "10"
            }
          ],
          "carpark_number": "BRBL",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "20",
              "lot_type": "C",
              "lots_available": "18"
            }
          ],
          "carpark_number": "BL18",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "170",
              "lot_type": "C",
              "lots_available": "128"
            }
          ],
          "carpark_number": "BRB1",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "701",
              "lot_type": "C",
              "lots_available": "109"
            }
          ],
          "carpark_number": "J61",
          "update_datetime": "2019-02-13T00:49:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "557",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "J73",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "329",
              "lot_type": "C",
              "lots_available": "141"
            }
          ],
          "carpark_number": "J74",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "245",
              "lot_type": "C",
              "lots_available": "95"
            }
          ],
          "carpark_number": "U39",
          "update_datetime": "2019-02-13T00:40:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "251",
              "lot_type": "C",
              "lots_available": "51"
            }
          ],
          "carpark_number": "U40",
          "update_datetime": "2019-02-13T00:40:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "35",
              "lot_type": "C",
              "lots_available": "3"
            }
          ],
          "carpark_number": "U41",
          "update_datetime": "2019-02-13T00:40:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "885",
              "lot_type": "C",
              "lots_available": "69"
            }
          ],
          "carpark_number": "C3M",
          "update_datetime": "2019-02-13T00:39:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "394",
              "lot_type": "C",
              "lots_available": "56"
            }
          ],
          "carpark_number": "C4M",
          "update_datetime": "2019-02-13T00:39:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "151",
              "lot_type": "C",
              "lots_available": "36"
            }
          ],
          "carpark_number": "J70",
          "update_datetime": "2019-02-13T00:47:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "300",
              "lot_type": "C",
              "lots_available": "20"
            }
          ],
          "carpark_number": "J75M",
          "update_datetime": "2019-02-13T00:47:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "490",
              "lot_type": "C",
              "lots_available": "363"
            }
          ],
          "carpark_number": "JM15",
          "update_datetime": "2019-02-13T00:47:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "559",
              "lot_type": "C",
              "lots_available": "176"
            }
          ],
          "carpark_number": "JM18",
          "update_datetime": "2019-02-13T00:47:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "545",
              "lot_type": "C",
              "lots_available": "36"
            }
          ],
          "carpark_number": "C24",
          "update_datetime": "2019-02-13T00:39:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "17",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "C27",
          "update_datetime": "2019-02-13T00:39:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "260",
              "lot_type": "C",
              "lots_available": "183"
            }
          ],
          "carpark_number": "KTM5",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "252",
              "lot_type": "C",
              "lots_available": "138"
            }
          ],
          "carpark_number": "KTM6",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "487",
              "lot_type": "C",
              "lots_available": "157"
            }
          ],
          "carpark_number": "BP2",
          "update_datetime": "2019-02-13T00:47:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1245",
              "lot_type": "C",
              "lots_available": "240"
            }
          ],
          "carpark_number": "BBM3",
          "update_datetime": "2019-02-13T00:40:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "968",
              "lot_type": "C",
              "lots_available": "357"
            }
          ],
          "carpark_number": "BBM5",
          "update_datetime": "2019-02-13T00:40:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "303",
              "lot_type": "C",
              "lots_available": "21"
            }
          ],
          "carpark_number": "U33",
          "update_datetime": "2019-02-13T00:40:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "307",
              "lot_type": "C",
              "lots_available": "21"
            }
          ],
          "carpark_number": "U34",
          "update_datetime": "2019-02-13T00:40:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "287",
              "lot_type": "C",
              "lots_available": "172"
            }
          ],
          "carpark_number": "J84M",
          "update_datetime": "2019-02-13T00:47:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "217",
              "lot_type": "C",
              "lots_available": "110"
            }
          ],
          "carpark_number": "J85M",
          "update_datetime": "2019-02-13T00:49:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "254",
              "lot_type": "C",
              "lots_available": "7"
            }
          ],
          "carpark_number": "Q84",
          "update_datetime": "2019-02-13T00:39:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "431",
              "lot_type": "C",
              "lots_available": "119"
            }
          ],
          "carpark_number": "Q87",
          "update_datetime": "2019-02-13T00:39:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "876",
              "lot_type": "C",
              "lots_available": "103"
            }
          ],
          "carpark_number": "Q89",
          "update_datetime": "2019-02-13T00:39:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "40",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BM5",
          "update_datetime": "2019-02-13T00:47:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "60",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "TB1",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "162",
              "lot_type": "C",
              "lots_available": "40"
            }
          ],
          "carpark_number": "TB3",
          "update_datetime": "2019-02-13T00:47:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "81",
              "lot_type": "C",
              "lots_available": "41"
            }
          ],
          "carpark_number": "TB9",
          "update_datetime": "2019-02-13T00:47:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "104",
              "lot_type": "C",
              "lots_available": "84"
            }
          ],
          "carpark_number": "TBC3",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "35",
              "lot_type": "C",
              "lots_available": "24"
            }
          ],
          "carpark_number": "C26",
          "update_datetime": "2019-02-13T00:39:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "144",
              "lot_type": "C",
              "lots_available": "21"
            }
          ],
          "carpark_number": "C25",
          "update_datetime": "2019-02-13T00:39:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "200",
              "lot_type": "C",
              "lots_available": "167"
            }
          ],
          "carpark_number": "C22M",
          "update_datetime": "2019-02-13T00:39:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "687",
              "lot_type": "C",
              "lots_available": "480"
            }
          ],
          "carpark_number": "JM7",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "706",
              "lot_type": "C",
              "lots_available": "165"
            }
          ],
          "carpark_number": "JM30",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "255",
              "lot_type": "C",
              "lots_available": "42"
            }
          ],
          "carpark_number": "J72",
          "update_datetime": "2019-02-13T00:49:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "222",
              "lot_type": "C",
              "lots_available": "222"
            }
          ],
          "carpark_number": "J69",
          "update_datetime": "2019-02-13T00:49:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "793",
              "lot_type": "C",
              "lots_available": "492"
            }
          ],
          "carpark_number": "JM23",
          "update_datetime": "2019-02-13T00:49:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1437",
              "lot_type": "C",
              "lots_available": "1433"
            }
          ],
          "carpark_number": "JM19",
          "update_datetime": "2019-02-13T00:49:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "U43",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "105"
            }
          ],
          "carpark_number": "U43Z",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "W21",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "W24",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "16"
            }
          ],
          "carpark_number": "M25",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "3"
            }
          ],
          "carpark_number": "M3",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "177"
            }
          ],
          "carpark_number": "M4",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "15"
            }
          ],
          "carpark_number": "MM1",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "69"
            }
          ],
          "carpark_number": "MM2",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "66"
            }
          ],
          "carpark_number": "MM4",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "UA2",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "24"
            }
          ],
          "carpark_number": "UA3",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "15"
            }
          ],
          "carpark_number": "UA5",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "208"
            }
          ],
          "carpark_number": "UAM1",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "180",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "JM31",
          "update_datetime": "2019-02-13T00:47:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1655",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BBM9",
          "update_datetime": "2019-02-13T00:40:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "384",
              "lot_type": "C",
              "lots_available": "210"
            }
          ],
          "carpark_number": "C21M",
          "update_datetime": "2019-02-13T00:39:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "661",
              "lot_type": "C",
              "lots_available": "1"
            }
          ],
          "carpark_number": "U13",
          "update_datetime": "2019-02-13T00:40:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "290",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "C13M",
          "update_datetime": "2019-02-13T00:39:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "316",
              "lot_type": "C",
              "lots_available": "64"
            }
          ],
          "carpark_number": "C12",
          "update_datetime": "2019-02-13T00:39:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "211",
              "lot_type": "C",
              "lots_available": "75"
            }
          ],
          "carpark_number": "C14M",
          "update_datetime": "2019-02-13T00:39:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "752",
              "lot_type": "C",
              "lots_available": "160"
            }
          ],
          "carpark_number": "C10",
          "update_datetime": "2019-02-13T00:39:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "234",
              "lot_type": "C",
              "lots_available": "110"
            }
          ],
          "carpark_number": "BL10",
          "update_datetime": "2019-02-13T00:49:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "371",
              "lot_type": "C",
              "lots_available": "245"
            }
          ],
          "carpark_number": "BL19",
          "update_datetime": "2019-02-13T00:49:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "196",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BL3",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "462",
              "lot_type": "C",
              "lots_available": "90"
            }
          ],
          "carpark_number": "J50",
          "update_datetime": "2019-02-13T00:48:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "10",
              "lot_type": "C",
              "lots_available": "7"
            }
          ],
          "carpark_number": "J60L",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "425",
              "lot_type": "C",
              "lots_available": "209"
            }
          ],
          "carpark_number": "J62",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "222",
              "lot_type": "C",
              "lots_available": "101"
            }
          ],
          "carpark_number": "J62M",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "153",
              "lot_type": "C",
              "lots_available": "41"
            }
          ],
          "carpark_number": "J63",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "975",
              "lot_type": "C",
              "lots_available": "360"
            }
          ],
          "carpark_number": "J65",
          "update_datetime": "2019-02-13T00:48:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "481",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "J71",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "377",
              "lot_type": "C",
              "lots_available": "234"
            }
          ],
          "carpark_number": "J76M",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "191",
              "lot_type": "C",
              "lots_available": "96"
            }
          ],
          "carpark_number": "J77M",
          "update_datetime": "2019-02-13T00:49:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "484",
              "lot_type": "C",
              "lots_available": "225"
            }
          ],
          "carpark_number": "J78M",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "470",
              "lot_type": "C",
              "lots_available": "315"
            }
          ],
          "carpark_number": "J79M",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "449",
              "lot_type": "C",
              "lots_available": "252"
            }
          ],
          "carpark_number": "J80M",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "431",
              "lot_type": "C",
              "lots_available": "165"
            }
          ],
          "carpark_number": "J81M",
          "update_datetime": "2019-02-13T00:48:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "535",
              "lot_type": "C",
              "lots_available": "166"
            }
          ],
          "carpark_number": "J82M",
          "update_datetime": "2019-02-13T00:47:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "163",
              "lot_type": "C",
              "lots_available": "86"
            }
          ],
          "carpark_number": "J83M",
          "update_datetime": "2019-02-13T00:47:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "194",
              "lot_type": "C",
              "lots_available": "10"
            }
          ],
          "carpark_number": "J86M",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "603",
              "lot_type": "C",
              "lots_available": "444"
            }
          ],
          "carpark_number": "J88M",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "591",
              "lot_type": "C",
              "lots_available": "437"
            }
          ],
          "carpark_number": "J89M",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "384",
              "lot_type": "C",
              "lots_available": "64"
            }
          ],
          "carpark_number": "J98M",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "504",
              "lot_type": "C",
              "lots_available": "362"
            }
          ],
          "carpark_number": "J99M",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "420",
              "lot_type": "C",
              "lots_available": "122"
            }
          ],
          "carpark_number": "JM10",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1044",
              "lot_type": "C",
              "lots_available": "874"
            }
          ],
          "carpark_number": "JM13",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "532",
              "lot_type": "C",
              "lots_available": "349"
            }
          ],
          "carpark_number": "JM22",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "491",
              "lot_type": "C",
              "lots_available": "341"
            }
          ],
          "carpark_number": "JM25",
          "update_datetime": "2019-02-13T00:48:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "646",
              "lot_type": "C",
              "lots_available": "226"
            }
          ],
          "carpark_number": "JM28",
          "update_datetime": "2019-02-13T00:48:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "641",
              "lot_type": "C",
              "lots_available": "146"
            }
          ],
          "carpark_number": "JM29",
          "update_datetime": "2019-02-13T00:48:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "360",
              "lot_type": "C",
              "lots_available": "303"
            }
          ],
          "carpark_number": "TBM3",
          "update_datetime": "2019-02-13T00:48:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "509",
              "lot_type": "C",
              "lots_available": "134"
            }
          ],
          "carpark_number": "TBM4",
          "update_datetime": "2019-02-13T00:47:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "4443",
              "lot_type": "C",
              "lots_available": "1910"
            }
          ],
          "carpark_number": "BJ49",
          "update_datetime": "2019-02-13T00:46:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "662",
              "lot_type": "C",
              "lots_available": "238"
            }
          ],
          "carpark_number": "Y11",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "697",
              "lot_type": "C",
              "lots_available": "161"
            }
          ],
          "carpark_number": "Y8",
          "update_datetime": "2019-02-13T00:47:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "248",
              "lot_type": "C",
              "lots_available": "68"
            }
          ],
          "carpark_number": "Y13",
          "update_datetime": "2019-02-13T00:47:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "403",
              "lot_type": "C",
              "lots_available": "84"
            }
          ],
          "carpark_number": "Y3",
          "update_datetime": "2019-02-13T00:48:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "175",
              "lot_type": "C",
              "lots_available": "43"
            }
          ],
          "carpark_number": "Y3M",
          "update_datetime": "2019-02-13T00:48:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "191",
              "lot_type": "C",
              "lots_available": "36"
            }
          ],
          "carpark_number": "Y39",
          "update_datetime": "2019-02-13T00:48:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "31",
              "lot_type": "C",
              "lots_available": "1"
            }
          ],
          "carpark_number": "MPS",
          "update_datetime": "2019-02-13T00:48:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "491",
              "lot_type": "C",
              "lots_available": "150"
            }
          ],
          "carpark_number": "Y48",
          "update_datetime": "2019-02-13T00:47:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "293",
              "lot_type": "C",
              "lots_available": "219"
            }
          ],
          "carpark_number": "Y48M",
          "update_datetime": "2019-02-13T00:47:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "331",
              "lot_type": "C",
              "lots_available": "129"
            }
          ],
          "carpark_number": "Y15",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "810",
              "lot_type": "C",
              "lots_available": "255"
            }
          ],
          "carpark_number": "Y4",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "286",
              "lot_type": "C",
              "lots_available": "82"
            }
          ],
          "carpark_number": "Y27",
          "update_datetime": "2019-02-13T00:48:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "566",
              "lot_type": "C",
              "lots_available": "126"
            }
          ],
          "carpark_number": "Y49",
          "update_datetime": "2019-02-13T00:47:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "358",
              "lot_type": "C",
              "lots_available": "165"
            }
          ],
          "carpark_number": "Y21M",
          "update_datetime": "2019-02-13T00:47:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "285",
              "lot_type": "C",
              "lots_available": "77"
            }
          ],
          "carpark_number": "Y28",
          "update_datetime": "2019-02-13T00:48:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "306",
              "lot_type": "C",
              "lots_available": "201"
            }
          ],
          "carpark_number": "Y28M",
          "update_datetime": "2019-02-13T00:48:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "102",
              "lot_type": "C",
              "lots_available": "26"
            }
          ],
          "carpark_number": "Y33",
          "update_datetime": "2019-02-13T00:47:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "279",
              "lot_type": "C",
              "lots_available": "165"
            }
          ],
          "carpark_number": "Y49M",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "27",
              "lot_type": "C",
              "lots_available": "9"
            }
          ],
          "carpark_number": "Y49L",
          "update_datetime": "2019-02-13T00:48:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "3",
              "lot_type": "C",
              "lots_available": "28"
            }
          ],
          "carpark_number": "Y49HV",
          "update_datetime": "2016-02-15T21:52:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "647",
              "lot_type": "C",
              "lots_available": "181"
            }
          ],
          "carpark_number": "Y7",
          "update_datetime": "2019-02-13T00:48:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "21",
              "lot_type": "C",
              "lots_available": "7"
            }
          ],
          "carpark_number": "Y57",
          "update_datetime": "2019-02-13T00:48:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "46",
              "lot_type": "C",
              "lots_available": "25"
            }
          ],
          "carpark_number": "Y21",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "389",
              "lot_type": "C",
              "lots_available": "197"
            }
          ],
          "carpark_number": "SB19",
          "update_datetime": "2019-02-13T00:47:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "387",
              "lot_type": "C",
              "lots_available": "194"
            }
          ],
          "carpark_number": "SB24",
          "update_datetime": "2019-02-13T00:47:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "4",
              "lot_type": "C",
              "lots_available": "2"
            }
          ],
          "carpark_number": "S19L",
          "update_datetime": "2019-02-13T00:47:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "2",
              "lot_type": "C",
              "lots_available": "1"
            }
          ],
          "carpark_number": "S24L",
          "update_datetime": "2019-02-13T00:47:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "310",
              "lot_type": "C",
              "lots_available": "166"
            }
          ],
          "carpark_number": "SB2",
          "update_datetime": "2019-02-13T00:49:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "593",
              "lot_type": "C",
              "lots_available": "364"
            }
          ],
          "carpark_number": "SB16",
          "update_datetime": "2019-02-13T00:47:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "416",
              "lot_type": "C",
              "lots_available": "254"
            }
          ],
          "carpark_number": "SB26",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "395",
              "lot_type": "C",
              "lots_available": "253"
            }
          ],
          "carpark_number": "SB27",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "498",
              "lot_type": "C",
              "lots_available": "315"
            }
          ],
          "carpark_number": "SB28",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "8",
              "lot_type": "C",
              "lots_available": "8"
            }
          ],
          "carpark_number": "SB28L",
          "update_datetime": "2016-02-25T22:52:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "363",
              "lot_type": "C",
              "lots_available": "169"
            }
          ],
          "carpark_number": "SB3",
          "update_datetime": "2019-02-13T00:47:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1529",
              "lot_type": "C",
              "lots_available": "1118"
            }
          ],
          "carpark_number": "SB15",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "15",
              "lot_type": "C",
              "lots_available": "11"
            }
          ],
          "carpark_number": "S15L",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "270",
              "lot_type": "C",
              "lots_available": "138"
            }
          ],
          "carpark_number": "SB4",
          "update_datetime": "2019-02-13T00:48:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "350",
              "lot_type": "C",
              "lots_available": "194"
            }
          ],
          "carpark_number": "SB5",
          "update_datetime": "2019-02-13T00:47:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "644",
              "lot_type": "C",
              "lots_available": "364"
            }
          ],
          "carpark_number": "SB18",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "802",
              "lot_type": "C",
              "lots_available": "537"
            }
          ],
          "carpark_number": "SB21",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "512",
              "lot_type": "C",
              "lots_available": "337"
            }
          ],
          "carpark_number": "SB29",
          "update_datetime": "2019-02-13T00:47:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "415",
              "lot_type": "C",
              "lots_available": "237"
            }
          ],
          "carpark_number": "SB30",
          "update_datetime": "2019-02-13T00:55:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "190",
              "lot_type": "C",
              "lots_available": "83"
            }
          ],
          "carpark_number": "SB31",
          "update_datetime": "2019-02-13T00:55:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "552",
              "lot_type": "C",
              "lots_available": "286"
            }
          ],
          "carpark_number": "SB23",
          "update_datetime": "2019-02-13T00:47:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "530",
              "lot_type": "C",
              "lots_available": "263"
            }
          ],
          "carpark_number": "SB22",
          "update_datetime": "2019-02-13T00:47:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "61",
              "lot_type": "C",
              "lots_available": "17"
            }
          ],
          "carpark_number": "SB34",
          "update_datetime": "2019-02-13T00:47:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "333",
              "lot_type": "C",
              "lots_available": "208"
            }
          ],
          "carpark_number": "SK36",
          "update_datetime": "2019-02-13T00:48:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "538",
              "lot_type": "C",
              "lots_available": "386"
            }
          ],
          "carpark_number": "SK37",
          "update_datetime": "2019-02-13T00:48:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "465",
              "lot_type": "C",
              "lots_available": "301"
            }
          ],
          "carpark_number": "SK42",
          "update_datetime": "2019-02-13T00:48:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "672",
              "lot_type": "C",
              "lots_available": "388"
            }
          ],
          "carpark_number": "SK23",
          "update_datetime": "2019-02-13T00:45:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "394",
              "lot_type": "C",
              "lots_available": "167"
            }
          ],
          "carpark_number": "SK10",
          "update_datetime": "2019-02-13T00:45:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "326",
              "lot_type": "C",
              "lots_available": "174"
            }
          ],
          "carpark_number": "SK19",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "283",
              "lot_type": "C",
              "lots_available": "134"
            }
          ],
          "carpark_number": "SK20",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "362",
              "lot_type": "C",
              "lots_available": "144"
            }
          ],
          "carpark_number": "SK11",
          "update_datetime": "2019-02-13T00:47:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "556",
              "lot_type": "C",
              "lots_available": "380"
            }
          ],
          "carpark_number": "SK45",
          "update_datetime": "2019-02-13T00:45:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "593",
              "lot_type": "C",
              "lots_available": "339"
            }
          ],
          "carpark_number": "SK4",
          "update_datetime": "2019-02-13T00:46:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "414",
              "lot_type": "C",
              "lots_available": "146"
            }
          ],
          "carpark_number": "SK77",
          "update_datetime": "2019-02-13T00:48:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "429",
              "lot_type": "C",
              "lots_available": "291"
            }
          ],
          "carpark_number": "SK16",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "494",
              "lot_type": "C",
              "lots_available": "231"
            }
          ],
          "carpark_number": "SK63",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "539",
              "lot_type": "C",
              "lots_available": "335"
            }
          ],
          "carpark_number": "SK7",
          "update_datetime": "2019-02-13T00:47:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "38",
              "lot_type": "C",
              "lots_available": "21"
            }
          ],
          "carpark_number": "MR4",
          "update_datetime": "2019-02-13T00:45:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "156",
              "lot_type": "C",
              "lots_available": "48"
            }
          ],
          "carpark_number": "CR7",
          "update_datetime": "2019-02-13T00:47:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "409",
              "lot_type": "C",
              "lots_available": "230"
            }
          ],
          "carpark_number": "KB4",
          "update_datetime": "2019-02-13T00:47:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "281",
              "lot_type": "C",
              "lots_available": "145"
            }
          ],
          "carpark_number": "JRM",
          "update_datetime": "2019-02-13T00:46:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "66",
              "lot_type": "C",
              "lots_available": "23"
            }
          ],
          "carpark_number": "SD5",
          "update_datetime": "2019-02-13T00:47:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "178",
              "lot_type": "C",
              "lots_available": "60"
            }
          ],
          "carpark_number": "KB12",
          "update_datetime": "2019-02-13T00:46:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "52",
              "lot_type": "C",
              "lots_available": "4"
            }
          ],
          "carpark_number": "UBK4",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "28",
              "lot_type": "C",
              "lots_available": "11"
            }
          ],
          "carpark_number": "SD2",
          "update_datetime": "2019-02-13T00:47:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "144",
              "lot_type": "C",
              "lots_available": "75"
            }
          ],
          "carpark_number": "SDM2",
          "update_datetime": "2019-02-13T00:47:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "38",
              "lot_type": "C",
              "lots_available": "94"
            }
          ],
          "carpark_number": "MR567",
          "update_datetime": "2016-02-15T21:52:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "197",
              "lot_type": "C",
              "lots_available": "91"
            }
          ],
          "carpark_number": "SG3",
          "update_datetime": "2019-02-13T00:47:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "402",
              "lot_type": "C",
              "lots_available": "280"
            }
          ],
          "carpark_number": "NBRM",
          "update_datetime": "2019-02-13T00:47:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "108",
              "lot_type": "C",
              "lots_available": "44"
            }
          ],
          "carpark_number": "SG2",
          "update_datetime": "2019-02-13T00:45:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "192",
              "lot_type": "C",
              "lots_available": "180"
            }
          ],
          "carpark_number": "SDM",
          "update_datetime": "2019-02-13T00:45:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "100",
              "lot_type": "C",
              "lots_available": "47"
            }
          ],
          "carpark_number": "SD3",
          "update_datetime": "2019-02-13T00:45:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "49",
              "lot_type": "C",
              "lots_available": "9"
            }
          ],
          "carpark_number": "W107",
          "update_datetime": "2019-02-13T00:47:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "285",
              "lot_type": "C",
              "lots_available": "189"
            }
          ],
          "carpark_number": "W30",
          "update_datetime": "2019-02-13T00:47:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "10",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "W28",
          "update_datetime": "2019-02-13T00:47:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "314",
              "lot_type": "C",
              "lots_available": "116"
            }
          ],
          "carpark_number": "W44",
          "update_datetime": "2019-02-13T00:49:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "308",
              "lot_type": "C",
              "lots_available": "169"
            }
          ],
          "carpark_number": "W45",
          "update_datetime": "2019-02-13T00:47:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "121",
              "lot_type": "C",
              "lots_available": "73"
            }
          ],
          "carpark_number": "W7",
          "update_datetime": "2019-02-13T00:46:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "339",
              "lot_type": "C",
              "lots_available": "152"
            }
          ],
          "carpark_number": "W19",
          "update_datetime": "2019-02-13T00:47:12"
        },
        {
          "carpark_info": [
            {
              "total_lots": "350",
              "lot_type": "C",
              "lots_available": "208"
            }
          ],
          "carpark_number": "W780",
          "update_datetime": "2019-02-13T00:46:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "486",
              "lot_type": "C",
              "lots_available": "361"
            }
          ],
          "carpark_number": "W101",
          "update_datetime": "2019-02-13T00:45:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "283",
              "lot_type": "C",
              "lots_available": "80"
            }
          ],
          "carpark_number": "W13",
          "update_datetime": "2019-02-13T00:47:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "298",
              "lot_type": "C",
              "lots_available": "202"
            }
          ],
          "carpark_number": "W48",
          "update_datetime": "2019-02-13T00:45:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "451",
              "lot_type": "C",
              "lots_available": "280"
            }
          ],
          "carpark_number": "W102",
          "update_datetime": "2019-02-13T00:47:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "50",
              "lot_type": "C",
              "lots_available": "14"
            }
          ],
          "carpark_number": "W37",
          "update_datetime": "2019-02-13T00:45:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "285",
              "lot_type": "C",
              "lots_available": "192"
            }
          ],
          "carpark_number": "W52",
          "update_datetime": "2019-02-13T00:45:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "352",
              "lot_type": "C",
              "lots_available": "259"
            }
          ],
          "carpark_number": "W64",
          "update_datetime": "2019-02-13T00:47:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "411",
              "lot_type": "C",
              "lots_available": "175"
            }
          ],
          "carpark_number": "W17",
          "update_datetime": "2019-02-13T00:46:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "533",
              "lot_type": "C",
              "lots_available": "11"
            }
          ],
          "carpark_number": "W18",
          "update_datetime": "2019-02-13T00:45:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "382",
              "lot_type": "C",
              "lots_available": "222"
            }
          ],
          "carpark_number": "W58",
          "update_datetime": "2019-02-13T00:44:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "210",
              "lot_type": "C",
              "lots_available": "38"
            }
          ],
          "carpark_number": "W5",
          "update_datetime": "2019-02-13T00:46:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "217",
              "lot_type": "C",
              "lots_available": "140"
            }
          ],
          "carpark_number": "W5M",
          "update_datetime": "2019-02-13T00:46:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "550",
              "lot_type": "C",
              "lots_available": "160"
            }
          ],
          "carpark_number": "W23",
          "update_datetime": "2019-02-13T00:47:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "304",
              "lot_type": "C",
              "lots_available": "137"
            }
          ],
          "carpark_number": "W40",
          "update_datetime": "2019-02-13T00:47:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "275",
              "lot_type": "C",
              "lots_available": "195"
            }
          ],
          "carpark_number": "W49",
          "update_datetime": "2019-02-13T00:47:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "254",
              "lot_type": "C",
              "lots_available": "176"
            }
          ],
          "carpark_number": "W50",
          "update_datetime": "2019-02-13T00:47:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "304",
              "lot_type": "C",
              "lots_available": "219"
            }
          ],
          "carpark_number": "W51",
          "update_datetime": "2019-02-13T00:47:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "539",
              "lot_type": "C",
              "lots_available": "299"
            }
          ],
          "carpark_number": "W36",
          "update_datetime": "2019-02-13T00:46:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "116",
              "lot_type": "C",
              "lots_available": "64"
            }
          ],
          "carpark_number": "W10",
          "update_datetime": "2019-02-13T00:47:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "55",
              "lot_type": "C",
              "lots_available": "4"
            }
          ],
          "carpark_number": "W6",
          "update_datetime": "2019-02-13T00:46:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "275",
              "lot_type": "C",
              "lots_available": "120"
            }
          ],
          "carpark_number": "W181",
          "update_datetime": "2019-02-13T00:45:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "330",
              "lot_type": "C",
              "lots_available": "149"
            }
          ],
          "carpark_number": "W14",
          "update_datetime": "2019-02-13T00:46:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "435",
              "lot_type": "C",
              "lots_available": "178"
            }
          ],
          "carpark_number": "PM6",
          "update_datetime": "2019-02-13T00:47:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "407",
              "lot_type": "C",
              "lots_available": "125"
            }
          ],
          "carpark_number": "PM17",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "443",
              "lot_type": "C",
              "lots_available": "198"
            }
          ],
          "carpark_number": "PM14",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "415",
              "lot_type": "C",
              "lots_available": "181"
            }
          ],
          "carpark_number": "PM29",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "256",
              "lot_type": "C",
              "lots_available": "99"
            }
          ],
          "carpark_number": "PM16",
          "update_datetime": "2019-02-13T00:48:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "254",
              "lot_type": "C",
              "lots_available": "75"
            }
          ],
          "carpark_number": "PM18",
          "update_datetime": "2019-02-13T00:47:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "225",
              "lot_type": "C",
              "lots_available": "65"
            }
          ],
          "carpark_number": "PM11",
          "update_datetime": "2019-02-13T00:47:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "248",
              "lot_type": "C",
              "lots_available": "106"
            }
          ],
          "carpark_number": "PM7",
          "update_datetime": "2019-02-13T00:47:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "441",
              "lot_type": "C",
              "lots_available": "102"
            }
          ],
          "carpark_number": "PM13",
          "update_datetime": "2019-02-13T00:47:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "521",
              "lot_type": "C",
              "lots_available": "144"
            }
          ],
          "carpark_number": "PM45",
          "update_datetime": "2019-02-13T00:47:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "367",
              "lot_type": "C",
              "lots_available": "99"
            }
          ],
          "carpark_number": "PM41",
          "update_datetime": "2019-02-13T00:39:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "290",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PR1",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "441",
              "lot_type": "C",
              "lots_available": "312"
            }
          ],
          "carpark_number": "PM19",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "2",
              "lot_type": "C",
              "lots_available": "6"
            }
          ],
          "carpark_number": "P40L1",
          "update_datetime": "2016-02-15T21:52:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "3",
              "lot_type": "C",
              "lots_available": "6"
            }
          ],
          "carpark_number": "P40L2",
          "update_datetime": "2016-02-15T21:52:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "263",
              "lot_type": "C",
              "lots_available": "48"
            }
          ],
          "carpark_number": "PM40",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "293",
              "lot_type": "C",
              "lots_available": "129"
            }
          ],
          "carpark_number": "PM37",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "379",
              "lot_type": "C",
              "lots_available": "95"
            }
          ],
          "carpark_number": "PM36",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "473",
              "lot_type": "C",
              "lots_available": "256"
            }
          ],
          "carpark_number": "SK93",
          "update_datetime": "2019-02-13T00:45:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "360",
              "lot_type": "C",
              "lots_available": "209"
            }
          ],
          "carpark_number": "SK2",
          "update_datetime": "2019-02-13T00:47:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "865",
              "lot_type": "C",
              "lots_available": "286"
            }
          ],
          "carpark_number": "SK60",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "681",
              "lot_type": "C",
              "lots_available": "416"
            }
          ],
          "carpark_number": "SK15",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "677",
              "lot_type": "C",
              "lots_available": "492"
            }
          ],
          "carpark_number": "SK17",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "354",
              "lot_type": "C",
              "lots_available": "161"
            }
          ],
          "carpark_number": "SK12",
          "update_datetime": "2019-02-13T00:45:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "28",
              "lot_type": "C",
              "lots_available": "8"
            }
          ],
          "carpark_number": "W4",
          "update_datetime": "2019-02-13T00:47:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "507",
              "lot_type": "C",
              "lots_available": "258"
            }
          ],
          "carpark_number": "SK22",
          "update_datetime": "2019-02-13T00:46:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "653",
              "lot_type": "C",
              "lots_available": "368"
            }
          ],
          "carpark_number": "SK21",
          "update_datetime": "2019-02-13T00:45:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "355",
              "lot_type": "C",
              "lots_available": "100"
            }
          ],
          "carpark_number": "SK13",
          "update_datetime": "2019-02-13T00:45:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "473",
              "lot_type": "C",
              "lots_available": "312"
            }
          ],
          "carpark_number": "SK6",
          "update_datetime": "2019-02-13T00:46:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "2064",
              "lot_type": "C",
              "lots_available": "1243"
            }
          ],
          "carpark_number": "CK52",
          "update_datetime": "2019-02-13T00:46:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "312",
              "lot_type": "C",
              "lots_available": "127"
            }
          ],
          "carpark_number": "P1",
          "update_datetime": "2019-02-13T00:47:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "290",
              "lot_type": "C",
              "lots_available": "110"
            }
          ],
          "carpark_number": "P2",
          "update_datetime": "2019-02-13T00:47:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "652",
              "lot_type": "C",
              "lots_available": "239"
            }
          ],
          "carpark_number": "P3",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "410",
              "lot_type": "C",
              "lots_available": "407"
            }
          ],
          "carpark_number": "P4",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "507",
              "lot_type": "C",
              "lots_available": "175"
            }
          ],
          "carpark_number": "P5",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "4",
              "lot_type": "C",
              "lots_available": "2"
            }
          ],
          "carpark_number": "P5L",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "534",
              "lot_type": "C",
              "lots_available": "197"
            }
          ],
          "carpark_number": "P6",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "6",
              "lot_type": "C",
              "lots_available": "4"
            }
          ],
          "carpark_number": "P6L",
          "update_datetime": "2019-02-13T00:48:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "537",
              "lot_type": "C",
              "lots_available": "436"
            }
          ],
          "carpark_number": "P6M",
          "update_datetime": "2015-10-23T13:21:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "734",
              "lot_type": "C",
              "lots_available": "425"
            }
          ],
          "carpark_number": "PL14",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "277",
              "lot_type": "C",
              "lots_available": "62"
            }
          ],
          "carpark_number": "PL15",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "275",
              "lot_type": "C",
              "lots_available": "71"
            }
          ],
          "carpark_number": "PL25",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "302",
              "lot_type": "C",
              "lots_available": "58"
            }
          ],
          "carpark_number": "PL29",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "204",
              "lot_type": "C",
              "lots_available": "30"
            }
          ],
          "carpark_number": "PL30",
          "update_datetime": "2019-02-13T00:48:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "220",
              "lot_type": "C",
              "lots_available": "56"
            }
          ],
          "carpark_number": "PL31",
          "update_datetime": "2019-02-13T00:48:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "201",
              "lot_type": "C",
              "lots_available": "49"
            }
          ],
          "carpark_number": "PL32",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "58",
              "lot_type": "C",
              "lots_available": "1"
            }
          ],
          "carpark_number": "PL33",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "423",
              "lot_type": "C",
              "lots_available": "69"
            }
          ],
          "carpark_number": "PL39",
          "update_datetime": "2019-02-13T00:48:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "242",
              "lot_type": "C",
              "lots_available": "53"
            }
          ],
          "carpark_number": "PL40",
          "update_datetime": "2019-02-13T00:48:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "448",
              "lot_type": "C",
              "lots_available": "78"
            }
          ],
          "carpark_number": "PL41",
          "update_datetime": "2019-02-13T00:48:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "602",
              "lot_type": "C",
              "lots_available": "85"
            }
          ],
          "carpark_number": "PL42",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "39",
              "lot_type": "C",
              "lots_available": "7"
            }
          ],
          "carpark_number": "PL44",
          "update_datetime": "2019-02-13T00:48:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "340",
              "lot_type": "C",
              "lots_available": "59"
            }
          ],
          "carpark_number": "PL45",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "426",
              "lot_type": "C",
              "lots_available": "37"
            }
          ],
          "carpark_number": "PL46",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "458",
              "lot_type": "C",
              "lots_available": "58"
            }
          ],
          "carpark_number": "PL48",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "175",
              "lot_type": "C",
              "lots_available": "52"
            }
          ],
          "carpark_number": "J10",
          "update_datetime": "2019-02-13T00:44:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "129",
              "lot_type": "C",
              "lots_available": "46"
            }
          ],
          "carpark_number": "J11",
          "update_datetime": "2019-02-13T00:44:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1433",
              "lot_type": "C",
              "lots_available": "995"
            }
          ],
          "carpark_number": "CK32",
          "update_datetime": "2019-02-13T00:46:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "553",
              "lot_type": "C",
              "lots_available": "298"
            }
          ],
          "carpark_number": "BJ51",
          "update_datetime": "2019-02-13T00:46:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "588",
              "lot_type": "C",
              "lots_available": "172"
            }
          ],
          "carpark_number": "BJ52",
          "update_datetime": "2019-02-13T00:46:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "407",
              "lot_type": "C",
              "lots_available": "226"
            }
          ],
          "carpark_number": "SK25",
          "update_datetime": "2019-02-13T00:45:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "430",
              "lot_type": "C",
              "lots_available": "278"
            }
          ],
          "carpark_number": "SK26",
          "update_datetime": "2019-02-13T00:45:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1074",
              "lot_type": "C",
              "lots_available": "586"
            }
          ],
          "carpark_number": "SK32",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1074",
              "lot_type": "C",
              "lots_available": "586"
            }
          ],
          "carpark_number": "SK33",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "826",
              "lot_type": "C",
              "lots_available": "404"
            }
          ],
          "carpark_number": "HG11",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "389",
              "lot_type": "C",
              "lots_available": "102"
            }
          ],
          "carpark_number": "PL68",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "699",
              "lot_type": "C",
              "lots_available": "120"
            }
          ],
          "carpark_number": "PL69",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "496",
              "lot_type": "C",
              "lots_available": "0"
            },
            {
              "total_lots": "162",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "MLM",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "55",
              "lot_type": "C",
              "lots_available": "32"
            }
          ],
          "carpark_number": "CR2",
          "update_datetime": "2019-02-13T00:45:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "28",
              "lot_type": "C",
              "lots_available": "4"
            }
          ],
          "carpark_number": "CR3",
          "update_datetime": "2019-02-13T00:45:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "483",
              "lot_type": "C",
              "lots_available": "273"
            }
          ],
          "carpark_number": "W57",
          "update_datetime": "2019-02-13T00:45:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "58",
              "lot_type": "C",
              "lots_available": "12"
            }
          ],
          "carpark_number": "BE36",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "26",
              "lot_type": "C",
              "lots_available": "9"
            }
          ],
          "carpark_number": "BE37",
          "update_datetime": "2019-02-13T00:48:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "407",
              "lot_type": "C",
              "lots_available": "336"
            }
          ],
          "carpark_number": "BE38",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "835",
              "lot_type": "C",
              "lots_available": "463"
            }
          ],
          "carpark_number": "BE42",
          "update_datetime": "2019-02-13T00:48:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "122",
              "lot_type": "C",
              "lots_available": "4"
            }
          ],
          "carpark_number": "BE7",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "289",
              "lot_type": "C",
              "lots_available": "62"
            }
          ],
          "carpark_number": "SE13",
          "update_datetime": "2019-02-13T00:48:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "673",
              "lot_type": "C",
              "lots_available": "230"
            }
          ],
          "carpark_number": "SE16",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "138",
              "lot_type": "C",
              "lots_available": "80"
            }
          ],
          "carpark_number": "SM1",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "138",
              "lot_type": "C",
              "lots_available": "68"
            }
          ],
          "carpark_number": "SM3",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "33",
              "lot_type": "C",
              "lots_available": "13"
            }
          ],
          "carpark_number": "JB3",
          "update_datetime": "2019-02-13T00:47:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "147",
              "lot_type": "C",
              "lots_available": "102"
            }
          ],
          "carpark_number": "JB4",
          "update_datetime": "2019-02-13T00:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "95",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "K2",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "74",
              "lot_type": "C",
              "lots_available": "73"
            }
          ],
          "carpark_number": "K2T",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "547",
              "lot_type": "C",
              "lots_available": "489"
            }
          ],
          "carpark_number": "KM2",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "530",
              "lot_type": "C",
              "lots_available": "285"
            }
          ],
          "carpark_number": "KM3",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "269",
              "lot_type": "C",
              "lots_available": "155"
            }
          ],
          "carpark_number": "TRS",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "285",
              "lot_type": "C",
              "lots_available": "254"
            }
          ],
          "carpark_number": "ACM",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "776",
              "lot_type": "C",
              "lots_available": "410"
            }
          ],
          "carpark_number": "GE1A",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "50",
              "lot_type": "C",
              "lots_available": "10"
            }
          ],
          "carpark_number": "GE1F",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "47",
              "lot_type": "C",
              "lots_available": "3"
            }
          ],
          "carpark_number": "GE1G",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "193",
              "lot_type": "C",
              "lots_available": "86"
            }
          ],
          "carpark_number": "GE2",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "340",
              "lot_type": "C",
              "lots_available": "245"
            }
          ],
          "carpark_number": "GE3",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "255",
              "lot_type": "C",
              "lots_available": "26"
            }
          ],
          "carpark_number": "GE5",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "81",
              "lot_type": "C",
              "lots_available": "16"
            }
          ],
          "carpark_number": "JB1",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "43",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "JB2",
          "update_datetime": "2019-02-13T00:48:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "203",
              "lot_type": "C",
              "lots_available": "203"
            }
          ],
          "carpark_number": "K7",
          "update_datetime": "2019-02-13T00:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "429",
              "lot_type": "C",
              "lots_available": "276"
            }
          ],
          "carpark_number": "KM4",
          "update_datetime": "2019-02-13T00:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "256",
              "lot_type": "C",
              "lots_available": "117"
            }
          ],
          "carpark_number": "LT1",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "65",
              "lot_type": "C",
              "lots_available": "8"
            }
          ],
          "carpark_number": "LT2",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "267",
              "lot_type": "C",
              "lots_available": "52"
            }
          ],
          "carpark_number": "LT3",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "340",
              "lot_type": "C",
              "lots_available": "158"
            }
          ],
          "carpark_number": "M1",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "392",
              "lot_type": "C",
              "lots_available": "166"
            }
          ],
          "carpark_number": "M32",
          "update_datetime": "2019-02-13T00:48:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "161",
              "lot_type": "C",
              "lots_available": "43"
            }
          ],
          "carpark_number": "MP1",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "85",
              "lot_type": "C",
              "lots_available": "44"
            }
          ],
          "carpark_number": "MP17",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "301",
              "lot_type": "C",
              "lots_available": "174"
            }
          ],
          "carpark_number": "MP2",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "165",
              "lot_type": "C",
              "lots_available": "162"
            }
          ],
          "carpark_number": "MP5",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "158",
              "lot_type": "C",
              "lots_available": "20"
            }
          ],
          "carpark_number": "MP5M",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "32",
              "lot_type": "C",
              "lots_available": "2"
            }
          ],
          "carpark_number": "MP5S",
          "update_datetime": "2019-02-13T00:47:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "73",
              "lot_type": "C",
              "lots_available": "58"
            }
          ],
          "carpark_number": "MP6",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "202",
              "lot_type": "C",
              "lots_available": "113"
            }
          ],
          "carpark_number": "MP7",
          "update_datetime": "2019-02-13T00:48:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "456",
              "lot_type": "C",
              "lots_available": "210"
            }
          ],
          "carpark_number": "SK9",
          "update_datetime": "2019-02-13T00:49:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "444",
              "lot_type": "C",
              "lots_available": "195"
            }
          ],
          "carpark_number": "SK14",
          "update_datetime": "2019-02-13T00:49:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "674",
              "lot_type": "C",
              "lots_available": "171"
            }
          ],
          "carpark_number": "BE10",
          "update_datetime": "2019-02-13T00:48:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "403",
              "lot_type": "C",
              "lots_available": "98"
            }
          ],
          "carpark_number": "BE11",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "232",
              "lot_type": "C",
              "lots_available": "135"
            }
          ],
          "carpark_number": "BE13",
          "update_datetime": "2019-02-13T00:48:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "337",
              "lot_type": "C",
              "lots_available": "262"
            }
          ],
          "carpark_number": "BE14",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "69",
              "lot_type": "C",
              "lots_available": "9"
            }
          ],
          "carpark_number": "BE26",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "362",
              "lot_type": "C",
              "lots_available": "240"
            }
          ],
          "carpark_number": "BE27",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "295",
              "lot_type": "C",
              "lots_available": "10"
            }
          ],
          "carpark_number": "BE28",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "42",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BE29",
          "update_datetime": "2019-02-13T00:48:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "357",
              "lot_type": "C",
              "lots_available": "207"
            }
          ],
          "carpark_number": "BE30",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "108",
              "lot_type": "C",
              "lots_available": "33"
            }
          ],
          "carpark_number": "BE31",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "357",
              "lot_type": "C",
              "lots_available": "275"
            }
          ],
          "carpark_number": "BE32",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "772",
              "lot_type": "C",
              "lots_available": "272"
            }
          ],
          "carpark_number": "BE4",
          "update_datetime": "2019-02-13T00:48:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "626",
              "lot_type": "C",
              "lots_available": "197"
            }
          ],
          "carpark_number": "BE5",
          "update_datetime": "2019-02-13T00:48:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "180",
              "lot_type": "C",
              "lots_available": "84"
            }
          ],
          "carpark_number": "BE6",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "777",
              "lot_type": "C",
              "lots_available": "284"
            }
          ],
          "carpark_number": "BE9",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "247",
              "lot_type": "C",
              "lots_available": "171"
            }
          ],
          "carpark_number": "CLM",
          "update_datetime": "2019-02-13T00:47:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "80",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BM14",
          "update_datetime": "2019-02-13T00:47:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "36",
              "lot_type": "C",
              "lots_available": "1"
            }
          ],
          "carpark_number": "BM19",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "58",
              "lot_type": "C",
              "lots_available": "17"
            }
          ],
          "carpark_number": "BM20",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "150",
              "lot_type": "C",
              "lots_available": "31"
            }
          ],
          "carpark_number": "BM4",
          "update_datetime": "2019-02-13T00:47:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "30",
              "lot_type": "C",
              "lots_available": "18"
            }
          ],
          "carpark_number": "BM6",
          "update_datetime": "2019-02-13T00:48:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "401",
              "lot_type": "C",
              "lots_available": "329"
            }
          ],
          "carpark_number": "BVM2",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "966",
              "lot_type": "C",
              "lots_available": "142"
            }
          ],
          "carpark_number": "CM1",
          "update_datetime": "2019-02-13T00:48:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "571"
            }
          ],
          "carpark_number": "DUX",
          "update_datetime": "2016-04-20T13:28:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "500",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "H12",
          "update_datetime": "2019-02-13T00:47:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "230",
              "lot_type": "C",
              "lots_available": "126"
            }
          ],
          "carpark_number": "H14",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "66",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "H3",
          "update_datetime": "2019-02-13T00:47:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "76",
              "lot_type": "C",
              "lots_available": "26"
            }
          ],
          "carpark_number": "H8",
          "update_datetime": "2019-02-13T00:47:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "385",
              "lot_type": "C",
              "lots_available": "299"
            }
          ],
          "carpark_number": "HCM",
          "update_datetime": "2019-02-13T00:47:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "18",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HE1",
          "update_datetime": "2019-02-13T00:47:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "111",
              "lot_type": "C",
              "lots_available": "68"
            }
          ],
          "carpark_number": "HE19",
          "update_datetime": "2019-02-13T00:47:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "27",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HE24",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "128",
              "lot_type": "C",
              "lots_available": "64"
            }
          ],
          "carpark_number": "HE4",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "492",
              "lot_type": "C",
              "lots_available": "272"
            }
          ],
          "carpark_number": "JMB1",
          "update_datetime": "2019-02-13T00:47:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "411",
              "lot_type": "C",
              "lots_available": "25"
            }
          ],
          "carpark_number": "JRTM",
          "update_datetime": "2019-02-13T00:47:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "423",
              "lot_type": "C",
              "lots_available": "298"
            }
          ],
          "carpark_number": "KTM",
          "update_datetime": "2019-02-13T00:47:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "423",
              "lot_type": "C",
              "lots_available": "423"
            }
          ],
          "carpark_number": "KTM2",
          "update_datetime": "2019-02-13T00:47:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "45",
              "lot_type": "C",
              "lots_available": "35"
            }
          ],
          "carpark_number": "KTM3",
          "update_datetime": "2019-02-13T00:47:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "461",
              "lot_type": "C",
              "lots_available": "448"
            }
          ],
          "carpark_number": "KTM4",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "170",
              "lot_type": "C",
              "lots_available": "76"
            }
          ],
          "carpark_number": "LBM",
          "update_datetime": "2019-02-13T00:47:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "100",
              "lot_type": "C",
              "lots_available": "100"
            }
          ],
          "carpark_number": "PGS",
          "update_datetime": "2016-04-25T09:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "131",
              "lot_type": "C",
              "lots_available": "105"
            }
          ],
          "carpark_number": "PP9T",
          "update_datetime": "2019-02-13T00:45:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "35",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "RH3",
          "update_datetime": "2016-02-16T11:37:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "225",
              "lot_type": "C",
              "lots_available": "120"
            }
          ],
          "carpark_number": "RHM2",
          "update_datetime": "2019-02-13T00:47:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "400",
              "lot_type": "C",
              "lots_available": "172"
            }
          ],
          "carpark_number": "RHM3",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "282",
              "lot_type": "C",
              "lots_available": "13"
            }
          ],
          "carpark_number": "RHM4",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "35",
              "lot_type": "C",
              "lots_available": "12"
            }
          ],
          "carpark_number": "RHS",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "431",
              "lot_type": "C",
              "lots_available": "103"
            }
          ],
          "carpark_number": "HG30",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "83",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG31",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "287",
              "lot_type": "C",
              "lots_available": "8"
            }
          ],
          "carpark_number": "HG32",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "186",
              "lot_type": "C",
              "lots_available": "112"
            }
          ],
          "carpark_number": "HG39",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "331",
              "lot_type": "C",
              "lots_available": "223"
            }
          ],
          "carpark_number": "HG47",
          "update_datetime": "2019-02-13T00:48:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "833",
              "lot_type": "C",
              "lots_available": "262"
            }
          ],
          "carpark_number": "HG48",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "769",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG49",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "415",
              "lot_type": "C",
              "lots_available": "76"
            }
          ],
          "carpark_number": "HG50",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "203",
              "lot_type": "C",
              "lots_available": "14"
            }
          ],
          "carpark_number": "HG51",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "189",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG52",
          "update_datetime": "2019-02-13T00:48:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "489",
              "lot_type": "C",
              "lots_available": "352"
            }
          ],
          "carpark_number": "HG54",
          "update_datetime": "2019-02-13T00:48:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "82",
              "lot_type": "C",
              "lots_available": "82"
            }
          ],
          "carpark_number": "HG55",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "369",
              "lot_type": "C",
              "lots_available": "235"
            }
          ],
          "carpark_number": "HG60",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "312",
              "lot_type": "C",
              "lots_available": "158"
            }
          ],
          "carpark_number": "HG61",
          "update_datetime": "2019-02-13T00:48:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "343",
              "lot_type": "C",
              "lots_available": "227"
            }
          ],
          "carpark_number": "HG62",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "693",
              "lot_type": "C",
              "lots_available": "91"
            }
          ],
          "carpark_number": "HG67",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "268",
              "lot_type": "C",
              "lots_available": "160"
            }
          ],
          "carpark_number": "HG68",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "203",
              "lot_type": "C",
              "lots_available": "49"
            }
          ],
          "carpark_number": "HG69",
          "update_datetime": "2019-02-13T00:48:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "613",
              "lot_type": "C",
              "lots_available": "273"
            }
          ],
          "carpark_number": "HG7",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "692",
              "lot_type": "C",
              "lots_available": "278"
            }
          ],
          "carpark_number": "HG70",
          "update_datetime": "2019-02-13T00:48:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "268",
              "lot_type": "C",
              "lots_available": "124"
            }
          ],
          "carpark_number": "HG76",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "423",
              "lot_type": "C",
              "lots_available": "224"
            }
          ],
          "carpark_number": "HG77",
          "update_datetime": "2019-02-13T00:48:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "490",
              "lot_type": "C",
              "lots_available": "134"
            }
          ],
          "carpark_number": "HG78",
          "update_datetime": "2019-02-13T00:48:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "401",
              "lot_type": "C",
              "lots_available": "141"
            }
          ],
          "carpark_number": "HG79",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "388",
              "lot_type": "C",
              "lots_available": "325"
            }
          ],
          "carpark_number": "HG89",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "896",
              "lot_type": "C",
              "lots_available": "619"
            }
          ],
          "carpark_number": "HG94",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "166",
              "lot_type": "C",
              "lots_available": "120"
            }
          ],
          "carpark_number": "HG95",
          "update_datetime": "2019-02-13T00:48:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "39",
              "lot_type": "C",
              "lots_available": "17"
            }
          ],
          "carpark_number": "HG96",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "43",
              "lot_type": "C",
              "lots_available": "39"
            }
          ],
          "carpark_number": "HG97",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "154",
              "lot_type": "C",
              "lots_available": "44"
            }
          ],
          "carpark_number": "HG99",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "249",
              "lot_type": "C",
              "lots_available": "216"
            }
          ],
          "carpark_number": "J12",
          "update_datetime": "2019-02-13T00:44:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "198",
              "lot_type": "C",
              "lots_available": "61"
            }
          ],
          "carpark_number": "J14",
          "update_datetime": "2019-02-13T00:44:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "209",
              "lot_type": "C",
              "lots_available": "36"
            }
          ],
          "carpark_number": "J15",
          "update_datetime": "2019-02-13T00:44:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "200",
              "lot_type": "C",
              "lots_available": "95"
            }
          ],
          "carpark_number": "J16",
          "update_datetime": "2019-02-13T00:44:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "178",
              "lot_type": "C",
              "lots_available": "103"
            }
          ],
          "carpark_number": "J18",
          "update_datetime": "2019-02-13T00:44:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "233",
              "lot_type": "C",
              "lots_available": "76"
            }
          ],
          "carpark_number": "J22",
          "update_datetime": "2019-02-13T00:44:12"
        },
        {
          "carpark_info": [
            {
              "total_lots": "274",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "J23",
          "update_datetime": "2019-02-13T00:44:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "251",
              "lot_type": "C",
              "lots_available": "25"
            }
          ],
          "carpark_number": "J23M",
          "update_datetime": "2019-02-13T00:44:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "381",
              "lot_type": "C",
              "lots_available": "125"
            }
          ],
          "carpark_number": "J8",
          "update_datetime": "2019-02-13T00:44:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "190",
              "lot_type": "C",
              "lots_available": "32"
            }
          ],
          "carpark_number": "J9",
          "update_datetime": "2019-02-13T00:44:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "485",
              "lot_type": "C",
              "lots_available": "343"
            }
          ],
          "carpark_number": "J90",
          "update_datetime": "2019-02-13T00:44:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "595",
              "lot_type": "C",
              "lots_available": "488"
            }
          ],
          "carpark_number": "J91",
          "update_datetime": "2019-02-13T00:44:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "462",
              "lot_type": "C",
              "lots_available": "289"
            }
          ],
          "carpark_number": "J92",
          "update_datetime": "2019-02-13T00:44:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "491",
              "lot_type": "C",
              "lots_available": "255"
            }
          ],
          "carpark_number": "J93",
          "update_datetime": "2019-02-13T00:44:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "444",
              "lot_type": "C",
              "lots_available": "286"
            }
          ],
          "carpark_number": "J94",
          "update_datetime": "2019-02-13T00:44:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "467",
              "lot_type": "C",
              "lots_available": "245"
            }
          ],
          "carpark_number": "J95",
          "update_datetime": "2019-02-13T00:44:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "445",
              "lot_type": "C",
              "lots_available": "186"
            }
          ],
          "carpark_number": "J96",
          "update_datetime": "2019-02-13T00:44:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "411",
              "lot_type": "C",
              "lots_available": "200"
            }
          ],
          "carpark_number": "J97",
          "update_datetime": "2019-02-13T00:44:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "18"
            }
          ],
          "carpark_number": "BBM2",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "42"
            }
          ],
          "carpark_number": "U12",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "3561",
              "lot_type": "C",
              "lots_available": "2138"
            }
          ],
          "carpark_number": "CK56",
          "update_datetime": "2019-02-13T00:46:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1088",
              "lot_type": "C",
              "lots_available": "573"
            }
          ],
          "carpark_number": "CK57",
          "update_datetime": "2019-02-13T00:46:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "144"
            }
          ],
          "carpark_number": "U51",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "548",
              "lot_type": "C",
              "lots_available": "548"
            }
          ],
          "carpark_number": "ALL",
          "update_datetime": "2016-02-10T20:02:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "386",
              "lot_type": "C",
              "lots_available": "97"
            }
          ],
          "carpark_number": "B59",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "272",
              "lot_type": "C",
              "lots_available": "52"
            }
          ],
          "carpark_number": "B60",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "553",
              "lot_type": "C",
              "lots_available": "221"
            }
          ],
          "carpark_number": "B97",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "131",
              "lot_type": "C",
              "lots_available": "55"
            }
          ],
          "carpark_number": "CC12",
          "update_datetime": "2019-02-13T00:46:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "519",
              "lot_type": "C",
              "lots_available": "352"
            }
          ],
          "carpark_number": "SK39",
          "update_datetime": "2019-02-13T00:46:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "200",
              "lot_type": "C",
              "lots_available": "10"
            }
          ],
          "carpark_number": "SK81",
          "update_datetime": "2019-02-13T00:47:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "6",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "P40L",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "354",
              "lot_type": "C",
              "lots_available": "61"
            }
          ],
          "carpark_number": "PM10",
          "update_datetime": "2019-02-13T00:47:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "502",
              "lot_type": "C",
              "lots_available": "159"
            }
          ],
          "carpark_number": "PM25",
          "update_datetime": "2019-02-13T00:48:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "208",
              "lot_type": "C",
              "lots_available": "37"
            }
          ],
          "carpark_number": "PR7",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "94",
              "lot_type": "C",
              "lots_available": "36"
            }
          ],
          "carpark_number": "MR5",
          "update_datetime": "2019-02-13T00:47:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "94",
              "lot_type": "C",
              "lots_available": "36"
            }
          ],
          "carpark_number": "MR6",
          "update_datetime": "2019-02-13T00:47:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "94",
              "lot_type": "C",
              "lots_available": "36"
            }
          ],
          "carpark_number": "MR7",
          "update_datetime": "2019-02-13T00:47:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "294",
              "lot_type": "C",
              "lots_available": "114"
            }
          ],
          "carpark_number": "SG1",
          "update_datetime": "2019-02-13T00:47:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "238",
              "lot_type": "C",
              "lots_available": "119"
            }
          ],
          "carpark_number": "SGLM",
          "update_datetime": "2019-02-13T00:47:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "367",
              "lot_type": "C",
              "lots_available": "259"
            }
          ],
          "carpark_number": "W4M",
          "update_datetime": "2019-02-13T00:47:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "434",
              "lot_type": "C",
              "lots_available": "281"
            }
          ],
          "carpark_number": "W59",
          "update_datetime": "2019-02-13T00:47:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "376",
              "lot_type": "C",
              "lots_available": "277"
            }
          ],
          "carpark_number": "W554",
          "update_datetime": "2019-02-13T00:46:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "429",
              "lot_type": "C",
              "lots_available": "281"
            }
          ],
          "carpark_number": "W549",
          "update_datetime": "2019-02-13T00:46:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "350",
              "lot_type": "C",
              "lots_available": "236"
            }
          ],
          "carpark_number": "W81",
          "update_datetime": "2019-02-13T00:44:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "460",
              "lot_type": "C",
              "lots_available": "257"
            }
          ],
          "carpark_number": "SK28",
          "update_datetime": "2019-02-13T00:47:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "360",
              "lot_type": "C",
              "lots_available": "252"
            }
          ],
          "carpark_number": "W586",
          "update_datetime": "2019-02-13T00:46:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "358",
              "lot_type": "C",
              "lots_available": "202"
            }
          ],
          "carpark_number": "W588",
          "update_datetime": "2019-02-13T00:46:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "371",
              "lot_type": "C",
              "lots_available": "363"
            }
          ],
          "carpark_number": "BL19S",
          "update_datetime": "2016-02-05T14:34:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "360",
              "lot_type": "C",
              "lots_available": "352"
            }
          ],
          "carpark_number": "J80MS",
          "update_datetime": "2015-08-19T12:21:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "360",
              "lot_type": "C",
              "lots_available": "353"
            }
          ],
          "carpark_number": "J80S",
          "update_datetime": "2015-08-19T12:37:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "10",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "J84S",
          "update_datetime": "2015-08-19T12:38:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "200",
              "lot_type": "C",
              "lots_available": "196"
            }
          ],
          "carpark_number": "J86S",
          "update_datetime": "2015-08-19T12:33:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "967",
              "lot_type": "C",
              "lots_available": "789"
            }
          ],
          "carpark_number": "JM13S",
          "update_datetime": "2016-02-05T15:00:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "526",
              "lot_type": "C",
              "lots_available": "394"
            }
          ],
          "carpark_number": "SK29",
          "update_datetime": "2019-02-13T00:46:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "21",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "W26",
          "update_datetime": "2019-02-13T00:45:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "4",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "W27",
          "update_datetime": "2019-02-13T00:46:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "335",
              "lot_type": "C",
              "lots_available": "196"
            }
          ],
          "carpark_number": "PM8",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "154",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PR8",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "247",
              "lot_type": "C",
              "lots_available": "115"
            }
          ],
          "carpark_number": "SK69",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "266",
              "lot_type": "C",
              "lots_available": "140"
            }
          ],
          "carpark_number": "AH1",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "78",
              "lot_type": "C",
              "lots_available": "37"
            }
          ],
          "carpark_number": "BR14",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "164",
              "lot_type": "C",
              "lots_available": "59"
            }
          ],
          "carpark_number": "RC1",
          "update_datetime": "2019-02-13T00:48:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "81",
              "lot_type": "C",
              "lots_available": "44"
            }
          ],
          "carpark_number": "TP12",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "65",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "TP15",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "90",
              "lot_type": "C",
              "lots_available": "2"
            }
          ],
          "carpark_number": "TP20",
          "update_datetime": "2019-02-13T00:48:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "183",
              "lot_type": "C",
              "lots_available": "69"
            }
          ],
          "carpark_number": "TP22",
          "update_datetime": "2019-02-13T00:48:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "214",
              "lot_type": "C",
              "lots_available": "159"
            }
          ],
          "carpark_number": "TP3",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "32",
              "lot_type": "C",
              "lots_available": "25"
            }
          ],
          "carpark_number": "TP30",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "230",
              "lot_type": "C",
              "lots_available": "140"
            }
          ],
          "carpark_number": "TP34",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "296",
              "lot_type": "C",
              "lots_available": "135"
            }
          ],
          "carpark_number": "TP3A",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "360",
              "lot_type": "C",
              "lots_available": "186"
            }
          ],
          "carpark_number": "TP40",
          "update_datetime": "2019-02-13T00:48:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "170",
              "lot_type": "C",
              "lots_available": "50"
            }
          ],
          "carpark_number": "TP41",
          "update_datetime": "2019-02-13T00:48:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "115",
              "lot_type": "C",
              "lots_available": "60"
            }
          ],
          "carpark_number": "TP43",
          "update_datetime": "2019-02-13T00:48:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "20",
              "lot_type": "C",
              "lots_available": "1"
            }
          ],
          "carpark_number": "TP48",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "468",
              "lot_type": "C",
              "lots_available": "217"
            }
          ],
          "carpark_number": "TP52",
          "update_datetime": "2019-02-13T00:48:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "303",
              "lot_type": "C",
              "lots_available": "79"
            }
          ],
          "carpark_number": "TP53",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "326",
              "lot_type": "C",
              "lots_available": "201"
            }
          ],
          "carpark_number": "TP54",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "281",
              "lot_type": "C",
              "lots_available": "94"
            }
          ],
          "carpark_number": "TP60",
          "update_datetime": "2019-02-13T00:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "149",
              "lot_type": "C",
              "lots_available": "80"
            }
          ],
          "carpark_number": "TP62",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "116",
              "lot_type": "C",
              "lots_available": "40"
            }
          ],
          "carpark_number": "TP63",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "198",
              "lot_type": "C",
              "lots_available": "85"
            }
          ],
          "carpark_number": "TP67",
          "update_datetime": "2019-02-13T00:48:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "183",
              "lot_type": "C",
              "lots_available": "159"
            }
          ],
          "carpark_number": "TP7",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "180",
              "lot_type": "C",
              "lots_available": "66"
            }
          ],
          "carpark_number": "TP8",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "170",
              "lot_type": "C",
              "lots_available": "92"
            }
          ],
          "carpark_number": "TPB1",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "209",
              "lot_type": "C",
              "lots_available": "84"
            }
          ],
          "carpark_number": "TPM2",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "370",
              "lot_type": "C",
              "lots_available": "176"
            }
          ],
          "carpark_number": "TPM3",
          "update_datetime": "2019-02-13T00:48:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "476",
              "lot_type": "C",
              "lots_available": "294"
            }
          ],
          "carpark_number": "TPM7",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "460",
              "lot_type": "C",
              "lots_available": "460"
            }
          ],
          "carpark_number": "TPM8",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "864",
              "lot_type": "C",
              "lots_available": "469"
            }
          ],
          "carpark_number": "TPM9",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "505",
              "lot_type": "C",
              "lots_available": "130"
            }
          ],
          "carpark_number": "TPMA",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "594",
              "lot_type": "C",
              "lots_available": "413"
            }
          ],
          "carpark_number": "TPMB",
          "update_datetime": "2019-02-13T00:48:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "633",
              "lot_type": "C",
              "lots_available": "255"
            }
          ],
          "carpark_number": "TPMC",
          "update_datetime": "2019-02-13T00:48:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "145",
              "lot_type": "C",
              "lots_available": "58"
            }
          ],
          "carpark_number": "TPMD",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "183",
              "lot_type": "C",
              "lots_available": "153"
            }
          ],
          "carpark_number": "TPME",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "460",
              "lot_type": "C",
              "lots_available": "270"
            }
          ],
          "carpark_number": "TPMF",
          "update_datetime": "2019-02-13T00:48:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "246",
              "lot_type": "C",
              "lots_available": "209"
            }
          ],
          "carpark_number": "TPMH",
          "update_datetime": "2019-02-13T00:48:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "656",
              "lot_type": "C",
              "lots_available": "483"
            }
          ],
          "carpark_number": "TPMJ",
          "update_datetime": "2019-02-13T00:48:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "248",
              "lot_type": "C",
              "lots_available": "178"
            }
          ],
          "carpark_number": "TPMK",
          "update_datetime": "2019-02-13T00:48:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "288",
              "lot_type": "C",
              "lots_available": "121"
            }
          ],
          "carpark_number": "TPML",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "329",
              "lot_type": "C",
              "lots_available": "136"
            }
          ],
          "carpark_number": "TPMM",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "777",
              "lot_type": "C",
              "lots_available": "489"
            }
          ],
          "carpark_number": "SK24",
          "update_datetime": "2019-02-13T00:46:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "181",
              "lot_type": "Y",
              "lots_available": "200"
            }
          ],
          "carpark_number": "SK24",
          "update_datetime": "2016-02-19T11:19:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "181",
              "lot_type": "H",
              "lots_available": "200"
            }
          ],
          "carpark_number": "SK24",
          "update_datetime": "2016-02-19T11:19:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "246",
              "lot_type": "C",
              "lots_available": "82"
            }
          ],
          "carpark_number": "HG17",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "839",
              "lot_type": "C",
              "lots_available": "627"
            }
          ],
          "carpark_number": "HG75",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "404",
              "lot_type": "C",
              "lots_available": "213"
            }
          ],
          "carpark_number": "HG86",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1017",
              "lot_type": "C",
              "lots_available": "758"
            }
          ],
          "carpark_number": "HG92",
          "update_datetime": "2019-02-13T00:48:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "346",
              "lot_type": "C",
              "lots_available": "30"
            },
            {
              "total_lots": "0",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q86",
          "update_datetime": "2019-02-13T00:47:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "18",
              "lot_type": "C",
              "lots_available": "0"
            },
            {
              "total_lots": "155",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q19",
          "update_datetime": "2019-02-13T00:46:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "266",
              "lot_type": "C",
              "lots_available": "51"
            },
            {
              "total_lots": "88",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "MLM1",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "104",
              "lot_type": "C",
              "lots_available": "0"
            },
            {
              "total_lots": "12",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "STM1",
          "update_datetime": "2019-02-13T00:47:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "220",
              "lot_type": "C",
              "lots_available": "106"
            },
            {
              "total_lots": "52",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "STM2",
          "update_datetime": "2019-02-13T00:47:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "35",
              "lot_type": "C",
              "lots_available": "0"
            },
            {
              "total_lots": "155",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "STM3",
          "update_datetime": "2019-02-13T00:47:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "221",
              "lot_type": "C",
              "lots_available": "61"
            },
            {
              "total_lots": "0",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q88",
          "update_datetime": "2019-02-13T00:46:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "139",
              "lot_type": "C",
              "lots_available": "8"
            },
            {
              "total_lots": "155",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q8",
          "update_datetime": "2019-02-13T00:46:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "275",
              "lot_type": "C",
              "lots_available": "57"
            },
            {
              "total_lots": "155",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "CDM",
          "update_datetime": "2019-02-13T00:46:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "153",
              "lot_type": "C",
              "lots_available": "32"
            }
          ],
          "carpark_number": "PL16",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "291",
              "lot_type": "C",
              "lots_available": "68"
            }
          ],
          "carpark_number": "PL19",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "749",
              "lot_type": "C",
              "lots_available": "462"
            }
          ],
          "carpark_number": "PL24",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "399",
              "lot_type": "C",
              "lots_available": "101"
            }
          ],
          "carpark_number": "PL38",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "192",
              "lot_type": "C",
              "lots_available": "31"
            }
          ],
          "carpark_number": "PL50",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "321",
              "lot_type": "C",
              "lots_available": "106"
            }
          ],
          "carpark_number": "PL51",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "464",
              "lot_type": "C",
              "lots_available": "45"
            }
          ],
          "carpark_number": "CK2",
          "update_datetime": "2019-02-13T00:46:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "84",
              "lot_type": "C",
              "lots_available": "27"
            }
          ],
          "carpark_number": "A28",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "310",
              "lot_type": "C",
              "lots_available": "152"
            }
          ],
          "carpark_number": "A31",
          "update_datetime": "2019-02-13T00:49:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "157",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "A44",
          "update_datetime": "2019-02-13T00:49:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "251",
              "lot_type": "C",
              "lots_available": "96"
            }
          ],
          "carpark_number": "A27",
          "update_datetime": "2019-02-13T00:49:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "353",
              "lot_type": "C",
              "lots_available": "13"
            }
          ],
          "carpark_number": "A75",
          "update_datetime": "2019-02-13T00:48:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "762",
              "lot_type": "C",
              "lots_available": "488"
            }
          ],
          "carpark_number": "SE41",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "187",
              "lot_type": "C",
              "lots_available": "87"
            }
          ],
          "carpark_number": "A2",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "234",
              "lot_type": "C",
              "lots_available": "141"
            }
          ],
          "carpark_number": "A94",
          "update_datetime": "2019-02-13T00:48:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "181",
              "lot_type": "C",
              "lots_available": "55"
            }
          ],
          "carpark_number": "HG1D",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1854",
              "lot_type": "C",
              "lots_available": "926"
            }
          ],
          "carpark_number": "CK54",
          "update_datetime": "2019-02-13T00:46:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "120",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HE17",
          "update_datetime": "2019-02-13T00:48:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "94",
              "lot_type": "C",
              "lots_available": "75"
            }
          ],
          "carpark_number": "SPS",
          "update_datetime": "2019-02-13T00:48:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "203",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "TB10",
          "update_datetime": "2019-02-13T00:48:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "152",
              "lot_type": "C",
              "lots_available": "82"
            }
          ],
          "carpark_number": "TB11",
          "update_datetime": "2019-02-13T00:47:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "18",
              "lot_type": "C",
              "lots_available": "8"
            }
          ],
          "carpark_number": "TB22",
          "update_datetime": "2019-02-13T00:48:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "107",
              "lot_type": "C",
              "lots_available": "73"
            }
          ],
          "carpark_number": "TB23",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "18",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "TB28",
          "update_datetime": "2019-02-13T00:47:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "46",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "TB4A",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "136",
              "lot_type": "C",
              "lots_available": "44"
            }
          ],
          "carpark_number": "TB6",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "186",
              "lot_type": "C",
              "lots_available": "93"
            }
          ],
          "carpark_number": "TB7",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "84",
              "lot_type": "C",
              "lots_available": "52"
            }
          ],
          "carpark_number": "TB8",
          "update_datetime": "2019-02-13T00:47:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "544",
              "lot_type": "C",
              "lots_available": "349"
            }
          ],
          "carpark_number": "TBCM",
          "update_datetime": "2019-02-13T00:47:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "95",
              "lot_type": "C",
              "lots_available": "56"
            }
          ],
          "carpark_number": "TE1",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "60",
              "lot_type": "C",
              "lots_available": "22"
            }
          ],
          "carpark_number": "YHS",
          "update_datetime": "2019-02-13T00:47:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "704",
              "lot_type": "C",
              "lots_available": "347"
            }
          ],
          "carpark_number": "JM5",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "702",
              "lot_type": "C",
              "lots_available": "311"
            }
          ],
          "carpark_number": "JM6",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "691",
              "lot_type": "C",
              "lots_available": "681"
            }
          ],
          "carpark_number": "JM7M",
          "update_datetime": "2015-08-19T11:39:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "478",
              "lot_type": "C",
              "lots_available": "359"
            }
          ],
          "carpark_number": "JM8",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "481",
              "lot_type": "C",
              "lots_available": "480"
            }
          ],
          "carpark_number": "JM8M",
          "update_datetime": "2015-08-19T11:39:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "417",
              "lot_type": "C",
              "lots_available": "175"
            }
          ],
          "carpark_number": "JM9",
          "update_datetime": "2019-02-13T00:48:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1194",
              "lot_type": "C",
              "lots_available": "1192"
            }
          ],
          "carpark_number": "JSR1",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "225",
              "lot_type": "C",
              "lots_available": "60"
            }
          ],
          "carpark_number": "TJ27",
          "update_datetime": "2019-02-13T00:47:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "555",
              "lot_type": "C",
              "lots_available": "485"
            }
          ],
          "carpark_number": "TJ28M",
          "update_datetime": "2016-02-04T18:35:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "303",
              "lot_type": "C",
              "lots_available": "220"
            }
          ],
          "carpark_number": "TJ29",
          "update_datetime": "2019-02-13T00:47:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "731",
              "lot_type": "C",
              "lots_available": "379"
            }
          ],
          "carpark_number": "TJ30",
          "update_datetime": "2019-02-13T00:49:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "288",
              "lot_type": "C",
              "lots_available": "272"
            }
          ],
          "carpark_number": "TJ30S",
          "update_datetime": "2016-02-05T15:39:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "544",
              "lot_type": "C",
              "lots_available": "295"
            }
          ],
          "carpark_number": "TJ32",
          "update_datetime": "2019-02-13T00:48:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "441",
              "lot_type": "C",
              "lots_available": "251"
            }
          ],
          "carpark_number": "TJ33",
          "update_datetime": "2019-02-13T00:49:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "440",
              "lot_type": "C",
              "lots_available": "439"
            }
          ],
          "carpark_number": "TJ33S",
          "update_datetime": "2015-12-24T18:04:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "305",
              "lot_type": "C",
              "lots_available": "151"
            }
          ],
          "carpark_number": "TJ36",
          "update_datetime": "2019-02-13T00:49:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "296",
              "lot_type": "C",
              "lots_available": "135"
            }
          ],
          "carpark_number": "TP4A",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "302",
              "lot_type": "C",
              "lots_available": "256"
            }
          ],
          "carpark_number": "CV1",
          "update_datetime": "2019-02-13T00:47:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "79",
              "lot_type": "C",
              "lots_available": "52"
            }
          ],
          "carpark_number": "CV3",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "454",
              "lot_type": "C",
              "lots_available": "163"
            }
          ],
          "carpark_number": "PM32",
          "update_datetime": "2019-02-13T00:47:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "452",
              "lot_type": "C",
              "lots_available": "135"
            }
          ],
          "carpark_number": "PM33",
          "update_datetime": "2019-02-13T00:47:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "442",
              "lot_type": "C",
              "lots_available": "126"
            }
          ],
          "carpark_number": "PM34",
          "update_datetime": "2019-02-13T00:47:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1159",
              "lot_type": "C",
              "lots_available": "322"
            }
          ],
          "carpark_number": "Y19",
          "update_datetime": "2019-02-13T00:47:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "251",
              "lot_type": "C",
              "lots_available": "91"
            }
          ],
          "carpark_number": "Y18",
          "update_datetime": "2019-02-13T00:48:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "291",
              "lot_type": "C",
              "lots_available": "152"
            }
          ],
          "carpark_number": "Y26",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "8",
              "lot_type": "C",
              "lots_available": "8"
            }
          ],
          "carpark_number": "S28L",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "28",
              "lot_type": "C",
              "lots_available": "23"
            }
          ],
          "carpark_number": "CV2",
          "update_datetime": "2019-02-13T00:47:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "21",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "S30L",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "425",
              "lot_type": "C",
              "lots_available": "263"
            }
          ],
          "carpark_number": "SK30",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "618",
              "lot_type": "C",
              "lots_available": "340"
            }
          ],
          "carpark_number": "SK31",
          "update_datetime": "2019-02-13T00:45:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "654",
              "lot_type": "C",
              "lots_available": "362"
            }
          ],
          "carpark_number": "SK38",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "18",
              "lot_type": "C",
              "lots_available": "2"
            }
          ],
          "carpark_number": "SK59",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "490",
              "lot_type": "C",
              "lots_available": "332"
            }
          ],
          "carpark_number": "W79",
          "update_datetime": "2019-02-13T00:46:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "322",
              "lot_type": "C",
              "lots_available": "195"
            }
          ],
          "carpark_number": "W80",
          "update_datetime": "2019-02-13T00:46:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "401",
              "lot_type": "C",
              "lots_available": "298"
            }
          ],
          "carpark_number": "W87",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "443",
              "lot_type": "C",
              "lots_available": "318"
            }
          ],
          "carpark_number": "W88",
          "update_datetime": "2019-02-13T00:45:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "389",
              "lot_type": "C",
              "lots_available": "271"
            }
          ],
          "carpark_number": "W92",
          "update_datetime": "2019-02-13T00:45:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "520",
              "lot_type": "C",
              "lots_available": "182"
            }
          ],
          "carpark_number": "SK94",
          "update_datetime": "2019-02-13T00:47:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "42",
              "lot_type": "C",
              "lots_available": "11"
            }
          ],
          "carpark_number": "SD4",
          "update_datetime": "2019-02-13T00:47:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "169",
              "lot_type": "C",
              "lots_available": "83"
            }
          ],
          "carpark_number": "PM12",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "230",
              "lot_type": "C",
              "lots_available": "104"
            }
          ],
          "carpark_number": "MP3M",
          "update_datetime": "2019-02-13T00:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "302",
              "lot_type": "C",
              "lots_available": "196"
            }
          ],
          "carpark_number": "MP4M",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "244",
              "lot_type": "C",
              "lots_available": "77"
            }
          ],
          "carpark_number": "PM38",
          "update_datetime": "2019-02-13T00:45:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "25",
              "lot_type": "C",
              "lots_available": "25"
            }
          ],
          "carpark_number": "EPL",
          "update_datetime": "2019-02-13T00:49:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "160",
              "lot_type": "C",
              "lots_available": "80"
            }
          ],
          "carpark_number": "B86",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "576",
              "lot_type": "C",
              "lots_available": "128"
            }
          ],
          "carpark_number": "MP2M",
          "update_datetime": "2019-02-13T00:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "137",
              "lot_type": "C",
              "lots_available": "111"
            }
          ],
          "carpark_number": "W15",
          "update_datetime": "2018-04-01T00:04:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "275",
              "lot_type": "C",
              "lots_available": "205"
            }
          ],
          "carpark_number": "BE25",
          "update_datetime": "2019-02-13T00:48:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "269",
              "lot_type": "C",
              "lots_available": "41"
            }
          ],
          "carpark_number": "BE33",
          "update_datetime": "2019-02-13T00:48:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "178",
              "lot_type": "C",
              "lots_available": "89"
            }
          ],
          "carpark_number": "L1",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "486",
              "lot_type": "C",
              "lots_available": "225"
            }
          ],
          "carpark_number": "SE15",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "436",
              "lot_type": "C",
              "lots_available": "273"
            }
          ],
          "carpark_number": "SE17",
          "update_datetime": "2019-02-13T00:48:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "279",
              "lot_type": "C",
              "lots_available": "24"
            }
          ],
          "carpark_number": "SE18",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "558",
              "lot_type": "C",
              "lots_available": "282"
            }
          ],
          "carpark_number": "SE19",
          "update_datetime": "2019-02-13T00:48:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "239",
              "lot_type": "C",
              "lots_available": "64"
            }
          ],
          "carpark_number": "SE25",
          "update_datetime": "2019-02-13T00:48:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "214",
              "lot_type": "C",
              "lots_available": "86"
            }
          ],
          "carpark_number": "SE26",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "380",
              "lot_type": "C",
              "lots_available": "79"
            }
          ],
          "carpark_number": "SE27",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "186",
              "lot_type": "C",
              "lots_available": "153"
            }
          ],
          "carpark_number": "SE28",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "333",
              "lot_type": "C",
              "lots_available": "162"
            }
          ],
          "carpark_number": "SE29",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "173",
              "lot_type": "C",
              "lots_available": "162"
            }
          ],
          "carpark_number": "SH2",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "323",
              "lot_type": "C",
              "lots_available": "93"
            }
          ],
          "carpark_number": "W43",
          "update_datetime": "2019-02-13T00:45:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "147",
              "lot_type": "C",
              "lots_available": "27"
            }
          ],
          "carpark_number": "HG5",
          "update_datetime": "2019-02-13T00:48:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "407",
              "lot_type": "C",
              "lots_available": "265"
            }
          ],
          "carpark_number": "W46",
          "update_datetime": "2019-02-13T00:47:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "20",
              "lot_type": "C",
              "lots_available": "10"
            }
          ],
          "carpark_number": "TP68",
          "update_datetime": "2019-02-13T00:48:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "167"
            }
          ],
          "carpark_number": "DUXM",
          "update_datetime": "2019-02-13T00:47:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "296",
              "lot_type": "C",
              "lots_available": "135"
            }
          ],
          "carpark_number": "TP49",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "296",
              "lot_type": "C",
              "lots_available": "135"
            }
          ],
          "carpark_number": "TP50",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "326",
              "lot_type": "C",
              "lots_available": "134"
            }
          ],
          "carpark_number": "SI1",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "208",
              "lot_type": "C",
              "lots_available": "57"
            }
          ],
          "carpark_number": "SI11",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "168",
              "lot_type": "C",
              "lots_available": "64"
            }
          ],
          "carpark_number": "SI12",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "315",
              "lot_type": "C",
              "lots_available": "256"
            }
          ],
          "carpark_number": "SIM1",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "306",
              "lot_type": "C",
              "lots_available": "218"
            }
          ],
          "carpark_number": "SIM2",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "236",
              "lot_type": "C",
              "lots_available": "156"
            }
          ],
          "carpark_number": "SIM3",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "284",
              "lot_type": "C",
              "lots_available": "75"
            }
          ],
          "carpark_number": "T34",
          "update_datetime": "2019-02-13T00:48:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "630",
              "lot_type": "C",
              "lots_available": "89"
            }
          ],
          "carpark_number": "T35",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "290",
              "lot_type": "C",
              "lots_available": "47"
            }
          ],
          "carpark_number": "T4",
          "update_datetime": "2019-02-13T00:48:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "231",
              "lot_type": "C",
              "lots_available": "6"
            }
          ],
          "carpark_number": "T75",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "348",
              "lot_type": "C",
              "lots_available": "134"
            }
          ],
          "carpark_number": "T80",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "439",
              "lot_type": "C",
              "lots_available": "185"
            }
          ],
          "carpark_number": "TM11",
          "update_datetime": "2019-02-13T00:48:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "346",
              "lot_type": "C",
              "lots_available": "125"
            }
          ],
          "carpark_number": "TM12",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "207",
              "lot_type": "C",
              "lots_available": "103"
            }
          ],
          "carpark_number": "TM13",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "361",
              "lot_type": "C",
              "lots_available": "106"
            }
          ],
          "carpark_number": "TM14",
          "update_datetime": "2019-02-13T00:48:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "448",
              "lot_type": "C",
              "lots_available": "166"
            }
          ],
          "carpark_number": "TM17",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "306",
              "lot_type": "C",
              "lots_available": "53"
            }
          ],
          "carpark_number": "TM18",
          "update_datetime": "2019-02-13T00:48:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "338",
              "lot_type": "C",
              "lots_available": "86"
            }
          ],
          "carpark_number": "TM21",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "345",
              "lot_type": "C",
              "lots_available": "90"
            }
          ],
          "carpark_number": "TM22",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "290",
              "lot_type": "C",
              "lots_available": "62"
            }
          ],
          "carpark_number": "TM28",
          "update_datetime": "2019-02-13T00:48:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "272",
              "lot_type": "C",
              "lots_available": "139"
            }
          ],
          "carpark_number": "TM29",
          "update_datetime": "2019-02-13T00:48:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "428",
              "lot_type": "C",
              "lots_available": "193"
            }
          ],
          "carpark_number": "TM3",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "408",
              "lot_type": "C",
              "lots_available": "145"
            }
          ],
          "carpark_number": "TM30",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "476",
              "lot_type": "C",
              "lots_available": "127"
            }
          ],
          "carpark_number": "TM31",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "460",
              "lot_type": "C",
              "lots_available": "202"
            }
          ],
          "carpark_number": "TM32",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "512",
              "lot_type": "C",
              "lots_available": "203"
            }
          ],
          "carpark_number": "TM4",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "197",
              "lot_type": "C",
              "lots_available": "79"
            }
          ],
          "carpark_number": "TM49",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "501",
              "lot_type": "C",
              "lots_available": "146"
            }
          ],
          "carpark_number": "TM5",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "446",
              "lot_type": "C",
              "lots_available": "160"
            }
          ],
          "carpark_number": "PL23",
          "update_datetime": "2019-02-13T00:47:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "407",
              "lot_type": "C",
              "lots_available": "130"
            }
          ],
          "carpark_number": "PL27",
          "update_datetime": "2019-02-13T00:47:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "277",
              "lot_type": "C",
              "lots_available": "89"
            }
          ],
          "carpark_number": "PL34",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "234",
              "lot_type": "C",
              "lots_available": "72"
            }
          ],
          "carpark_number": "PL35",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "286",
              "lot_type": "C",
              "lots_available": "62"
            }
          ],
          "carpark_number": "PL37",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "20",
              "lot_type": "C",
              "lots_available": "4"
            }
          ],
          "carpark_number": "P34L",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "10",
              "lot_type": "C",
              "lots_available": "10"
            }
          ],
          "carpark_number": "P35L",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "591",
              "lot_type": "C",
              "lots_available": "178"
            }
          ],
          "carpark_number": "SI2",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "460",
              "lot_type": "C",
              "lots_available": "95"
            }
          ],
          "carpark_number": "SI4",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "645",
              "lot_type": "C",
              "lots_available": "179"
            }
          ],
          "carpark_number": "T32",
          "update_datetime": "2019-02-13T00:48:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "342",
              "lot_type": "C",
              "lots_available": "220"
            }
          ],
          "carpark_number": "B28",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "260",
              "lot_type": "C",
              "lots_available": "155"
            }
          ],
          "carpark_number": "SIM5",
          "update_datetime": "2019-02-13T00:48:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "776",
              "lot_type": "C",
              "lots_available": "57"
            }
          ],
          "carpark_number": "TWM1",
          "update_datetime": "2019-02-13T00:47:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "150",
              "lot_type": "C",
              "lots_available": "57"
            }
          ],
          "carpark_number": "A52",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "870",
              "lot_type": "C",
              "lots_available": "630"
            }
          ],
          "carpark_number": "A53",
          "update_datetime": "2019-02-13T00:48:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "743",
              "lot_type": "C",
              "lots_available": "576"
            }
          ],
          "carpark_number": "A54",
          "update_datetime": "2019-02-13T00:49:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "337",
              "lot_type": "C",
              "lots_available": "218"
            }
          ],
          "carpark_number": "AM51",
          "update_datetime": "2019-02-13T00:48:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "234",
              "lot_type": "C",
              "lots_available": "126"
            }
          ],
          "carpark_number": "B47",
          "update_datetime": "2019-02-13T00:49:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "210",
              "lot_type": "C",
              "lots_available": "49"
            }
          ],
          "carpark_number": "B48",
          "update_datetime": "2019-02-13T00:49:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "692",
              "lot_type": "C",
              "lots_available": "136"
            }
          ],
          "carpark_number": "J21",
          "update_datetime": "2019-02-13T00:44:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "54",
              "lot_type": "C",
              "lots_available": "22"
            }
          ],
          "carpark_number": "SM9",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "420",
              "lot_type": "C",
              "lots_available": "378"
            }
          ],
          "carpark_number": "Q82",
          "update_datetime": "2018-08-13T06:36:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "236",
              "lot_type": "C",
              "lots_available": "102"
            }
          ],
          "carpark_number": "HG2",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "323",
              "lot_type": "C",
              "lots_available": "39"
            }
          ],
          "carpark_number": "HG2B",
          "update_datetime": "2019-02-13T00:48:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "380",
              "lot_type": "C",
              "lots_available": "191"
            }
          ],
          "carpark_number": "HG4",
          "update_datetime": "2019-02-13T00:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "200",
              "lot_type": "C",
              "lots_available": "30"
            }
          ],
          "carpark_number": "GSM",
          "update_datetime": "2019-02-13T00:48:12"
        },
        {
          "carpark_info": [
            {
              "total_lots": "514",
              "lot_type": "C",
              "lots_available": "323"
            }
          ],
          "carpark_number": "SK40",
          "update_datetime": "2019-02-13T00:47:12"
        },
        {
          "carpark_info": [
            {
              "total_lots": "392",
              "lot_type": "C",
              "lots_available": "195"
            }
          ],
          "carpark_number": "SK41",
          "update_datetime": "2019-02-13T00:45:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "418",
              "lot_type": "C",
              "lots_available": "165"
            }
          ],
          "carpark_number": "SK44",
          "update_datetime": "2019-02-13T00:45:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "471",
              "lot_type": "C",
              "lots_available": "248"
            }
          ],
          "carpark_number": "SK48",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "483",
              "lot_type": "C",
              "lots_available": "300"
            }
          ],
          "carpark_number": "SK49",
          "update_datetime": "2019-02-13T00:45:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "471",
              "lot_type": "C",
              "lots_available": "252"
            }
          ],
          "carpark_number": "SK50",
          "update_datetime": "2019-02-13T00:45:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "541",
              "lot_type": "C",
              "lots_available": "333"
            }
          ],
          "carpark_number": "SK51",
          "update_datetime": "2019-02-13T00:45:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "227",
              "lot_type": "C",
              "lots_available": "126"
            }
          ],
          "carpark_number": "KEM1",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "127",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BR8",
          "update_datetime": "2019-02-13T00:48:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "131",
              "lot_type": "C",
              "lots_available": "90"
            }
          ],
          "carpark_number": "BR6",
          "update_datetime": "2019-02-13T00:48:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "59",
              "lot_type": "C",
              "lots_available": "17"
            }
          ],
          "carpark_number": "BR10",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "22",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "GSML",
          "update_datetime": "2019-02-13T00:48:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "918",
              "lot_type": "C",
              "lots_available": "502"
            }
          ],
          "carpark_number": "CK53",
          "update_datetime": "2019-02-13T00:46:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1052",
              "lot_type": "C",
              "lots_available": "617"
            }
          ],
          "carpark_number": "HG73",
          "update_datetime": "2019-02-13T00:48:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "709",
              "lot_type": "C",
              "lots_available": "539"
            }
          ],
          "carpark_number": "W106",
          "update_datetime": "2019-02-13T00:46:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "696",
              "lot_type": "C",
              "lots_available": "566"
            }
          ],
          "carpark_number": "W104",
          "update_datetime": "2019-02-13T00:46:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "126",
              "lot_type": "C",
              "lots_available": "62"
            }
          ],
          "carpark_number": "W105",
          "update_datetime": "2019-02-13T00:46:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "401",
              "lot_type": "C",
              "lots_available": "63"
            }
          ],
          "carpark_number": "CK10",
          "update_datetime": "2019-02-13T00:46:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "45",
              "lot_type": "C",
              "lots_available": "1"
            }
          ],
          "carpark_number": "CK9",
          "update_datetime": "2019-02-13T00:46:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "809",
              "lot_type": "C",
              "lots_available": "322"
            }
          ],
          "carpark_number": "EC2",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "46",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "EC3",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "114",
              "lot_type": "C",
              "lots_available": "52"
            }
          ],
          "carpark_number": "EC4",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "407",
              "lot_type": "C",
              "lots_available": "170"
            }
          ],
          "carpark_number": "ECM",
          "update_datetime": "2019-02-13T00:48:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "125",
              "lot_type": "C",
              "lots_available": "30"
            }
          ],
          "carpark_number": "M33",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "549",
              "lot_type": "C",
              "lots_available": "366"
            }
          ],
          "carpark_number": "CK59",
          "update_datetime": "2019-02-13T00:46:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "273",
              "lot_type": "C",
              "lots_available": "116"
            }
          ],
          "carpark_number": "CKM9",
          "update_datetime": "2019-02-13T00:46:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "383",
              "lot_type": "C",
              "lots_available": "60"
            }
          ],
          "carpark_number": "W782",
          "update_datetime": "2019-02-13T00:45:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "668",
              "lot_type": "C",
              "lots_available": "398"
            }
          ],
          "carpark_number": "SK5",
          "update_datetime": "2019-02-13T00:47:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "615",
              "lot_type": "C",
              "lots_available": "15"
            }
          ],
          "carpark_number": "PL18",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "615",
              "lot_type": "C",
              "lots_available": "39"
            }
          ],
          "carpark_number": "PL21",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "417",
              "lot_type": "C",
              "lots_available": "80"
            }
          ],
          "carpark_number": "PL43",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "669",
              "lot_type": "C",
              "lots_available": "138"
            }
          ],
          "carpark_number": "PL59",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "587",
              "lot_type": "C",
              "lots_available": "247"
            }
          ],
          "carpark_number": "PL52",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "466",
              "lot_type": "C",
              "lots_available": "88"
            }
          ],
          "carpark_number": "PL65",
          "update_datetime": "2019-02-13T00:48:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "459",
              "lot_type": "C",
              "lots_available": "277"
            }
          ],
          "carpark_number": "W12M",
          "update_datetime": "2019-02-13T00:47:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "10",
              "lot_type": "C",
              "lots_available": "10"
            }
          ],
          "carpark_number": "W12L",
          "update_datetime": "2016-06-03T13:30:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "447",
              "lot_type": "C",
              "lots_available": "345"
            }
          ],
          "carpark_number": "W93",
          "update_datetime": "2019-02-13T00:46:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "444",
              "lot_type": "C",
              "lots_available": "164"
            }
          ],
          "carpark_number": "PM26",
          "update_datetime": "2019-02-13T00:50:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "63",
              "lot_type": "C",
              "lots_available": "28"
            }
          ],
          "carpark_number": "BJ14",
          "update_datetime": "2019-02-13T00:46:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "47",
              "lot_type": "C",
              "lots_available": "15"
            }
          ],
          "carpark_number": "BJ15",
          "update_datetime": "2019-02-13T00:46:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "311",
              "lot_type": "C",
              "lots_available": "188"
            }
          ],
          "carpark_number": "BJ16",
          "update_datetime": "2019-02-13T00:46:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "16",
              "lot_type": "C",
              "lots_available": "6"
            }
          ],
          "carpark_number": "BJ23",
          "update_datetime": "2019-02-13T00:46:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1002",
              "lot_type": "C",
              "lots_available": "532"
            }
          ],
          "carpark_number": "BJ44",
          "update_datetime": "2019-02-13T00:46:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "60",
              "lot_type": "C",
              "lots_available": "49"
            }
          ],
          "carpark_number": "BJMP",
          "update_datetime": "2019-02-13T00:46:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "152",
              "lot_type": "C",
              "lots_available": "45"
            }
          ],
          "carpark_number": "SG4",
          "update_datetime": "2019-02-13T00:46:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "603",
              "lot_type": "C",
              "lots_available": "201"
            }
          ],
          "carpark_number": "Y12",
          "update_datetime": "2019-02-13T00:41:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "127",
              "lot_type": "C",
              "lots_available": "44"
            }
          ],
          "carpark_number": "EC7",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "234",
              "lot_type": "C",
              "lots_available": "92"
            }
          ],
          "carpark_number": "Y62M",
          "update_datetime": "2019-02-13T00:46:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "53",
              "lot_type": "C",
              "lots_available": "4"
            },
            {
              "total_lots": "155",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q68",
          "update_datetime": "2019-02-13T00:44:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "95",
              "lot_type": "C",
              "lots_available": "24"
            },
            {
              "total_lots": "0",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q65",
          "update_datetime": "2019-02-13T00:46:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "486",
              "lot_type": "C",
              "lots_available": "249"
            }
          ],
          "carpark_number": "SK89",
          "update_datetime": "2019-02-13T00:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "196",
              "lot_type": "C",
              "lots_available": "108"
            }
          ],
          "carpark_number": "AR1M",
          "update_datetime": "2019-02-13T00:48:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "555",
              "lot_type": "C",
              "lots_available": "198"
            }
          ],
          "carpark_number": "A35",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "397",
              "lot_type": "C",
              "lots_available": "191"
            }
          ],
          "carpark_number": "A45",
          "update_datetime": "2019-02-13T00:48:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "62",
              "lot_type": "C",
              "lots_available": "16"
            }
          ],
          "carpark_number": "A48",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "132",
              "lot_type": "C",
              "lots_available": "16"
            }
          ],
          "carpark_number": "A64",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "100",
              "lot_type": "C",
              "lots_available": "44"
            }
          ],
          "carpark_number": "TB19",
          "update_datetime": "2019-02-13T00:47:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "206",
              "lot_type": "C",
              "lots_available": "64"
            }
          ],
          "carpark_number": "Y5",
          "update_datetime": "2019-02-13T00:48:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "607",
              "lot_type": "C",
              "lots_available": "310"
            }
          ],
          "carpark_number": "Q77M",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "31",
              "lot_type": "C",
              "lots_available": "25"
            }
          ],
          "carpark_number": "Q80",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "148",
              "lot_type": "C",
              "lots_available": "132"
            }
          ],
          "carpark_number": "Q85",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "341",
              "lot_type": "C",
              "lots_available": "160"
            }
          ],
          "carpark_number": "W570",
          "update_datetime": "2019-02-13T00:45:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "366",
              "lot_type": "C",
              "lots_available": "58"
            }
          ],
          "carpark_number": "TB17",
          "update_datetime": "2019-02-13T00:48:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "423",
              "lot_type": "C",
              "lots_available": "276"
            }
          ],
          "carpark_number": "TBM5",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "400",
              "lot_type": "C",
              "lots_available": "333"
            }
          ],
          "carpark_number": "TBM6",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "529",
              "lot_type": "C",
              "lots_available": "418"
            }
          ],
          "carpark_number": "TBM7",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "379",
              "lot_type": "C",
              "lots_available": "305"
            }
          ],
          "carpark_number": "PM23",
          "update_datetime": "2019-02-13T00:48:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "356",
              "lot_type": "C",
              "lots_available": "49"
            }
          ],
          "carpark_number": "PR13",
          "update_datetime": "2019-02-13T00:48:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "573",
              "lot_type": "C",
              "lots_available": "111"
            }
          ],
          "carpark_number": "SK95",
          "update_datetime": "2019-02-13T00:45:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "508",
              "lot_type": "C",
              "lots_available": "202"
            }
          ],
          "carpark_number": "SK90",
          "update_datetime": "2019-02-13T00:46:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "165",
              "lot_type": "C",
              "lots_available": "149"
            }
          ],
          "carpark_number": "EC8",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "357",
              "lot_type": "C",
              "lots_available": "108"
            }
          ],
          "carpark_number": "Y6",
          "update_datetime": "2019-02-13T00:45:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "40",
              "lot_type": "C",
              "lots_available": "7"
            }
          ],
          "carpark_number": "Y58",
          "update_datetime": "2019-02-13T00:47:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "124",
              "lot_type": "C",
              "lots_available": "32"
            }
          ],
          "carpark_number": "A87",
          "update_datetime": "2019-02-13T00:49:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "308",
              "lot_type": "C",
              "lots_available": "44"
            }
          ],
          "carpark_number": "A41",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "166",
              "lot_type": "C",
              "lots_available": "11"
            }
          ],
          "carpark_number": "A42",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "568",
              "lot_type": "C",
              "lots_available": "68"
            }
          ],
          "carpark_number": "HG19",
          "update_datetime": "2019-02-13T00:48:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "645",
              "lot_type": "C",
              "lots_available": "87"
            }
          ],
          "carpark_number": "HG20",
          "update_datetime": "2019-02-13T00:48:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "500",
              "lot_type": "C",
              "lots_available": "233"
            }
          ],
          "carpark_number": "HG23",
          "update_datetime": "2019-02-13T00:48:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "450",
              "lot_type": "C",
              "lots_available": "319"
            }
          ],
          "carpark_number": "W82",
          "update_datetime": "2019-02-13T00:47:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "464",
              "lot_type": "C",
              "lots_available": "367"
            }
          ],
          "carpark_number": "W95",
          "update_datetime": "2019-02-13T00:46:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "380",
              "lot_type": "C",
              "lots_available": "208"
            }
          ],
          "carpark_number": "SB33",
          "update_datetime": "2019-02-13T00:57:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "472",
              "lot_type": "C",
              "lots_available": "196"
            }
          ],
          "carpark_number": "Y41",
          "update_datetime": "2019-02-13T00:46:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "351",
              "lot_type": "C",
              "lots_available": "287"
            }
          ],
          "carpark_number": "Y41M",
          "update_datetime": "2019-02-13T00:46:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "322",
              "lot_type": "C",
              "lots_available": "59"
            }
          ],
          "carpark_number": "J6",
          "update_datetime": "2019-02-13T00:44:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "950",
              "lot_type": "C",
              "lots_available": "237"
            }
          ],
          "carpark_number": "J7",
          "update_datetime": "2019-02-13T00:44:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "515",
              "lot_type": "C",
              "lots_available": "323"
            }
          ],
          "carpark_number": "W85",
          "update_datetime": "2019-02-13T00:46:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "351",
              "lot_type": "C",
              "lots_available": "149"
            }
          ],
          "carpark_number": "SK85",
          "update_datetime": "2019-02-13T00:45:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "294",
              "lot_type": "C",
              "lots_available": "201"
            }
          ],
          "carpark_number": "SI10",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "54",
              "lot_type": "C",
              "lots_available": "13"
            }
          ],
          "carpark_number": "SI6",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "364",
              "lot_type": "C",
              "lots_available": "182"
            }
          ],
          "carpark_number": "SI7",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "118",
              "lot_type": "C",
              "lots_available": "77"
            }
          ],
          "carpark_number": "SI8",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "190",
              "lot_type": "C",
              "lots_available": "34"
            }
          ],
          "carpark_number": "SI9",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "393",
              "lot_type": "C",
              "lots_available": "125"
            }
          ],
          "carpark_number": "T20",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "226",
              "lot_type": "C",
              "lots_available": "95"
            }
          ],
          "carpark_number": "T30",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "193",
              "lot_type": "C",
              "lots_available": "61"
            }
          ],
          "carpark_number": "T31",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "462",
              "lot_type": "C",
              "lots_available": "104"
            }
          ],
          "carpark_number": "T79",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "685",
              "lot_type": "C",
              "lots_available": "137"
            }
          ],
          "carpark_number": "T81",
          "update_datetime": "2019-02-13T00:48:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "299",
              "lot_type": "C",
              "lots_available": "109"
            }
          ],
          "carpark_number": "TM15",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "284",
              "lot_type": "C",
              "lots_available": "100"
            }
          ],
          "carpark_number": "TM16",
          "update_datetime": "2019-02-13T00:48:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "216",
              "lot_type": "C",
              "lots_available": "140"
            }
          ],
          "carpark_number": "TM44",
          "update_datetime": "2019-02-13T00:48:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "40",
              "lot_type": "C",
              "lots_available": "24"
            },
            {
              "total_lots": "1000",
              "lot_type": "Y",
              "lots_available": "360"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q17",
          "update_datetime": "2019-02-13T00:46:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "40",
              "lot_type": "C",
              "lots_available": "11"
            },
            {
              "total_lots": "155",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q16A",
          "update_datetime": "2016-10-19T03:42:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "230",
              "lot_type": "C",
              "lots_available": "11"
            },
            {
              "total_lots": "180",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q96",
          "update_datetime": "2019-02-13T00:48:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "318",
              "lot_type": "C",
              "lots_available": "57"
            }
          ],
          "carpark_number": "HG74",
          "update_datetime": "2019-02-13T00:48:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "9999",
              "lot_type": "C",
              "lots_available": "9975"
            }
          ],
          "carpark_number": "B41",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "217",
              "lot_type": "C",
              "lots_available": "40"
            }
          ],
          "carpark_number": "B43",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "33",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "B46",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "183",
              "lot_type": "C",
              "lots_available": "46"
            }
          ],
          "carpark_number": "B49",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "412",
              "lot_type": "C",
              "lots_available": "86"
            }
          ],
          "carpark_number": "B72",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "50",
              "lot_type": "C",
              "lots_available": "30"
            }
          ],
          "carpark_number": "B73",
          "update_datetime": "2019-02-13T00:48:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "365",
              "lot_type": "C",
              "lots_available": "139"
            }
          ],
          "carpark_number": "B74",
          "update_datetime": "2019-02-13T00:48:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "21",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "B7B",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "212",
              "lot_type": "C",
              "lots_available": "119"
            }
          ],
          "carpark_number": "B83",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "559",
              "lot_type": "C",
              "lots_available": "291"
            }
          ],
          "carpark_number": "B85",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "438",
              "lot_type": "C",
              "lots_available": "242"
            }
          ],
          "carpark_number": "B94",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "186",
              "lot_type": "C",
              "lots_available": "10"
            }
          ],
          "carpark_number": "B94A",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "508",
              "lot_type": "C",
              "lots_available": "115"
            }
          ],
          "carpark_number": "B99M",
          "update_datetime": "2019-02-13T00:48:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "21",
              "lot_type": "C",
              "lots_available": "18"
            }
          ],
          "carpark_number": "BB",
          "update_datetime": "2016-05-13T18:05:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "87",
              "lot_type": "C",
              "lots_available": "87"
            }
          ],
          "carpark_number": "CC1",
          "update_datetime": "2017-06-01T14:27:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "233",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "CC10",
          "update_datetime": "2019-02-13T00:48:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "417",
              "lot_type": "C",
              "lots_available": "135"
            }
          ],
          "carpark_number": "CC11",
          "update_datetime": "2019-02-13T00:48:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "387",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "CC4",
          "update_datetime": "2019-02-13T00:48:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "147",
              "lot_type": "C",
              "lots_available": "16"
            }
          ],
          "carpark_number": "CC8",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "123",
              "lot_type": "C",
              "lots_available": "18"
            }
          ],
          "carpark_number": "CC9",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "560",
              "lot_type": "C",
              "lots_available": "200"
            }
          ],
          "carpark_number": "PL10",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "548",
              "lot_type": "C",
              "lots_available": "239"
            }
          ],
          "carpark_number": "PL11",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "363",
              "lot_type": "C",
              "lots_available": "149"
            }
          ],
          "carpark_number": "PL28",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "321",
              "lot_type": "C",
              "lots_available": "193"
            }
          ],
          "carpark_number": "BR4",
          "update_datetime": "2019-02-13T00:48:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "509",
              "lot_type": "C",
              "lots_available": "327"
            }
          ],
          "carpark_number": "Q75M",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "23",
              "lot_type": "C",
              "lots_available": "7"
            }
          ],
          "carpark_number": "C18A",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "280",
              "lot_type": "C",
              "lots_available": "141"
            }
          ],
          "carpark_number": "C16",
          "update_datetime": "2019-02-13T00:48:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "124",
              "lot_type": "C",
              "lots_available": "53"
            }
          ],
          "carpark_number": "C18",
          "update_datetime": "2019-02-13T00:49:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "696",
              "lot_type": "C",
              "lots_available": "324"
            }
          ],
          "carpark_number": "AR2M",
          "update_datetime": "2019-02-13T00:48:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "295",
              "lot_type": "C",
              "lots_available": "140"
            }
          ],
          "carpark_number": "AR7M",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "302",
              "lot_type": "C",
              "lots_available": "163"
            }
          ],
          "carpark_number": "W68",
          "update_datetime": "2019-02-13T00:46:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "443",
              "lot_type": "C",
              "lots_available": "261"
            }
          ],
          "carpark_number": "BL15",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "19",
              "lot_type": "C",
              "lots_available": "6"
            },
            {
              "total_lots": "21",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q16",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "293",
              "lot_type": "C",
              "lots_available": "101"
            }
          ],
          "carpark_number": "T26",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "136",
              "lot_type": "C",
              "lots_available": "55"
            }
          ],
          "carpark_number": "T27",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "228",
              "lot_type": "C",
              "lots_available": "89"
            }
          ],
          "carpark_number": "T28",
          "update_datetime": "2019-02-13T00:48:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "256",
              "lot_type": "C",
              "lots_available": "65"
            }
          ],
          "carpark_number": "T29",
          "update_datetime": "2019-02-13T00:48:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "410",
              "lot_type": "C",
              "lots_available": "62"
            }
          ],
          "carpark_number": "TM8",
          "update_datetime": "2019-02-13T00:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "314",
              "lot_type": "C",
              "lots_available": "52"
            }
          ],
          "carpark_number": "PL47",
          "update_datetime": "2019-02-13T00:48:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "256",
              "lot_type": "C",
              "lots_available": "31"
            }
          ],
          "carpark_number": "PL49",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "131",
              "lot_type": "C",
              "lots_available": "24"
            }
          ],
          "carpark_number": "J19",
          "update_datetime": "2019-02-13T00:44:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "34",
              "lot_type": "C",
              "lots_available": "10"
            }
          ],
          "carpark_number": "J24",
          "update_datetime": "2019-02-13T00:44:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "30",
              "lot_type": "C",
              "lots_available": "24"
            }
          ],
          "carpark_number": "J25",
          "update_datetime": "2019-02-13T00:44:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "31",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "J26",
          "update_datetime": "2019-02-13T00:44:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "330",
              "lot_type": "C",
              "lots_available": "298"
            }
          ],
          "carpark_number": "J64",
          "update_datetime": "2019-02-13T00:44:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "860",
              "lot_type": "C",
              "lots_available": "380"
            }
          ],
          "carpark_number": "B19",
          "update_datetime": "2019-02-13T00:48:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1080",
              "lot_type": "C",
              "lots_available": "338"
            }
          ],
          "carpark_number": "B44",
          "update_datetime": "2019-02-13T00:48:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "487",
              "lot_type": "C",
              "lots_available": "233"
            }
          ],
          "carpark_number": "SK27",
          "update_datetime": "2019-02-13T00:47:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "143",
              "lot_type": "C",
              "lots_available": "107"
            }
          ],
          "carpark_number": "TE13",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "385",
              "lot_type": "C",
              "lots_available": "199"
            }
          ],
          "carpark_number": "SK96",
          "update_datetime": "2019-02-13T00:46:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "4",
              "lot_type": "C",
              "lots_available": "4"
            }
          ],
          "carpark_number": "AR2L",
          "update_datetime": "2019-02-13T00:47:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "62",
              "lot_type": "C",
              "lots_available": "17"
            }
          ],
          "carpark_number": "A10",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "51",
              "lot_type": "C",
              "lots_available": "6"
            }
          ],
          "carpark_number": "A8",
          "update_datetime": "2019-02-13T00:49:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "359",
              "lot_type": "C",
              "lots_available": "223"
            }
          ],
          "carpark_number": "B95",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "242",
              "lot_type": "C",
              "lots_available": "132"
            }
          ],
          "carpark_number": "B96",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "277",
              "lot_type": "C",
              "lots_available": "211"
            }
          ],
          "carpark_number": "AV1",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "102",
              "lot_type": "C",
              "lots_available": "72"
            }
          ],
          "carpark_number": "H4",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "229",
              "lot_type": "C",
              "lots_available": "61"
            }
          ],
          "carpark_number": "H17",
          "update_datetime": "2019-02-13T00:47:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "336",
              "lot_type": "C",
              "lots_available": "216"
            }
          ],
          "carpark_number": "H18",
          "update_datetime": "2019-02-13T00:48:12"
        },
        {
          "carpark_info": [
            {
              "total_lots": "198",
              "lot_type": "C",
              "lots_available": "56"
            }
          ],
          "carpark_number": "Y16",
          "update_datetime": "2019-02-13T00:47:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "680",
              "lot_type": "C",
              "lots_available": "322"
            }
          ],
          "carpark_number": "S102",
          "update_datetime": "2019-02-13T00:47:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "22",
              "lot_type": "C",
              "lots_available": "7"
            }
          ],
          "carpark_number": "BKE1",
          "update_datetime": "2019-02-13T00:48:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "38",
              "lot_type": "C",
              "lots_available": "31"
            }
          ],
          "carpark_number": "BKE9",
          "update_datetime": "2019-02-13T00:48:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "428",
              "lot_type": "C",
              "lots_available": "123"
            }
          ],
          "carpark_number": "Y17",
          "update_datetime": "2019-02-13T00:52:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "534",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "JM16",
          "update_datetime": "2019-02-13T00:48:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "954",
              "lot_type": "C",
              "lots_available": "414"
            }
          ],
          "carpark_number": "JM17",
          "update_datetime": "2019-02-13T00:48:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "564",
              "lot_type": "C",
              "lots_available": "280"
            }
          ],
          "carpark_number": "SK67",
          "update_datetime": "2019-02-13T00:48:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "382",
              "lot_type": "C",
              "lots_available": "76"
            }
          ],
          "carpark_number": "PL36",
          "update_datetime": "2019-02-13T00:48:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "565",
              "lot_type": "C",
              "lots_available": "402"
            }
          ],
          "carpark_number": "SK65",
          "update_datetime": "2019-02-13T00:45:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "391",
              "lot_type": "C",
              "lots_available": "222"
            }
          ],
          "carpark_number": "SK64",
          "update_datetime": "2019-02-13T00:46:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "120",
              "lot_type": "C",
              "lots_available": "39"
            }
          ],
          "carpark_number": "CR1",
          "update_datetime": "2019-02-13T00:47:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "197",
              "lot_type": "C",
              "lots_available": "153"
            }
          ],
          "carpark_number": "BBB",
          "update_datetime": "2019-02-13T00:46:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "622",
              "lot_type": "C",
              "lots_available": "572"
            }
          ],
          "carpark_number": "BM31",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "260",
              "lot_type": "C",
              "lots_available": "214"
            }
          ],
          "carpark_number": "CSM",
          "update_datetime": "2019-02-13T00:46:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "284",
              "lot_type": "C",
              "lots_available": "238"
            }
          ],
          "carpark_number": "FRM",
          "update_datetime": "2019-02-13T00:44:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "64",
              "lot_type": "C",
              "lots_available": "39"
            }
          ],
          "carpark_number": "GE1B",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "100",
              "lot_type": "C",
              "lots_available": "79"
            }
          ],
          "carpark_number": "GE1C",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "231",
              "lot_type": "C",
              "lots_available": "221"
            }
          ],
          "carpark_number": "GEM",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "124",
              "lot_type": "C",
              "lots_available": "98"
            }
          ],
          "carpark_number": "HG15",
          "update_datetime": "2019-02-13T00:47:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "71",
              "lot_type": "C",
              "lots_available": "53"
            }
          ],
          "carpark_number": "HG16",
          "update_datetime": "2019-02-13T00:47:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "419",
              "lot_type": "C",
              "lots_available": "376"
            }
          ],
          "carpark_number": "HG25",
          "update_datetime": "2019-02-13T00:47:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "249",
              "lot_type": "C",
              "lots_available": "15"
            }
          ],
          "carpark_number": "HG37",
          "update_datetime": "2019-02-13T00:47:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1279",
              "lot_type": "C",
              "lots_available": "111"
            }
          ],
          "carpark_number": "HG38",
          "update_datetime": "2019-02-13T00:47:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "435",
              "lot_type": "C",
              "lots_available": "86"
            }
          ],
          "carpark_number": "HG45",
          "update_datetime": "2019-02-13T00:47:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "261",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG46",
          "update_datetime": "2019-02-13T00:47:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "699",
              "lot_type": "C",
              "lots_available": "329"
            }
          ],
          "carpark_number": "HG88",
          "update_datetime": "2019-02-13T00:47:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "246",
              "lot_type": "C",
              "lots_available": "205"
            }
          ],
          "carpark_number": "HG9",
          "update_datetime": "2019-02-13T00:47:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "145",
              "lot_type": "C",
              "lots_available": "139"
            }
          ],
          "carpark_number": "HG9T",
          "update_datetime": "2019-02-13T00:47:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "372",
              "lot_type": "C",
              "lots_available": "316"
            }
          ],
          "carpark_number": "JCM",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "2",
              "lot_type": "C",
              "lots_available": "2"
            }
          ],
          "carpark_number": "JCML",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "96",
              "lot_type": "C",
              "lots_available": "9"
            }
          ],
          "carpark_number": "K10",
          "update_datetime": "2019-02-13T00:48:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "330",
              "lot_type": "C",
              "lots_available": "115"
            }
          ],
          "carpark_number": "KAM",
          "update_datetime": "2019-02-13T00:48:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "6",
              "lot_type": "C",
              "lots_available": "5"
            }
          ],
          "carpark_number": "KAML",
          "update_datetime": "2019-02-13T00:47:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "20",
              "lot_type": "C",
              "lots_available": "20"
            }
          ],
          "carpark_number": "KAMS",
          "update_datetime": "2018-01-25T05:07:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "424",
              "lot_type": "C",
              "lots_available": "268"
            }
          ],
          "carpark_number": "KM1",
          "update_datetime": "2019-02-13T00:48:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "3",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "LUB",
          "update_datetime": "2017-04-01T09:28:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "60",
              "lot_type": "C",
              "lots_available": "54"
            }
          ],
          "carpark_number": "MP14",
          "update_datetime": "2019-02-13T00:48:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "23",
              "lot_type": "C",
              "lots_available": "21"
            }
          ],
          "carpark_number": "MP15",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "22",
              "lot_type": "C",
              "lots_available": "10"
            }
          ],
          "carpark_number": "MP16",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "511",
              "lot_type": "C",
              "lots_available": "511"
            }
          ],
          "carpark_number": "MP19",
          "update_datetime": "2019-02-13T00:47:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "367",
              "lot_type": "C",
              "lots_available": "145"
            }
          ],
          "carpark_number": "PR3",
          "update_datetime": "2019-02-13T00:47:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "336",
              "lot_type": "C",
              "lots_available": "227"
            }
          ],
          "carpark_number": "PR6",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "583",
              "lot_type": "C",
              "lots_available": "499"
            }
          ],
          "carpark_number": "PRM",
          "update_datetime": "2019-02-13T00:47:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "589",
              "lot_type": "C",
              "lots_available": "418"
            }
          ],
          "carpark_number": "SIM4",
          "update_datetime": "2019-02-13T00:47:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "8",
              "lot_type": "C",
              "lots_available": "7"
            }
          ],
          "carpark_number": "T55",
          "update_datetime": "2019-02-13T00:47:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "418",
              "lot_type": "C",
              "lots_available": "317"
            }
          ],
          "carpark_number": "TAM1",
          "update_datetime": "2019-02-13T00:47:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "858",
              "lot_type": "C",
              "lots_available": "244"
            }
          ],
          "carpark_number": "KE1",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "193",
              "lot_type": "C",
              "lots_available": "13"
            }
          ],
          "carpark_number": "EI3",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "78",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HR1",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "187",
              "lot_type": "C",
              "lots_available": "14"
            }
          ],
          "carpark_number": "HR2",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "227",
              "lot_type": "C",
              "lots_available": "66"
            }
          ],
          "carpark_number": "HR3",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "103",
              "lot_type": "C",
              "lots_available": "63"
            }
          ],
          "carpark_number": "HR4",
          "update_datetime": "2019-02-13T00:48:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "91",
              "lot_type": "C",
              "lots_available": "30"
            }
          ],
          "carpark_number": "HR5",
          "update_datetime": "2019-02-13T00:48:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "150",
              "lot_type": "C",
              "lots_available": "45"
            }
          ],
          "carpark_number": "B24",
          "update_datetime": "2019-02-13T00:47:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "138",
              "lot_type": "C",
              "lots_available": "4"
            }
          ],
          "carpark_number": "B25",
          "update_datetime": "2019-02-13T00:48:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "370",
              "lot_type": "C",
              "lots_available": "235"
            }
          ],
          "carpark_number": "B69",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "24",
              "lot_type": "C",
              "lots_available": "12"
            }
          ],
          "carpark_number": "T77",
          "update_datetime": "2019-02-13T00:48:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "533",
              "lot_type": "C",
              "lots_available": "390"
            }
          ],
          "carpark_number": "TAM2",
          "update_datetime": "2019-02-13T00:48:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "264",
              "lot_type": "C",
              "lots_available": "24"
            }
          ],
          "carpark_number": "BJ25",
          "update_datetime": "2019-02-13T00:46:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "264",
              "lot_type": "C",
              "lots_available": "97"
            }
          ],
          "carpark_number": "BJ26",
          "update_datetime": "2019-02-13T00:46:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "68",
              "lot_type": "C",
              "lots_available": "13"
            }
          ],
          "carpark_number": "BJ62",
          "update_datetime": "2019-02-13T00:46:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "674",
              "lot_type": "C",
              "lots_available": "331"
            }
          ],
          "carpark_number": "TWM2",
          "update_datetime": "2019-02-13T00:46:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1280",
              "lot_type": "C",
              "lots_available": "167"
            }
          ],
          "carpark_number": "HG87",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "784",
              "lot_type": "C",
              "lots_available": "111"
            }
          ],
          "carpark_number": "HG90",
          "update_datetime": "2019-02-13T00:48:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "787",
              "lot_type": "C",
              "lots_available": "107"
            }
          ],
          "carpark_number": "HG91",
          "update_datetime": "2019-02-13T00:48:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "83",
              "lot_type": "C",
              "lots_available": "39"
            }
          ],
          "carpark_number": "SD11",
          "update_datetime": "2019-02-13T00:46:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "470",
              "lot_type": "C",
              "lots_available": "192"
            }
          ],
          "carpark_number": "BRM",
          "update_datetime": "2019-02-13T00:46:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "4",
              "lot_type": "C",
              "lots_available": "4"
            }
          ],
          "carpark_number": "B23T",
          "update_datetime": "2018-12-26T13:34:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "359",
              "lot_type": "C",
              "lots_available": "273"
            }
          ],
          "carpark_number": "W94",
          "update_datetime": "2019-02-13T00:46:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "459",
              "lot_type": "C",
              "lots_available": "264"
            }
          ],
          "carpark_number": "JM21",
          "update_datetime": "2019-02-13T00:48:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "786",
              "lot_type": "C",
              "lots_available": "586"
            }
          ],
          "carpark_number": "JM24",
          "update_datetime": "2019-02-13T00:48:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "224",
              "lot_type": "C",
              "lots_available": "38"
            }
          ],
          "carpark_number": "T43",
          "update_datetime": "2019-02-13T00:48:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "229",
              "lot_type": "C",
              "lots_available": "77"
            }
          ],
          "carpark_number": "T44",
          "update_datetime": "2019-02-13T00:48:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "339",
              "lot_type": "C",
              "lots_available": "94"
            }
          ],
          "carpark_number": "T45",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "297",
              "lot_type": "C",
              "lots_available": "53"
            }
          ],
          "carpark_number": "T46",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "100",
              "lot_type": "C",
              "lots_available": "41"
            }
          ],
          "carpark_number": "TM19",
          "update_datetime": "2019-02-13T00:48:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "234",
              "lot_type": "C",
              "lots_available": "67"
            }
          ],
          "carpark_number": "TM20",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "50",
              "lot_type": "C",
              "lots_available": "32"
            }
          ],
          "carpark_number": "BR9",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "25",
              "lot_type": "C",
              "lots_available": "7"
            },
            {
              "total_lots": "1000",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q73",
          "update_datetime": "2019-02-13T00:47:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "25",
              "lot_type": "C",
              "lots_available": "2"
            },
            {
              "total_lots": "1000",
              "lot_type": "Y",
              "lots_available": "282"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q70",
          "update_datetime": "2019-02-13T00:47:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "78",
              "lot_type": "C",
              "lots_available": "50"
            },
            {
              "total_lots": "18",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q67",
          "update_datetime": "2019-02-13T00:47:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "77",
              "lot_type": "C",
              "lots_available": "52"
            }
          ],
          "carpark_number": "J66",
          "update_datetime": "2019-02-13T00:49:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "156",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "J67",
          "update_datetime": "2019-02-13T00:49:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "276",
              "lot_type": "C",
              "lots_available": "166"
            }
          ],
          "carpark_number": "J68M",
          "update_datetime": "2019-02-13T00:49:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "111",
              "lot_type": "C",
              "lots_available": "54"
            }
          ],
          "carpark_number": "PP6",
          "update_datetime": "2019-02-13T00:48:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "251",
              "lot_type": "C",
              "lots_available": "35"
            }
          ],
          "carpark_number": "SIM6",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "167",
              "lot_type": "C",
              "lots_available": "88"
            }
          ],
          "carpark_number": "KJ1",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "100",
              "lot_type": "C",
              "lots_available": "54"
            }
          ],
          "carpark_number": "KJ2",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "225",
              "lot_type": "C",
              "lots_available": "85"
            }
          ],
          "carpark_number": "B26",
          "update_datetime": "2019-02-13T00:47:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "260",
              "lot_type": "C",
              "lots_available": "53"
            }
          ],
          "carpark_number": "B27",
          "update_datetime": "2019-02-13T00:47:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1530",
              "lot_type": "C",
              "lots_available": "1347"
            }
          ],
          "carpark_number": "GMLM",
          "update_datetime": "2018-06-08T15:03:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "65",
              "lot_type": "C",
              "lots_available": "31"
            }
          ],
          "carpark_number": "GM2",
          "update_datetime": "2019-02-13T00:48:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "56",
              "lot_type": "C",
              "lots_available": "27"
            }
          ],
          "carpark_number": "GM3",
          "update_datetime": "2019-02-13T00:47:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "118",
              "lot_type": "C",
              "lots_available": "66"
            }
          ],
          "carpark_number": "GM5",
          "update_datetime": "2019-02-13T00:48:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "146",
              "lot_type": "C",
              "lots_available": "120"
            }
          ],
          "carpark_number": "GM2A",
          "update_datetime": "2019-02-13T00:47:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "232",
              "lot_type": "C",
              "lots_available": "173"
            }
          ],
          "carpark_number": "GM6B",
          "update_datetime": "2019-02-13T00:48:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "467",
              "lot_type": "C",
              "lots_available": "293"
            }
          ],
          "carpark_number": "KJM2",
          "update_datetime": "2019-02-13T00:45:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "587",
              "lot_type": "C",
              "lots_available": "273"
            }
          ],
          "carpark_number": "HVM",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "401",
              "lot_type": "C",
              "lots_available": "186"
            }
          ],
          "carpark_number": "T1",
          "update_datetime": "2019-02-13T00:47:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "263",
              "lot_type": "C",
              "lots_available": "70"
            }
          ],
          "carpark_number": "T3",
          "update_datetime": "2019-02-13T00:47:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "106",
              "lot_type": "C",
              "lots_available": "79"
            }
          ],
          "carpark_number": "T7",
          "update_datetime": "2019-02-13T00:47:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "211",
              "lot_type": "C",
              "lots_available": "191"
            }
          ],
          "carpark_number": "T8",
          "update_datetime": "2019-02-13T00:47:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "334",
              "lot_type": "C",
              "lots_available": "144"
            }
          ],
          "carpark_number": "KJ3",
          "update_datetime": "2019-02-13T00:46:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "265",
              "lot_type": "C",
              "lots_available": "179"
            }
          ],
          "carpark_number": "KJM1",
          "update_datetime": "2019-02-13T00:45:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "200",
              "lot_type": "C",
              "lots_available": "95"
            }
          ],
          "carpark_number": "KJ4",
          "update_datetime": "2019-02-13T00:48:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "445",
              "lot_type": "C",
              "lots_available": "128"
            }
          ],
          "carpark_number": "CVBK",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "276",
              "lot_type": "C",
              "lots_available": "178"
            }
          ],
          "carpark_number": "BKRM",
          "update_datetime": "2019-02-13T00:46:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "952",
              "lot_type": "C",
              "lots_available": "529"
            }
          ],
          "carpark_number": "U52",
          "update_datetime": "2019-02-13T00:45:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1200",
              "lot_type": "C",
              "lots_available": "461"
            }
          ],
          "carpark_number": "CK62",
          "update_datetime": "2019-02-13T00:46:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "866",
              "lot_type": "C",
              "lots_available": "5"
            }
          ],
          "carpark_number": "CK63",
          "update_datetime": "2019-02-13T00:46:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1284",
              "lot_type": "C",
              "lots_available": "662"
            }
          ],
          "carpark_number": "CK64",
          "update_datetime": "2019-02-13T00:46:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "379",
              "lot_type": "C",
              "lots_available": "212"
            }
          ],
          "carpark_number": "P8",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "382",
              "lot_type": "C",
              "lots_available": "155"
            }
          ],
          "carpark_number": "P9",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "424",
              "lot_type": "C",
              "lots_available": "70"
            }
          ],
          "carpark_number": "PL53",
          "update_datetime": "2019-02-13T00:47:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "189",
              "lot_type": "C",
              "lots_available": "60"
            }
          ],
          "carpark_number": "RC2",
          "update_datetime": "2019-02-13T00:48:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "267",
              "lot_type": "C",
              "lots_available": "111"
            }
          ],
          "carpark_number": "RC3",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "518",
              "lot_type": "C",
              "lots_available": "265"
            }
          ],
          "carpark_number": "SK66",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "335",
              "lot_type": "C",
              "lots_available": "142"
            }
          ],
          "carpark_number": "BRM1",
          "update_datetime": "2019-02-13T00:48:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "284",
              "lot_type": "C",
              "lots_available": "63"
            }
          ],
          "carpark_number": "Y36",
          "update_datetime": "2019-02-13T00:45:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "398",
              "lot_type": "C",
              "lots_available": "183"
            }
          ],
          "carpark_number": "CK11",
          "update_datetime": "2019-02-13T00:46:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "345",
              "lot_type": "C",
              "lots_available": "100"
            }
          ],
          "carpark_number": "CK35",
          "update_datetime": "2019-02-13T00:46:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "96",
              "lot_type": "C",
              "lots_available": "26"
            }
          ],
          "carpark_number": "K19",
          "update_datetime": "2019-02-13T00:48:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "659",
              "lot_type": "C",
              "lots_available": "371"
            }
          ],
          "carpark_number": "SK18",
          "update_datetime": "2019-02-13T00:46:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "162",
              "lot_type": "C",
              "lots_available": "57"
            }
          ],
          "carpark_number": "J17",
          "update_datetime": "2019-02-13T00:44:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "365",
              "lot_type": "C",
              "lots_available": "48"
            }
          ],
          "carpark_number": "J20",
          "update_datetime": "2019-02-13T00:44:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "89",
              "lot_type": "C",
              "lots_available": "25"
            }
          ],
          "carpark_number": "HE9",
          "update_datetime": "2019-02-13T00:47:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "923",
              "lot_type": "C",
              "lots_available": "354"
            }
          ],
          "carpark_number": "JM20",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "295",
              "lot_type": "C",
              "lots_available": "185"
            }
          ],
          "carpark_number": "PM24",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "82",
              "lot_type": "C",
              "lots_available": "11"
            }
          ],
          "carpark_number": "PR14",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "376",
              "lot_type": "C",
              "lots_available": "188"
            }
          ],
          "carpark_number": "BRM5",
          "update_datetime": "2019-02-13T00:48:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "471",
              "lot_type": "C",
              "lots_available": "254"
            }
          ],
          "carpark_number": "BRM6",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "212",
              "lot_type": "C",
              "lots_available": "100"
            }
          ],
          "carpark_number": "H6",
          "update_datetime": "2019-02-13T00:48:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "896",
              "lot_type": "C",
              "lots_available": "416"
            }
          ],
          "carpark_number": "P7",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "2637",
              "lot_type": "C",
              "lots_available": "1852"
            }
          ],
          "carpark_number": "CK58",
          "update_datetime": "2019-02-13T00:46:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "303",
              "lot_type": "C",
              "lots_available": "43"
            }
          ],
          "carpark_number": "W11",
          "update_datetime": "2019-02-13T00:46:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "310",
              "lot_type": "C",
              "lots_available": "36"
            }
          ],
          "carpark_number": "W11M",
          "update_datetime": "2019-02-13T00:46:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "362",
              "lot_type": "C",
              "lots_available": "119"
            }
          ],
          "carpark_number": "BJ13",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "359",
              "lot_type": "C",
              "lots_available": "234"
            }
          ],
          "carpark_number": "C11",
          "update_datetime": "2019-02-13T00:47:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "189",
              "lot_type": "C",
              "lots_available": "161"
            }
          ],
          "carpark_number": "C29",
          "update_datetime": "2019-02-13T00:47:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "211",
              "lot_type": "C",
              "lots_available": "97"
            }
          ],
          "carpark_number": "C30",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "145",
              "lot_type": "C",
              "lots_available": "46"
            }
          ],
          "carpark_number": "C31",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "805",
              "lot_type": "C",
              "lots_available": "304"
            }
          ],
          "carpark_number": "C33",
          "update_datetime": "2019-02-13T00:48:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "147",
              "lot_type": "C",
              "lots_available": "44"
            }
          ],
          "carpark_number": "C34",
          "update_datetime": "2019-02-13T00:48:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "647",
              "lot_type": "C",
              "lots_available": "220"
            }
          ],
          "carpark_number": "C35",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "87",
              "lot_type": "C",
              "lots_available": "13"
            }
          ],
          "carpark_number": "C36",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "423",
              "lot_type": "C",
              "lots_available": "207"
            }
          ],
          "carpark_number": "C37",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "265",
              "lot_type": "C",
              "lots_available": "79"
            }
          ],
          "carpark_number": "C38",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "301",
              "lot_type": "C",
              "lots_available": "175"
            }
          ],
          "carpark_number": "CKM2",
          "update_datetime": "2019-02-13T00:48:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "266",
              "lot_type": "C",
              "lots_available": "155"
            }
          ],
          "carpark_number": "CTM1",
          "update_datetime": "2019-02-13T00:47:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "666",
              "lot_type": "C",
              "lots_available": "449"
            }
          ],
          "carpark_number": "JMB2",
          "update_datetime": "2019-02-13T00:47:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "577",
              "lot_type": "C",
              "lots_available": "209"
            }
          ],
          "carpark_number": "JMB3",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "30",
              "lot_type": "C",
              "lots_available": "20"
            },
            {
              "total_lots": "30",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "U11",
          "update_datetime": "2019-02-13T00:45:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "302",
              "lot_type": "C",
              "lots_available": "139"
            }
          ],
          "carpark_number": "U7",
          "update_datetime": "2019-02-13T00:47:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "129",
              "lot_type": "C",
              "lots_available": "27"
            }
          ],
          "carpark_number": "U8",
          "update_datetime": "2019-02-13T00:45:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "200",
              "lot_type": "C",
              "lots_available": "37"
            }
          ],
          "carpark_number": "A49",
          "update_datetime": "2019-02-13T00:49:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "634",
              "lot_type": "C",
              "lots_available": "235"
            }
          ],
          "carpark_number": "A76",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "37",
              "lot_type": "C",
              "lots_available": "27"
            }
          ],
          "carpark_number": "U50",
          "update_datetime": "2019-02-13T00:48:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "22",
              "lot_type": "C",
              "lots_available": "9"
            }
          ],
          "carpark_number": "T57",
          "update_datetime": "2019-02-13T00:48:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "266",
              "lot_type": "C",
              "lots_available": "80"
            }
          ],
          "carpark_number": "T78",
          "update_datetime": "2019-02-13T00:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "346",
              "lot_type": "C",
              "lots_available": "158"
            }
          ],
          "carpark_number": "PM43",
          "update_datetime": "2019-02-13T00:46:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "348",
              "lot_type": "C",
              "lots_available": "167"
            }
          ],
          "carpark_number": "PM44",
          "update_datetime": "2019-02-13T00:46:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "309",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "T73",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "43",
              "lot_type": "C",
              "lots_available": "22"
            }
          ],
          "carpark_number": "BKE4",
          "update_datetime": "2019-02-13T00:48:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "492",
              "lot_type": "C",
              "lots_available": "355"
            }
          ],
          "carpark_number": "W69",
          "update_datetime": "2019-02-13T00:46:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "747",
              "lot_type": "C",
              "lots_available": "343"
            }
          ],
          "carpark_number": "PL12",
          "update_datetime": "2019-02-13T00:48:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "375",
              "lot_type": "C",
              "lots_available": "372"
            }
          ],
          "carpark_number": "PL13",
          "update_datetime": "2016-12-25T12:34:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "646",
              "lot_type": "C",
              "lots_available": "377"
            }
          ],
          "carpark_number": "SK46",
          "update_datetime": "2019-02-13T00:45:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "643",
              "lot_type": "C",
              "lots_available": "401"
            }
          ],
          "carpark_number": "SK47",
          "update_datetime": "2019-02-13T00:45:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "63",
              "lot_type": "C",
              "lots_available": "40"
            }
          ],
          "carpark_number": "JSA1",
          "update_datetime": "2019-02-13T00:46:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "663",
              "lot_type": "C",
              "lots_available": "229"
            }
          ],
          "carpark_number": "TJ39",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "809",
              "lot_type": "C",
              "lots_available": "773"
            }
          ],
          "carpark_number": "TM6",
          "update_datetime": "2019-02-13T00:48:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "448",
              "lot_type": "C",
              "lots_available": "257"
            }
          ],
          "carpark_number": "TM7",
          "update_datetime": "2019-02-13T00:49:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "4",
              "lot_type": "C",
              "lots_available": "3"
            }
          ],
          "carpark_number": "AR7L",
          "update_datetime": "2019-02-13T00:47:12"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1494",
              "lot_type": "C",
              "lots_available": "544"
            }
          ],
          "carpark_number": "CK75",
          "update_datetime": "2019-02-13T00:46:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "755",
              "lot_type": "C",
              "lots_available": "291"
            }
          ],
          "carpark_number": "CK76",
          "update_datetime": "2019-02-13T00:46:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "298",
              "lot_type": "C",
              "lots_available": "212"
            }
          ],
          "carpark_number": "W70",
          "update_datetime": "2019-02-13T00:46:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "381",
              "lot_type": "C",
              "lots_available": "260"
            }
          ],
          "carpark_number": "W74",
          "update_datetime": "2019-02-13T00:46:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "63",
              "lot_type": "C",
              "lots_available": "3"
            }
          ],
          "carpark_number": "CK65",
          "update_datetime": "2019-02-13T00:39:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "434",
              "lot_type": "C",
              "lots_available": "238"
            }
          ],
          "carpark_number": "SB1",
          "update_datetime": "2019-02-13T00:48:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "516",
              "lot_type": "C",
              "lots_available": "322"
            }
          ],
          "carpark_number": "SB6",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "WD1B",
          "update_datetime": "2018-10-12T16:48:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "667"
            }
          ],
          "carpark_number": "BB8M",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "218"
            }
          ],
          "carpark_number": "JB42",
          "update_datetime": "2018-11-02T03:59:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "307",
              "lot_type": "C",
              "lots_available": "196"
            }
          ],
          "carpark_number": "TBM",
          "update_datetime": "2019-02-13T00:47:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "622",
              "lot_type": "C",
              "lots_available": "460"
            }
          ],
          "carpark_number": "B81",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "757",
              "lot_type": "C",
              "lots_available": "411"
            }
          ],
          "carpark_number": "B92",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1138",
              "lot_type": "C",
              "lots_available": "483"
            }
          ],
          "carpark_number": "Y34",
          "update_datetime": "2019-02-13T00:46:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "235",
              "lot_type": "C",
              "lots_available": "152"
            }
          ],
          "carpark_number": "Y34A",
          "update_datetime": "2019-02-13T00:46:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "334",
              "lot_type": "C",
              "lots_available": "22"
            }
          ],
          "carpark_number": "B67",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "232",
              "lot_type": "C",
              "lots_available": "58"
            }
          ],
          "carpark_number": "T74",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "291",
              "lot_type": "C",
              "lots_available": "61"
            }
          ],
          "carpark_number": "TM10",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "20",
              "lot_type": "C",
              "lots_available": "8"
            }
          ],
          "carpark_number": "TM9",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "722",
              "lot_type": "C",
              "lots_available": "317"
            }
          ],
          "carpark_number": "SE12",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "952",
              "lot_type": "C",
              "lots_available": "518"
            }
          ],
          "carpark_number": "CK70",
          "update_datetime": "2019-02-13T00:46:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "371",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "CK71",
          "update_datetime": "2019-02-13T00:46:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "798",
              "lot_type": "C",
              "lots_available": "181"
            }
          ],
          "carpark_number": "CK77",
          "update_datetime": "2019-02-13T00:46:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "496",
              "lot_type": "C",
              "lots_available": "254"
            }
          ],
          "carpark_number": "SK34",
          "update_datetime": "2019-02-13T00:47:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1041",
              "lot_type": "C",
              "lots_available": "741"
            }
          ],
          "carpark_number": "SK35",
          "update_datetime": "2019-02-13T00:47:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "555",
              "lot_type": "C",
              "lots_available": "160"
            }
          ],
          "carpark_number": "B21",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1158",
              "lot_type": "C",
              "lots_available": "788"
            }
          ],
          "carpark_number": "W517",
          "update_datetime": "2019-02-13T00:45:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "378",
              "lot_type": "C",
              "lots_available": "55"
            }
          ],
          "carpark_number": "TM33",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "463",
              "lot_type": "C",
              "lots_available": "67"
            }
          ],
          "carpark_number": "TM34",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "287",
              "lot_type": "C",
              "lots_available": "56"
            }
          ],
          "carpark_number": "B89",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "19",
              "lot_type": "C",
              "lots_available": "0"
            },
            {
              "total_lots": "20",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q94",
          "update_datetime": "2019-02-13T00:48:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "781",
              "lot_type": "C",
              "lots_available": "328"
            }
          ],
          "carpark_number": "W20",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "745",
              "lot_type": "C",
              "lots_available": "222"
            }
          ],
          "carpark_number": "Y40",
          "update_datetime": "2019-02-13T00:48:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "67",
              "lot_type": "C",
              "lots_available": "9"
            }
          ],
          "carpark_number": "A100",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "414",
              "lot_type": "C",
              "lots_available": "43"
            }
          ],
          "carpark_number": "A73",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "190",
              "lot_type": "C",
              "lots_available": "17"
            }
          ],
          "carpark_number": "A74",
          "update_datetime": "2019-02-13T00:48:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "102",
              "lot_type": "C",
              "lots_available": "67"
            },
            {
              "total_lots": "0",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Q66",
          "update_datetime": "2019-02-13T00:46:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "500",
              "lot_type": "C",
              "lots_available": "499"
            }
          ],
          "carpark_number": "BE232",
          "update_datetime": "2017-02-06T10:23:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "500",
              "lot_type": "C",
              "lots_available": "499"
            }
          ],
          "carpark_number": "BE241",
          "update_datetime": "2017-02-06T10:23:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "625",
              "lot_type": "C",
              "lots_available": "330"
            }
          ],
          "carpark_number": "TM35",
          "update_datetime": "2019-02-13T00:48:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "358",
              "lot_type": "C",
              "lots_available": "16"
            }
          ],
          "carpark_number": "BL22",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "410",
              "lot_type": "C",
              "lots_available": "156"
            }
          ],
          "carpark_number": "JM32",
          "update_datetime": "2019-02-13T00:46:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "609",
              "lot_type": "C",
              "lots_available": "287"
            }
          ],
          "carpark_number": "PL17",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "617",
              "lot_type": "C",
              "lots_available": "273"
            }
          ],
          "carpark_number": "PL20",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "379",
              "lot_type": "C",
              "lots_available": "207"
            }
          ],
          "carpark_number": "PL22",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "375",
              "lot_type": "C",
              "lots_available": "196"
            }
          ],
          "carpark_number": "PL26",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "553",
              "lot_type": "C",
              "lots_available": "174"
            }
          ],
          "carpark_number": "BLM",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "685",
              "lot_type": "C",
              "lots_available": "76"
            }
          ],
          "carpark_number": "HG71",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "242",
              "lot_type": "C",
              "lots_available": "75"
            }
          ],
          "carpark_number": "TM23",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "344",
              "lot_type": "C",
              "lots_available": "97"
            }
          ],
          "carpark_number": "TM24",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "76",
              "lot_type": "C",
              "lots_available": "51"
            }
          ],
          "carpark_number": "W108",
          "update_datetime": "2019-02-13T00:46:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "300",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "JM2",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "547",
              "lot_type": "C",
              "lots_available": "367"
            }
          ],
          "carpark_number": "JM3",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "435",
              "lot_type": "C",
              "lots_available": "271"
            }
          ],
          "carpark_number": "JM4",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "573",
              "lot_type": "C",
              "lots_available": "388"
            }
          ],
          "carpark_number": "JM11",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "571",
              "lot_type": "C",
              "lots_available": "290"
            }
          ],
          "carpark_number": "JM26",
          "update_datetime": "2019-02-13T00:48:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "537",
              "lot_type": "C",
              "lots_available": "310"
            }
          ],
          "carpark_number": "JM27",
          "update_datetime": "2019-02-13T00:48:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "593",
              "lot_type": "C",
              "lots_available": "299"
            }
          ],
          "carpark_number": "JSR2",
          "update_datetime": "2019-02-13T00:48:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "914",
              "lot_type": "C",
              "lots_available": "576"
            }
          ],
          "carpark_number": "SK55",
          "update_datetime": "2019-02-13T00:46:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "926",
              "lot_type": "C",
              "lots_available": "702"
            }
          ],
          "carpark_number": "UBM1",
          "update_datetime": "2019-02-13T00:47:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "35",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "KB18",
          "update_datetime": "2019-02-13T00:46:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "245",
              "lot_type": "C",
              "lots_available": "139"
            }
          ],
          "carpark_number": "KB20",
          "update_datetime": "2019-02-13T00:46:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "436",
              "lot_type": "C",
              "lots_available": "318"
            }
          ],
          "carpark_number": "W578",
          "update_datetime": "2019-02-13T00:45:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "399",
              "lot_type": "C",
              "lots_available": "254"
            }
          ],
          "carpark_number": "W579",
          "update_datetime": "2019-02-13T00:45:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "567",
              "lot_type": "C",
              "lots_available": "180"
            }
          ],
          "carpark_number": "Y45M",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "786",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG42",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "209",
              "lot_type": "C",
              "lots_available": "75"
            }
          ],
          "carpark_number": "KE2",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "133",
              "lot_type": "C",
              "lots_available": "55"
            }
          ],
          "carpark_number": "KE4",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1769",
              "lot_type": "C",
              "lots_available": "1359"
            }
          ],
          "carpark_number": "BJ29",
          "update_datetime": "2019-02-13T00:46:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "640",
              "lot_type": "C",
              "lots_available": "158"
            }
          ],
          "carpark_number": "T72",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "391",
              "lot_type": "C",
              "lots_available": "143"
            }
          ],
          "carpark_number": "A4",
          "update_datetime": "2019-02-13T00:49:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "230",
              "lot_type": "C",
              "lots_available": "125"
            }
          ],
          "carpark_number": "A24",
          "update_datetime": "2019-02-13T00:49:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "3",
              "lot_type": "C",
              "lots_available": "2"
            }
          ],
          "carpark_number": "GEML",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "583",
              "lot_type": "C",
              "lots_available": "326"
            }
          ],
          "carpark_number": "W509",
          "update_datetime": "2019-02-13T00:47:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "574",
              "lot_type": "C",
              "lots_available": "443"
            }
          ],
          "carpark_number": "W516",
          "update_datetime": "2019-02-13T00:47:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "659",
              "lot_type": "C",
              "lots_available": "279"
            }
          ],
          "carpark_number": "HG1B",
          "update_datetime": "2019-02-13T00:48:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "258",
              "lot_type": "C",
              "lots_available": "23"
            }
          ],
          "carpark_number": "BJ24",
          "update_datetime": "2019-02-13T00:46:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "305",
              "lot_type": "C",
              "lots_available": "125"
            }
          ],
          "carpark_number": "BJ27",
          "update_datetime": "2019-02-13T00:46:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1011",
              "lot_type": "C",
              "lots_available": "479"
            }
          ],
          "carpark_number": "B11",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "465",
              "lot_type": "C",
              "lots_available": "318"
            }
          ],
          "carpark_number": "W86",
          "update_datetime": "2019-02-13T00:47:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "524",
              "lot_type": "C",
              "lots_available": "413"
            }
          ],
          "carpark_number": "W89",
          "update_datetime": "2019-02-13T00:46:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "868",
              "lot_type": "C",
              "lots_available": "177"
            }
          ],
          "carpark_number": "BJ66",
          "update_datetime": "2019-02-13T00:46:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "102"
            }
          ],
          "carpark_number": "BJ67",
          "update_datetime": "2019-02-13T00:47:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "71",
              "lot_type": "C",
              "lots_available": "8"
            }
          ],
          "carpark_number": "TB18",
          "update_datetime": "2019-02-13T00:47:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "224",
              "lot_type": "C",
              "lots_available": "124"
            }
          ],
          "carpark_number": "TM48",
          "update_datetime": "2019-02-13T00:48:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "4",
              "lot_type": "C",
              "lots_available": "4"
            }
          ],
          "carpark_number": "AR1L",
          "update_datetime": "2019-02-13T00:48:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "670",
              "lot_type": "C",
              "lots_available": "91"
            }
          ],
          "carpark_number": "PL56",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "558",
              "lot_type": "C",
              "lots_available": "113"
            }
          ],
          "carpark_number": "PL60",
          "update_datetime": "2019-02-13T00:48:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "581",
              "lot_type": "C",
              "lots_available": "66"
            }
          ],
          "carpark_number": "B50",
          "update_datetime": "2019-02-13T00:48:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "377",
              "lot_type": "C",
              "lots_available": "251"
            }
          ],
          "carpark_number": "W71",
          "update_datetime": "2019-02-13T00:46:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "938",
              "lot_type": "C",
              "lots_available": "137"
            }
          ],
          "carpark_number": "PL61",
          "update_datetime": "2019-02-13T00:48:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "428",
              "lot_type": "C",
              "lots_available": "263"
            }
          ],
          "carpark_number": "PM21",
          "update_datetime": "2019-02-13T00:48:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "496",
              "lot_type": "C",
              "lots_available": "107"
            }
          ],
          "carpark_number": "Y43",
          "update_datetime": "2019-02-13T00:45:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "145",
              "lot_type": "C",
              "lots_available": "9"
            }
          ],
          "carpark_number": "B54",
          "update_datetime": "2019-02-13T00:48:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "51",
              "lot_type": "C",
              "lots_available": "31"
            }
          ],
          "carpark_number": "B91",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "426",
              "lot_type": "C",
              "lots_available": "74"
            }
          ],
          "carpark_number": "B57",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "365",
              "lot_type": "C",
              "lots_available": "131"
            }
          ],
          "carpark_number": "TJ35",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "293",
              "lot_type": "C",
              "lots_available": "6"
            }
          ],
          "carpark_number": "TJ38",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "697",
              "lot_type": "C",
              "lots_available": "205"
            }
          ],
          "carpark_number": "BL17",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "150",
              "lot_type": "C",
              "lots_available": "39"
            }
          ],
          "carpark_number": "P13",
          "update_datetime": "2019-02-13T00:39:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "534",
              "lot_type": "C",
              "lots_available": "120"
            }
          ],
          "carpark_number": "PL66",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "318",
              "lot_type": "C",
              "lots_available": "16"
            }
          ],
          "carpark_number": "HG12",
          "update_datetime": "2019-02-13T00:48:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "99",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG13",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "504",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG14",
          "update_datetime": "2019-02-13T00:48:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "520",
              "lot_type": "C",
              "lots_available": "36"
            },
            {
              "total_lots": "155",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "DWSV",
          "update_datetime": "2019-02-13T00:46:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "648",
              "lot_type": "C",
              "lots_available": "76"
            }
          ],
          "carpark_number": "T48",
          "update_datetime": "2019-02-13T00:48:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "277",
              "lot_type": "C",
              "lots_available": "48"
            }
          ],
          "carpark_number": "TM45",
          "update_datetime": "2019-02-13T00:48:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "540",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "B40",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "334",
              "lot_type": "C",
              "lots_available": "250"
            }
          ],
          "carpark_number": "W527",
          "update_datetime": "2019-02-13T00:46:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "326",
              "lot_type": "C",
              "lots_available": "171"
            }
          ],
          "carpark_number": "W536",
          "update_datetime": "2019-02-13T00:46:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "348",
              "lot_type": "C",
              "lots_available": "38"
            }
          ],
          "carpark_number": "T76",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1018",
              "lot_type": "C",
              "lots_available": "121"
            }
          ],
          "carpark_number": "KE3",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "230",
              "lot_type": "C",
              "lots_available": "207"
            }
          ],
          "carpark_number": "W676",
          "update_datetime": "2019-02-13T00:46:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "791",
              "lot_type": "C",
              "lots_available": "41"
            }
          ],
          "carpark_number": "PR2",
          "update_datetime": "2019-02-13T00:48:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "608",
              "lot_type": "C",
              "lots_available": "37"
            }
          ],
          "carpark_number": "Y25",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "114",
              "lot_type": "C",
              "lots_available": "42"
            }
          ],
          "carpark_number": "Y25M",
          "update_datetime": "2019-02-13T00:48:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "477",
              "lot_type": "C",
              "lots_available": "25"
            }
          ],
          "carpark_number": "HG34",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1719",
              "lot_type": "C",
              "lots_available": "117"
            }
          ],
          "carpark_number": "B79",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "415",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG35",
          "update_datetime": "2019-02-13T00:48:12"
        },
        {
          "carpark_info": [
            {
              "total_lots": "85",
              "lot_type": "C",
              "lots_available": "31"
            }
          ],
          "carpark_number": "SE37",
          "update_datetime": "2019-02-13T00:49:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "352",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SE42",
          "update_datetime": "2019-02-13T00:48:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "32",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SE43",
          "update_datetime": "2019-02-13T00:48:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "497",
              "lot_type": "C",
              "lots_available": "282"
            }
          ],
          "carpark_number": "PL54",
          "update_datetime": "2019-02-13T00:48:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "364",
              "lot_type": "C",
              "lots_available": "189"
            }
          ],
          "carpark_number": "PL55",
          "update_datetime": "2019-02-13T00:48:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "300",
              "lot_type": "C",
              "lots_available": "168"
            }
          ],
          "carpark_number": "PL62",
          "update_datetime": "2019-02-13T00:48:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "477",
              "lot_type": "C",
              "lots_available": "105"
            }
          ],
          "carpark_number": "KU2",
          "update_datetime": "2019-02-13T00:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "345",
              "lot_type": "C",
              "lots_available": "83"
            }
          ],
          "carpark_number": "KU3",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "474",
              "lot_type": "C",
              "lots_available": "16"
            }
          ],
          "carpark_number": "KU4",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "586",
              "lot_type": "C",
              "lots_available": "269"
            }
          ],
          "carpark_number": "KU1",
          "update_datetime": "2019-02-13T00:48:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "101",
              "lot_type": "C",
              "lots_available": "17"
            }
          ],
          "carpark_number": "KU9",
          "update_datetime": "2019-02-13T00:48:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "268",
              "lot_type": "C",
              "lots_available": "93"
            }
          ],
          "carpark_number": "BR11",
          "update_datetime": "2019-02-13T00:48:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "57",
              "lot_type": "C",
              "lots_available": "15"
            }
          ],
          "carpark_number": "BR12",
          "update_datetime": "2019-02-13T00:48:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "357",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG24",
          "update_datetime": "2019-02-13T00:48:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "249",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG29",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "85",
              "lot_type": "C",
              "lots_available": "19"
            }
          ],
          "carpark_number": "CR6",
          "update_datetime": "2019-02-13T00:46:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "561",
              "lot_type": "C",
              "lots_available": "416"
            }
          ],
          "carpark_number": "SB17",
          "update_datetime": "2019-02-13T00:48:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "359",
              "lot_type": "C",
              "lots_available": "270"
            }
          ],
          "carpark_number": "SB20",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "524",
              "lot_type": "C",
              "lots_available": "225"
            }
          ],
          "carpark_number": "SB25",
          "update_datetime": "2019-02-13T00:48:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "143",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB32",
          "update_datetime": "2019-02-13T00:47:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "255",
              "lot_type": "C",
              "lots_available": "71"
            }
          ],
          "carpark_number": "KE3M",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "631",
              "lot_type": "C",
              "lots_available": "361"
            }
          ],
          "carpark_number": "BL23",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "284",
              "lot_type": "C",
              "lots_available": "85"
            }
          ],
          "carpark_number": "TM50",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "521",
              "lot_type": "C",
              "lots_available": "50"
            }
          ],
          "carpark_number": "PL57",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "566",
              "lot_type": "C",
              "lots_available": "87"
            }
          ],
          "carpark_number": "PL58",
          "update_datetime": "2019-02-13T00:48:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "109",
              "lot_type": "C",
              "lots_available": "34"
            }
          ],
          "carpark_number": "SD1",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "709",
              "lot_type": "C",
              "lots_available": "361"
            }
          ],
          "carpark_number": "PR10",
          "update_datetime": "2019-02-13T00:48:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "797",
              "lot_type": "C",
              "lots_available": "284"
            }
          ],
          "carpark_number": "PM20",
          "update_datetime": "2019-02-13T00:46:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "150",
              "lot_type": "C",
              "lots_available": "47"
            }
          ],
          "carpark_number": "P16",
          "update_datetime": "2019-02-13T00:39:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "250",
              "lot_type": "C",
              "lots_available": "14"
            }
          ],
          "carpark_number": "T12",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "392",
              "lot_type": "C",
              "lots_available": "38"
            }
          ],
          "carpark_number": "T13",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "475",
              "lot_type": "C",
              "lots_available": "57"
            },
            {
              "total_lots": "342",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "10",
              "lot_type": "H",
              "lots_available": "6"
            }
          ],
          "carpark_number": "CAM",
          "update_datetime": "2019-02-13T00:48:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "500",
              "lot_type": "C",
              "lots_available": "165"
            }
          ],
          "carpark_number": "CKM7",
          "update_datetime": "2019-02-13T00:46:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "636"
            }
          ],
          "carpark_number": "CKM8",
          "update_datetime": "2019-02-13T00:46:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "612",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG1C",
          "update_datetime": "2019-02-13T00:48:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "537",
              "lot_type": "C",
              "lots_available": "422"
            }
          ],
          "carpark_number": "W56",
          "update_datetime": "2019-02-13T00:47:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "567",
              "lot_type": "C",
              "lots_available": "419"
            }
          ],
          "carpark_number": "W889",
          "update_datetime": "2019-02-13T00:46:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "10",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "W56L",
          "update_datetime": "2019-02-13T00:47:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "286",
              "lot_type": "C",
              "lots_available": "109"
            }
          ],
          "carpark_number": "W887",
          "update_datetime": "2019-02-13T00:46:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "455",
              "lot_type": "C",
              "lots_available": "282"
            }
          ],
          "carpark_number": "MNM",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "170",
              "lot_type": "C",
              "lots_available": "14"
            }
          ],
          "carpark_number": "T25",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "368",
              "lot_type": "C",
              "lots_available": "233"
            }
          ],
          "carpark_number": "W505",
          "update_datetime": "2019-02-13T00:46:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "999"
            }
          ],
          "carpark_number": "PM15",
          "update_datetime": "2019-02-13T00:48:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "176",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "A59",
          "update_datetime": "2019-02-13T00:49:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "183",
              "lot_type": "C",
              "lots_available": "3"
            }
          ],
          "carpark_number": "BJ21",
          "update_datetime": "2019-02-13T00:46:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1640",
              "lot_type": "C",
              "lots_available": "1001"
            }
          ],
          "carpark_number": "BJ63",
          "update_datetime": "2019-02-13T00:46:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "809",
              "lot_type": "C",
              "lots_available": "799"
            }
          ],
          "carpark_number": "PM4",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "300",
              "lot_type": "C",
              "lots_available": "187"
            }
          ],
          "carpark_number": "PM5",
          "update_datetime": "2019-02-13T00:48:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1000",
              "lot_type": "C",
              "lots_available": "850"
            }
          ],
          "carpark_number": "PM2",
          "update_datetime": "2019-02-13T00:48:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "309",
              "lot_type": "C",
              "lots_available": "81"
            }
          ],
          "carpark_number": "PM9",
          "update_datetime": "2019-02-13T00:48:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "21",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PRS1",
          "update_datetime": "2019-02-13T00:49:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "480",
              "lot_type": "C",
              "lots_available": "330"
            }
          ],
          "carpark_number": "W76",
          "update_datetime": "2019-02-13T00:47:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "388",
              "lot_type": "C",
              "lots_available": "257"
            }
          ],
          "carpark_number": "W77",
          "update_datetime": "2019-02-13T00:47:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "442",
              "lot_type": "C",
              "lots_available": "296"
            }
          ],
          "carpark_number": "W78",
          "update_datetime": "2019-02-13T00:47:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "355",
              "lot_type": "C",
              "lots_available": "303"
            }
          ],
          "carpark_number": "PM22",
          "update_datetime": "2019-02-13T00:48:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "392",
              "lot_type": "C",
              "lots_available": "87"
            }
          ],
          "carpark_number": "PR12",
          "update_datetime": "2019-02-13T00:45:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "363",
              "lot_type": "C",
              "lots_available": "44"
            },
            {
              "total_lots": "0",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "DWST",
          "update_datetime": "2019-02-13T00:46:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "483",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y51",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "486",
              "lot_type": "C",
              "lots_available": "142"
            }
          ],
          "carpark_number": "Y51M",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "400",
              "lot_type": "C",
              "lots_available": "196"
            }
          ],
          "carpark_number": "Y53M",
          "update_datetime": "2019-02-13T00:49:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "248",
              "lot_type": "C",
              "lots_available": "65"
            }
          ],
          "carpark_number": "Y59M",
          "update_datetime": "2019-02-13T00:49:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "383",
              "lot_type": "C",
              "lots_available": "265"
            }
          ],
          "carpark_number": "Y60M",
          "update_datetime": "2019-02-13T00:49:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "553",
              "lot_type": "C",
              "lots_available": "288"
            }
          ],
          "carpark_number": "Y61M",
          "update_datetime": "2019-02-13T00:49:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "204",
              "lot_type": "C",
              "lots_available": "45"
            }
          ],
          "carpark_number": "T24",
          "update_datetime": "2019-02-13T00:48:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "238",
              "lot_type": "C",
              "lots_available": "123"
            }
          ],
          "carpark_number": "A7",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "680",
              "lot_type": "C",
              "lots_available": "196"
            }
          ],
          "carpark_number": "A36",
          "update_datetime": "2019-02-13T00:49:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "303",
              "lot_type": "C",
              "lots_available": "113"
            }
          ],
          "carpark_number": "A47",
          "update_datetime": "2019-02-13T00:49:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "370",
              "lot_type": "C",
              "lots_available": "154"
            }
          ],
          "carpark_number": "PM35",
          "update_datetime": "2019-02-13T00:47:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "602",
              "lot_type": "C",
              "lots_available": "194"
            }
          ],
          "carpark_number": "P14",
          "update_datetime": "2019-02-13T00:39:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "90",
              "lot_type": "C",
              "lots_available": "28"
            }
          ],
          "carpark_number": "P15",
          "update_datetime": "2019-02-13T00:39:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "135",
              "lot_type": "C",
              "lots_available": "37"
            }
          ],
          "carpark_number": "P17",
          "update_datetime": "2019-02-13T00:39:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "250",
              "lot_type": "C",
              "lots_available": "39"
            }
          ],
          "carpark_number": "T11",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "570",
              "lot_type": "C",
              "lots_available": "37"
            }
          ],
          "carpark_number": "T9",
          "update_datetime": "2019-02-13T00:48:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "7",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "C21L",
          "update_datetime": "2019-02-13T00:39:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "40",
              "lot_type": "C",
              "lots_available": "9"
            }
          ],
          "carpark_number": "A51",
          "update_datetime": "2019-02-13T00:48:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "328",
              "lot_type": "C",
              "lots_available": "200"
            }
          ],
          "carpark_number": "AM19",
          "update_datetime": "2019-02-13T00:48:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "217",
              "lot_type": "C",
              "lots_available": "123"
            }
          ],
          "carpark_number": "W8M",
          "update_datetime": "2019-02-13T00:45:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "371",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "CK14",
          "update_datetime": "2019-02-13T00:47:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "6",
              "lot_type": "C",
              "lots_available": "4"
            },
            {
              "total_lots": "0",
              "lot_type": "Y",
              "lots_available": "0"
            },
            {
              "total_lots": "0",
              "lot_type": "H",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SMM",
          "update_datetime": "2019-02-13T00:46:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "339",
              "lot_type": "C",
              "lots_available": "244"
            }
          ],
          "carpark_number": "W103",
          "update_datetime": "2019-02-13T00:45:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "21",
              "lot_type": "C",
              "lots_available": "9"
            }
          ],
          "carpark_number": "W109",
          "update_datetime": "2019-02-13T00:45:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "375",
              "lot_type": "C",
              "lots_available": "246"
            }
          ],
          "carpark_number": "W75",
          "update_datetime": "2019-02-13T00:45:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "393",
              "lot_type": "C",
              "lots_available": "149"
            }
          ],
          "carpark_number": "W53",
          "update_datetime": "2019-02-13T00:46:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "524",
              "lot_type": "C",
              "lots_available": "308"
            }
          ],
          "carpark_number": "W72",
          "update_datetime": "2019-02-13T00:46:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "440",
              "lot_type": "C",
              "lots_available": "261"
            }
          ],
          "carpark_number": "W73",
          "update_datetime": "2019-02-13T00:47:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "468",
              "lot_type": "C",
              "lots_available": "162"
            }
          ],
          "carpark_number": "T49",
          "update_datetime": "2019-02-13T00:48:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "164",
              "lot_type": "C",
              "lots_available": "75"
            }
          ],
          "carpark_number": "T49A",
          "update_datetime": "2019-02-13T00:48:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1083",
              "lot_type": "C",
              "lots_available": "195"
            }
          ],
          "carpark_number": "PR4",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "264",
              "lot_type": "C",
              "lots_available": "130"
            }
          ],
          "carpark_number": "TBC2",
          "update_datetime": "2019-02-13T00:48:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "401",
              "lot_type": "C",
              "lots_available": "162"
            }
          ],
          "carpark_number": "Y32",
          "update_datetime": "2019-02-13T00:50:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "303",
              "lot_type": "C",
              "lots_available": "108"
            }
          ],
          "carpark_number": "Y31",
          "update_datetime": "2019-02-13T00:49:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "500",
              "lot_type": "C",
              "lots_available": "54"
            }
          ],
          "carpark_number": "BJ19",
          "update_datetime": "2019-02-13T00:46:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "246",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "CK15",
          "update_datetime": "2019-02-13T00:46:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "40",
              "lot_type": "C",
              "lots_available": "23"
            }
          ],
          "carpark_number": "CK6",
          "update_datetime": "2019-02-13T00:46:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "300",
              "lot_type": "C",
              "lots_available": "290"
            }
          ],
          "carpark_number": "CK6A",
          "update_datetime": "2019-02-13T00:48:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "49",
              "lot_type": "C",
              "lots_available": "32"
            }
          ],
          "carpark_number": "P11",
          "update_datetime": "2019-02-13T00:39:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "234",
              "lot_type": "C",
              "lots_available": "40"
            }
          ],
          "carpark_number": "PM46",
          "update_datetime": "2019-02-13T00:48:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "500",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG1A",
          "update_datetime": "2019-02-13T00:48:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "248",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG36",
          "update_datetime": "2019-02-13T00:48:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "258",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG53",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "31",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG56",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "437",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG80",
          "update_datetime": "2019-02-13T00:48:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "586",
              "lot_type": "C",
              "lots_available": "225"
            }
          ],
          "carpark_number": "Y68M",
          "update_datetime": "2019-02-13T00:48:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "6",
              "lot_type": "C",
              "lots_available": "6"
            }
          ],
          "carpark_number": "Y68L",
          "update_datetime": "2019-02-13T00:48:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "450",
              "lot_type": "C",
              "lots_available": "315"
            }
          ],
          "carpark_number": "W90",
          "update_datetime": "2019-02-13T00:46:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "450",
              "lot_type": "C",
              "lots_available": "340"
            }
          ],
          "carpark_number": "W91",
          "update_datetime": "2019-02-13T00:46:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "448",
              "lot_type": "C",
              "lots_available": "370"
            }
          ],
          "carpark_number": "DRM1",
          "update_datetime": "2019-02-13T00:49:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "285",
              "lot_type": "C",
              "lots_available": "245"
            }
          ],
          "carpark_number": "DRM3",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "104",
              "lot_type": "C",
              "lots_available": "29"
            }
          ],
          "carpark_number": "DRM4",
          "update_datetime": "2019-02-13T00:49:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "84",
              "lot_type": "C",
              "lots_available": "43"
            }
          ],
          "carpark_number": "DRM5",
          "update_datetime": "2019-02-13T00:49:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1325",
              "lot_type": "C",
              "lots_available": "1046"
            }
          ],
          "carpark_number": "DRS",
          "update_datetime": "2019-02-13T00:49:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "235",
              "lot_type": "C",
              "lots_available": "21"
            }
          ],
          "carpark_number": "BJ20",
          "update_datetime": "2019-02-13T00:48:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "253",
              "lot_type": "C",
              "lots_available": "147"
            }
          ],
          "carpark_number": "BJ68",
          "update_datetime": "2019-02-13T00:48:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "392",
              "lot_type": "C",
              "lots_available": "270"
            }
          ],
          "carpark_number": "DRM2",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "330",
              "lot_type": "C",
              "lots_available": "44"
            }
          ],
          "carpark_number": "TM51",
          "update_datetime": "2019-02-13T00:48:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "246",
              "lot_type": "C",
              "lots_available": "165"
            }
          ],
          "carpark_number": "W67",
          "update_datetime": "2019-02-13T00:47:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "114",
              "lot_type": "C",
              "lots_available": "75"
            }
          ],
          "carpark_number": "W717",
          "update_datetime": "2019-02-13T00:47:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "689",
              "lot_type": "C",
              "lots_available": "53"
            }
          ],
          "carpark_number": "SI13",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "356",
              "lot_type": "C",
              "lots_available": "168"
            }
          ],
          "carpark_number": "Y63M",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "428",
              "lot_type": "C",
              "lots_available": "209"
            }
          ],
          "carpark_number": "Y64M",
          "update_datetime": "2019-02-13T00:47:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "699",
              "lot_type": "C",
              "lots_available": "70"
            }
          ],
          "carpark_number": "A21",
          "update_datetime": "2019-02-13T00:48:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "466",
              "lot_type": "C",
              "lots_available": "72"
            }
          ],
          "carpark_number": "A29",
          "update_datetime": "2019-02-13T00:49:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "715",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "A63",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "44",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "A88",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "558",
              "lot_type": "C",
              "lots_available": "409"
            }
          ],
          "carpark_number": "SB10",
          "update_datetime": "2019-02-13T00:44:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "440",
              "lot_type": "C",
              "lots_available": "265"
            }
          ],
          "carpark_number": "SB11",
          "update_datetime": "2019-02-13T00:45:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1259",
              "lot_type": "C",
              "lots_available": "846"
            }
          ],
          "carpark_number": "SB13",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "794",
              "lot_type": "C",
              "lots_available": "535"
            }
          ],
          "carpark_number": "SB12",
          "update_datetime": "2019-02-13T00:48:13"
        },
        {
          "carpark_info": [
            {
              "total_lots": "360",
              "lot_type": "C",
              "lots_available": "127"
            }
          ],
          "carpark_number": "W65",
          "update_datetime": "2019-02-13T00:45:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "340",
              "lot_type": "C",
              "lots_available": "145"
            }
          ],
          "carpark_number": "W66",
          "update_datetime": "2019-02-13T00:45:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "974",
              "lot_type": "C",
              "lots_available": "49"
            }
          ],
          "carpark_number": "T38",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "746",
              "lot_type": "C",
              "lots_available": "37"
            }
          ],
          "carpark_number": "T39",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "272",
              "lot_type": "C",
              "lots_available": "40"
            }
          ],
          "carpark_number": "TM41",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "448",
              "lot_type": "C",
              "lots_available": "262"
            }
          ],
          "carpark_number": "W83",
          "update_datetime": "2019-02-13T00:45:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "499",
              "lot_type": "C",
              "lots_available": "245"
            }
          ],
          "carpark_number": "W84",
          "update_datetime": "2019-02-13T00:46:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "101",
              "lot_type": "C",
              "lots_available": "2"
            }
          ],
          "carpark_number": "CK18",
          "update_datetime": "2019-02-13T00:46:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "280",
              "lot_type": "C",
              "lots_available": "119"
            }
          ],
          "carpark_number": "SE51",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "571",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG33",
          "update_datetime": "2019-02-13T00:48:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "267",
              "lot_type": "C",
              "lots_available": "41"
            }
          ],
          "carpark_number": "A77",
          "update_datetime": "2019-02-13T00:49:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "546",
              "lot_type": "C",
              "lots_available": "454"
            }
          ],
          "carpark_number": "A78",
          "update_datetime": "2019-02-13T00:49:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "421",
              "lot_type": "C",
              "lots_available": "275"
            }
          ],
          "carpark_number": "SB7",
          "update_datetime": "2019-02-13T00:47:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "292",
              "lot_type": "C",
              "lots_available": "140"
            }
          ],
          "carpark_number": "SB8",
          "update_datetime": "2019-02-13T00:48:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "482",
              "lot_type": "C",
              "lots_available": "384"
            }
          ],
          "carpark_number": "SB9",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "251",
              "lot_type": "C",
              "lots_available": "61"
            }
          ],
          "carpark_number": "W41",
          "update_datetime": "2019-02-13T00:46:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "386",
              "lot_type": "C",
              "lots_available": "165"
            }
          ],
          "carpark_number": "W55",
          "update_datetime": "2019-02-13T00:46:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "26",
              "lot_type": "C",
              "lots_available": "8"
            }
          ],
          "carpark_number": "Y29",
          "update_datetime": "2019-02-13T00:48:12"
        },
        {
          "carpark_info": [
            {
              "total_lots": "303",
              "lot_type": "C",
              "lots_available": "149"
            }
          ],
          "carpark_number": "BE34",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "217",
              "lot_type": "C",
              "lots_available": "28"
            }
          ],
          "carpark_number": "BE35",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "496",
              "lot_type": "C",
              "lots_available": "267"
            }
          ],
          "carpark_number": "Y65M",
          "update_datetime": "2019-02-13T00:47:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "407",
              "lot_type": "C",
              "lots_available": "172"
            }
          ],
          "carpark_number": "Y66M",
          "update_datetime": "2019-02-13T00:47:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "850",
              "lot_type": "C",
              "lots_available": "185"
            }
          ],
          "carpark_number": "BJ58",
          "update_datetime": "2019-02-13T00:46:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1494",
              "lot_type": "C",
              "lots_available": "963"
            }
          ],
          "carpark_number": "W98",
          "update_datetime": "2019-02-13T00:46:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1209",
              "lot_type": "C",
              "lots_available": "716"
            }
          ],
          "carpark_number": "W61",
          "update_datetime": "2019-02-13T00:47:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "650",
              "lot_type": "C",
              "lots_available": "368"
            }
          ],
          "carpark_number": "TM47",
          "update_datetime": "2019-02-13T00:47:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "283",
              "lot_type": "C",
              "lots_available": "272"
            }
          ],
          "carpark_number": "T7A",
          "update_datetime": "2019-02-13T00:47:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "639",
              "lot_type": "C",
              "lots_available": "388"
            }
          ],
          "carpark_number": "B23M",
          "update_datetime": "2019-02-13T00:47:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "199",
              "lot_type": "C",
              "lots_available": "89"
            }
          ],
          "carpark_number": "A13",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "607",
              "lot_type": "C",
              "lots_available": "400"
            }
          ],
          "carpark_number": "SH1",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "854",
              "lot_type": "C",
              "lots_available": "234"
            }
          ],
          "carpark_number": "BJ50",
          "update_datetime": "2019-02-13T00:46:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1064",
              "lot_type": "C",
              "lots_available": "283"
            }
          ],
          "carpark_number": "BJ53",
          "update_datetime": "2019-02-13T00:46:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "625",
              "lot_type": "C",
              "lots_available": "129"
            }
          ],
          "carpark_number": "BJ54",
          "update_datetime": "2019-02-13T00:46:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "500",
              "lot_type": "C",
              "lots_available": "128"
            }
          ],
          "carpark_number": "H93L",
          "update_datetime": "2019-02-13T00:48:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "549",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG93",
          "update_datetime": "2019-02-13T00:48:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "298",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "HG98",
          "update_datetime": "2019-02-13T00:48:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "470",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BJ61",
          "update_datetime": "2019-02-13T00:46:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "658",
              "lot_type": "C",
              "lots_available": "91"
            }
          ],
          "carpark_number": "CKM4",
          "update_datetime": "2019-02-13T00:46:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "855",
              "lot_type": "C",
              "lots_available": "373"
            }
          ],
          "carpark_number": "CK74",
          "update_datetime": "2019-02-13T00:46:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1712",
              "lot_type": "C",
              "lots_available": "231"
            }
          ],
          "carpark_number": "CK78",
          "update_datetime": "2019-02-13T00:46:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "5",
              "lot_type": "C",
              "lots_available": "4"
            }
          ],
          "carpark_number": "KJML",
          "update_datetime": "2019-02-13T00:47:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "30",
              "lot_type": "L",
              "lots_available": "7"
            }
          ],
          "carpark_number": "U11",
          "update_datetime": "2018-07-20T11:23:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "99",
              "lot_type": "C",
              "lots_available": "85"
            }
          ],
          "carpark_number": "C29A",
          "update_datetime": "2019-02-13T00:48:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "487",
              "lot_type": "C",
              "lots_available": "241"
            }
          ],
          "carpark_number": "CLRG",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "890",
              "lot_type": "C",
              "lots_available": "471"
            }
          ],
          "carpark_number": "CLTR",
          "update_datetime": "2019-02-13T00:48:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "560",
              "lot_type": "C",
              "lots_available": "130"
            }
          ],
          "carpark_number": "BE18",
          "update_datetime": "2019-02-13T00:48:30"
        },
        {
          "carpark_info": [
            {
              "total_lots": "424",
              "lot_type": "C",
              "lots_available": "335"
            }
          ],
          "carpark_number": "BE44",
          "update_datetime": "2019-02-13T00:48:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SK34",
          "update_datetime": "2018-06-06T16:18:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SK35",
          "update_datetime": "2018-06-06T16:18:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1530",
              "lot_type": "C",
              "lots_available": "837"
            }
          ],
          "carpark_number": "GM1M",
          "update_datetime": "2019-02-13T00:48:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "500",
              "lot_type": "C",
              "lots_available": "147"
            }
          ],
          "carpark_number": "CK1",
          "update_datetime": "2019-02-13T00:46:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "GBM",
          "update_datetime": "2018-06-11T17:27:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "KB1",
          "update_datetime": "2018-06-11T17:27:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "605",
              "lot_type": "C",
              "lots_available": "310"
            }
          ],
          "carpark_number": "Y14",
          "update_datetime": "2019-02-13T00:48:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "655",
              "lot_type": "C",
              "lots_available": "340"
            }
          ],
          "carpark_number": "SK1",
          "update_datetime": "2019-02-13T00:47:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "660",
              "lot_type": "C",
              "lots_available": "369"
            }
          ],
          "carpark_number": "SK8",
          "update_datetime": "2019-02-13T00:49:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "711",
              "lot_type": "C",
              "lots_available": "464"
            }
          ],
          "carpark_number": "SK61",
          "update_datetime": "2019-02-13T00:47:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "360",
              "lot_type": "C",
              "lots_available": "274"
            }
          ],
          "carpark_number": "BRM7",
          "update_datetime": "2019-02-13T00:46:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "357",
              "lot_type": "C",
              "lots_available": "291"
            }
          ],
          "carpark_number": "TPMR",
          "update_datetime": "2019-02-13T00:46:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "170",
              "lot_type": "C",
              "lots_available": "99"
            }
          ],
          "carpark_number": "Y1",
          "update_datetime": "2019-02-13T00:48:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "399",
              "lot_type": "C",
              "lots_available": "171"
            }
          ],
          "carpark_number": "Y2",
          "update_datetime": "2019-02-13T00:48:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "434",
              "lot_type": "C",
              "lots_available": "301"
            }
          ],
          "carpark_number": "Y54M",
          "update_datetime": "2019-02-13T00:48:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB26",
          "update_datetime": "2018-07-01T23:10:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB27",
          "update_datetime": "2018-07-01T23:10:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB28",
          "update_datetime": "2018-07-01T23:10:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "S28L",
          "update_datetime": "2018-07-01T23:10:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM13",
          "update_datetime": "2018-07-01T23:26:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "485",
              "lot_type": "C",
              "lots_available": "313"
            }
          ],
          "carpark_number": "UBM2",
          "update_datetime": "2019-02-13T00:46:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "6",
              "lot_type": "C",
              "lots_available": "4"
            }
          ],
          "carpark_number": "BL8L",
          "update_datetime": "2019-02-13T00:48:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "321",
              "lot_type": "C",
              "lots_available": "215"
            }
          ],
          "carpark_number": "Y30M",
          "update_datetime": "2019-02-13T00:48:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y48",
          "update_datetime": "2018-07-01T23:44:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y48M",
          "update_datetime": "2018-07-01T23:44:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB18",
          "update_datetime": "2018-07-01T23:07:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB21",
          "update_datetime": "2018-07-01T23:07:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y12",
          "update_datetime": "2018-07-01T23:43:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y6",
          "update_datetime": "2018-07-01T23:44:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y34",
          "update_datetime": "2018-07-01T23:45:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y34A",
          "update_datetime": "2018-07-01T23:45:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y36",
          "update_datetime": "2018-07-01T23:44:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y40",
          "update_datetime": "2018-07-01T23:45:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y43",
          "update_datetime": "2018-07-01T23:44:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "MPS",
          "update_datetime": "2018-07-01T23:46:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y10",
          "update_datetime": "2018-07-01T23:45:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y11",
          "update_datetime": "2018-07-01T23:46:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y16",
          "update_datetime": "2018-07-01T23:41:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y18",
          "update_datetime": "2018-07-01T23:46:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y19",
          "update_datetime": "2018-07-01T23:45:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y20",
          "update_datetime": "2018-07-01T23:43:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y21",
          "update_datetime": "2018-07-01T23:46:12"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y21M",
          "update_datetime": "2018-07-01T23:46:14"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y26",
          "update_datetime": "2018-07-01T23:45:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y27",
          "update_datetime": "2018-07-01T23:45:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y28",
          "update_datetime": "2018-07-01T23:46:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y28M",
          "update_datetime": "2018-07-01T23:46:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y29",
          "update_datetime": "2018-07-01T23:44:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y3",
          "update_datetime": "2018-07-01T23:45:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y33",
          "update_datetime": "2018-07-01T23:45:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y39",
          "update_datetime": "2018-07-01T23:46:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y3M",
          "update_datetime": "2018-07-01T23:45:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y4",
          "update_datetime": "2018-07-01T23:46:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y41",
          "update_datetime": "2018-07-01T23:46:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y41M",
          "update_datetime": "2018-07-01T23:46:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y49",
          "update_datetime": "2018-07-01T23:45:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y49L",
          "update_datetime": "2018-07-01T23:45:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y49M",
          "update_datetime": "2018-07-01T23:45:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y5",
          "update_datetime": "2018-07-01T23:46:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y52M",
          "update_datetime": "2018-07-01T23:37:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y57",
          "update_datetime": "2018-07-01T23:44:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y58",
          "update_datetime": "2018-07-01T23:45:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y62M",
          "update_datetime": "2018-07-01T23:40:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y63M",
          "update_datetime": "2018-07-01T23:45:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y64M",
          "update_datetime": "2018-07-01T23:46:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y65M",
          "update_datetime": "2018-07-01T23:45:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y66M",
          "update_datetime": "2018-07-01T23:37:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y68L",
          "update_datetime": "2018-07-01T23:45:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y68M",
          "update_datetime": "2018-07-01T23:45:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y7",
          "update_datetime": "2018-07-01T23:46:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y9",
          "update_datetime": "2018-07-01T23:43:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y17",
          "update_datetime": "2018-07-01T23:47:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y31",
          "update_datetime": "2018-07-01T23:44:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y32",
          "update_datetime": "2018-07-01T23:47:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y8",
          "update_datetime": "2018-07-01T23:46:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM41",
          "update_datetime": "2018-07-01T23:21:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM38",
          "update_datetime": "2018-07-01T23:22:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM35",
          "update_datetime": "2018-07-01T23:23:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM43",
          "update_datetime": "2018-07-01T23:25:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM44",
          "update_datetime": "2018-07-01T23:25:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "CV1",
          "update_datetime": "2018-07-01T23:25:29"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "CV2",
          "update_datetime": "2018-07-01T23:20:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "CV3",
          "update_datetime": "2018-07-01T23:26:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "P40L",
          "update_datetime": "2018-07-01T23:26:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM10",
          "update_datetime": "2018-07-01T23:26:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM11",
          "update_datetime": "2018-07-01T23:26:05"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM12",
          "update_datetime": "2018-07-01T23:22:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM14",
          "update_datetime": "2018-07-01T23:26:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM16",
          "update_datetime": "2018-07-01T23:27:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM17",
          "update_datetime": "2018-07-01T23:25:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM18",
          "update_datetime": "2018-07-01T23:27:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM19",
          "update_datetime": "2018-07-01T23:26:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM20",
          "update_datetime": "2018-07-01T23:26:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM23",
          "update_datetime": "2018-07-01T23:26:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM24",
          "update_datetime": "2018-07-01T23:27:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM25",
          "update_datetime": "2018-07-01T23:26:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM29",
          "update_datetime": "2018-07-01T23:25:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM3",
          "update_datetime": "2018-07-01T23:26:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM30",
          "update_datetime": "2018-07-01T23:20:12"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM32",
          "update_datetime": "2018-07-01T23:26:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM33",
          "update_datetime": "2018-07-01T23:26:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM34",
          "update_datetime": "2018-07-01T23:26:54"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM36",
          "update_datetime": "2018-07-01T23:26:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM37",
          "update_datetime": "2018-07-01T23:26:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM40",
          "update_datetime": "2018-07-01T23:26:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM45",
          "update_datetime": "2018-07-01T23:27:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM6",
          "update_datetime": "2018-07-01T23:26:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM7",
          "update_datetime": "2018-07-01T23:27:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM8",
          "update_datetime": "2018-07-01T23:26:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PR1",
          "update_datetime": "2018-07-01T23:26:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PR10",
          "update_datetime": "2018-07-01T23:26:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PR13",
          "update_datetime": "2018-07-01T23:26:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PR14",
          "update_datetime": "2018-07-01T23:27:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PR2",
          "update_datetime": "2018-07-01T23:27:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PR4",
          "update_datetime": "2018-07-01T23:25:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PR7",
          "update_datetime": "2018-07-01T23:25:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PR8",
          "update_datetime": "2018-07-01T23:26:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM26",
          "update_datetime": "2018-07-01T23:27:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PM46",
          "update_datetime": "2018-07-01T23:26:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "S19L",
          "update_datetime": "2018-07-01T23:10:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "S24L",
          "update_datetime": "2018-07-01T23:10:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB1",
          "update_datetime": "2018-07-01T23:10:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB13",
          "update_datetime": "2018-07-01T23:09:34"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB16",
          "update_datetime": "2018-07-01T23:10:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB19",
          "update_datetime": "2018-07-01T23:10:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB22",
          "update_datetime": "2018-07-01T23:10:02"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB23",
          "update_datetime": "2018-07-01T23:08:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB24",
          "update_datetime": "2018-07-01T23:10:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB29",
          "update_datetime": "2018-07-01T23:10:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB3",
          "update_datetime": "2018-07-01T23:09:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB34",
          "update_datetime": "2018-07-01T23:08:03"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB5",
          "update_datetime": "2018-07-01T23:10:15"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB6",
          "update_datetime": "2018-07-01T23:09:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB8",
          "update_datetime": "2018-07-01T23:10:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB9",
          "update_datetime": "2018-07-01T23:09:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB30",
          "update_datetime": "2018-07-01T23:15:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB31",
          "update_datetime": "2018-07-01T23:15:17"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB33",
          "update_datetime": "2018-07-01T23:16:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB11",
          "update_datetime": "2018-07-01T23:07:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "S15L",
          "update_datetime": "2018-07-01T23:10:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB12",
          "update_datetime": "2018-07-01T23:09:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB15",
          "update_datetime": "2018-07-01T23:10:46"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB4",
          "update_datetime": "2018-07-01T23:08:11"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB7",
          "update_datetime": "2018-07-01T23:10:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB2",
          "update_datetime": "2018-07-01T23:12:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y13",
          "update_datetime": "2018-07-01T23:50:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SB10",
          "update_datetime": "2018-07-01T23:11:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y14",
          "update_datetime": "2018-07-02T00:02:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "Y15",
          "update_datetime": "2018-07-01T23:51:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "655",
              "lot_type": "C",
              "lots_available": "407"
            }
          ],
          "carpark_number": "TPMQ",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "67",
              "lot_type": "C",
              "lots_available": "6"
            }
          ],
          "carpark_number": "SK82",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "608",
              "lot_type": "C",
              "lots_available": "253"
            }
          ],
          "carpark_number": "SK84",
          "update_datetime": "2019-02-13T00:47:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "361",
              "lot_type": "C",
              "lots_available": "165"
            }
          ],
          "carpark_number": "S103",
          "update_datetime": "2019-02-13T00:45:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "322",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SK76",
          "update_datetime": "2019-02-13T00:49:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "248",
              "lot_type": "C",
              "lots_available": "43"
            }
          ],
          "carpark_number": "SK79",
          "update_datetime": "2019-02-13T00:48:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BL8",
          "update_datetime": "2018-06-29T13:58:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BL8L",
          "update_datetime": "2018-06-29T13:58:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "26",
              "lot_type": "C",
              "lots_available": "26"
            }
          ],
          "carpark_number": "KAS",
          "update_datetime": "2019-02-13T00:47:39"
        },
        {
          "carpark_info": [
            {
              "total_lots": "79",
              "lot_type": "C",
              "lots_available": "60"
            }
          ],
          "carpark_number": "SLS",
          "update_datetime": "2019-02-13T00:48:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "MNM",
          "update_datetime": "2018-06-30T16:32:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SK82",
          "update_datetime": "2018-07-01T09:11:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "0",
              "lot_type": "L",
              "lots_available": "0"
            }
          ],
          "carpark_number": "SK84",
          "update_datetime": "2018-07-01T09:11:08"
        },
        {
          "carpark_info": [
            {
              "total_lots": "558",
              "lot_type": "C",
              "lots_available": "314"
            }
          ],
          "carpark_number": "U60",
          "update_datetime": "2019-02-13T00:46:24"
        },
        {
          "carpark_info": [
            {
              "total_lots": "850",
              "lot_type": "C",
              "lots_available": "533"
            }
          ],
          "carpark_number": "U58",
          "update_datetime": "2019-02-13T00:48:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "270",
              "lot_type": "C",
              "lots_available": "12"
            }
          ],
          "carpark_number": "TW4",
          "update_datetime": "2019-02-13T00:46:53"
        },
        {
          "carpark_info": [
            {
              "total_lots": "380",
              "lot_type": "C",
              "lots_available": "313"
            }
          ],
          "carpark_number": "BE19",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "8",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BE22",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "730",
              "lot_type": "C",
              "lots_available": "315"
            }
          ],
          "carpark_number": "PL71",
          "update_datetime": "2019-02-13T00:47:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "402",
              "lot_type": "C",
              "lots_available": "151"
            }
          ],
          "carpark_number": "S107",
          "update_datetime": "2019-02-13T00:47:23"
        },
        {
          "carpark_info": [
            {
              "total_lots": "450",
              "lot_type": "C",
              "lots_available": "273"
            }
          ],
          "carpark_number": "U55",
          "update_datetime": "2019-02-13T00:46:07"
        },
        {
          "carpark_info": [
            {
              "total_lots": "756",
              "lot_type": "C",
              "lots_available": "545"
            }
          ],
          "carpark_number": "W96",
          "update_datetime": "2019-02-13T00:43:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "450",
              "lot_type": "C",
              "lots_available": "176"
            }
          ],
          "carpark_number": "W25",
          "update_datetime": "2019-02-13T00:47:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "200",
              "lot_type": "C",
              "lots_available": "54"
            }
          ],
          "carpark_number": "Y45",
          "update_datetime": "2019-02-13T00:48:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "556",
              "lot_type": "C",
              "lots_available": "152"
            }
          ],
          "carpark_number": "Y46",
          "update_datetime": "2019-02-13T00:48:26"
        },
        {
          "carpark_info": [
            {
              "total_lots": "34",
              "lot_type": "C",
              "lots_available": "16"
            }
          ],
          "carpark_number": "J47",
          "update_datetime": "2019-02-13T00:47:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "465",
              "lot_type": "C",
              "lots_available": "255"
            }
          ],
          "carpark_number": "AM43",
          "update_datetime": "2019-02-13T00:48:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "752",
              "lot_type": "C",
              "lots_available": "10"
            }
          ],
          "carpark_number": "BJ4",
          "update_datetime": "2019-02-13T00:46:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "957",
              "lot_type": "C",
              "lots_available": "117"
            }
          ],
          "carpark_number": "BJ8",
          "update_datetime": "2019-02-13T00:46:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "164",
              "lot_type": "C",
              "lots_available": "12"
            }
          ],
          "carpark_number": "CK66",
          "update_datetime": "2019-02-13T00:46:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "250",
              "lot_type": "C",
              "lots_available": "135"
            }
          ],
          "carpark_number": "J35",
          "update_datetime": "2019-02-13T00:46:16"
        },
        {
          "carpark_info": [
            {
              "total_lots": "3164",
              "lot_type": "C",
              "lots_available": "2649"
            }
          ],
          "carpark_number": "CKM5",
          "update_datetime": "2019-02-13T00:46:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "935",
              "lot_type": "C",
              "lots_available": "491"
            }
          ],
          "carpark_number": "CKM6",
          "update_datetime": "2019-02-13T00:46:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "167",
              "lot_type": "C",
              "lots_available": "118"
            }
          ],
          "carpark_number": "GM6A",
          "update_datetime": "2019-02-13T00:48:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "464",
              "lot_type": "C",
              "lots_available": "360"
            }
          ],
          "carpark_number": "SB41",
          "update_datetime": "2019-02-13T00:48:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "492",
              "lot_type": "C",
              "lots_available": "313"
            }
          ],
          "carpark_number": "W785",
          "update_datetime": "2019-02-13T00:48:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "680",
              "lot_type": "C",
              "lots_available": "120"
            }
          ],
          "carpark_number": "CK72",
          "update_datetime": "2019-02-13T00:46:38"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1004",
              "lot_type": "C",
              "lots_available": "648"
            }
          ],
          "carpark_number": "U56",
          "update_datetime": "2019-02-13T00:48:18"
        },
        {
          "carpark_info": [
            {
              "total_lots": "467",
              "lot_type": "C",
              "lots_available": "318"
            }
          ],
          "carpark_number": "S109",
          "update_datetime": "2019-02-13T00:47:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "303",
              "lot_type": "C",
              "lots_available": "219"
            }
          ],
          "carpark_number": "S110",
          "update_datetime": "2019-02-13T00:47:21"
        },
        {
          "carpark_info": [
            {
              "total_lots": "360",
              "lot_type": "C",
              "lots_available": "126"
            }
          ],
          "carpark_number": "BTM3",
          "update_datetime": "2019-02-13T00:48:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1070",
              "lot_type": "C",
              "lots_available": "578"
            }
          ],
          "carpark_number": "U57",
          "update_datetime": "2019-02-13T00:48:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "896",
              "lot_type": "C",
              "lots_available": "327"
            }
          ],
          "carpark_number": "CKM3",
          "update_datetime": "2019-02-13T00:46:45"
        },
        {
          "carpark_info": [
            {
              "total_lots": "390",
              "lot_type": "C",
              "lots_available": "274"
            }
          ],
          "carpark_number": "W783",
          "update_datetime": "2019-02-13T00:45:59"
        },
        {
          "carpark_info": [
            {
              "total_lots": "388",
              "lot_type": "C",
              "lots_available": "218"
            }
          ],
          "carpark_number": "TGM4",
          "update_datetime": "2019-02-13T00:48:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "350",
              "lot_type": "C",
              "lots_available": "201"
            }
          ],
          "carpark_number": "Y69M",
          "update_datetime": "2019-02-13T00:48:31"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1248",
              "lot_type": "C",
              "lots_available": "687"
            }
          ],
          "carpark_number": "Y70M",
          "update_datetime": "2019-02-13T00:48:48"
        },
        {
          "carpark_info": [
            {
              "total_lots": "423",
              "lot_type": "C",
              "lots_available": "235"
            }
          ],
          "carpark_number": "Y71M",
          "update_datetime": "2019-02-13T00:48:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "470",
              "lot_type": "C",
              "lots_available": "189"
            }
          ],
          "carpark_number": "SE9",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "920",
              "lot_type": "C",
              "lots_available": "265"
            }
          ],
          "carpark_number": "BJ60",
          "update_datetime": "2019-02-13T00:47:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "289",
              "lot_type": "C",
              "lots_available": "180"
            }
          ],
          "carpark_number": "C15M",
          "update_datetime": "2019-02-13T00:48:06"
        },
        {
          "carpark_info": [
            {
              "total_lots": "424",
              "lot_type": "C",
              "lots_available": "331"
            }
          ],
          "carpark_number": "HG3B",
          "update_datetime": "2019-02-13T00:47:22"
        },
        {
          "carpark_info": [
            {
              "total_lots": "264",
              "lot_type": "C",
              "lots_available": "193"
            }
          ],
          "carpark_number": "HG3D",
          "update_datetime": "2019-02-13T00:47:41"
        },
        {
          "carpark_info": [
            {
              "total_lots": "375",
              "lot_type": "C",
              "lots_available": "16"
            }
          ],
          "carpark_number": "CK9A",
          "update_datetime": "2019-02-13T00:46:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "426",
              "lot_type": "C",
              "lots_available": "414"
            }
          ],
          "carpark_number": "SGTM",
          "update_datetime": "2019-02-13T00:45:01"
        },
        {
          "carpark_info": [
            {
              "total_lots": "18",
              "lot_type": "C",
              "lots_available": "8"
            }
          ],
          "carpark_number": "TPL",
          "update_datetime": "2019-02-13T00:48:04"
        },
        {
          "carpark_info": [
            {
              "total_lots": "201",
              "lot_type": "C",
              "lots_available": "137"
            }
          ],
          "carpark_number": "J5",
          "update_datetime": "2019-02-13T00:49:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "889",
              "lot_type": "C",
              "lots_available": "424"
            }
          ],
          "carpark_number": "S108",
          "update_datetime": "2019-02-13T00:47:58"
        },
        {
          "carpark_info": [
            {
              "total_lots": "815",
              "lot_type": "C",
              "lots_available": "231"
            }
          ],
          "carpark_number": "SK98",
          "update_datetime": "2019-02-13T00:48:55"
        },
        {
          "carpark_info": [
            {
              "total_lots": "474",
              "lot_type": "C",
              "lots_available": "297"
            }
          ],
          "carpark_number": "S106",
          "update_datetime": "2019-02-13T00:45:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "20",
              "lot_type": "C",
              "lots_available": "8"
            }
          ],
          "carpark_number": "BJ57",
          "update_datetime": "2019-02-13T00:46:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "333",
              "lot_type": "C",
              "lots_available": "163"
            }
          ],
          "carpark_number": "S104",
          "update_datetime": "2019-02-13T00:47:27"
        },
        {
          "carpark_info": [
            {
              "total_lots": "361",
              "lot_type": "C",
              "lots_available": "180"
            }
          ],
          "carpark_number": "S105",
          "update_datetime": "2019-02-13T00:45:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "699",
              "lot_type": "C",
              "lots_available": "252"
            }
          ],
          "carpark_number": "SK99",
          "update_datetime": "2019-02-13T00:48:37"
        },
        {
          "carpark_info": [
            {
              "total_lots": "510",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BM10",
          "update_datetime": "2019-02-13T00:47:10"
        },
        {
          "carpark_info": [
            {
              "total_lots": "117",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "BM13",
          "update_datetime": "2019-02-13T00:48:09"
        },
        {
          "carpark_info": [
            {
              "total_lots": "538",
              "lot_type": "C",
              "lots_available": "321"
            }
          ],
          "carpark_number": "PL75",
          "update_datetime": "2019-02-13T00:47:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "483",
              "lot_type": "C",
              "lots_available": "253"
            }
          ],
          "carpark_number": "PL78",
          "update_datetime": "2019-02-13T00:47:20"
        },
        {
          "carpark_info": [
            {
              "total_lots": "362",
              "lot_type": "C",
              "lots_available": "154"
            }
          ],
          "carpark_number": "PL77",
          "update_datetime": "2019-02-13T00:47:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "305",
              "lot_type": "C",
              "lots_available": "204"
            }
          ],
          "carpark_number": "TJ41",
          "update_datetime": "2019-02-13T00:46:19"
        },
        {
          "carpark_info": [
            {
              "total_lots": "390",
              "lot_type": "C",
              "lots_available": "280"
            }
          ],
          "carpark_number": "J49M",
          "update_datetime": "2019-02-13T00:48:42"
        },
        {
          "carpark_info": [
            {
              "total_lots": "126",
              "lot_type": "C",
              "lots_available": "90"
            }
          ],
          "carpark_number": "TJ42",
          "update_datetime": "2019-02-13T00:47:00"
        },
        {
          "carpark_info": [
            {
              "total_lots": "501",
              "lot_type": "C",
              "lots_available": "307"
            }
          ],
          "carpark_number": "CK73",
          "update_datetime": "2019-02-13T00:47:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "382",
              "lot_type": "C",
              "lots_available": "264"
            }
          ],
          "carpark_number": "U64",
          "update_datetime": "2019-02-13T00:48:25"
        },
        {
          "carpark_info": [
            {
              "total_lots": "333",
              "lot_type": "C",
              "lots_available": "204"
            }
          ],
          "carpark_number": "W691",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "322",
              "lot_type": "C",
              "lots_available": "140"
            }
          ],
          "carpark_number": "W693",
          "update_datetime": "2019-02-13T00:48:56"
        },
        {
          "carpark_info": [
            {
              "total_lots": "313",
              "lot_type": "C",
              "lots_available": "233"
            }
          ],
          "carpark_number": "W694",
          "update_datetime": "2019-02-13T00:48:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "719",
              "lot_type": "C",
              "lots_available": "476"
            }
          ],
          "carpark_number": "SB37",
          "update_datetime": "2019-02-13T00:48:35"
        },
        {
          "carpark_info": [
            {
              "total_lots": "273",
              "lot_type": "C",
              "lots_available": "167"
            }
          ],
          "carpark_number": "SB39",
          "update_datetime": "2019-02-13T00:48:32"
        },
        {
          "carpark_info": [
            {
              "total_lots": "279",
              "lot_type": "C",
              "lots_available": "126"
            }
          ],
          "carpark_number": "SB36",
          "update_datetime": "2019-02-13T00:48:44"
        },
        {
          "carpark_info": [
            {
              "total_lots": "666",
              "lot_type": "C",
              "lots_available": "437"
            }
          ],
          "carpark_number": "SB38",
          "update_datetime": "2019-02-13T00:48:52"
        },
        {
          "carpark_info": [
            {
              "total_lots": "263",
              "lot_type": "C",
              "lots_available": "204"
            }
          ],
          "carpark_number": "SB40",
          "update_datetime": "2019-02-13T00:48:57"
        },
        {
          "carpark_info": [
            {
              "total_lots": "2",
              "lot_type": "C",
              "lots_available": "1"
            }
          ],
          "carpark_number": "Y77L",
          "update_datetime": "2019-02-13T00:48:51"
        },
        {
          "carpark_info": [
            {
              "total_lots": "423",
              "lot_type": "C",
              "lots_available": "342"
            }
          ],
          "carpark_number": "Y77M",
          "update_datetime": "2019-02-13T00:48:50"
        },
        {
          "carpark_info": [
            {
              "total_lots": "216",
              "lot_type": "C",
              "lots_available": "170"
            }
          ],
          "carpark_number": "Y78M",
          "update_datetime": "2019-02-13T00:48:33"
        },
        {
          "carpark_info": [
            {
              "total_lots": "1",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "A33",
          "update_datetime": "2019-02-13T00:48:36"
        },
        {
          "carpark_info": [
            {
              "total_lots": "552",
              "lot_type": "C",
              "lots_available": "396"
            }
          ],
          "carpark_number": "AM64",
          "update_datetime": "2019-02-13T00:48:49"
        },
        {
          "carpark_info": [
            {
              "total_lots": "300",
              "lot_type": "C",
              "lots_available": "228"
            }
          ],
          "carpark_number": "S100",
          "update_datetime": "2019-02-13T00:46:43"
        },
        {
          "carpark_info": [
            {
              "total_lots": "500",
              "lot_type": "C",
              "lots_available": "0"
            }
          ],
          "carpark_number": "PL70",
          "update_datetime": "2019-02-13T00:47:40"
        },
        {
          "carpark_info": [
            {
              "total_lots": "500",
              "lot_type": "C",
              "lots_available": "496"
            }
          ],
          "carpark_number": "HG2A",
          "update_datetime": "2019-02-13T00:47:47"
        },
        {
          "carpark_info": [
            {
              "total_lots": "500",
              "lot_type": "C",
              "lots_available": "500"
            }
          ],
          "carpark_number": "HG2C",
          "update_datetime": "2019-02-13T00:47:28"
        },
        {
          "carpark_info": [
            {
              "total_lots": "751",
              "lot_type": "C",
              "lots_available": "569"
            }
          ],
          "carpark_number": "HRM",
          "update_datetime": "2019-02-13T00:48:01"
        }
      ]
    }
  ]
}

    */

?>


