<?php           
    require_once('autoload.php');
    $deviceTable=new DeviceTable();
    
    $byID=$deviceTable->fetchByPrimaryKey($_GET['id']);
    
    if(!isset($byID['deviceID'])){
        $deviceTable->newDevice($_GET['id'], $_GET['long'], $_GET['lat']);        
    }
 
    if(isset($_GET['long']) && isset($_GET['lat']) && isset($_GET['id'])){       
        $deviceTable->updateLocation($_GET['id'], $_GET['long'], $_GET['lat']);
    }
?>