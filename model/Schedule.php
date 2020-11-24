<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Schedule {

    private $ScheduleID;
    private $Date;
    private $DayOfWeek;
    private $Time;
    private $isBooked;
    private $WalkerID;

    public function __construct($ScheduleID, $Date, $DayOfWeek, $Time, $isBooked, $WalkerID) {
        $this->ScheduleID = $ScheduleID;
        $this->Date = $Date;
        $this->DayOfWeek = $DayOfWeek;
        $this->Time = $Time;
        $this->isBooked = $isBooked;
        $this->WalkerID = $WalkerID;
    }
    public function getScheduleID() {
        return $this->ScheduleID;
    }

    public function getDate() {
        return $this->Date;
    }

    public function getDayOfWeek() {
        return $this->DayOfWeek;
    }

    public function getTime() {
        return $this->Time;
    }

    public function getIsBooked() {
        return $this->isBooked;
    }

    public function getWalkerID() {
        return $this->WalkerID;
    }

    public function setScheduleID($ScheduleID) {
        $this->ApptID = $ScheduleID;
    }

    public function setDate($Date) {
        $this->Date = $Date;
    }

    public function setDayOfWeek($DayOfWeek) {
        $this->DayOfWeek = $DayOfWeek;
    }

    public function setTime($Time) {
        $this->Time = $Time;
    }

    public function setIsBooked($isBooked) {
        $this->isBooked = $isBooked;
    }

    public function setWalkerID($WalkerID) {
        $this->WalkerID = $WalkerID;
    }

}

?>
