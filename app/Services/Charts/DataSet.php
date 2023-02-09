<?php

namespace App\Services\Charts;

class DataSet implements \JsonSerializable
{
    /** @var string  */
    private string $label;
    /** @var float  */
    private float $data;
    /** @var RGBaColor  */
    private RGBaColor $backgroundColor;

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return DataSet
     */
    public function setLabel(string $label): DataSet
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return float
     */
    public function getData(): float
    {
        return $this->data;
    }

    /**
     * @param float $data
     * @return DataSet
     */
    public function setData(float $data): DataSet
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return RGBaColor
     */
    public function getBackgroundColor(): RGBaColor
    {
        return $this->backgroundColor;
    }

    /**
     * @param RGBaColor $backgroundColor
     * @return DataSet
     */
    public function setBackgroundColor(RGBaColor $backgroundColor): DataSet
    {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize() :array
    {
        return [
            'label'=>$this->getLabel(),
            'data'=>$this->getData(),
            'backgroundColor'=>$this->getBackgroundColor(),
        ];
    }
}
