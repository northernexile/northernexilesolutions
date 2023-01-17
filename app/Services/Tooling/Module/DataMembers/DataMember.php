<?php

namespace App\Services\Tooling\Module\DataMembers;

/**
 * @property string $name
 * @property string $type
 * @property string|null $default
 * @property bool $nullable
 */
class DataMember implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $name;
    /**
     * @var string
     */
    private string $type;
    /** @var string|null  */
    private ?string $default;

    /** @var bool  */
    private bool $nullable = false;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DataMember
     */
    public function setName(string $name): DataMember
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return DataMember
     */
    public function setType(string $type): DataMember
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDefault(): ?string
    {
        return $this->default;
    }

    /**
     * @param string|null $default
     * @return DataMember
     */
    public function setDefault(?string $default): DataMember
    {
        $this->default = $default;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNullable(): bool
    {
        return $this->nullable;
    }

    /**
     * @param bool $nullable
     * @return DataMember
     */
    public function setNullable(bool $nullable): DataMember
    {
        $this->nullable = $nullable;
        return $this;
    }

    public function jsonSerialize() :array
    {
        return [
            'name'=>$this->getName(),
            'type'=>$this->getType(),
            'default'=>$this->getDefault(),
            'nullable'=>$this->isNullable()
        ];
    }
}
