<?php 
    declare(strict_types=1);

    class NextMovie 
    {
        public function __construct(
            private string $title,
            private int $days_until,
            private string $release_date,
            private string $following_production,
            private string $poster_url,
            private string $overview
        ){}

        public function get_until_message(): string
        {
            $days = $this->days_until;
            return match (true) {
                $days === 0 => "Hoy se estrena! 🥳 ",
                $days === 1 => "Mañana se estrena! 🚀",
                $days < 7   => "Falta menos de una semana! 😎",
                $days < 30  => "En menos de un mes se estrena! 🎥",
                default     => "$days dias hasta el estreno 📅"
            };
        }

        public static function fetch_and_create_movie(string $api_url): NextMovie
        {
            $response = file_get_contents($api_url);
            $data = json_decode($response, true);
            return new self(
                $data["title"],
                $data["days_until"],
                $data["release_date"], 
                $data["following_production"]["title"] ?? "Desconocido",
                $data["poster_url"],
                $data["overview"],
            );
        }

        public function get_data()
        {
            return get_object_vars($this);
        }
    }
?>