<?php

class Training {
    private $title;
    private $level;
    private $date;
    private $room;
    private $run_by;

    public function __construct($title, $level, $date, $room, $run_by)
    {
        $this->title = $title;
        $this->level = $level;
        $this->date = $date;
        $this->room = $room;
        $this->run_by = $run_by;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getRoom()
    {
        return $this->room;
    }

    public function setRoom($room)
    {
        $this->room = $room;
    }

    public function getRunBy()
    {
        return $this->run_by;
    }

    public function setRunBy($run_by)
    {
        $this->run_by = $run_by;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}