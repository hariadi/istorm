<?php

namespace App\Models\Access\User\Traits\Relationship;

use App\Models\Order\Order;
use App\Models\Agency\Agency;
use App\Models\Product\Product;
use App\Models\Access\User\SocialLogin;

/**
 * Class UserRelationship
 * @package App\Models\Access\User\Traits\Relationship
 */
trait UserRelationship
{
	/**
     * One-to-one relations with Agency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(config('access.role'), config('access.assigned_roles_table'), 'user_id', 'role_id');
    }

    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialLogin::class);
    }

    /**
     * @return mixed
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return mixed
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
