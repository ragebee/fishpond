<?php

namespace Gamesmkt\Fishpond;

use DateTime;
use Gamesmkt\Fishpond\AdapterInterface;
use Gamesmkt\Fishpond\Adapter\AutoCreatePlayer;
use Gamesmkt\Fishpond\Adapter\CanFetchRecords;
use Gamesmkt\Fishpond\Adapter\CanFetchRecordsByContext;
use Gamesmkt\Fishpond\Config;
use Gamesmkt\Fishpond\ConfigAwareTrait;
use Gamesmkt\Fishpond\Exception\NotSupportingException;
use Gamesmkt\Fishpond\FishpondInterface;
use Gamesmkt\Fishpond\Game;
use Gamesmkt\Fishpond\GameInterface;
use Gamesmkt\Fishpond\PlayerInterface;
use Gamesmkt\Fishpond\Plugin\PluggableTrait;
use Gamesmkt\Fishpond\RecordInterface;
use Gamesmkt\Fishpond\TransactionInterface;
use Gamesmkt\Fishpond\Type;
use Gamesmkt\Fishpond\TypeInterface;

class Fishpond implements FishpondInterface
{
    use ConfigAwareTrait;
    use PluggableTrait;

    /**å
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * Constructor.
     *
     * @param AdapterInterface $adapter
     * @param Config|array     $config
     */
    public function __construct(AdapterInterface $adapter, $config = null)
    {
        $this->adapter = $adapter;
        $this->setConfig($config);
    }

    /**
     * Get the Adapter.
     *
     * @return AdapterInterface adapter
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * @inheritdoc
     */
    public function getGameList(TypeInterface $type)
    {
        $array = $this->getAdapter()->getGameList($type);

        if (!isset($array)) {
            return false;
        }

        return $array;
    }

    /**
     * @inheritdoc
     */
    public function prepareCreatePlayer(PlayerInterface $player, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$object = $this->getAdapter()->prepareCreatePlayer($player, $config)) {
            return false;
        }

        return $object['player'];
    }

    /**
     * @inheritdoc
     */
    public function createPlayer(PlayerInterface $player, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if ($this->getAdapter() instanceof AutoCreatePlayer) {
            return (bool) $object = $this->getAdapter()->getBalance($player, $config);
        }

        return (bool) $object = $this->getAdapter()->createPlayer($player, $config);
    }

    /**
     * @inheritdoc
     */
    public function getLoginUrl(PlayerInterface $player, GameInterface $game, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$object = $this->getAdapter()->getLoginUrl($player, $game, $config)) {
            return false;
        }

        return $object['loginUrl'];
    }

    /**
     * @inheritdoc
     */
    public function logout(PlayerInterface $player, GameInterface $game = null, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if ($game) {
            return (bool) $object = $this->getAdapter()->logout($player, $game, $config);
        }

        return (bool) $object = $this->getAdapter()->logout($player, $config);
    }

    /**
     * @inheritdoc
     */
    public function getBalance(PlayerInterface $player, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$object = $this->getAdapter()->getBalance($player, $config)) {
            return false;
        }

        return $object['balance'];
    }

    /**
     * @inheritdoc
     */
    public function prepareTransfer(TransactionInterface $transaction, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$object = $this->getAdapter()->prepareTransfer($transaction, $config)) {
            return false;
        }

        return $object['transaction'];
    }

    /**
     * @inheritdoc
     */
    public function transfer(TransactionInterface $transaction, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$object = $this->getAdapter()->transfer($transaction, $config)) {
            return false;
        }

        return $object['transaction'];
    }

    /**
     * @inheritdoc
     */
    public function getTransferRecord(TransactionInterface $transaction, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$object = $this->getAdapter()->getTransferRecord($transaction, $config)) {
            return false;
        }

        return $object['transaction'];
    }

    /**
     * @inheritdoc
     */
    public function fetchRecords(TypeInterface $type, DateTime $start, DateTime $end, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$this->getAdapter() instanceof CanFetchRecords) {
            throw new NotSupportingException(
                get_class($this->getAdapter()) . ' does not support fetch record.'
            );
        }

        $this->assertDonate($type);

        $array = $this->getAdapter()->fetchRecords($type, $start, $end, $config);

        if ($array === false) {
            return false;
        }

        return $array;
    }

    /**
     * @inheritdoc
     */
    public function fetchRecordsByContext(TypeInterface $type, string $context, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$this->getAdapter() instanceof CanFetchRecordsByContext) {
            throw new NotSupportingException(
                get_class($this->getAdapter()) . ' does not support fetch record by context.'
            );
        }

        $this->assertDonate($type);

        if (!$array = $this->getAdapter()->fetchRecordsByContext($type, $context, $config)) {
            return false;
        }

        return $array;
    }

    /**
     * @inheritdoc
     */
    public function fetchRecordsByDirectWithMark(TypeInterface $type, array $listCompleteRecord = [], array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$this->getAdapter() instanceof CanFetchRecordsByDirectWithMark) {
            throw new NotSupportingException(
                get_class($this->getAdapter()) . ' does not support fetch record by direct with mark.'
            );
        }

        $this->assertDonate($type);

        $array = $this->getAdapter()->fetchRecordsByDirectWithMark($type, $listCompleteRecord, $config);

        if ($array === false) {
            return false;
        }

        return $array;
    }

    /**
     * @inheritdoc
     */
    public function getGaemResultlUrl(RecordInterface $record, GameInterface $game, array $config = [])
    {
        $config = $this->prepareConfig($config);

        if (!$array = $this->getAdapter()->getGaemResultlUrl($record, $game, $config)) {
            return false;
        }

        return $array;
    }

    /**
     * Assert support donate.
     *
     * @param \Gamesmkt\Fishpond\TypeInterface $type
     *
     * @throws \Gamesmkt\Fishpond\Exception\NotSupportingException
     *
     * @return void
     */
    public function assertDonate(TypeInterface $type)
    {
        if ((int) $type->getType() === Type::RECORD_DONATE && !$this->getAdapter() instanceof Donatable) {
            throw new NotSupportingException(
                get_class($this->getAdapter()) . ' does not support donate.'
            );
        }
    }
}
