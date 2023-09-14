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
    public function getCalendarium(){
        $timestart = '2023-06-01';
        $timeend = '2023-06-30';

        $instance = new Calendarium();
        $result = $instance->getCalendarium($timestart, $timeend);

        $this->assertIsString($result); // Check if the result is a string
        $this->assertNotEmpty($result); // Check if the result is not empty
    }

    /**
     * Test the getCalendariumByDate method
     * @test
     * @covers Calendarium::getCalendariumByDate
     * @return void
     */
    public function getCalendariumByDate(){
        $date = '2023-06-01';

        $instance = new Calendarium();
        $result = $instance->getCalendariumByDate($date);

        $this->assertIsString($result); // Check if the result is a string
        $this->assertNotEmpty($result); // Check if the result is not empty
    }

    /**
     * Test the getGenitivus method
     * @test
     * @covers Calendarium::getGenitivusByDate
     * @return void
     */
    public function getGenitivusByDate(){
        $date = '2023-06-01';

        $instance = new Calendarium();
        $result = $instance->getGenitivusByDate($date);

        $this->assertIsString($result); // Check if the result is a string
        $this->assertNotEmpty($result); // Check if the result is not empty
        $this->assertEquals('Jeudi de la Pentecôte', $result); // Check if the result is equal to "Jeudi de la Pentecôte"
    }

    /**
     * Test the index method of the HomeController
     * @test
     * @covers HomeController::index
     * @return void
     */
    public function getHomePage(){
        $instance = new Controllers\HomeController();
        $result = $instance->index();
        $this->assertIsObject($result); // Check if the result
    }

    /**
     * Test the today method of the HomeController
     * @test
     * @covers HomeController::today
     * @return void
     */
    public function getToday(){
        $instance = new Controllers\HomeController();
        $result = $instance->today();
        $this->assertIsString($result); // Check if the result
    }
}