<?php
namespace Packt\HelloWorld\Block\Adminhtml\Director;
use Magento\Backend\Block\Widget\Grid as WidgetGrid;
class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{

    protected $_directorCollection;
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param
    \Packt\HelloWorld\Model\ResourceModel\Subscription\Collection
    $subscriptionCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Packt\HelloWorld\Model\ResourceModel\Director\Collection
        $directorCollection,
        array $data = []
    ) {
        $this->_directorCollection = $directorCollection;
        parent::__construct($context, $backendHelper, $data);
        $this->setEmptyText(__('No Director Found'));
    }

    protected function _prepareCollection()
    {
        $this->setCollection($this->_directorCollection);
        return parent::_prepareCollection();
    }
    protected function _prepareColumns()
    {
        $this->addColumn(
            'director_id',
            [
                'header' => __('ID'),
                'index' => 'director_id',
            ]
        );
        $this->addColumn(
            'name',
            [
                'header' => __('Name Director'),
                'index' => 'name',
            ]
        );

        return $this;
    }
}