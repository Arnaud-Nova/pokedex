<?php
class DBData
{
    private $pdo;

    /**
     *  Connexion à la base de données
     */
    public function __construct()
    {
        $dsn = 'mysql:dbname=pokedex;host=localhost;charset=UTF8';
        $username = 'fabio';
        $password = '';
        // J'ajoute une option qui me permet d'avoir les erreurs directement en Warning dans PHP
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ];
        $this->pdo = new PDO($dsn, $username, $password, $options);
    }

    /**
     * Récupération de la liste des Pokémon
     */
    public function getPokemons() {
        // On sélectionne tous les champs de la table pokemon et on ordonne les résultats par numéro ascendant (par défaut, puisque non précisé)
        $sql = "SELECT *
                FROM pokemon 
                ORDER BY numero
                ";

        $request = $this->pdo->query($sql);
        // On récupère le résultat dans un array associatif ayant pour clés les champs de la table
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    /**
     * Récupération d'une liste de pokémon par types
     */
    public function getPokemonsByType($type) {
        // On cherche dans la table de pivot "pokemon_type" les entrées qui correspondent au type fourni
        // puis on joint cette table à la table "pokemon" dont on récupère les champs
        $sql = "SELECT pokemon.*
                FROM pokemon 
                INNER JOIN pokemon_type ON pokemon_type.pokemon_numero = pokemon.numero
                WHERE pokemon_type.type_id = :type
                ";

        $request = $this->pdo->prepare($sql);
        $request->execute([':type' => $type]);
        // On récupère le résultat dans un array associatif ayant pour clés les champs de la table
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /** 
     * Récupération d'un pokémon par numéro
     */
    public function getPokemon($numero) {
         // On sélectionne tous les champs de la table pokemon pour le numéro préciser
         $sql = "SELECT *
                FROM pokemon 
                WHERE numero = :numero
                LIMIT 1
                ";
        $request = $this->pdo->prepare($sql);
        $request->execute([':numero' => $numero]);
        // On récupère le résultat dans un array associatif ayant pour clés les champs de la table
        $result = $request->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    /** 
     * Récupération des types d'un pokémon
     */
    public function getTypesofPokemon($number) {
        // On cherche dans la table de pivot "pokemon_type" les entrées qui correspondent au numéro fourni
        // puis on joint cette table à la table "type" dont on récupère les champs
        $sql = "SELECT type.*
                FROM pokemon_type
                INNER JOIN type ON type.id = pokemon_type.type_id
                WHERE pokemon_type.pokemon_numero = :numero";

        $request = $this->pdo->prepare($sql);
        $request->execute( [':numero' => $number]);
        // On récupère le résultat dans un array associatif ayant pour clés les champs de la table
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getTypes(){
        $sql = "SELECT * FROM type";

        $request = $this->pdo->query($sql);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}