<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Appointment_db {
    //put your code here
    public static function get_appointment($AppointmentId) 
    {
        $db = Database::getDB();
        
	$query = 'SELECT * FROM appointments WHERE AppointmentId = :AppointmentId';
	$statement = $db->prepare($query);
        $statement->bindValue(':AppointmentId', $AppointmentId);
	$statement->execute();
	$results = $statement->fetch();
        $statement->closeCursor();
        $appointment = new Appointment ($results['AppointmentId'],
                         $results['CustomerId'],
                         $results['ScheduleId'],
                         $results['Status']);
        return $appointment;
    }

    public static function get_appointments_for_walker($UserId) 
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM appointments JOIN schedules ON appointments.ScheduleID=schedules.ScheduleId and schedules.WalkerId = :WalkerID';
	$statement = $db->prepare($query);
        $statement->bindValue(':WalkerId', $UserId);
	$statement->execute();
	$results = $statement->fetch();
        return $results;
    }

    public static function get_appointments_for_owner($UserId) 
    {
        $db = Database::getDB();
        
        $query = 'SELECT * FROM appointments WHERE CustomerID = :CustomerId';
	$statement = $db->prepare($query);
        $statement->bindValue(':CustomerId', $UserId);
	$statement->execute();
	$results = $statement->fetch();
        return $results;
    }
    
    public static function select_all()
    {
      $db = Database::getDB();
 
      $query = 'SELECT * FROM appointments';
      $statement = $db->prepare($query);
      $statement->execute();
      $results =  $statement->fetchAll();
      return $results;
    }
    
    public static function add_appointment($CustomerId,$ScheduleId,$Status)
    {
        $db = Database::getDB();
 
      $query = 'INSERT INTO appointments (CustomerId, ScheduleId, Status) VALUES (:CustomerId, :ScheduleId, :Status)';
      $statement = $db->prepare($query);
      $statement->bindValue(':CustomerId', $CustomerId);
      $statement->bindValue(':ScheduleId', $ScheduleId);
      $statement->bindValue(':Status', $Status);
      $statement->execute();
      $statement->closeCursor();
    }
    
    public static function update_appointment($AppointmentId,$CustomerId,$ScheduleId,$Status)
    {
         $db = Database::getDB();
 
      $query = 'UPDATE appointments SET CustomerId = :CustomerId, CustomerId = :CustomerId, ScheduleId = :ScheduleId, Status = :Status WHERE AppointmentId = :AppointmentId';     
      $statement = $db->prepare($query);
      $statement->bindValue(':AppointmentId', $AppointmentId);
      $statement->bindValue(':CustomerId', $CustomerId);
      $statement->bindValue(':ScheduleId', $ScheduleId);
      $statement->bindValue(':Status', $Status);
      $statement->execute();
      $statement->closeCursor();
    }
    
        public static function delete_appointment($AppointmentId)
    {
         $db = Database::getDB();
 
      $query = 'DELETE FROM `appointments` WHERE AppointmentId = :AppointmentId';     
      $statement = $db->prepare($query);
      $statement->bindValue(':AppointmentId', $AppointmentId);
      $statement->execute();
      $statement->closeCursor();
    }
}
?>