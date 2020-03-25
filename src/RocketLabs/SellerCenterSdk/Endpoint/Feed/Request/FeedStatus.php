<?php

namespace RocketLabs\SellerCenterSdk\Endpoint\Feed\Request;

use RocketLabs\SellerCenterSdk\Core\Client;
use RocketLabs\SellerCenterSdk\Core\Request\GenericRequest;
use RocketLabs\SellerCenterSdk\Core\Response\ErrorResponse;
use RocketLabs\SellerCenterSdk\Endpoint\Feed\Response\FeedStatus as FeedStatusResponse;

/**
 * Class FeedList
 * @method FeedStatusResponse|ErrorResponse call(Client $client)
 */
class FeedStatus extends GenericRequest
{
    const ACTION = 'FeedStatus';

    /**
     * GetBrands constructor.
     */
    public function __construct($feedId)
    {
        parent::__construct(
            Client::GET,
            static::ACTION,
            static::V1,
            ['FeedID' => $feedId]
        );
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return FeedStatusResponse::class;
    }
}
