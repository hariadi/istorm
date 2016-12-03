<?php

namespace App\Repositories\Backend\Product;

use App\Models\Product\Product;
use App\Repositories\Repository;

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
				'products.id',
				'products.user_id',
				'products.agency_id',
				'products.type_id',
				'products.name',
				'products.description',
				'products.capacity',
			]);
	}

	/**
     * @param  array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
    	//This config is only required if all is false
		if (! isset($input['agency_id']))
			throw new GeneralException(trans('exceptions.backend.products.needs_agency'));
		}

		$product->createProductStub($input);

		DB::transaction(function() use ($input) {

			if (parent::save($product)) {

				//event(new ProductCreated($product));
				return true;
			}

			throw new GeneralException(trans('exceptions.backend.access.products.create_error'));
		});

		/**
     * @param  $input
     * @return mixed
     */
    protected function createProductStub($input)
    {
    	$product					= self::MODEL;
        $product                    = new $product;
        $product->name              = $input['name'];
        $product->user_id           = $input['user_id'];
        $product->agency_id         = $input['agency_id'];
        $product->description 		= $input['description'];
        $product->capacity 			= $input['capacity'];
        $product->type_id           = $input['type_id'];

        return $product;
    }
    }
}
