<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Order extends Model
{
	//Illuminate setup6
	use SoftDeletes;
	public $timestamps = true;
	// vars to be inserted to
	// protected $fillable = ['user_id', 'order_no', 'product_id', 'unit_price', 'quantity', 'status', 'total']; // this is for order-details
	protected $fillable = ['user_id', 'order_no']; 

	protected $dates = ['deleted_at'];

	public function products()
	{
		//same as (Product::class, 'category_id', 'id' )// where category_id is foriegn key of category and id is primary key of product 
		return $this->hasMany(Product::class); //same as specify 'App\Models\Product'
	}

	public function transform($data)
	{
		$orders = [];
		foreach($data as $item){
			$added = new Carbon($item->created_at);

			//push elements onto the end of array.
			//in this case each element of the array is array
			array_push($orders, [
				'id' => $item->id,
				'user_id' => $item->user_id,
				'order_no' => $item->order_no,
				'added' => $added->toFormattedDateString(),
			]);
		}
		return $orders;
	}
}

?>