<?php
    require "../../400001568_NonWebAccess/autoloader.php";
  
    $frontController = new FrontController();
 
    $frontController->getRequestHandler()->route("/index.php","IndexCommand");
   
    $action = basename($_SERVER['REQUEST_URI']);
    $frontController->getRequestHandler()->dispatch($action);
?>