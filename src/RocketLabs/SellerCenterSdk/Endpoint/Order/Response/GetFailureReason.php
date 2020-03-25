<?php

namespace RocketLabs\SellerCenterSdk\Endpoint\Order\Response;

use RocketLabs\SellerCenterSdk\Core\Response\GenericResponse;
use RocketLabs\SellerCenterSdk\Endpoint\Order\Model\Item;
use RocketLabs\SellerCenterSdk\Endpoint\Order\Model\ItemCollection;

/**
 * Class GetFailureReason
 */
class GetFailureReason extends GenericResponse
{
    const ORDER_FAILURE_REASON = 'FailureReason';
    const ORDER_FAILURE_REASONS = 'FailureReasons';

    /** @var  ItemCollection */
    private $items;

    /**
     * @return ItemCollection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param array $responseData
     */
    protected function processDecodedResponse(array $responseData)
    {
        parent::processDecodedResponse($responseData);

        $items = [];
        if (isset($this->body[static::ORDER_FAILURE_REASONS])) {
            $items = $this->prepareOrderFailedReasons();
        }

        $this->items = new ItemCollection($items);
    }

    /**
     * @return Item[]
     */
    protected function prepareOrderFailedReasons()
    {
        if (isset($this->body[static::ORDER_FAILURE_REASONS][static::ORDER_FAILURE_REASON][Item::ORDER_FAIL_REASON_KEY])) {
            return [new Item($this->body[static::ORDER_FAILURE_REASONS][static::ORDER_FAILURE_REASON])];
        }

        return array_map(
            function ($orderFailedReasons) {
                return new Item($failedData);
            },
            $this->body[static::ORDER_FAILURE_REASONS][static::ORDER_FAILURE_REASON]
        );
    }
}
