<?php

class food
{
    private $name;
    private $table;
    private $id;

    function __construct($name,$table,$id)
    {
        $this->name = $name;
        $this->table = $table;
        $this->id = $id;
    }

    function uniqFoodName() : string {
        return "name=".$this->name."&table=".$this->table."&id=".$this->id;
    }
}