<?php

namespace Gamesmkt\Fishpond\Adapter;

use Gamesmkt\Fishpond\Config;
use Gamesmkt\Fishpond\TypeInterface;

/**
 * 實現這個介面的 Adapter 讓 Fishpond 知道支援 fetchRecordsByDirectWithMark 功能。
 */
interface CanFetchRecordsByDirectWithMark
{
    /**
     * 直接抓取未被標記的紀錄，並藉由傳遞清單來標記已抓取的紀錄。
     *
     * @param \Gamesmkt\Fishpond\TypeInterface $type
     * @param array $listCompleteRecord
     * @param \Gamesmkt\Fishpond\Config $config
     *
     * @throws \InvalidArgumentException
     *
     * @return array|false false on failure, meta data on success
     */
    public function fetchRecordsByDirectWithMark(TypeInterface $type, array $listCompleteRecord, Config $config);
}
