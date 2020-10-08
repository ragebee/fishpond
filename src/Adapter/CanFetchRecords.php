<?php

namespace Ragebee\Fishpond\Adapter;

use DateTime;
use InvalidArgumentException;
use Ragebee\Fishpond\Config;
use Ragebee\Fishpond\TypeInterface;

/**
 * 實現這個介面的 Adapter 讓 Fishpond 知道支援 fetchRecords 功能。
 */
interface CanFetchRecords
{
    /**
     * 透過時間抓取紀錄。
     *
     * @param \Ragebee\Fishpond\TypeInterface $type
     * @param \DateTime $start
     * @param \DateTime $end
     * @param \Ragebee\Fishpond\Config $config
     *
     * @throws \InvalidArgumentException
     *
     * @return array|false false on failure, meta data on success
     */
    public function fetchRecords(TypeInterface $type, DateTime $start, DateTime $end, Config $config);
}
