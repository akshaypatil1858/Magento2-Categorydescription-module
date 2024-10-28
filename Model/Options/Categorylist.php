<?php
use Magento\Framework\Data\OptionSourceInterface;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;

class Categorylist implements OptionSourceInterface
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
            ->addIsActiveFilter();

        $categoryOptions = [];

        foreach ($categories as $category) {
            $categoryOptions[] = [
                'value' => $category->getId(),
                'label' => $category->getName()
            ];
        }

        return $categoryOptions;
    }
}
