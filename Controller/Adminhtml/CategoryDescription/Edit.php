<?php
declare(strict_types=1);

namespace Coditron\CategoryDescription\Controller\Adminhtml\CategoryDescription;

class Edit extends \Coditron\CategoryDescription\Controller\Adminhtml\CategoryDescription
{

    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('categorydescription_id');
        $model = $this->_objectManager->create(\Coditron\CategoryDescription\Model\CategoryDescription::class);
        
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Categorydescription no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('coditron_categorydescription_categorydescription', $model);
        
        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Categorydescription') : __('New Categorydescription'),
            $id ? __('Edit Categorydescription') : __('New Categorydescription')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Categorydescriptions'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Categorydescription %1', $model->getId()) : __('New Categorydescription'));
        return $resultPage;
    }
}

