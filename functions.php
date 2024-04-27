<?php 
    declare(strict_types=1);

    function render_templates(string $templates, array $data = [])
    {
        extract($data);
        require "templates/$templates.php";
    }
    
    function get_data(string $url): array 
    {
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        return $data;
    }
?>