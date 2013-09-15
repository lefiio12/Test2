<?php

require_once __DIR__.'/TableAbstract.php';
require_once __DIR__.'/Device.php';

class DeviceTable extends TableAbstract{
    protected $name="devices";
    protected $primaryKey='deviceID';
    
    public function updateLocation($ID, $long, $lat){
        $sql='UPDATE '. $this->name .' SET long=:Long, lat=:Lat WHERE ID=:ID';
        $sth = $this->dbh->prepare($sql);
        $sth->execute([
            ':ID' => $ID,
            ':Lat' => $lat,
            ':Long' => $long
        ]);
    }
}