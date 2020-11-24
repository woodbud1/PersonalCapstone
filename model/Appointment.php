<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Appointment {

    private $ApptID;
    private $CustomerID;
    private $ScheduleID;
    private $Status;
    
    public function __construct($ApptID, $CustomerID, $ScheduleID, $Status) {
        $this->ApptID = $ApptID;
        $this->CustomerID = $CustomerID;
        $this->ScheduleID = $ScheduleID;
        $this->Status = $Status;
    }

    public function getApptID() {
        return $this->ApptID;
    }

    public function getCustomerID() {
        return $this->CustomerID;
    }

    public function getScheduleID() {
        return $this->ScheduleID;
    }

    public function getStatus() {
        return $this->Status;
    }

    public function setApptID($ApptID) {
        $this->ApptID = $ApptID;
    }

    public function setCustomerID($CustomerID) {
        $this->CustomerID = $CustomerID;
    }

    public function setScheduleID($ScheduleID) {
        $this->ScheduleID = $ScheduleID;
    }

    public function setStatus($Status) {
        $this->Status = $Status;
    }


}