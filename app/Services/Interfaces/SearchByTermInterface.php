<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface SearchByTermInterface
{
    /**
     * @param string $term
     * @return SearchByTermInterface
     */
    public function setTerm(string $term = '') :SearchByTermInterface;

    /**
     * @return Collection
     */
    public function search() :Collection;
}
