<?php

namespace AppBundle\Service;

use PAMI\Listener\IEventListener;
use PAMI\Message\Event\EventMessage;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

class EventHandler implements IEventListener, LoggerAwareInterface
{
    /**
     * @var LoggerInterface 
     */
    private $logger;

    /**
     * @param LoggerInterface $logger
     * @return self
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * @param EventMessage $event
     * return void
     */
    public function handle(EventMessage $event)
    {
        $this->logger->info(sprintf('handle event class: "%s"', get_class($event)));
    }
}
