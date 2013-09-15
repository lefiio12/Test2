<?php
date_default_timezone_set("UTC");
session_start();

spl_autoload_register(function($class){
    include __DIR__.'/Models/'.$class.'.php';
});

