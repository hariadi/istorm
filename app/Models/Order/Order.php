<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Access\User\Traits\Scope\UserScope;
use App\Models\Order\Traits\Attribute\OrderAttribute;
use App\Models\Order\Traits\Relationship\OrderRelationship;

class Order extends Model
{
    use UserScope, Notifiable, OrderAttribute, OrderRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['confirmed', 'start_at', 'end_date'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['start_at', 'end_date'];
}
