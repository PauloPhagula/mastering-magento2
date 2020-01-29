<?php


namespace Mastering\SampleModule\Cron;

use Mastering\SampleModule\Model\Config;
use Mastering\SampleModule\Model\Item;
use Mastering\SampleModule\Model\ItemFactory;

class AddItem
{
    private $itemFactory;
    private $config;

    public function __construct(ItemFactory $itemFactory, Config $config)
    {
       $this->itemFactory = $itemFactory;
       $this->config = $config;
    }

    public function execute()
    {
        if ($this->config->isEnabled()) {
            /** @var Item $item */
            $item = $this->itemFactory->create();
            $item
                ->setName("Scheduled Item")
                ->setDescription("Created at " . time())
                ->save();
        }
    }
}