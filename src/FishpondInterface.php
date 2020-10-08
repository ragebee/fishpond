<?php

namespace Gamesmkt\Fishpond;

use DateTime;
use Gamesmkt\Fishpond\GameInterface;
use Gamesmkt\Fishpond\PlayerInterface;
use Gamesmkt\Fishpond\RecordInterface;
use Gamesmkt\Fishpond\TransactionInterface;
use Gamesmkt\Fishpond\TypeInterface;

interface FishpondInterface
{
    /**
     * 取得遊戲列表詳情
     *
     * @param \Gamesmkt\Fishpond\TypeInterface $type
     *
     * @return \Gamesmkt\Fishpond\GameInterface[]|false The games or false on failure
     */
    public function getGameList(TypeInterface $type);

    /**
     * 準備建立玩家。
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player The player class
     * @param array $config An optional configuration array
     *
     * @return \Gamesmkt\Fishpond\PlayerInterface|false The Player class
     */
    public function prepareCreatePlayer(PlayerInterface $player, array $config = []);

    /**
     * 建立玩家。
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player The player class
     * @param array $config An optional configuration array
     *
     * @return bool True on success, false on failure
     */
    public function createPlayer(PlayerInterface $player, array $config = []);

    /**
     * 取得登入網址。
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player The player class
     * @param \Gamesmkt\Fishpond\GameInterface $game The game class
     * @param array $config An optional configuration array
     *
     * @return string|false The login url or false on failure
     */
    public function getLoginUrl(PlayerInterface $player, GameInterface $game, array $config = []);

    /**
     * 登出玩家。
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player The player class
     * @param \Gamesmkt\Fishpond\GameInterface $game An optional game class
     * @param array $config An optional configuration array
     *
     * @return bool True on success, false on failure
     */
    public function logout(PlayerInterface $player, GameInterface $game = null, array $config = []);

    /**
     * 取得玩家餘額。
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player The player class
     * @param array $config An optional configuration array
     *
     * @return string|false The balance or false on failure
     */
    public function getBalance(PlayerInterface $player, array $config = []);

    /**
     * 準備執行交易。
     *
     * @param \Gamesmkt\Fishpond\TransactionInterface $transaction The transaction class
     * @param array $config An optional configuration array
     *
     * @return \Gamesmkt\Fishpond\TransactionInterface|false The transaction class
     */
    public function prepareTransfer(TransactionInterface $transaction, array $config = []);

    /**
     * 執行交易。
     *
     * @param \Gamesmkt\Fishpond\TransactionInterface $transaction The transaction class
     * @param array $config An optional configuration array
     *
     * @return \Gamesmkt\Fishpond\TransactionInterface|false The transaction class or false on failure.
     */
    public function transfer(TransactionInterface $transaction, array $config = []);

    /**
     * 查詢交易紀錄。
     *
     * @param \Gamesmkt\Fishpond\TransactionInterface $transaction The transaction class
     * @param array $config An optional configuration array
     *
     * @return \Gamesmkt\Fishpond\TransactionInterface|false The transaction class or false on failure
     */
    public function getTransferRecord(TransactionInterface $transaction, array $config = []);

    /**
     * 透過時間抓取紀錄。
     *
     * @param \Gamesmkt\Fishpond\TypeInterface $type
     * @param \DateTime $start
     * @param \DateTime $end
     * @param array $config An optional configuration array
     *
     * @throws \Gamesmkt\Fishpond\Exception\NormalizeBetRecordException
     *
     * @return \Gamesmkt\Fishpond\RecordInterface[]|false The records or false on failure
     */
    public function fetchRecords(TypeInterface $type, DateTime $start, DateTime $end, array $config = []);

    /**
     * 透過上下文抓取紀錄。
     *
     * @param \Gamesmkt\Fishpond\TypeInterface $type
     * @param string $context
     * @param array $config An optional configuration array
     *
     * @throws \Gamesmkt\Fishpond\Exception\NormalizeBetRecordException
     *
     * @return \Gamesmkt\Fishpond\RecordInterface[]|false The records or false on failure
     */
    public function fetchRecordsByContext(TypeInterface $type, string $context, array $config = []);

    /**
     * 直接抓取未被標記的紀錄，並藉由傳遞清單來標記已抓取的紀錄。
     *
     * @param \Gamesmkt\Fishpond\TypeInterface $type
     * @param array $listCompleteRecord An optional array
     * @param array $config An optional configuration array
     *
     * @throws \Gamesmkt\Fishpond\Exception\NormalizeBetRecordException
     *
     * @return \Gamesmkt\Fishpond\RecordInterface[]|false The records or false on failure
     */
    public function fetchRecordsByDirectWithMark(TypeInterface $type, array $listCompleteRecord = [], array $config = []);

    /**
     * 取得遊戲結果的網址。
     *
     * @param \Gamesmkt\Fishpond\RecordInterface $record
     * @param \Gamesmkt\Fishpond\GameInterface $game
     * @param array $config An optional configuration array
     *
     * @return string|false The balance or false on failure
     */
    public function getGaemResultlUrl(RecordInterface $record, GameInterface $game, array $config = []);
}
