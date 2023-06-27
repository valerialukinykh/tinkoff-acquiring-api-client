<?php
namespace JustCommunication\TinkoffAcquiringAPIClient\API;

/**
 * Class GetStateResponse
 *
 * @package JustCommunication\TinkoffAcquiringAPIClient\API
 */
class GetQrStateResponse extends AbstractResponse
{
    /**
     * Идентификатор заказа в системе продавца
     *
     * @var string
     */
    protected $OrderId;

    /**
     * Статус платежа
     *
     * @var string
     */
    protected $Status;
    
    /**
     * Сумма платежа в системе банка в копейках
     *
     * @var int
     */
    protected $Amount;

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->OrderId;
    }

    /**
     * @param string $OrderId
     * @return $this
     */
    public function setOrderId($OrderId)
    {
        $this->OrderId = $OrderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * @param string $Status
     * @return $this
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * @param int $Amount
     * @return $this
     */
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public static function createFromResponseData(array $data)
    {
        $response = new GetQrStateResponse();
        $response
            ->setOrderId($data['OrderId'])
            ->setStatus($data['Status'])
            ->setAmount($data['Amount'])
        ;

        return $response;
    }
}
