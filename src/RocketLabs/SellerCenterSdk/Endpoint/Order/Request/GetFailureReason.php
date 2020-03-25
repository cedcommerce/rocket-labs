<?php

namespace RocketLabs\SellerCenterSdk\Endpoint\Order\Request;

use RocketLabs\SellerCenterSdk\Core\Client;
use RocketLabs\SellerCenterSdk\Core\Request\GenericRequest;
use RocketLabs\SellerCenterSdk\Core\Response\ErrorResponse;
use RocketLabs\SellerCenterSdk\Endpoint\Order\Response\GetFailureReason as GetFailedResponse;

/**
 * Class GetOrder
 * @method GetFailureReason|ErrorResponse call(Client $client)
 */
class GetFailureReason extends GenericRequest
{
    const ACTION = 'GetFailureReasons';


    public function __construct()
    {
        parent::__construct(Client::GET, static::ACTION, static::V1);
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return GetFailedResponse::class;
    }
}
