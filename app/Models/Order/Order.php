<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order\Traits\Attribute\OrderAttribute;
use App\Models\Order\Traits\Relationship\OrderRelationship;

class Order extends Model
{
    use OrderAttribute, OrderRelationship;
    //
}
