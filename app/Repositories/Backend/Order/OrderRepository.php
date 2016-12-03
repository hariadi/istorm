<?php

namespace App\Repositories\Backend\Order;

use App\Models\Order\Order;
use App\Repositories\Repository;
use App\Notifications\Frontend\Order\OrderConfirmation;
use App\Repositories\Backend\Product\ProductRepository;

/**
 * Class OrderRepository
 * @package App\Repositories\Order
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

    /**
	 * @param string $order_by
	 * @param string $sort
	 * @return mixed
	 */
	public function getForDataTable($order_by = 'sort', $sort = 'asc', $all = false)
    {
    	/**
         * Note: You must return deleted_at or the Order getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
		$dataTableQuery = $this->query()
			->with('products', 'user')
			->select([
				'orders.id',
				'orders.user_id',
				'orders.approver_id',
				'orders.start_date',
				'orders.end_date',
				'orders.created_at',
				'orders.updated_at',
			]);

		if ($all) {
			return $dataTableQuery->all();
		}

		// active() is a scope on the OrderScope trait
		return $dataTableQuery->confirmed($status);
    }

    /**
	 * @param Model $input
	 */
	public function create($input)
    {
		$user = $input['user'];
		$products = $input['products'];

        $order = $this->createOrderStub($user);

		DB::transaction(function() use ($order, $user, $products) {
			if (parent::save($order)) {

				//Order Created, Validate Roles
				if (! count($products['assignees_products'])) {
					throw new GeneralException(trans('exceptions.backend.orders.role_needed_create'));
				}

				//Attach new products
				$order->attachRoles($products['assignees_products']);

				//Send confirmation email if requested
				if (config('istorm.orders.send_email') && $order->confirmed == 1) {
					$order->notify(new OrderConfirmation($order->confirmation_code));
				}

				//event(new OrderCreated($order));
				return true;
			}

        	throw new GeneralException(trans('exceptions.backend.orders.create_error'));
		});
    }

    /**
     * @param  $input
     * @return mixed
     */
    protected function createOrderStub($input)
    {
    	$order					 = self::MODEL;
        $order                    = new $order;
        $order->name              = $input['name'];
        $order->email             = $input['email'];
        $order->password          = bcrypt($input['password']);
        $order->status            = isset($input['status']) ? 1 : 0;
        $order->confirmation_code = md5(uniqid(mt_rand(), true));
        $order->confirmed         = isset($input['confirmed']) ? 1 : 0;
        return $order;
    }
}
