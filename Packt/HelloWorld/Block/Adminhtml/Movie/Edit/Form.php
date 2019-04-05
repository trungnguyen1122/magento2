<?php
namespace Packt\HelloWorld\Block\Adminhtml\Movie\Edit;


class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    protected $_systemStore;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }


    protected function _construct()
    {
        parent::_construct();
        $this->setId('movie_form');
        $this->setTitle(__('Movie Information'));
    }


    protected function _prepareForm()
    {

        $model = $this->_coreRegistry->registry('magennest_movie');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'movie']]
        );

        $form->setHtmlIdPrefix('movie_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getMovieId()) {
            $fieldset->addField('movie_id', 'hidden', ['name' => 'movie_id']);
        }

        $fieldset->addField(
            'name',
            'text',
            ['name' => 'name',
                'label' => __('Name Movie'),
                'title' => __('Name Movie'),
                'required' => true]
        );

        $fieldset->addField(
            'description',
            'text',
            [
                'name' => 'description',
                'label' => __('Description'),
                'title' => __('Description'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'rating',
            'number',
            [
                'label' => __('Rating'),
                'title' => __('Rating'),
                'name' => 'rating',
                'required' => true
            ]
        );
        $fieldset->addField(
            'director_id',
            'number',
            [
                'label' => __('Director Id'),
                'title' => __('Director Id'),
                'name' => 'director_id',
                'required' => true
            ]
        );


        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}