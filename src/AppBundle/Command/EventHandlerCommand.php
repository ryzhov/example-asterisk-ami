<?php
/**
 * @author Aleksandr N. Ryzhov <a.n.ryzhov@gmail.com>
 */

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use PAMI\Client\IClient;
use PAMI\Client\IClientAwared;

class EventHandlerCommand extends Command implements IClientAwared
{
    /**
     * @var IClient
     */
    private $client;
    
    /**
     * @param IClient $client
     */
    public function setClient(IClient $client)
    {
         $this->client = $client;
    }

    protected function configure()
    {
        $this
            ->setName('event-handler')
            ->setDescription('handle ami events form asterisk')
        ;
    }
    
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $loop = \React\EventLoop\Factory::create();
        
        // open AMI socket on Asterisk
        $this->client->open();
        
        // call IClient::process() asyncronously when socket data ready for read
        $loop->addReadStream($this->client->getSocket(), [$this->client, 'process']);
        
        // start loop
        $loop->run();
    }
}
