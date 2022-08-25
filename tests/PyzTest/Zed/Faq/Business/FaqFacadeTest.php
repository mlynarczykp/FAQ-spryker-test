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
        $faqTransfer = (new FaqBuilder([
            'idQuestion' => 1,
            'question' => 'This is a test question?',
            'answer' => 'This is a test answer.',
            'is_active' => false
        ]))->build();

        // Act
        $faqResultTransfer = $this->tester->getFacade()->saveFaq($faqTransfer);

        // Assert
        $this->assertSame($faqTransfer, $faqResultTransfer);
    }
}
