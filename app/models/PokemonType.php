<?php

class PokemonType extends CoreModel {
    private $pokemonNumero;
    private $typeId;

    /**
     * Get the value of pokemonNumero
     */ 
    public function getPokemonNumero()
    {
        return $this->pokemonNumero;
    }

    /**
     * Set the value of pokemonNumero
     *
     * @return  self
     */ 
    public function setPokemonNumero($pokemonNumero)
    {
        $this->pokemonNumero = $pokemonNumero;

        return $this;
    }

    /**
     * Get the value of typeId
     */ 
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set the value of typeId
     *
     * @return  self
     */ 
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }
}