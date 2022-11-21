<?php
// ======== PHP Abstructs ==========
abstract class MusicalInstruments
{
    protected $owner = '';

    abstract public function play_sound();

    abstract public function add_owner($owner);

    abstract public function get_owner_name(): string;
}

class Piano extends MusicalInstruments
{
    public function play_sound()
    {
        echo "do re me <br>";
    }

    public function add_owner($owner)
    {
        $this->owner = $owner;
    }

    public function get_owner_name(): string
    {
        return $this->owner;
    }
}

class Drums extends MusicalInstruments
{
    public function play_sound()
    {
        echo "Dom Tac <br>";
    }

    public function add_owner($owner)
    {
        $this->owner = $owner;
    }

    public function get_owner_name(): string
    {
        return $this->owner;
    }
}


$yamaha = new Piano();
$yamaha->play_sound();
$yamaha->add_owner('Roy');

echo "The piano owner is " . $yamaha->get_owner_name();

var_dump($yamaha);
