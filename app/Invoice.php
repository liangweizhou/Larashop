<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $fillable = ['org_name', 'tax_id', 'org_tel', 'org_bank','org_account'];
}
