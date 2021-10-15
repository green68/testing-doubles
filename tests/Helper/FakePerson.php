<?php

namespace Tests\Helper;

use Ramsey\Uuid\Uuid;
use App\Interfaces\PersonInterface;


class FakePerson implements PersonInterface
{
    private string $id;

    public function __construct()
    {
        $this->id = (string)Uuid::uuid4();   
    }
    public function getId()
    {
        return $this->id;
    }
}