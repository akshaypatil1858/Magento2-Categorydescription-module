<?php
declare(strict_types=1);

namespace Coditron\CategoryDescription\Model;

use Coditron\CategoryDescription\Api\CategoryDescriptionRepositoryInterface;
use Coditron\CategoryDescription\Api\Data\CategoryDescriptionInterface;
use Coditron\CategoryDescription\Api\Data\CategoryDescriptionInterfaceFactory;
use Coditron\CategoryDescription\Api\Data\CategoryDescriptionSearchResultsInterfaceFactory;
use Coditron\CategoryDescription\Model\ResourceModel\CategoryDescription as ResourceCategoryDescription;
use Coditron\CategoryDescription\Model\ResourceModel\CategoryDescription\CollectionFactory as CategoryDescriptionCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class CategoryDescriptionRepository implements CategoryDescriptionRepositoryInterface
{

    /**
     * @var ResourceCategoryDescription
     */
    protected $resource;

    /**
     * @var CategoryDescriptionCollectionFactory
     */
    protected $categoryDescriptionCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var CategoryDescription
     */
    protected $searchResultsFactory;

    /**
     * @var CategoryDescriptionInterfaceFactory
     */
    protected $categoryDescriptionFactory;


    /**
     * @param ResourceCategoryDescription $resource
     * @param CategoryDescriptionInterfaceFactory $categoryDescriptionFactory
     * @param CategoryDescriptionCollectionFactory $categoryDescriptionCollectionFactory
     * @param CategoryDescriptionSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceCategoryDescription $resource,
        CategoryDescriptionInterfaceFactory $categoryDescriptionFactory,
        CategoryDescriptionCollectionFactory $categoryDescriptionCollectionFactory,
        CategoryDescriptionSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->categoryDescriptionFactory = $categoryDescriptionFactory;
        $this->categoryDescriptionCollectionFactory = $categoryDescriptionCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        CategoryDescriptionInterface $categoryDescription
    ) {
        try {
            $this->resource->save($categoryDescription);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the categoryDescription: %1',
                $exception->getMessage()
            ));
        }
        return $categoryDescription;
    }

    /**
     * @inheritDoc
     */
    public function get($categoryDescriptionId)
    {
        $categoryDescription = $this->categoryDescriptionFactory->create();
        $this->resource->load($categoryDescription, $categoryDescriptionId);
        if (!$categoryDescription->getId()) {
            throw new NoSuchEntityException(__('CategoryDescription with id "%1" does not exist.', $categoryDescriptionId));
        }
        return $categoryDescription;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->categoryDescriptionCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(
        CategoryDescriptionInterface $categoryDescription
    ) {
        try {
            $categoryDescriptionModel = $this->categoryDescriptionFactory->create();
            $this->resource->load($categoryDescriptionModel, $categoryDescription->getCategorydescriptionId());
            $this->resource->delete($categoryDescriptionModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the CategoryDescription: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($categoryDescriptionId)
    {
        return $this->delete($this->get($categoryDescriptionId));
    }
}

