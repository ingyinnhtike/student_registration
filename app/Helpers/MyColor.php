<?php


namespace App\Helpers;


trait MyColor
{
    private $colors = [
        'green' => [
            'fill' => '#e0eadf',
            'stroke' => '#5eb84d',
        ]
    ];

    protected function getColor($color, $type = 'fill')
    {
        return $this->colors[$color][$type];
    }

}
