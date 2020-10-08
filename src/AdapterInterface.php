<?php

namespace Gamesmkt\Fishpond;

use Gamesmkt\Fishpond\Config;
use Gamesmkt\Fishpond\GameInterface;
use Gamesmkt\Fishpond\PlayerInterface;
use Gamesmkt\Fishpond\RecordInterface;
use Gamesmkt\Fishpond\TransactionInterface;
use Gamesmkt\Fishpond\TypeInterface;

interface AdapterInterface
{
    /**
     * 取得遊戲列表詳情
     *
     * @param \Gamesmkt\Fishpond\TypeInterface $type
     *
     * @return array|false false on failure, meta data on success
     */
    public function getGameList(TypeInterface $type);

    /**
     * 準備建立玩家。
     *
     * （通常是因為該服務有特定的帳號規則，或是想要自定義玩家帳號、暱稱。）
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player
     * @param \Gamesmkt\Fishpond\Config $config
     *
     * @return array|false false on failure, meta data on success
     */
    public function prepareCreatePlayer(PlayerInterface $player, Config $config);

    /**
     * 建立玩家。
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player
     * @param \Gamesmkt\Fishpond\Config $config
     *
     * @return array|false false on failure, meta data on success
     */
    public function createPlayer(PlayerInterface $player, Config $config);

    /**
     * 取得登入網址。
     *
     * Conifg
     * - device:
     *   (string) pc or mobile.
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player
     * @param \Gamesmkt\Fishpond\GameInterface $game
     * @param \Gamesmkt\Fishpond\Config $config
     *
     * @return array|false false on failure, meta data on success
     */
    public function getLoginUrl(PlayerInterface $player, GameInterface $game, Config $config);

    /**
     * 登出玩家。
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player
     * @param \Gamesmkt\Fishpond\GameInterface $game
     * @param \Gamesmkt\Fishpond\Config $config
     *
     * @return bool
     */
    public function logout(PlayerInterface $player, GameInterface $game, Config $config);

    /**
     * 取得玩家餘額。
     *
     * @param \Gamesmkt\Fishpond\PlayerInterface $player
     * @param \Gamesmkt\Fishpond\Config $config
     *
     * @return array|false false on failure, meta data on success
     */
    public function getBalance(PlayerInterface $player, Config $config);

    /**
     * 準備執行交易。
     *
     * 通常是因為該服務有特定的流水號規則。
     *
     * @param \Gamesmkt\Fishpond\TransactionInterface $player
     * @param \Gamesmkt\Fishpond\Config $config
     *
     * @return array|false false on failure, meta data on success
     */
    public function prepareTransfer(TransactionInterface $transaction, Config $config);

    /**
     * 執行交易。
     *
     * @param \Gamesmkt\Fishpond\TransactionInterface $player
     * @param \Gamesmkt\Fishpond\Config $config
     *
     * @throws \Gamesmkt\Fishpond\Exception\TransferException
     *
     * @return array|false false on failure, meta data on success
     */
    public function transfer(TransactionInterface $transaction, Config $config);

    /**
     * 查詢玩家轉帳紀錄
     *
     * @param \Gamesmkt\Fishpond\TransactionInterface $player
     * @param \Gamesmkt\Fishpond\Config $config
     *
     * @throws \Gamesmkt\Fishpond\Exception\GetTransferException
     *
     * @return array|false false on failure, meta data on success
     */
    public function getTransferRecord(TransactionInterface $transaction, Config $config);

    /**
     * 取得詳細紀錄的網址。
     *
     * @param \Gamesmkt\Fishpond\RecordInterface $record
     * @param \Gamesmkt\Fishpond\GameInterface $game
     * @param \Gamesmkt\Fishpond\Config $config
     *
     * @return array|false false on failure, meta data on success
     */
    public function getRecordDetailUrl(RecordInterface $record, GameInterface $game, Config $config);

}
