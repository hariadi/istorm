<?php

namespace App\Repositories\Frontend\Order;

use App\Models\Order\Order;

/**
 * Class OrderRepository
 * @package App\Repositories\Frontend\Order
 */
class OrderRepository extends Repository
{
	/**
	 * Associated Repository Model
	 */
	const MODEL = Order::class;

	/**
     * @var ProductRepository
     */
    protected $product;

    /**
     * @param ProductRepository $product
     */
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }
}
