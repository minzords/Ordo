<?php

namespace Class\Calendarium;

use WpOrg\Requests\Requests;

require_once __DIR__ . '/../../vendor/autoload.php';

class Calendarium
{
    /**
     * Get the calendarium from the API
     *
     * @return string JSON
     */
    public function getCalendarium(string $timestart, string $timeend): string
    {
        $response = Requests::get('https://api2.laportelatine.org/la-porte-latine/items/ordo_calendarium?fields=*&limit=40&filter[datum][between]=' . $timestart . ',' . $timeend);

        return $response->body;
    }

    /**
     * Get the calendarium of the day from the API
     *
     * @return string JSON
     */
    public function getCalendariumByDate(string $date): string
    {
        $response = Requests::get('https://api2.laportelatine.org/la-porte-latine/items/ordo_calendarium?fields=*&limit=40&filter[datum][between]=' . $date . ',' . $date);

        return $response->body;
    }

    /**
     * Get the saint of the day or celebration from the API
     *
     * @return string JSON
     */
    public function getGenitivusByDate(string $date)
    {
        $request = self::getCalendariumByDate($date);

        $request = json_decode($request, true);
        $request = $request['data'][0]['nomen_html'];

        // Remove sup and span html tags
        $request = str_replace(['<sup>', '</sup>'], '', $request);
        $request = str_replace(['<span class="ordo-titulus">', '</span>'], '', $request);

        return $request;
    }

    /**
     * Remove html tags from the array (sup and span)
     */
    public function removehtmltags(array $array): array
    {
        $array = str_replace(['<sup>', '</sup>'], '', $array);
        $array = str_replace(['<span class="ordo-titulus">', '</span>'], '', $array);

        return $array;
    }
}
