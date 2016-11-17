<?php

namespace App\Models\Order\Traits\Relationship;

use App\Models\Product\Product;
use App\Models\Access\User\User;

/**
 * Class OrderRelationship
 * @package App\Models\Order\Traits\Relationship
 */
trait OrderRelationship
{
    /**
     * One-to-one relations with User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * One-to-one relations with User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function approver()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * One-to-one relations with Product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
