<?php

namespace Ragebee\Fishpond\Adapter\Polyfill;

use Ragebee\Fishpond\Config;
use Ragebee\Fishpond\Exception\NotSupportingException;
use Ragebee\Fishpond\GameInterface;
use Ragebee\Fishpond\RecordInterface;

trait NotSupportingGetRecordDetailUrlTrait
{
    /**
     * 取得遊戲結果的網址。
     *
     * @param \Ragebee\Fishpond\RecordInterface $player
     * @param \Ragebee\Fishpond\GameInterface $game
     * @param \Ragebee\Fishpond\Config $config
     *
     * @throws \Ragebee\Fishpond\Exception\NotSupportingException
     */
    public function getRecordDetailUrl(RecordInterface $record, GameInterface $game, Config $config)
    {
        throw new NotSupportingException(
            get_class($this) . ' does not support get record detail url.'
        );
    }
}
