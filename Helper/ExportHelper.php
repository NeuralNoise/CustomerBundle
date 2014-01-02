<?php

namespace Terramar\Bundle\CustomerBundle\Helper;

use Symfony\Component\Form\Util\PropertyPath;
use Symfony\Component\PropertyAccess\PropertyAccess;

class ExportHelper implements ExportHelperInterface
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
    public function exportToCsv($collection, array $exportMapping)
    {
        $fp = tmpfile();
        fputcsv($fp, array_keys($exportMapping));

        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        foreach ($collection as $item) {
            $values = array();
            foreach ($exportMapping as $propertyPath) {
                $values[] = $propertyAccessor->getValue($item, $propertyPath);
            }
            fputcsv($fp, $values);
        }

        fseek($fp, 0);
        $csv = stream_get_contents($fp);

        return $csv;
    }
}
