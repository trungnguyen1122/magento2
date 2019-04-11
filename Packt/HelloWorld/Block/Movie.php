<?php
namespace Packt\HelloWorld\Block;
class
Movie extends \Magento\Framework\View\Element\Template
{
    protected $_movieFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Packt\HelloWorld\Model\MovieFactory $movieFactory
    )
    {
        $this->_movieFactory = $movieFactory;
        parent::__construct($context);
    }



    public function getMovieCollection(){
        $movie = $this->_movieFactory->create();
        return $movie->getCollection();
    }
}