<?php
declare(strict_types=1);

namespace Empisoft\MessageQueue\Console;

use Magento\Framework\MessageQueue\PoisonPill\PoisonPillPutInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command for updating poison pill value.
 */
class UpdatePoisonPillCommand extends Command
{
    const COMMAND_QUEUE_POISON_PILL_UPDATE = 'queue:poison-pill:update';

    /**
     * @var \Magento\Framework\MessageQueue\PoisonPill\PoisonPillPutInterface
     */
    private $poisonPillPut;

    /**
     * UpdateProcessPill constructor.
     *
     * @param \Magento\Framework\MessageQueue\PoisonPill\PoisonPillPutInterface $poisonPillPut
     * @param string|null $name
     */
    public function __construct(
        PoisonPillPutInterface $poisonPillPut,
        string $name = null
    ) {
        $this->poisonPillPut = $poisonPillPut;

        parent::__construct($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->poisonPillPut->put();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName(self::COMMAND_QUEUE_POISON_PILL_UPDATE);
        $this->setDescription('Update poison pill value');
        $this->setHelp(
            <<<HELP
This command updates poison pull value so running consumers will automatically restart after receiving new message
HELP
        );
        parent::configure();
    }
}
