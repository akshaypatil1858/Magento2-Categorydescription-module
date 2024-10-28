<?php
declare(strict_types=1);

namespace Coditron\CategoryDescription\Api;

interface CategoryDescriptionManagementInterface
{

    /**
     * GET for CategoryDescription api
     * @param string $param
     * @return string
     */
    public function getCategoryDescription($param);
}

