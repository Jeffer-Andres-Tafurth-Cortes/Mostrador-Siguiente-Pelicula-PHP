<?php 

    declare(strict_types=1);

    class SuperHero {

        public function __construct(
            private string $name, 
            public array $powers, 
            public string $planet
        ){
        }

        public function attack()
        {
            return "!$this->name esta atacando";
        }

        public function show_all()
        {
            return get_object_vars($this);
        }

        public function description(){
            $powers = implode(",", $this->powers);

            return "$this->name es un superheroe que viene de 
            $this->planet y su poder es: $powers";
        }

        public static function random()
        {
            $names = ["Thor", "Spiderman", "Wolverine", "Ironman", "Hulk"];
            $powers = [
                ["Superfuerza", "Volar", "Rayos"],
                ["Superfueza", "Agilidad", "Telarañas"],
                ["Regeneracion", "Superfuerza", "Garras de adamantium"],
                ["Superfuerza", "Volar", "Rayos Laser"],
                ["Superfuerza", "Super Agilidad" ,"Cambio de tamaño"]
            ];
            $planets = ["Asgard", "Hulkworld", "Kripton", "Tierra"];

            $name = $names[array_rand($names)];
            $power = $powers[array_rand($powers)];
            $planet = $planets[array_rand($planets)];

            return new self($name, $power, $planet);
        }
    }

    // estatico
    $hero = SuperHero::random();
    echo $hero->description();
?>