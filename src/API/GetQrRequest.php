<?php
namespace JustCommunication\TinkoffAcquiringAPIClient\API;

/**
 * Class GetQrRequest
 *
 * Регистрирует QR и возвращает информацию о нем от СБП. Должен быть вызван после вызова метода Init.
 *
 * @package JustCommunication\TinkoffAcquiringAPIClient\API
 */
class GetQrRequest extends AbstractRequest
{
    const HTTP_METHOD = 'POST';
    const URI = 'GetQr';
    const RESPONSE_CLASS = GetQrResponse::class;

    //типы возвращаемых данных
    const PAYLOAD = 'PAYLOAD';
    const IMAGE = 'IMAGE';

    /**
     * Идентификатор платежа в системе банка
     *
     * @var int
     */
    protected $PaymentId;

    /**
     * Тип возвращаемых данных
     *
     * @var string
     */
    protected $dataType;

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
     * @return GetQrRequest
     */
    public function setPaymentId($PaymentId)
    {
        $this->PaymentId = $PaymentId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * @param string $dataType
     * @return GetQrRequest
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;
        return $this;
    }

    public function createHttpClientParams()
    {
        $params = [
            'PaymentId' => $this->PaymentId
        ];

        if ($this->dataType) {
            $params['DataType'] = $this->dataType;
        }

        return [
            'json' => $params
        ];
    }
}