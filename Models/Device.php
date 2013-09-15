<?php
class Device{
    protected $long, $lat, $deviceID;
    
    public function __construct($dbrow){
        $this->deviceID = $dbrow['deviceID'];
        $this->long = $dbrow['long'];
        $this->lat = $dbrow['lat'];
    }
    
    public function getLong() {
        return $this->long;
    }

    public function getLat() {
        return $this->lat;
    }

    public function getDeviceID() {
        return $this->deviceID;
    }

}