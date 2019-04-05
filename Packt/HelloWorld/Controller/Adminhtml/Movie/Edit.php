<?php
namespace Packt\HelloWorld\Controller\Adminhtml\Movie;

use Magento\Backend\App\Action;

class Edit extends \Magento\Backend\App\Action
{

    protected $_coreRegistry = null;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;


    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }


    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Packt_HelloWorld::save');
    }


    protected function _initAction()
    {

        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Packt_HelloWold::post')
            ->addBreadcrumb(__('Movie'), __('Movie'))
            ->addBreadcrumb(__('Magenest Movie Posts'), __('Magenest Movie Posts'));
        return $resultPage;
    }


    public function execute()
    {
        $id = $this->getRequest()->getParam('movie_id');
        $model = $this->_objectManager->create('Packt\HelloWorld\Model\Movie');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This post no longer exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
        }

        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        $this->_coreRegistry->register('magenest_movie', $model);


        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Movie Post') : __('New Movie Post'),
            $id ? __('Edit Movie Post') : __('New Movie Post')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Movie Posts'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getTitle() : __('New Movie Post'));

        return $resultPage;
    }
}
