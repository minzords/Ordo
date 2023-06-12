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

    public function today() : string {
        $calendarium = new Calendarium();
        $calendarium = $calendarium->getGenitivusByDate(self::datetoday());
        return $calendarium;
    }

    public function tomorrow() : string {
        $calendarium = new Calendarium();
        $calendarium = $calendarium->getGenitivusByDate(self::datetomorrow());
        return $calendarium;
    }

    private function datetoday() : string {
        $currentDate = date('Y-m-d');
        return $currentDate;
    }

    private function dateTomorrow() : string {
        $currentDate = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime($currentDate . ' + 1 days'));
        return $tomorrow;
    }
}