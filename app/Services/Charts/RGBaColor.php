<?php

namespace App\Services\Charts;

class RGBaColor implements \JsonSerializable
{
    /** @var int  */
    private int $red;
    /** @var int  */
    private int $green;
    /** @var int  */
    private int $blue;
    /** @var float  */
    private float $opacity;

    /**
     * @return int
     */
    public function getRed(): int
    {
        return $this->red;
    }

    /**
     * @param int $red
     * @return RGBaColor
     */
    public function setRed(int $red): RGBaColor
    {
        $this->red = $red;
        return $this;
    }

    /**
     * @return int
     */
    public function getGreen(): int
    {
        return $this->green;
    }

    /**
     * @param int $green
     * @return RGBaColor
     */
    public function setGreen(int $green): RGBaColor
    {
        $this->green = $green;
        return $this;
    }

    /**
     * @return int
     */
    public function getBlue(): int
    {
        return $this->blue;
    }

    /**
     * @param int $blue
     * @return RGBaColor
     */
    public function setBlue(int $blue): RGBaColor
    {
        $this->blue = $blue;
        return $this;
    }

    /**
     * @return float
     */
    public function getOpacity(): float
    {
        return $this->opacity;
    }

    /**
     * @param float $opacity
     * @return RGBaColor
     */
    public function setOpacity(float $opacity): RGBaColor
    {
        $this->opacity = $opacity;
        return $this;
    }

    private function getColorArray() :array
    {
        return [
            $this->getRed(),
            $this->getBlue(),
            $this->getGreen(),
            $this->getOpacity()
        ];
    }

    /**
     * @return string
     */
    public function getRGBAString() :string
    {
        $colors = implode(',',$this->getColorArray());
        return 'rgba('.$colors.')';
    }

    public function getHex() :string
    {
        $red = $this->padHex(dechex($this->getRed()));
        $green = $this->padHex(dechex($this->getGreen()));
        $blue = $this->padHex(dechex($this->getBlue()));

        return "#{$red}{$green}{$blue}";
    }

    private function padHex($color) : string
    {
        return strlen($color) < 2 ? "0{$color}" : $color;
    }

    /**
     * @return array
     */
    public function jsonSerialize() :array
    {
        return [
            'red'=>$this->getRed(),
            'green'=>$this->getGreen(),
            'blue'=>$this->getBlue(),
            'opacity'=>$this->getOpacity(),
            'rgba'=>$this->getRGBAString(),
            'hex'=>$this->getHex()
        ];
    }
}
