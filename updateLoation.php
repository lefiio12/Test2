<?php           
    $deviceTable=new DeviceTable();
    if(isset($_GET['long']) && isset($_GET['lat']) && isset($_GET['id'])){       
        $deviceTable->updateLocation($_GET['id'], $_GET['long'], $_GET['id']);
    }
?>