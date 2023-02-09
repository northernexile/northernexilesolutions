<?php

namespace App\Services\Charts;

use Illuminate\Support\Collection;

abstract class AbstractChart implements \JsonSerializable
{
    /**
     * @var array
     */
    protected array $labels = [];

    /**
     * @var Collection
     */
    protected Collection $dataSets;

    /**
     * @return array
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     * @return ChartInterface
     */
    public function setLabels(array $labels = []): ChartInterface
    {
        $this->labels = $labels;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getDataSets(): Collection
    {
        return $this->dataSets;
    }

    /**
     * @param Collection $dataSets
     * @return Chart
     */
    public function setDataSets(Collection $dataSets): ChartInterface
    {
        $this->dataSets = $dataSets;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize() :array
    {
        return [
            'labels'=>$this->labels,
            'datasets'=>$this->dataSets
        ];
    }
}
