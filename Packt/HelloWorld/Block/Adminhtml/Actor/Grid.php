<?php
namespace Packt\HelloWorld\Block\Adminhtml\Actor;
use Magento\Backend\Block\Widget\Grid as WidgetGrid;
class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{

    protected $_actorCollection;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Packt\HelloWorld\Model\ResourceModel\Actor\Collection
        $actorCollection,
        array $data = []
    ) {
        $this->_actorCollection = $actorCollection;
        parent::__construct($context, $backendHelper, $data);
        $this->setEmptyText(__('No Actor Found'));
    }

    protected function _prepareCollection()
    {
        $this->setCollection($this->_actorCollection);
        return parent::_prepareCollection();
    }
    protected function _prepareColumns()
    {
        $this->addColumn(
            'actor_id',
            [
                'header' => __('ID'),
                'index' => 'actor_id',
            ]
        );
        $this->addColumn(
            'name',
            [
                'header' => __('Name Actor'),
                'index' => 'name',
            ]
        );

        return $this;
    }
}