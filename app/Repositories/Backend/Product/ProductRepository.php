<?php

namespace App\Repositories\Backend\Product;

/**
 * Class ProductRepository
 * @package App\Repositories\Product
 */
class ProductRepository extends Repository
{
	/**
	 * Associated Repository Model
	 */
	const MODEL = Product::class;

    /**
	 * @param string $order_by
	 * @param string $sort
	 * @return mixed
	 */
	public function getAll($order_by = 'sort', $sort = 'asc')
    {
		return $this->query()
			->with('orders', 'agencies', 'types')
			->orderBy($order_by, $sort)
			->get();
    }

    /**
	 * @param string $order_by
	 * @param string $sort
	 * @return mixed
	 */
	public function getForDataTable($order_by = 'sort', $sort = 'asc')
	{
		return $this->query()
			->with('orders', 'agencies', 'types')
			->orderBy($order_by, $sort)
			->select([
				config('access.products_table') . '.id',
				config('access.products_table') . '.name',
				config('access.products_table') . '.description',
				config('access.products_table') . '.capacity',
			]);
	}
}
