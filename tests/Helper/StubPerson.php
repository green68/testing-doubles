<?php

namespace Tests\Helper;

use App\Interfaces\PersonInterface;


class StubPerson implements PersonInterface
{
    public function __construct()
    {
        
    }
    public function getId()
    {
        return "123";
    }
}