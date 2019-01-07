<?php

class MainController extends CoreController
{
    // Page d'accueil
    public function home()
    {
        // $dbData = new DBData;

        // $po = $dbData->getCharacterList();

        // Envoyer les données à la vue
        $this->show(
            'home',
            [
                'title' => 'Liste des pokémons'
            ]);
    }

    public function types()
    {
        $this->show(
            'types',
            [
                'title' => 'Les différents types de pokémons'
            ]);
    }

    public function type()
    {
        $this->show(
            'type',
            [
                'title' => 'nom du type de pokémon'
            ]);
    }

    public function pokemon()
    {
        $this->show(
            'detail',
            [
                'title' => 'nom du pokémon'
            ]);
    }
}
