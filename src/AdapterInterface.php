<?php

namespace Ragebee\Fishpond;

use Ragebee\Fishpond\Config;
use Ragebee\Fishpond\GameInterface;
use Ragebee\Fishpond\PlayerInterface;
use Ragebee\Fishpond\RecordInterface;
use Ragebee\Fishpond\TransactionInterface;
use Ragebee\Fishpond\TypeInterface;

interface AdapterInterface
{
    /**
     * 取得遊戲列表詳情
     *
     * @param \Ragebee\Fishpond\TypeInterface $type
     *
     * @return array|false false on failure, meta data on success
     */
    public function getGameList(TypeInterface $type);

    /**
     * 準備建立玩家。
     *
     * （通常是因為該服務有特定的帳號規則，或是想要自定義玩家帳號、暱稱。）
     *
     * @param \Ragebee\Fishpond\PlayerInterface $player
     * @param \Ragebee\Fishpond\Config $config
     *
     * @return array|false false on failure, meta data on success
     */
    public function prepareCreatePlayer(PlayerInterface $player, Config $config);

    /**
     * 建立玩家。
     *
     * @param \Ragebee\Fishpond\PlayerInterface $player
     * @param \Ragebee\Fishpond\Config $config
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
     * @param \Ragebee\Fishpond\PlayerInterface $player
     * @param \Ragebee\Fishpond\GameInterface $game
     * @param \Ragebee\Fishpond\Config $config
     *
     * @return array|false false on failure, meta data on success
     */
    public function getLoginUrl(PlayerInterface $player, GameInterface $game, Config $config);

    /**
     * 登出玩家。
     *
     * @param \Ragebee\Fishpond\PlayerInterface $player
     * @param \Ragebee\Fishpond\GameInterface $game
     * @param \Ragebee\Fishpond\Config $config
     *
     * @return bool
     */
    public function logout(PlayerInterface $player, GameInterface $game, Config $config);

    /**
     * 取得玩家餘額。
     *
     * @param \Ragebee\Fishpond\PlayerInterface $player
     * @param \Ragebee\Fishpond\Config $config
     *
     * @return array|false false on failure, meta data on success
     */
    public function getBalance(PlayerInterface $player, Config $config);

    /**
     * 準備執行交易。
     *
     * 通常是因為該服務有特定的流水號規則。
     *
     * @param \Ragebee\Fishpond\TransactionInterface $player
     * @param \Ragebee\Fishpond\Config $config
     *
     * @return array|false false on failure, meta data on success
     */
    public function prepareTransfer(TransactionInterface $transaction, Config $config);

    /**
     * 執行交易。
     *
     * @param \Ragebee\Fishpond\TransactionInterface $player
     * @param \Ragebee\Fishpond\Config $config
     *
     * @throws \Ragebee\Fishpond\Exception\TransferException
     *
     * @return array|false false on failure, meta data on success
     */
    public function transfer(TransactionInterface $transaction, Config $config);

    /**
     * 查詢玩家轉帳紀錄
     *
     * @param \Ragebee\Fishpond\TransactionInterface $player
     * @param \Ragebee\Fishpond\Config $config
     *
     * @throws \Ragebee\Fishpond\Exception\GetTransferException
     *
     * @return array|false false on failure, meta data on success
     */
    public function getTransferRecord(TransactionInterface $transaction, Config $config);

    /**
     * 取得詳細紀錄的網址。
     *
     * @param \Ragebee\Fishpond\RecordInterface $record
     * @param \Ragebee\Fishpond\GameInterface $game
     * @param \Ragebee\Fishpond\Config $config
     *
     * @return array|false false on failure, meta data on success
     */
    public function getRecordDetailUrl(RecordInterface $record, GameInterface $game, Config $config);

}
