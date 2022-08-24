<?php

namespace Pyz\Zed\Faq\Communication\Table;

use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Orm\Zed\Faq\Persistence\Map\PyzFaqTableMap;

class FaqTable extends AbstractTable
{
    /** @var \Orm\Zed\Faq\Persistence\PyzFaqQuery */
    private PyzFaqQuery $faqQuery;
    const COL_ACTION = 'Actions';

    /**
     * @param \Orm\Zed\Faq\Persistence\PyzFaqQuery
     */
    public function __construct(PyzFaqQuery $faqQuery)
    {
        $this->faqQuery = $faqQuery;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return \Spryker\Zed\Gui\Communication\Table\TableConfiguration
     */
    public function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            PyzFaqTableMap::COL_ID_QUESTION => 'Id',
            PyzFaqTableMap::COL_QUESTION => 'Question',
            PyzFaqTableMap::COL_ANSWER => 'Answer',
            PyzFaqTableMap::COL_IS_ACTIVE => 'Active',
            self::COL_ACTION => 'Actions'
        ]);

        $config->setSortable(
            [
                PyzFaqTableMap::COL_ID_QUESTION,
                PyzFaqTableMap::COL_QUESTION,
                PyzFaqTableMap::COL_ANSWER,
                PyzFaqTableMap::COL_IS_ACTIVE
            ]
        );

        $config->setSearchable([PyzFaqTableMap::COL_QUESTION]);

        $config->addRawColumn(self::COL_ACTION);

        return $config;
    }

    /**
     * @param $faqDataItem
     *
     * @return string
     */
    protected function generateItemButtons($faqDataItem): string
    {
        $btnGroup = [];
        $btnGroup[] = $this->createButtonGroupItem(
            "Edit",
            "/faq/edit?id-question={$faqDataItem[PyzFaqTableMap::COL_ID_QUESTION]}"
        );
        $btnGroup[] = $this->createButtonGroupItem(
            "Delete",
            "/faq/delete?id-question={$faqDataItem[PyzFaqTableMap::COL_ID_QUESTION]}"
        );
        return $this->generateButtonGroup(
            $btnGroup,
            'Actions'
        );
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration
     * $config
     *
     * @return array
     */
    public function prepareData(TableConfiguration $config): array
    {
        $faqDataItems = $this->runQuery(
            $this->faqQuery,
            $config
        );
        $faqTableRows = [];
        foreach ($faqDataItems as $faqDataItem) {
            $faqTableRows[] = [
                PyzFaqTableMap::COL_ID_QUESTION => $faqDataItem[PyzFaqTableMap::COL_ID_QUESTION],
                PyzFaqTableMap::COL_QUESTION => $faqDataItem[PyzFaqTableMap::COL_QUESTION],
                PyzFaqTableMap::COL_ANSWER => $faqDataItem[PyzFaqTableMap::COL_ANSWER],
                PyzFaqTableMap::COL_IS_ACTIVE => $faqDataItem[PyzFaqTableMap::COL_IS_ACTIVE],
                self::COL_ACTION => $this->generateItemButtons($faqDataItem)
            ];
        }
        return $faqTableRows;
    }
}
