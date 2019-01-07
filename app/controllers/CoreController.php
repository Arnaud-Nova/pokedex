<?php

class CoreController
{
    /**
     * @var AltoRouter
     */
    protected $router;

    /**
     * @param AltoRouter $router
     */
    public function __construct($router)
    {
        $this->router = $router;
    }

    /**
     * @param string $viewName Le nom de la vue
     * @param array $viewVars La liste des données à envoyer à la vue
     */
    protected function show($viewName, $viewVars = [])
    {
        $viewVars['router'] = $this->router;

        //dump($viewVars);

        include __DIR__ . '/../views/header.tpl.php';
        include __DIR__ . '/../views/' . $viewName . '.tpl.php';
        include __DIR__ . '/../views/footer.tpl.php';
    }
}
