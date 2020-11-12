<?php
    class RequestHandler
    {
        private $routes;

        function __construct()
        {
            $this->routes = array();
        }
        public function  route(string $action,string $command):void
        {
            $action = trim($action,"/");
            $this->routes[$action] = array("command" => $command);
        }

        public function dispatch(string $action):void
        {
            $action = trim($action,"/");
            $command = $this->routes[$action]["command"];
			$commandClass = new $command();
			$commandClass->execute(new CommandContext());
        }
    }
?>