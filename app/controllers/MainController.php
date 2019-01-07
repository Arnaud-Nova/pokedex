<?php

class MainController extends CoreController
{
    // Page d'accueil
    public function home()
    {
        $dbData = new DBData;

        $pokemonsList = $dbData->getPokemonsList();

        // Envoyer les données à la vue
        $this->show(
            'home',
            [
                'pokemonsList' => $pokemonsList,
                'title' => 'Liste des pokémons'
            ]);
    }

    // Page des différents types de Pokémons
    public function types()
    {
        $dbData = new DBData;

        $typesList = $dbData->getTypesList();
        $this->show(
            'types',
            [
                'typesList' => $typesList,
                'title' => 'Les différents types de pokémons'
            ]);
    }

    // Page d'un type de Pokémon
    public function type($typeId)
    {
        $dbData = new DBData;

        $typePokemonsList = $dbData->getTypePokemonsList($typeId);

        $this->show(
            'type',
            [
                'typePokemonsList' => $typePokemonsList,
                'title' => $typePokemonsList[0]->name
            ]);
    }

    // Page détail d'un Pokémon
    public function pokemon($typeId)
    {
        $dbData = new DBData;

        $pokemon = $dbData->getPokemon($typeId);

        $this->show(
            'detail',
            [
                'monPokemon' => $pokemon,
                'title' => $pokemon[0]['nom']
            ]);
    }
}
