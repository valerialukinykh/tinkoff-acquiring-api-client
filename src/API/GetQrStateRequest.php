<?php
namespace JustCommunication\TinkoffAcquiringAPIClient\API;

/**
 * Class GetQrStateRequest
 *
 * Возвращает статус возврата платежа по СБП.
 *
 * @package JustCommunication\TinkoffAcquiringAPIClient\API
 */
class GetQrStateRequest extends AbstractRequest
{
    const HTTP_METHOD = 'POST';
    const URI = 'GetState';
    const RESPONSE_CLASS = GetStateResponse::class;

    /**
     * Идентификатор платежа в системе банка
     *
     * @var int
     */
    protected $PaymentId;

    /**
     * ConfirmRequest constructor.
     *
     * @param int $PaymentId
     */
    public function __construct($PaymentId)
    {
        $this->PaymentId = $PaymentId;
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
     * @return GetQrStateRequest
     */
    public function setPaymentId($PaymentId)
    {
        $this->PaymentId = $PaymentId;
        return $this;
    }

    public function createHttpClientParams()
    {
        $params = [
            'PaymentId' => $this->PaymentId
        ];

        return [
            'json' => $params
        ];
    }
}