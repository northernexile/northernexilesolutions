<?php

namespace App\Services\TagCloud;

class TagCloudItem implements \JsonSerializable
{
    /** @var int|null  */
    private ?int $id = null;
    /** @var string|null  */
    private ?string $value = null;
    /** @var int  */
    private int $count = 1;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return TagCloudItem
     */
    public function setId(?int $id): TagCloudItem
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     * @return TagCloudItem
     */
    public function setValue(?string $value): TagCloudItem
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     * @return TagCloudItem
     */
    public function setCount(int $count): TagCloudItem
    {
        $this->count = $count;
        return $this;
    }

    public function jsonSerialize() :array
    {
        return [
            'id'=>$this->getId(),
            'value'=>$this->getValue(),
            'count'=>$this->getCount()
        ];
    }
}
