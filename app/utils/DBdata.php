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
        $username = 'pokedex';
        $password = 'pokedex';
        // J'ajoute une option qui me permet d'avoir les erreurs directement en Warning dans PHP
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ];
        $this->pdo = new PDO($dsn, $username, $password, $options);
    }

    public function getSelection($sql, $model)
    {
        $selectionListQueryStatement = $this->pdo->query($sql);
        
        $selectionListQueryStatement->setFetchMode(
            PDO::FETCH_CLASS,
            $model
        );
        

        $selectionList = $selectionListQueryStatement->fetchAll();
        return $selectionList;
    }

    public function getPokemonsList()
    {
        $sql = '
            SELECT *
            FROM `pokemon`
        ';

        return $this->getSelection($sql, 'Pokemon');
    }

    public function getTypesList()
    {
        $sql = '
            SELECT *
            FROM `type`
        ';
        
        return $this->getSelection($sql, 'Type');
    }
    

    public function getTypePokemonsList($typeId)
    {
        $id = $typeId['id'];
        $sql = "
            SELECT 
                `pokemon`.*,
                `pokemon_type`.`pokemon_numero`,
                `pokemon_type`.`type_id`,
                `type`.`name`
            FROM `pokemon`
            JOIN `pokemon_type` ON `pokemon_type`.`pokemon_numero` = `pokemon`.`numero`
            JOIN `type` ON `type`.`id` = `pokemon_type`.`type_id`
            WHERE `pokemon_type`.`type_id` = $id
        ";

        return $this->getSelection($sql, 'Pokemon');
    }

    public function getPokemon($typeId)
    {
        $id = $typeId['id'];
        $sql = "
            SELECT 
                `pokemon`.*,
                `pokemon_type`.`type_id`,
                `type`.`name`,
                `type`.`color`
            FROM `pokemon`
            JOIN `pokemon_type` ON `pokemon_type`.`pokemon_numero` = `pokemon`.`numero`
            JOIN `type` ON `type`.`id` = `pokemon_type`.`type_id`
            WHERE `pokemon`.`id` = $id
        ";

        $selectionListQueryStatement = $this->pdo->query($sql); 

        $selectionList = $selectionListQueryStatement->fetchAll(PDO::FETCH_ASSOC);
        return $selectionList;
    }

}
