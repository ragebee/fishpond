<?php

namespace Ragebee\Fishpond;

interface TypeInterface
{
    const RECORD_BET = 1;
    const RECORD_DONATE = 2;
    const RECORD_TRANSFER = 3;

    const GAME_LIVE = 'LIVE';
    const GAME_SPORT = 'SPORT';
    const GAME_BOARD_GAME = 'BOARD_GAME';
    const GAME_LOTTERY = 'LOTTERY';
    const GAME_FISHING = 'FISHING';
    const GAME_SLOT = 'SLOT';
    const GAME_ESPORT = 'ESPORT';

    const GAME_ALL = 'ALL';
    const GAME_SPECIAL = 'SPECIAL'; // 某些遊戲會進行特殊的小遊戲，會和原本進行的遊戲不同類型，可能用不到

    public function getType();
}
