<?php

namespace App\Services\Abstracts\Search;

use App\Services\Interfaces\SearchByTermInterface;

abstract class AbstractSearchByTerm implements SearchByTermInterface
{
    /** @var string  */
    protected string $term = '';

    /**
     * @param string $term
     * @return SearchByTermInterface
     */
    public function setTerm(string $term = ''): SearchByTermInterface
    {
        $this->term = $term;
        return $this;
    }
}
