<?php

class owHeros
{
    public $name = '';
    function __construct($name = '')
    {
        $this->name = $name;
        echo "owHeros __construct" . PHP_EOL;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function atk($value = '')
    {
        echo "atk -> " . $this->getName() . PHP_EOL;
    }
}