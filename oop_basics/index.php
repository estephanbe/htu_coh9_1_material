<?php
/*
Procedural Programming (P.P) => the application is based on FUNCTIONS
        vs
OOP (Object-oriented programming) => the application is based on OBJECTS

Class is a template
Object is an instance (current copy) of the class
*/

// ============================== using P.P =======================================
$bmw_pp_name;
$bmw_pp_has_engine = true;
$bmw_pp_model;
$bmw_pp_owner = "Roy";

function bmw_start_engine()
{
    global $bmw_pp_has_engine, $bmw_pp_name;
    if ($bmw_pp_has_engine) {
        echo "Engine " . $bmw_pp_name . " has started! <br>";
    }
}

function bmw_set_car_model($model)
{
    global $bmw_pp_model;
    $bmw_pp_model = $model;
}

// bmw_start_engine();
// bmw_set_car_model(2020);

$honda_pp_name;
$honda_pp_has_engine;
$honda_pp_model;
$honda_pp_owner = "Roy";

function honda_start_engine()
{
    global $honda_pp_has_engine, $honda_pp_name;
    if ($honda_pp_has_engine) {
        echo "Engine " . $honda_pp_name . " has started! <br>";
    }
}

function honda_set_car_model($model)
{
    global $honda_pp_model;
    $honda_pp_model = $model;
}

// honda_start_engine();
// honda_set_car_model(2020);


// ============================== using OOP =======================================

// This is a class
class Car
{
    public $name;
    public $has_engine = true;

    public function __construct($car_name) // envoked when the object is created
    {
        $this->name = $car_name;
        echo "class has been initiated <br>";
    }

    public function __destruct() // envoked when the object has been excuted
    {
        echo "class was excuted <br>";
    }

    public function start_engine()
    {
        if ($this->has_engine) {
            echo "Engine " . $this->name . " has started! <br>";
        }
    }

    public function set_car_model($model)
    {
        // We can create properties that was not defined before
        $this->model = $model;
    }
}

$bmw = new Car("BMW");
// $bmw->name = "BMW";
// $bmw->start_engine();
$bmw->set_car_model(2020);
$bmw->owner = "Roy";

$honda = new Car("Honda");
// $honda->name = "Honda";
$honda->has_engine = false;
$honda->start_engine();
