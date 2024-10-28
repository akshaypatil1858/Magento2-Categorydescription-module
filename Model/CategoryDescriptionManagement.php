<?php
declare(strict_types=1);

namespace Coditron\CategoryDescription\Model;

class CategoryDescriptionManagement implements \Coditron\CategoryDescription\Api\CategoryDescriptionManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function getCategoryDescription($param)
    {
        return 'hello api GET return the $param ' . $param;
    }
}

