<?php

// ======== Inheretence =========

class Computer
{
    public $cpu;
    public $ram = '2GB';
    public $storage;
    public $motherboard;
    public $powersubly;

    public function start_cpu()
    {
        echo "CPU is starting";
    }
}

class ATM extends Computer
{
    public $touch_sceen;
    public $money_container;
    public $card_holder;

    public function draw_money()
    {
        echo "you withdraw 500JOD";
    }
}

class Laptop extends Computer
{
    public $touch_sceen;
    public $foldable_screen;
    public $touch_pad;
    public $ram = '8GB'; // classes can overide parent's properties and methods.
}

// var_dump(new Computer);
// $arab_bank_atm = new ATM;
// var_dump($arab_bank_atm);
// $arab_bank_atm->start_cpu();
// var_dump(new Laptop);

function private_method()
{
    return 1;
}

// =========== Acccess Modifiers =============
// Public => Protected => Private
class A
{

    public function public_method()
    {
        echo "Hi from public <br>";
    }

    protected function protected_method()
    {
        echo "Hi from protected <br>";
        $this->private_method();
    }

    private function private_method()
    {
        echo "Hi from private <br>";
    }
}

class B extends A
{
    public function say_hi()
    {
        echo "Hi from B class <br>";
        $this->protected_method();
        // $this->private_method(); // Error
    }
}

$obj = new B();
// $obj->say_hi();
// $obj->public_method();
// $obj->protected_method(); // Error
// $obj->private_method(); // Error
// var_dump($obj);


// Modifiers example
class Course
{
    protected $students = array();
    private $course_name;
    protected $syllabus;

    public function __construct($course_name)
    {
        $this->course_name = $course_name;
    }

    public function add_student($student)
    {
        $this->students[] = $student;
    }

    public function get_course_name()
    {
        echo $this->course_name;
    }
}

class PHP extends Course
{
    public $php_distinct_students = array();
    public function __construct($syllabus)
    {
        $this->syllabus = $syllabus;
    }

    public function add_php_distinct_student($student)
    {
        if (in_array($student, $this->students)) {
            $this->php_distinct_students[] = $student;
        }
    }
}

$session = new PHP('PHP');
$session->get_course_name();
$session->add_student('Ahmad');
$session->add_student('Khalid');
$session->add_php_distinct_student('Ahmad');
// $session->course_name = "Python"; // Error because course_name is protected method
// $session->change_course_name('Python');
var_dump($session);
