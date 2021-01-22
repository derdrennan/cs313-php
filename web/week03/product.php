<?php

class Product
{

    public $productArray = array(
        "base" => array(
            'id' => 'base',
            'name' => 'Base Set',
            'code' => 'base',
            'image' => '..\week03\pokemonPics\base-set.jpg',
            'price' => '437.00'
        ),
        "blastoise" => array(
            'id' => 'blastoise',
            'name' => 'Blastoise',
            'code' => 'blastoise',
            'image' => '..\week03\pokemonPics\blastoise.jpg',
            'price' => '457.00'
        ),
        "charizard" => array(
            'id' => 'charizard',
            'name' => 'Charizard',
            'code' => 'charizard',
            'image' => '..\week03\pokemonPics\charizard.jpg',
            'price' => '1,750.00'
        )
        "fossil" => array(
            'id' => 'fossil',
            'name' => 'Fossil Set',
            'code' => 'fossil',
            'image' => '..\week03\pokemonPics\fossil-set.jpg',
            'price' => '219.00'
        )
        "mew" => array(
            'id' => 'mew',
            'name' => 'Mew',
            'code' => 'mew',
            'image' => '..\week03\pokemonPics\mew.jpg',
            'price' => '199.00'
        )
        "venusaur" => array(
            'id' => 'venusaur',
            'name' => 'Venusaur',
            'code' => 'venusaur',
            'image' => '..\week03\pokemonPics\venusaur.jpg',
            'price' => '187.00'
        )
        "XY" => array(
            'id' => 'XY',
            'name' => 'XY Booster',
            'code' => 'XY',
            'image' => '..\week03\pokemonPics\xy-booster.jpg',
            'price' => '768.00'
        )
    );

    public function getAllProduct()
    {
        return $this->productArray;
    }
}