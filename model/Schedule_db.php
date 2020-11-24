<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Schedule_db {
    //put your code here
    public static function get_scheduleItem($ScheduleId) 
    {
        $db = Database::getDB();
        
	$query = 'SELECT * FROM schedules WHERE ScheduleID = :ScheduleId';
	$statement = $db->prepare($query);
        $statement->bindValue(':ScheduleId', $ScheduleId);
	$statement->execute();
	$results = $statement->fetch();
        $statement->closeCursor();
        return $results;
    }
    
    public static function get_item_date($ScheduleId)
    {
        $db = Database::getDB();
        
	$query = 'SELECT Date FROM schedules WHERE ScheduleID = :ScheduleId';
	$statement = $db->prepare($query);
        $statement->bindValue(':ScheduleId', $ScheduleId);
	$statement->execute();
	$results = $statement->fetch();
        $statement->closeCursor();
        return $results;    
    }
    
    public static function get_item_time($ScheduleId)
    {
        $db = Database::getDB();
        
	$query = 'SELECT Time FROM schedules WHERE ScheduleID = :ScheduleId';
	$statement = $db->prepare($query);
        $statement->bindValue(':ScheduleId', $ScheduleId);
	$statement->execute();
	$results = $statement->fetch();
        $statement->closeCursor();
        return $results;    
    }
    
    public static function get_item_Day($ScheduleId)
    {
        $db = Database::getDB();
        
	$query = 'SELECT DayOfWeek FROM schedules WHERE ScheduleID = :ScheduleId';
	$statement = $db->prepare($query);
        $statement->bindValue(':ScheduleId', $ScheduleId);
	$statement->execute();
	$results = $statement->fetch();
        $statement->closeCursor();
        return $results;    
    }
    
        public static function get_Walker($ScheduleId)
    {
        $db = Database::getDB();
        
	$query = 'SELECT WalkerID FROM schedules WHERE ScheduleID = :ScheduleId';
	$statement = $db->prepare($query);
        $statement->bindValue(':ScheduleId', $ScheduleId);
	$statement->execute();
	$results = $statement->fetch();
        $statement->closeCursor();
        return $results;    
    }
   public static function get_schedule_for_user($UserId) 
    {
        $db = Database::getDB();
        
	$query = 'SELECT * FROM schedules WHERE WalkerID = :WalkerId';
	$statement = $db->prepare($query);
        $statement->bindValue(':WalkerId', $UserId);
	$statement->execute();
	$results = $statement->fetch();
        return $results;
    }
    
    public static function select_all()
    {
      $db = Database::getDB();
 
      $query = 'SELECT * FROM schedules where IsBooked = 0';
      $statement = $db->prepare($query);
      $statement->execute();
      $results =  $statement->fetchAll();
      return $results;
    }
    
    public static function add_schedule_item($date,$DayOfWeek,$Time, $IsBooked, $WalkerId)
    {
        $db = Database::getDB();
 
      $query = 'INSERT INTO schedules (Date, DayOfWeek, Time, IsBooked, WalkerID) VALUES (:Date, :DayOfWeek, :Time, :IsBooked, :WalkerID)';
      $statement = $db->prepare($query);
      $statement->bindValue(':Date', $date);
      $statement->bindValue(':DayOfWeek', $DayOfWeek);
      $statement->bindValue(':Time', $Time);
      $statement->bindValue(':IsBooked', $IsBooked);
      $statement->bindValue(':WalkerID', $WalkerId);
      $statement->execute();
      $statement->closeCursor();
    }
    
    public static function update_schedule_item($ScheduleId, $IsBooked)
    {
         $db = Database::getDB();
 
      $query = 'UPDATE schedules SET IsBooked = :IsBooked WHERE ScheduleId = :ScheduleId';     
      $statement = $db->prepare($query);
      $statement->bindValue(':ScheduleId', $ScheduleId);
      $statement->bindValue(':IsBooked', $IsBooked);
      $statement->execute();
      $statement->closeCursor();
    }
}
?>