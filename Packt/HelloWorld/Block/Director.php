<?php
namespace Packt\HelloWorld\Block;
class Director extends \Magento\Framework\View\Element\Template
{
    protected $_directorFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Packt\HelloWorld\Model\DirectorFactory $directorFactory
    )
    {
        $this->_directorFactory = $directorFactory;
        parent::__construct($context);
    }



    public function getDirectorCollection(){
        $director = $this->_directorFactory->create();
        return $director->getCollection();
    }
}