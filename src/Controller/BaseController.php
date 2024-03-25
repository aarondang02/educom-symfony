<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;

class BaseController extends AbstractController
{
    private $logger;

    protected function log($msg){
        $this->logger->info($msg);
    }

    public function __construct(LoggerInterface $logger){
        $this->logger = $logger;
    }

    
}
