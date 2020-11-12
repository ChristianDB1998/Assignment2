<?php
    spl_autoload_register(function ($class_name) {
        $absolutepath = __DIR__ . "/";
        $classes = array(
            $absolutepath . "app/controllers/" . $class_name . ".php",
            $absolutepath . "app/" . $class_name . ".php",
            $absolutepath . "app/models/" . $class_name . ".php",
            $absolutepath . "app/commands/" . $class_name . ".php",
            $absolutepath . "framework/" . $class_name . ".php",
            $absolutepath . "config/" . $class_name . ".php",
            $absolutepath . "tpl/" . $class_name . ".php"
        );
        foreach($classes as $class)
        {
            if(file_exists($class))
            {
                
                require $class;
            } 
        }
    });
?>