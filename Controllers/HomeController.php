<?php

namespace Controllers;

use Class\Calendarium\Calendarium;
use Source\Renderer;

class HomeController
{
    /**
     * Display the home page of the website
     */
    public function index(): Renderer
    {
        $response = $this->calendariumMonth();

        return Renderer::make('accueil', ['calendarium' => $response]);
    }

    /**
     * Return the saint/feast of the day in view
     */
    public function today(): string
    {
        $calendarium = new Calendarium;
        $calendarium = $calendarium->getGenitivusByDate(self::datetoday());

        return self::ToJson($calendarium);
    }

    /**
     * Return the saint/feast of the week in view
     */
    public function week(): string
    {
        $calendarium = new Calendarium;
        $calendarium = $calendarium->getCalendarium(self::datetoday(), self::dateWeek());

        return self::ToJson($calendarium);
    }

    /**
     * Return the saint/feast of tomorrow in view
     */
    public function tomorrow(): string
    {
        $calendarium = new Calendarium;
        $calendarium = $calendarium->getGenitivusByDate(self::datetomorrow());

        return self::ToJson($calendarium);
    }

    /**
     * Return the calendarium of the month
     *
     * @return array
     */
    public function month(): string
    {
        $response = $this->calendariumMonth();

        return self::ToJson($response);
    }

    /**
     * Return array to json
     *
     * @param  string  $response
     */
    public function ToJson(string|array $response): string
    {
        header('Content-Type: application/json');
        $response = json_encode($response);

        return $response;
    }

    /**
     * Return the saint/feast of the day
     */
    private function datetoday(): string
    {
        $currentDate = date('Y-m-d');

        return $currentDate;
    }

    /**
     * Return the calendarium of tomorrow
     */
    private function dateTomorrow(): string
    {
        $currentDate = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime($currentDate . ' + 1 days'));

        return $tomorrow;
    }

    /**
     * Return the calendarium of week
     */
    private function dateWeek(): string
    {
        $currentDate = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime($currentDate . ' + 6 days'));

        return $tomorrow;
    }

    /**
     * Return the calendarium of the month
     */
    private function calendariumMonth(): array
    {
        $today = date('Y-m-d');
        $lastDayOfMonth = date('Y-m-t');
        $dateArray = [];
        $nomenarray = [];

        while ($today <= $lastDayOfMonth) {
            array_push($dateArray, $today);
            $today = date('Y-m-d', strtotime($today . ' + 1 day'));
        }

        $calendarium = new Calendarium;
        $result = $calendarium->getCalendarium(date('Y-m-d'), $lastDayOfMonth);

        $result = json_decode($result, true);

        foreach ($result['data'] as $element) {
            array_push($nomenarray, $element['nomen_html']); // Ajoutez $element['nomen_html'] au tableau
        }

        $nomenarray = array_combine($dateArray, $calendarium->removehtmltags($nomenarray));

        return $nomenarray;
    }
}
