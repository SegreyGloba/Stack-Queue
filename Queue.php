<?php

require_once __DIR__.'/Structure.php';

class Queue extends Structure
{
    private $head = 0;
    private $tail = 0;

    public function in($value)
    {
        $this->hranilishche[$this->tail++] = $value;
    }

    public function isEmpty() {
        return $this->head === $this->tail;
    }

    public function reversed()
    {
        $this->hranilishche = array_reverse($this->hranilishche);
        return $this->hranilishche;
    }

    public function out()
    {
        if($this->isEmpty()) {
            throw new RuntimeException("Queue is empty");
        }

        $res = $this->hranilishche[$this->head++];
        if($this->head > $this->tail) {
            $this->head = $this->tail = 0;
        }
        return $res;
    }




}

$obj = new Queue();


for($i = 0; $i < 10; $i++) {
    $obj->in($i.'abc');
}

$obj->reversed();


var_dump($obj->out());
var_dump($obj->out());
var_dump($obj->out());
var_dump($obj->out());

