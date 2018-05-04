<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'tag', 'is_default', 'consignee_name', 'consignee_mobile', 'province', 'city', 'district', 'detail'];
}
