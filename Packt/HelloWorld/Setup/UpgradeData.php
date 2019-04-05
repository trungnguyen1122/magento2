<?php

namespace Packt\HelloWorld\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $_actorFactory;
    protected $_movieFactory;
    protected $_directorFactory;
    protected $_movieactorFactory;


    public function __construct(\Packt\HelloWorld\Model\ActorFactory $actorFactory,
                                \Packt\HelloWorld\Model\MovieFactory $movieFactory,
                                \Packt\HelloWorld\Model\DirectorFactory $directorFactory,
                                \Packt\HelloWorld\Model\MovieactorFactory $movieactorFactory

)
    {
        $this->_actorFactory = $actorFactory;
        $this->_movieFactory = $movieFactory;
        $this->_directorFactory = $directorFactory;
        $this->_movieactorFactory = $movieactorFactory;

    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.0.2')<0) {
// Install Actor
            $data = [
                'name'        => "Captail Marvel",
            ];
            $actor = $this->_actorFactory->create();
            $actor->addData($data)->save();

            $data = [
                'name'        => "Thor",
            ];
            $actor = $this->_actorFactory->create();
            $actor->addData($data)->save();
// Install director
            $data = [
                'name'        => "Ryan Fleck",

            ];
            $director= $this->_directorFactory->create();
            $director->addData($data)->save();
            $data = [
                'name'        => "Alan Wel",
            ];
            $director= $this->_directorFactory->create();
            $director->addData($data)->save();
            $data = [
                'name'        => "Adam Maki",

            ];
            $director= $this->_directorFactory->create();
            $director->addData($data)->save();
// Install movie
            $data = [
                'name'        => "Đại uý marvel",
                'description' => "I am Captain Marvel",
                'rating'      => '5',
                'director_id' => '1'
            ];
            $movie= $this->_movieFactory->create();
            $movie->addData($data)->save();
            $data = [
                'name'        => "Iron Man",
                'description' => "I am IronMan",
                'rating'      => '10',
                'director_id' => '2'
            ];
            $movie= $this->_movieFactory->create();
            $movie->addData($data)->save();
            $data = [
                'name'        => "Aqua Man",
                'description' => "I am Captain Marvel",
                'rating'      => '6',
                'director_id' => '1'
            ];
            $movie= $this->_movieFactory->create();
            $movie->addData($data)->save();
            $data = [
                'name'        => "BatMan And SuperMan",
                'description' => "I am Hero",
                'rating'      => '4',
                'director_id' => '2'
            ];
            $movie= $this->_movieFactory->create();
            $movie->addData($data)->save();
 // Install
            $data = [

                'movie_id'      => '1',
                'actor_id' => '1'
            ];
            $movieactor= $this->_movieactorFactory->create();
            $movieactor->addData($data)->save();

        }
    }
}