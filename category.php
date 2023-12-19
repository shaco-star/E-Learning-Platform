<?php

require 'database.php';



class Category 
{
    private $name;
    private $img_link;
    private $coursesNumbers;
    private $description;

    public function __construct($name, $img_link, $coursesNumbers, $description)
    {
        $this->name = $name;
        $this->img_link = $img_link;
        $this->coursesNumbers = $coursesNumbers;
        $this->description = $description;
    }

   
}
?>