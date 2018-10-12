<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	//Illuminate setup6
	use SoftDeletes;
	public $timestamps = true;
	// vars to be inserted to
	protected $fillable = ['user_id', 'order_no', 'product_id', 'unit_price', 'quantity', 'status', 'total'];
	protected $dates = ['deleted_at'];

}

?>