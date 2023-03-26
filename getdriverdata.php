<?php
    include('db_connection.php');
    $Supervisor_ID=$_SESSION['Supervisor_ID'];//147852369000
    $con=$_SESSION['con'];
    class getdriverdata
    {
        //echo "inside";
        private $location_latitude;
        private $location_longitude;
        private $conn;

        function setLocation_latitude($location_latitude) { $this->location_latitude = $location_latitude; }
        function getLocation_latitude() { return $this->location_latitude; }
        function setLocation_longitude($location_longitude) { $this->location_longitude = $location_longitude; }
        function getLocation_longitude() { return $this->location_longitude; }
        
        public function __construct(){
            echo "constructor 1";
            //require_once('index.php');
            //include 'index.php';
        }

        public function getlatlong(){
            $sql = "SELECT * FROM vehicles_assigned WHERE Driver_ID='222222222222';";
            echo "before";
            $stmt=$this->$con->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>;