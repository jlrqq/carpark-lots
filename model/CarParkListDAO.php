<?php
class CarParkListDAO{
    // set base URL of data.gov.sg
    private $baseUrl = "https://api.data.gov.sg/v1/transport/carpark-availability?date_time=";

    // this property contains all car park numbers provided by data.gov.sg
    // https://data.gov.sg/dataset/carpark-availability?
    private $carParkList;
    
    // 1. Add code that initialize carparks as an empty array
    //    and invokes the private method myAPIconnector
    //    You don't need to pass any arguments 
    public function __construct() { 
        // $carParkList = [];
        $this->initializeCarParkList();
    }

    // 2. Add Getter method for returning car park numbers
    public function getCarParkNos() {
        return $this->carParkList;
    }

    // Do NOT modify this method!
    private function initializeCarParkList() {
        
        // to connect to the API, the base URL 
        // must be concatenated with the currnt date_time information
        // required date_time format: YYYY-MM-DD[T]HH:MM:SS, e.g., 2019-02-13T14:46:00,
        date_default_timezone_set("Asia/Singapore");
        $date =  date('Y-m-d\TH:i:s');
       
        $date = urlencode($date);
        // this completes the API connection URL
        $url = $this->baseUrl . $date;

        // this actually connects to the API 
        // which returns a JSON object containing real time info
        $content = file_get_contents($url);
        $data = json_decode($content);

        // this accesses the carpark_data information we are interested in
        // it returns an array of carpark_data
        $carpark_data_array = $data->items[0]->carpark_data;

        // The array contains (JSON) objects as its elements
        // they can be accessed using foreach loop
        $this->carParkList = [];
        foreach($carpark_data_array as $carpark_data_obj) {   
            // access the carpark_number property of carpark_data object
            // and assign to the list
            $carpark_id = $carpark_data_obj->carpark_number;
            $this->carParkList[] = $carpark_id;
        }
    }   
}
?>