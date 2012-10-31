<?php

namespace Titan\Bundle\CustomerBundle\Helper;

use Symfony\Component\HttpFoundation\Session\Session;

class SearchResultsHelper implements SearchResultsHelperInterface
{
    /**
     * @var \Symfony\Component\HttpFoundation\Session\Session
     */
    protected $session;

    /**
     * Constructor
     *
     * @param \Symfony\Component\HttpFoundation\Session\Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Sets last search results
     *
     * @param string $key
     * @param array $entities
     */
    public function setLastSearchResults($key, array $entities)
    {
        $results = array_map(function($entity) {
            // TODO: This should not assume that the value is an orkestra entity
            return $entity->getId();
        }, $entities);

        $this->session->set($key, $results);
    }

    /**
     * Returns last search results
     *
     * @param $key
     *
     * @return array
     */
    public function getLastSearchResults($key)
    {
        return $this->session->get($key);
    }
}
