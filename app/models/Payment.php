<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class Payment extends Model
{
	//Illuminate setup6
	use SoftDeletes;
	public $timestamps = true;
	// vars to be inserted to
	protected $fillable = ['user_id', 'order_no', 'amount', 'status'];
	protected $dates = ['deleted_at'];

	public function order()
	{
		return $this->belongsTo(Category::class);
	}
	
	public function transform($data)
	{
		$payments = [];
		foreach($data as $item){
			$added = new Carbon($item->created_at);

			//push elements onto the end of array.
			//in this case each element of the array is array
			array_push($payments, [
				'id' => $item->id,
				'user_id' => $item->user_id,
				'order_no' => $item->order_no,
				'amount' => $item->amount,
				'status' => $item->status,
				'added' => $added->toFormattedDateString(),
			]);
		}
		return $payments;
	}
}

?>