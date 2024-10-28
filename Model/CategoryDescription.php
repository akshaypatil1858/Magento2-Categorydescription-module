<?php
declare(strict_types=1);

namespace Coditron\CategoryDescription\Model;

use Coditron\CategoryDescription\Api\Data\CategoryDescriptionInterface;
use Magento\Framework\Model\AbstractModel;

class CategoryDescription extends AbstractModel implements CategoryDescriptionInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Coditron\CategoryDescription\Model\ResourceModel\CategoryDescription::class);
    }

    protected function _beforeSave()
    {
        print_r($this->getCategoryId());die;
        return parent::_beforeSave();
    }

    /**
     * @inheritDoc
     */
    public function getCategorydescriptionId()
    {
        return $this->getData(self::CATEGORYDESCRIPTION_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCategorydescriptionId($categorydescriptionId)
    {
        return $this->setData(self::CATEGORYDESCRIPTION_ID, $categorydescriptionId);
    }

    /**
     * @inheritDoc
     */
    public function getCustomId()
    {
        return $this->getData(self::CUSTOM_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCustomId($customId)
    {
        return $this->setData(self::CUSTOM_ID, $customId);
    }

    /**
     * @inheritDoc
     */
    public function getCategoryId()
    {
        return $this->getData(self::CATEGORY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCategoryId($categoryId)
    {
        return $this->setData(self::CATEGORY_ID, $categoryId);
    }

    /**
     * @inheritDoc
     */
    public function getCategoryName()
    {
        return $this->getData(self::CATEGORY_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setCategoryName($categoryName)
    {
        return $this->setData(self::CATEGORY_NAME, $categoryName);
    }

    /**
     * @inheritDoc
     */
    public function getCategoryCustomProduct()
    {
        return $this->getData(self::CATEGORY_CUSTOM_PRODUCT);
    }

    /**
     * @inheritDoc
     */
    public function setCategoryCustomProduct($categoryCustomProduct)
    {
        return $this->setData(self::CATEGORY_CUSTOM_PRODUCT, $categoryCustomProduct);
    }

    /**
     * @inheritDoc
     */
    public function getCategoryDescription()
    {
        return $this->getData(self::CATEGORY_DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setCategoryDescription($categoryDescription)
    {
        return $this->setData(self::CATEGORY_DESCRIPTION, $categoryDescription);
    }

    /**
     * @inheritDoc
     */
    public function getCategoryImage()
    {
        return $this->getData(self::CATEGORY_IMAGE);
    }

    /**
     * @inheritDoc
     */
    public function setCategoryImage($categoryImage)
    {
        return $this->setData(self::CATEGORY_IMAGE, $categoryImage);
    }
}

