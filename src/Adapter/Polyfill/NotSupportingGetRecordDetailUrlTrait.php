<?php

namespace Gamesmkt\Fishpond\Adapter\Polyfill;

use Gamesmkt\Fishpond\Config;
use Gamesmkt\Fishpond\Exception\NotSupportingException;
use Gamesmkt\Fishpond\GameInterface;
use Gamesmkt\Fishpond\RecordInterface;

trait NotSupportingGetRecordDetailUrlTrait
{
    /**
     * 取得遊戲結果的網址。
     *
     * @param \Gamesmkt\Fishpond\RecordInterface $player
     * @param \Gamesmkt\Fishpond\GameInterface $game
     * @param \Gamesmkt\Fishpond\Config $config
     *
     * @throws \Gamesmkt\Fishpond\Exception\NotSupportingException
     */
    public function getRecordDetailUrl(RecordInterface $record, GameInterface $game, Config $config)
    {
        throw new NotSupportingException(
            get_class($this) . ' does not support get record detail url.'
        );
    }
}
