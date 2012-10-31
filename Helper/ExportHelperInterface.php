<?php

namespace Titan\Bundle\CustomerBundle\Helper;

interface ExportHelperInterface
{
    /**
     * Converts the given collection to CSV format
     *
     * Export mapping takes the column name and a PropertyPath. Example:
     *
     * $exportMapping = array(
     *     'Column Label' => 'associatedEntity.property'
     * );
     *
     * @see \Symfony\Component\Form\Util\PropertyPath
     *
     * @param array $collection
     * @param array $exportMapping
     *
     * @return string
     */
    public function exportToCsv($collection, array $exportMapping);
}
