<?php

namespace Tests\Unit;

use App\Models\Flight;
use PHPUnit\Framework\TestCase;

class FlightTest extends TestCase
{
    public function test_findAll()
    {
        $all = Flight::findAll();
        // Voir toutes les assertions
        // https://phpunit.readthedocs.io/en/9.5/assertions.html
        $this->assertIsArray($all);
        $this->assertCount(4, $all);
    }

    public function test_findOne()
    {
        $this->assertIsObject(Flight::findOne('BD47'));
        $this->assertEquals('ZB24', Flight::findOne('ZB24')->nom);
        $this->assertEquals('9:00', Flight::findOne('ZB24')->heure);
        $this->assertNull(Flight::findOne(''));
        $this->assertNull(Flight::findOne('TER15'));
    }
}
