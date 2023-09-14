<?php

namespace Source;

class Renderer
{
    // $param is an array of variables that will be available in the view
    private array $param = [];

    public function __construct(private string $viewPath, array $param = [])
    {
        $this->param = $param;
    }

    /**
     * Make a new instance of the Renderer class
     *
     * @param $params
     */
    public static function make(string $viewPath, $param): static
    {
        return new static($viewPath, $param);
    }

    /**
     * Display the view
     *
     * @return string
     */
    public function view()
    {
        extract($this->param);

        ob_start();

        require BASE_VIEW_PATH . $this->viewPath . '.php';

        return ob_get_clean();
    }

    public function __toString()
    {
        return $this->view();
    }
}
