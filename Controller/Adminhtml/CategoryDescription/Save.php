<?php 

declare(strict_types=1);

namespace Coditron\CategoryDescription\Controller\Adminhtml\CategoryDescription;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Filesystem\DirectoryList;

class Save extends \Magento\Backend\App\Action
{
    protected $dataPersistor;
    protected $uploaderFactory;
    protected $filesystem;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory,
        \Magento\Framework\Filesystem $filesystem
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->uploaderFactory = $uploaderFactory;
        $this->filesystem = $filesystem;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if ($data) {
            $id = $this->getRequest()->getParam('categorydescription_id');
            $model = $this->_objectManager->create(\Coditron\CategoryDescription\Model\CategoryDescription::class)->load($id);

            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Categorydescription no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            if (isset($data['category_id'])) {
                if (is_array($data['category_id'])) {
                    $data['category_id'] = implode(',', $data['category_id']);
                }
            }

            try {
                if (isset($_FILES['category_image']) && $_FILES['category_image']['name']) {
                    $uploader = $this->uploaderFactory->create(['fileId' => 'category_image']);
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(false);

                    $mediaDirectory = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);
                    $result = $uploader->save($mediaDirectory->getAbsolutePath('category/images'));

                    if ($result['file']) {
                        $data['category_image'] = 'media/category/images/' . $result['file'];
                    }
                }

                $model->setData($data);
                $model->save();

                $this->messageManager->addSuccessMessage(__('You saved the Categorydescription.'));
                $this->dataPersistor->clear('coditron_categorydescription_categorydescription');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['categorydescription_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Categorydescription.'));
            }

            $this->dataPersistor->set('coditron_categorydescription_categorydescription', $data);
            return $resultRedirect->setPath('*/*/edit', ['categorydescription_id' => $this->getRequest()->getParam('categorydescription_id')]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}
