<?php
declare(strict_types=1);

namespace Coditron\CategoryDescription\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CategoryDescriptionRepositoryInterface
{

    /**
     * Save CategoryDescription
     * @param \Coditron\CategoryDescription\Api\Data\CategoryDescriptionInterface $categoryDescription
     * @return \Coditron\CategoryDescription\Api\Data\CategoryDescriptionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Coditron\CategoryDescription\Api\Data\CategoryDescriptionInterface $categoryDescription
    );

    /**
     * Retrieve CategoryDescription
     * @param string $categorydescriptionId
     * @return \Coditron\CategoryDescription\Api\Data\CategoryDescriptionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($categorydescriptionId);

    /**
     * Retrieve CategoryDescription matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Coditron\CategoryDescription\Api\Data\CategoryDescriptionSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete CategoryDescription
     * @param \Coditron\CategoryDescription\Api\Data\CategoryDescriptionInterface $categoryDescription
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Coditron\CategoryDescription\Api\Data\CategoryDescriptionInterface $categoryDescription
    );

    /**
     * Delete CategoryDescription by ID
     * @param string $categorydescriptionId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($categorydescriptionId);
}

