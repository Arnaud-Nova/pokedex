<?php 

require __DIR__."/../DBdata.php";

class MainController {

    // Affichage de la liste (page d'accueil)
    public function list() {
        $db = new DBdata();
        $pokemons = $db->getPokemons();
        $this->show('list', [
            'title' => 'Accueil',
            'pokemons' => $pokemons
        ]);
    }

    // Affichage du détail
    public function detail($params) {

        $db = new DBdata();
        $pokemon = $db->getPokemon($params['numero']);
        $types = $db->getTypesOfPokemon($params['numero']);
        $this->show('detail', [
            'title' => 'Accueil',
            'pokemon' => $pokemon,
            'types' => $types
        ]);
    }

    // Affichage des types
    public function types() {

        $db = new DBdata();
        $types = $db->getTypes();
        $this->show('types', [
            'title' => 'Liste des types',
            'types' => $types
        ]);
    }
    
    // Affichage de la liste filtrée par type
    public function type($params) {

        $db = new DBdata();
        $pokemons = $db->getPokemonsByType($params['type']);
        $this->show('list', [
            'title' => 'Filtré par type',
            'pokemons' => $pokemons
        ]);
    }

    
    public function notFound()
    {
        header('HTTP/1.1 404 Not Found');
        $this->show('error404', [
            'title' => 'Page inexistante - 404'
        ]);
    }

    public function show($viewName, $viewVars = [])
    {
        // On inclut les templates header et footer
        // ainsi que celui mis en paramètre ($viewName)
        include(__DIR__.'/../views/header.tpl.php');
        include(__DIR__.'/../views/'.$viewName.'.tpl.php');
        include(__DIR__.'/../views/footer.tpl.php');
    }
}