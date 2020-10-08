<?php

namespace Gamesmkt\Fishpond;

interface TypeInterface
{
    const RECORD_BET = 1;
    const RECORD_DONATE = 2;
    const RECORD_TRANSFER = 3;

    const GAME_ALL = 0; // 全部
    const GAME_SPORT = 1; // 體育
    const GAME_LOTTERY = 2; // 彩票
    const GAME_CHESS_CARD = 3; // 棋牌
    const GAME_LIVE_VIDEO = 4; // 真人
    const GAME_SLOT = 5; // 電子
    const GAME_FISHING = 6; // 魚機
    const GAME_CELEBRITY = 7; // 網紅

    public function getType();
}
