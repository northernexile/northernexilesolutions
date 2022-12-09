<?php

namespace App\Services\Abstracts;

trait IdentifiableTrait
{
    protected ?int $identity = null;

    /**
     * @param null|int $identity
     * @return IdentifiableInterface
     */
    public function setIdentity(?int $identity) :IdentifiableInterface
    {
        $this->identity = $identity;

        return $this;
    }
}
