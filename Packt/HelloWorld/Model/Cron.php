<?php
namespace Packt\HelloWorld\Model;
class Cron {
    /** @var \Psr\Log\LoggerInterface $logger */
    protected $logger;
    /** @var \Magento\Framework\ObjectManagerInterface */
    protected $objectManager;
    public function __construct(
        \Psr\Log\LoggerInterface
        $logger,\Magento\Framework\ObjectManagerInterface $objectManager
    ) {
        $this->logger = $logger;
        $this->objectManager = $objectManager;
    }
    public function checkSubscriptions() {
        $movie = $this->objectManager->create(Packt\HelloWorld\Model\Movie);
        $movie->setMovieId('2');
        $movie->setName('Đại uý marvel');
        $movie->setDescription('I am Captain Marvel');
        $movie->setRating('5');
        $movie->setdirector_id('1');
        $movie->save();
        $this->logger->debug('Test subscription added');

    }
}