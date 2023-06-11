<?php

namespace Controllers;

use Source\Renderer;
use Class\Calendarium\Calendarium;

class HomeController
{
    public function index() : Renderer {
        $today = $this->today();
        return Renderer::make('accueil', ['calendarium' => $today]);
    }

    private function today() : string {
        $calendarium = new Calendarium();
        $calendarium = $calendarium->getGenitivusByDate(self::datetoday());
        return $calendarium;
    }

    private function datetoday() : string {
        $currentDate = date('Y-m-d');
        return $currentDate;
    }
}