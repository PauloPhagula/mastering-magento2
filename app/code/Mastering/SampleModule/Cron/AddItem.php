<?php


namespace Mastering\SampleModule\Cron;

use Mastering\SampleModule\Model\Item;
use Mastering\SampleModule\Model\ItemFactory;

class AddItem
{
    private $itemFactory;

    public function __construct(ItemFactory $itemFactory)
    {
       $this->itemFactory = $itemFactory;
    }

    public function execute()
    {
        /** @var Item $item */
        $item = $this->itemFactory->create();
        $item
            ->setName("Scheduled Item")
            ->setDescription("Created at " . time())
            ->save();
    }
}
