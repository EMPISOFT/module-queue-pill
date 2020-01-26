<?php
declare(strict_types=1);

namespace Empisoft\MessageQueue\Test\Unit\Console;

use Magento\Framework\MessageQueue\PoisonPill\PoisonPillPutInterface;

/**
 * Unit tests for UpdatePoisonPillCommand.
 */
class UpdatePoisonPillCommandTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\TestFramework\Unit\Helper\ObjectManager
     */
    private $objectManager;

    /**
     * @var PoisonPillPutInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $poisonPillPutMock;

    /**
     * @var \Magento\MessageQueue\Console\UpdatePoisonPillCommand
     */
    private $command;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->poisonPillPutMock = $this->getMockBuilder(PoisonPillPutInterface::class)
                                      ->getMockForAbstractClass();

        $this->objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->command = $this->objectManager->getObject(
            \Magento\MessageQueue\Console\UpdatePoisonPillCommand::class,
            [
                'poisonPillPut' => $this->poisonPillPutMock
            ]
        );

        parent::setUp();
    }

    /**
     * Test for execute method
     */
    public function testExecute()
    {
        $input = $this->getMockBuilder(\Symfony\Component\Console\Input\InputInterface::class)
                      ->disableOriginalConstructor()->getMock();
        $output = $this->getMockBuilder(\Symfony\Component\Console\Output\OutputInterface::class)
                       ->disableOriginalConstructor()->getMock();

        $this->command->run($input, $output);
    }
}
