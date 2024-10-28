<?php
declare(strict_types=1);

namespace Coditron\CategoryDescription\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CategoryDescription extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('coditron_categorydescription_categorydescription', 'categorydescription_id');
    }
}

