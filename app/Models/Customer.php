<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'user_id',
        'shop_id',
        'shop_name',
        'phone',
        'email',
        'address',
        'status',
        'note',
        'shop_code',
        'shop_package',
        'shop_expired',
        'area',
        'city_id',
        'district_id',
        'ward_id',
        'business',
        'origin_id',
        'is_ordered',
        'shipping_partner',
        'registry_date',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that are hidden.
     *
     * @var array
     */
    protected $hidden = [
        'shop_code',
        'shop_package',
        'shop_expired',
        'area',
        'city_id',
        'district_id',
        'ward_id',
        'business',
        'origin_id',
        'is_ordered',
        'shipping_partner',
        'registry_date',
    ];
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
