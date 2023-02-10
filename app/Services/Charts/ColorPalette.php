<?php

namespace App\Services\Charts;

class ColorPalette
{
    const RED = [255,0,0,1];

    const ORANGE = [255,165,0,1];

    const YELLOW = [255,255,0,1];
    const GREEN = [0,255,0,1];
    const BLUE = [0,0,255,1];

    const INDIGO = [75,0,130,1];

    const VIOLET = [127,0,255,1];

    const COLOR_RED = 'red';
    const COLOR_ORANGE = 'orange';
    const COLOR_YELLOW = 'yellow';
    const COLOR_GREEN = 'green';
    const COLOR_BLUE = 'blue';
    const COLOR_INDIGO = 'indigo';
    const COLOR_VIOLET = 'violet';

    const colors = [
        ColorPalette::COLOR_RED=>ColorPalette::RED,
        ColorPalette::COLOR_ORANGE=>ColorPalette::ORANGE,
        ColorPalette::COLOR_YELLOW=>ColorPalette::YELLOW,
        ColorPalette::COLOR_GREEN=>ColorPalette::GREEN,
        ColorPalette::COLOR_BLUE=>ColorPalette::BLUE,
        ColorPalette::COLOR_INDIGO=>ColorPalette::INDIGO,
        ColorPalette::COLOR_VIOLET=>ColorPalette::VIOLET,
    ];

    public static function getColorValues(string $color) :array
    {
        return ColorPalette::colors[$color];
    }

    /**
     * @param string $color
     * @return RGBaColor
     */
    public static function getColor(string $color) :RGBaColor
    {
        $color = self::colors[$color];

        $rgbaColor = new RGBaColor();
        $rgbaColor
            ->setRed($color[0])
            ->setGreen($color[1])
            ->setBlue($color[2])
            ->setOpacity($color[3]);

        return $rgbaColor;
    }

    public static function getRandomColor() :RGBaColor
    {
        $color =  collect(self::colors)->random(1)->first();

        $rgbaColor = new RGBaColor();
        $rgbaColor
            ->setRed($color[0])
            ->setGreen($color[1])
            ->setBlue($color[2])
            ->setOpacity($color[3]);

        return $rgbaColor;
    }
}
