<?php

namespace Gamesmkt\Fishpond\Adapter;

use Gamesmkt\Fishpond\Config;
use Gamesmkt\Fishpond\TypeInterface;
use InvalidArgumentException;

/**
 * 實現這個介面的 Adapter 讓 Fishpond 知道支援 fetchRecordsByContext 功能。
 */
interface CanFetchRecordsByContext
{
    /**
     * 透過上下文抓取紀錄。
     *
     * @param \Gamesmkt\Fishpond\TypeInterface $type
     * @param string $context
     * @param \Gamesmkt\Fishpond\Config $config
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
