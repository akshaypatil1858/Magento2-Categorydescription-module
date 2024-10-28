<?php
declare(strict_types=1);

namespace Coditron\CategoryDescription\Api\Data;

interface CategoryDescriptionInterface
{

    const CATEGORY_NAME = 'category_name';
    const CATEGORY_CUSTOM_PRODUCT = 'category_custom_product';
    const CATEGORY_IMAGE = 'category_image';
    const CATEGORYDESCRIPTION_ID = 'categorydescription_id';
    const CATEGORY_ID = 'category_id';
    const CUSTOM_ID = 'custom_id';
    const CATEGORY_DESCRIPTION = 'category_description';

    /**
     * Get categorydescription_id
     * @return string|null
     */
    public function getCategorydescriptionId();

    /**
     * Set categorydescription_id
     * @param string $categorydescriptionId
     * @return \Coditron\CategoryDescription\CategoryDescription\Api\Data\CategoryDescriptionInterface
     */
    public function setCategorydescriptionId($categorydescriptionId);

    /**
     * Get custom_id
     * @return string|null
     */
    public function getCustomId();

    /**
     * Set custom_id
     * @param string $customId
     * @return \Coditron\CategoryDescription\CategoryDescription\Api\Data\CategoryDescriptionInterface
     */
    public function setCustomId($customId);

    /**
     * Get category_id
     * @return string|null
     */
    public function getCategoryId();

    /**
     * Set category_id
     * @param string $categoryId
     * @return \Coditron\CategoryDescription\CategoryDescription\Api\Data\CategoryDescriptionInterface
     */
    public function setCategoryId($categoryId);

    /**
     * Get category_name
     * @return string|null
     */
    public function getCategoryName();

    /**
     * Set category_name
     * @param string $categoryName
     * @return \Coditron\CategoryDescription\CategoryDescription\Api\Data\CategoryDescriptionInterface
     */
    public function setCategoryName($categoryName);

    /**
     * Get category_custom_product
     * @return string|null
     */
    public function getCategoryCustomProduct();

    /**
     * Set category_custom_product
     * @param string $categoryCustomProduct
     * @return \Coditron\CategoryDescription\CategoryDescription\Api\Data\CategoryDescriptionInterface
     */
    public function setCategoryCustomProduct($categoryCustomProduct);

    /**
     * Get category_description
     * @return string|null
     */
    public function getCategoryDescription();

    /**
     * Set category_description
     * @param string $categoryDescription
     * @return \Coditron\CategoryDescription\CategoryDescription\Api\Data\CategoryDescriptionInterface
     */
    public function setCategoryDescription($categoryDescription);

    /**
     * Get category_image
     * @return string|null
     */
    public function getCategoryImage();

    /**
     * Set category_image
     * @param string $categoryImage
     * @return \Coditron\CategoryDescription\CategoryDescription\Api\Data\CategoryDescriptionInterface
     */
    public function setCategoryImage($categoryImage);
}

