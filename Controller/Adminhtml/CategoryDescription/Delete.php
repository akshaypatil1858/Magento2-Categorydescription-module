<?php
declare(strict_types=1);

namespace Coditron\CategoryDescription\Controller\Adminhtml\CategoryDescription;

class Delete extends \Coditron\CategoryDescription\Controller\Adminhtml\CategoryDescription
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('categorydescription_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Coditron\CategoryDescription\Model\CategoryDescription::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Categorydescription.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['categorydescription_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Categorydescription to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

