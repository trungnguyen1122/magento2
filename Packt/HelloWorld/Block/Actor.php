<?php
namespace Packt\HelloWorld\Block;
class Actor extends \Magento\Framework\View\Element\Template
{
    protected $_actorFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Packt\HelloWorld\Model\ActorFactory $actorFactory
    )
    {
        $this->_actorFactory = $actorFactory;
        parent::__construct($context);
    }



    public function getActorCollection(){
        $actor = $this->_actorFactory->create();
        return $actor->getCollection();
    }
}