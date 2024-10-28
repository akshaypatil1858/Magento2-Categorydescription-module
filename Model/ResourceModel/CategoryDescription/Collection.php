<?php
declare(strict_types=1);

namespace Coditron\CategoryDescription\Model\ResourceModel\CategoryDescription;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'categorydescription_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Coditron\CategoryDescription\Model\CategoryDescription::class,
            \Coditron\CategoryDescription\Model\ResourceModel\CategoryDescription::class
        );
    }
}

