<?php

namespace Tests;

use App\Model\Team;
use Tests\Helper\FakePerson;
use Tests\Helper\StubPerson;
use Tests\Helper\DummyPerson;
use PHPUnit\Framework\TestCase;

class TeamTest extends TestCase
{

    protected function setUp():void
    {
        $this->team = new Team(); 
    }
    
    
    public function testTeamInstance(){
        
        $this->assertInstanceOf(Team::class, new Team());
    }

    public function testTeamAddPerson(){

        $person = new DummyPerson();
        $this->team->add($person);

        $this->assertEquals(1, $this->team->count());
    }
    
    public function testTeamAddTwiceSamePersonException(){

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Person with same id allready exist");;
        $person = new FakePerson();
        $this->team->add($person);
        $this->team->add($person);

    }


    /**
     * @dataProvider multiplePersonsProvider
     */
    public function testTeamAddMultiplePerson($personNumber){
        
        for ($i=0; $i < $personNumber; $i++) { 
            // don't work with Dummy ;)
            // $person = new DummyPerson();
            $person = new FakePerson();

            $this->team->add($person);           
        }

        $this->assertSame($personNumber, $this->team->count());

    }

    public function testDeletePersonFromTeamById()
    {
        $person = new StubPerson();
        $this->team->add($person);
        $this->team->delete($person->getId());
        $this->assertSame(0, $this->team->count());
    }

    public function multiplePersonsProvider()
    {
        return [[2], [10], [50]];
    }


}