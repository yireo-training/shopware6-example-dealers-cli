<?php declare(strict_types=1);

namespace SwagTraining\DealersCli\Console\Command;

use Shopware\Core\Framework\Context;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteCommand extends AbstractCommand
{
    /**
     * Configure this command
     */
    protected function configure()
    {
        $this->setName('training:dealers:delete')
            ->setDescription('Delete an existing example dealer')
            ->addOption('id', null, InputOption::VALUE_OPTIONAL, 'Id');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $id = $this->getIdFromInput($input, $output);
        $this->dealerRepository->delete([['id' => $id]], Context::createDefaultContext());
        return 0;
    }
}