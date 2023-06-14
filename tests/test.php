<?php

use Class\Calendarium\Calendarium;
use PHPUnit\Framework\TestCase;

class CalendariumTest extends TestCase {

    /**
     * Test the getCalendarium method
     * @test
     * @covers Calendarium::getCalendarium
     * @return void
     */
    public function getCalendarium()
    {
        $timestart = '2023-06-01';
        $timeend = '2023-06-30';

        $instance = new Calendarium();
        $result = $instance->getCalendarium($timestart, $timeend);

        $this->assertIsString($result); // Check if the result is a string
        $this->assertNotEmpty($result); // Check if the result is not empty
    }
    
}