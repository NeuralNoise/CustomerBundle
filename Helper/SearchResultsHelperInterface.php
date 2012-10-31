<?php

namespace Titan\Bundle\CustomerBundle\Helper;

interface SearchResultsHelperInterface
{
    /**
     * Sets last search results
     *
     * @param string $key
     * @param array $entities
     */
    public function setLastSearchResults($key, array $entities);

    /**
     * Returns last search results
     *
     * @param $key
     *
     * @return array
     */
    public function getLastSearchResults($key);
}
