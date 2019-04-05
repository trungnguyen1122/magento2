<?php
namespace Packt\HelloWorld\Block;
class Movieactor extends \Magento\Framework\View\Element\Template
{
    protected $_movieactorFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Packt\HelloWorld\Model\MovieactorFactory $movieactorFactory
    )
    {
        $this->_movieactorFactory = $movieactorFactory;
        parent::__construct($context);
    }



    public function getMovieActorCollection(){
        $movieactor = $this->_movieactorFactory->create();
        return $movieactor->getCollection();
    }
}
