<?php

namespace App\Services\Abstracts;

interface IdentifiableInterface
{
    public function setIdentity(int $identity) :IdentifiableInterface;
}
