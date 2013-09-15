<?php

require_once __DIR__.'/TableAbstract.php';
require_once __DIR__.'/Device.php';

class DeviceTable extends TableAbstract{
    protected $name="devices";
    protected $primaryKey='deviceID';
    
    public function updateLocation($ID, $long, $lat){
        $sql='UPDATE '. $this->name .' SET devices.long=:Long, lat=:Lat WHERE deviceID=:ID';
        $sth = $this->dbh->prepare($sql);
        $sth->execute([
            ':ID' => $ID,
            ':Lat' => $lat,
            ':Long' => $long
        ]);
    }
    
    public function newDevice($ID, $long, $lat){
        $sql='INSERT INTO' . $this->name . '(deviceID, devices.long, lat) VALUES (:ID, :Long, :Lat)';
        
        $sth=$this->dbh->prepare($sql);
        
        $sth->execute([
            ':ID' => $ID, 
            ':Long'=> $long,
            ':Lat' => $lat,
        ]);
    }
}