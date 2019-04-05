<?php
namespace Packt\HelloWorld\Block\Adminhtml\Movie;
use Magento\Backend\Block\Widget\Grid as WidgetGrid;
class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{

    protected $_movieCollection;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Packt\HelloWorld\Model\ResourceModel\Movie\Collection $movieCollection,
        array $data = []
    ) {
        $this->_movieCollection = $movieCollection;
        parent::__construct($context, $backendHelper, $data);
        $this->setEmptyText(__('No Movie Found'));
    }

    protected function _prepareCollection()
    {
        $this->setCollection($this->_movieCollection);
        return parent::_prepareCollection();
    }
    protected function _prepareColumns()
    {
        $this->addColumn(
            'movie_id',
            [
                'header' => __('ID'),
                'index' => 'movie_id',
            ]
        );
        $this->addColumn(
            'name',
            [
                'header' => __('Name Movie'),
                'index' => 'name',
            ]
        );
        $this->addColumn(
            'description',
            [
                'header' => __('Description Movie'),
                'index' => 'description',
            ]
        );
        $this->addColumn(
            'rating',
            [
                'header' => __('Rating Movie'),
                'index' => 'rating',
            ]
        );
        $this->addColumn(
            'director_id',
            [
                'header' => __('Director Movie'),
                'index' => 'director_id',
            ]
        );
        return $this;
    }
}