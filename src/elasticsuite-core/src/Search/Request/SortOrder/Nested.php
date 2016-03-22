<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Smile Elastic Suite to newer
 * versions in the future.
 *
 * @category  Smile
 * @package   Smile_ElasticSuiteCore
 * @author    Aurelien FOUCRET <aurelien.foucret@smile.fr>
 * @copyright 2016 Smile
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Smile\ElasticSuiteCore\Search\Request\SortOrder;

use Smile\ElasticSuiteCore\Search\Request\SortOrderInterface;
use Smile\ElasticSuiteCore\Search\Request\QueryInterface;

/**
 * Nested sort order implementation.
 *
 * @category Smile
 * @package  Smile_ElasticSuiteCore
 * @author   Aurelien FOUCRET <aurelien.foucret@smile.fr>
 */
class Nested extends Standard
{
    /**
     * @var QueryInterface
     */
    private $nestedFilter;

    /**
     * @var string
     */
    private $nestedPath;

    /**
     * @var string
     */
    private $scoreMode;

    /**
     * Constructor.
     * @param string         $field        Sort order field.
     * @param string         $direction    Sort order direction.
     * @param string         $nestedPath   Nested sort path.
     * @param QueryInterface $nestedFilter The filter applied to the nested sort.
     * @param string         $scoreMode    Method used to aggregate the sort if there is many match for the filter.
     * @param string         $name         Sort order name.
     */
    public function __construct(
        $field,
        $direction,
        $nestedPath,
        QueryInterface $nestedFilter = null,
        $scoreMode = self::SCORE_MODE_MIN,
        $name = null
    ) {
        parent::__construct($field, $direction, $name);
        $this->nestedFilter = $nestedFilter;
        $this->nestedPath   = $nestedPath;
        $this->scoreMode    = $scoreMode;
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {
        return SortOrderInterface::TYPE_NESTED;
    }

    /**
     * The filter applied to the nested sort.
     *
     * @return QueryInterface
     */
    public function getNestedFilter()
    {
        return $this->nestedFilter;
    }

    /**
     * Nested sort path.
     *
     * @return string
     */
    public function getNestedPath()
    {
        return $this->nestedPath;
    }

    /**
     * Method used to aggregate the sort if there is many match for the filter.
     *
     * @return string
     */
    public function getScoreMode()
    {
        return $this->scoreMode;
    }
}
