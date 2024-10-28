<?php

namespace Coditron\CategoryDescription\Model\CategoryDescription;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;

class CategoryList implements OptionSourceInterface
{
    protected $categoryCollectionFactory;

    public function __construct(CollectionFactory $categoryCollectionFactory)
    {
        $this->categoryCollectionFactory = $categoryCollectionFactory;
    }

    public function toOptionArray()
    {
        $categories = $this->categoryCollectionFactory->create()
            ->addAttributeToSelect('name')
            ->addAttributeToSort('path', 'asc')
            ->load()
            ->toArray();

        $categoryOptions = [];
        foreach ($categories as $categoryId => $category) {
            if (isset($category['name'])) {
                $categoryOptions[] = ['value' => $categoryId, 'label' => $category['name']];
            }
        }
        print_r($categoryOptions);
        return $categoryOptions;
    }
}
