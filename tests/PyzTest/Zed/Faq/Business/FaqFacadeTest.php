<?php

namespace PyzTest\Zed\Faq\Business;

use Codeception\Test\Unit;
use Generated\Shared\DataBuilder\FaqBuilder;

/**
 * Auto-generated group annotations
 *
 * @group PyzTest
 * @group Zed
 * @group Faq
 * @group Business
 * @group Facade
 * @group FaqFacadeTest
 * Add your own group annotations below this line
 */
class FaqFacadeTest extends Unit
{
    /**
     * @var \PyzTest\Zed\Faq\FaqBusinessTester
     */
    protected $tester;

    /**
     * @return void
     */
    public function testDataIsReadingCorrectly(): void
    {
        // Arrange
//        $faqTransfer = (new FaqBuilder([
//            'idQuestion' => 1
//        ]))->build();
        $faqTransfer = 1;

        // Act
        $test = $this->tester->getFacade()->findFaqById($faqTransfer);

        // Assert
        $this->assertSame(1, $test->findFaqById($faqTransfer));
    }
}
