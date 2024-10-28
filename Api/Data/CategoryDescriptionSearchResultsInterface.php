<?php
declare(strict_types=1);

namespace Coditron\CategoryDescription\Api\Data;

interface CategoryDescriptionSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get CategoryDescription list.
     * @return \Coditron\CategoryDescription\Api\Data\CategoryDescriptionInterface[]
     */
    public function getItems();

    /**
     * Set custom_id list.
     * @param \Coditron\CategoryDescription\Api\Data\CategoryDescriptionInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

