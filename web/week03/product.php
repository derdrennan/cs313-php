<?php

class Product
{

    public $productArray = array(
        "base" => array(
            'id' => '1',
            'name' => 'Base Set',
            'image' => '..\week03\pokemonPics\base-set.jpg',
            'price' => '437.00'
        ),
        "blastoise" => array(
            'id' => '2',
            'name' => 'Blastoise',
            'image' => '..\week03\pokemonPics\blastoise.jpg',
            'price' => '457.00'
        ),
        "charizard" => array(
            'id' => '3',
            'name' => 'Charizard',
            'image' => '..\week03\pokemonPics\charizard.jpg',
            'price' => '1,750.00'
        ),
        "fossil" => array(
            'id' => '4',
            'name' => 'Fossil Set',
            'image' => '..\week03\pokemonPics\fossil-set.jpg',
            'price' => '219.00'
        ),
        "mew" => array(
            'id' => '5',
            'name' => 'Mew',
            'image' => '..\week03\pokemonPics\mew.jpg',
            'price' => '199.00'
        ),
        "venusaur" => array(
            'id' => '6',
            'name' => 'Venusaur',
            'image' => '..\week03\pokemonPics\venusaur.jpg',
            'price' => '187.00'
        ),
        "XY" => array(
            'id' => '7',
            'name' => 'XY Booster',
            'image' => '..\week03\pokemonPics\xy-booster.jpg',
            'price' => '768.00'
        ),
    );

    public function getAllProduct()
    {
        return $this->productArray;
    }
}
