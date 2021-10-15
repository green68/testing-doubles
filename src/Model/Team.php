<?php

namespace App\Model;

use App\Interfaces\PersonInterface;
use Exception;

class Team
{
    private array $persons = [];

    public function add(PersonInterface $person)
    {
        if(isset($this->persons[$person->getId()])){
            throw new Exception("Person with same id allready exist");
        }
        $id = $person->getId();
        $this->persons[$id] = $person;
    }

    public function count()
    {
        return count($this->persons);
    }

    public function delete(string $id)
    {
       unset($this->persons[$id]);

    }
}