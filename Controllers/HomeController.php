<?php

namespace Controllers;

use Source\Renderer;
use Class\Calendarium\Calendarium;

class HomeController
{
    /**
     * Display the home page of the website
     *
     * @return Renderer
     */
    public function index() : Renderer {
        $response = $this->calendariumMonth();
        return Renderer::make('accueil', ['calendarium' => $response]);
    }

    /**
     * Return the saint/feast of the day in view
     *
     * @return string
     */
    public function today() : string {
        $calendarium = new Calendarium();
        $calendarium = $calendarium->getGenitivusByDate(self::datetoday());
        return $calendarium;
    }

    /**
     * Return the saint/feast of tomorrow in view
     *
     * @return string
     */
    public function tomorrow() : string {
        $calendarium = new Calendarium();
        $calendarium = $calendarium->getGenitivusByDate(self::datetomorrow());
        return $calendarium;
    }

    /**
     * Return the calendarium of the month
     *
     * @return array
     */
    public function month() : array{
        $response = $this->calendariumMonth();
        return $response;
    }

    /**
     * Return the saint/feast of the day
     *
     * @return string
     */
    private function datetoday() : string {
        $currentDate = date('Y-m-d');
        return $currentDate;
    }

    /**
     * Return the calendarium of tomorrow
     *
     * @return string
     */
    private function dateTomorrow() : string {
        $currentDate = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime($currentDate . ' + 1 days'));
        return $tomorrow;
    }

    /**
     * Return the calendarium of the month
     *
     * @return array
     */
    private function calendariumMonth() : array {
        $today = date('Y-m-d');
        $lastDayOfMonth = date('Y-m-t');
        $dateArray = array();
        $nomenarray = array();

        while ($today <= $lastDayOfMonth) {
            array_push($dateArray, $today);
            $today = date('Y-m-d', strtotime($today . ' + 1 day'));
        }

        $calendarium = new Calendarium();
        $result = $calendarium->getCalendarium(date('Y-m-d'), $lastDayOfMonth);

        $result = json_decode($result, true);

        foreach ($result['data'] as $element) {
            array_push($nomenarray, $element['nomen_html']); // Ajoutez $element['nomen_html'] au tableau
        }

        $nomenarray = array_combine($dateArray, $calendarium->removehtmltags($nomenarray));
        
        return $nomenarray;
    }
}