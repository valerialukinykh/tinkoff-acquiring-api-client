<?php
namespace JustCommunication\TinkoffAcquiringAPIClient\API;

/**
 * Class GetStateResponse
 *
 * @package JustCommunication\TinkoffAcquiringAPIClient\API
 */
class GetQrResponse extends AbstractResponse
{
    /**
     * Идентификатор заказа в системе продавца
     *
     * @var string
     */
    protected $OrderId;

    /**
     * Идентификатор платежа в системе банка
     *
     * @var int
     */
    protected $PaymentId;

    /**
     * Зависимост от параметра DataType в запросе
     *
     * @var string
     */
    protected $Data;

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
     * @return int
     */
    public function getPaymentId()
    {
        return $this->PaymentId;
    }

    /**
     * @param int $PaymentId
     * @return $this
     */
    public function setPaymentId($PaymentId)
    {
        $this->PaymentId = $PaymentId;
        return $this;
    }

    /**
     * @return string
     */
    public function getData()
    {
      return $this->Data;
    }

    /**
     * @param string $Data
     * @return $this
     */
    public function setData($Data)
    {
      $this->Data = $Data;
      return $this;
    }

    /**
     * @inheritDoc
     */
    public static function createFromResponseData(array $data)
    {
        $response = new GetQrResponse();
        $response
            ->setOrderId($data['OrderId'])
            ->setPaymentId($data['PaymentId'])
            ->setData($data['Data'])
        ;

        return $response;
    }
}
