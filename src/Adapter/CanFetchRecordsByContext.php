<?php

namespace Ragebee\Fishpond\Adapter;

use InvalidArgumentException;
use Ragebee\Fishpond\Config;
use Ragebee\Fishpond\TypeInterface;

/**
 * 實現這個介面的 Adapter 讓 Fishpond 知道支援 fetchRecordsByContext 功能。
 */
interface CanFetchRecordsByContext
{
    /**
     * 透過上下文抓取紀錄。
     *
     * @param \Ragebee\Fishpond\TypeInterface $type
     * @param string $context
     * @param \Ragebee\Fishpond\Config $config
     *
     * @throws \InvalidArgumentException
     *
     * @return array|false false on failure, meta data on success
     *
     * meta data
     * - context
     * - records
     */
    public function fetchRecordsByContext(TypeInterface $type, string $context, Config $config);
}
