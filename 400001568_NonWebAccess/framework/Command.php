<?php
    abstract class Command
    {
        protected $controller;
        abstract public function execute(CommandContext $context):void;
    }
?>