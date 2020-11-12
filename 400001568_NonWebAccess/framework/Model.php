<?php
    abstract class Model{
        use MyTrait;
        protected $id;
        protected $databaseConnection;
        
        public function setID(string $id):void {
            $this->id = $id;
        }
    }
?>