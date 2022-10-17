<?php

class Logger { 

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

     
    public function logAction($userid, $logoperation) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
        $timestamp = time();
        $query = "INSERT INTO log_table (userid, log_operation, timestamp, ip) VALUES (:userid, :logop, $timestamp, '$ipaddress')";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':logop' => $logoperation, ':userid' => $userid));  
    }
    
 
    public function purgeLogs() {
        $query = "truncate log_table";
        $stmt = $this->db->prepare($query);
        $stmt->execute();      
    }
    
   
    public function deleteLogs($days) {
        $daystodelete = 60 * 60 * 24 * $days;
        $time = time() - $daystodelete;
        $query = "DELETE FROM log_table WHERE timestamp <= '$time'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();      
    }
  
    public function purgeLogsOfUser($userid) {
        $query = $this->db->prepare("DELETE FROM log_table WHERE userid = '$userid'");
        $query->execute();   
    }
    
}
