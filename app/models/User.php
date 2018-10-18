<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Model
{
	//Illuminate setup6
	use SoftDeletes;
	public $timestamps = true;
	// vars to be inserted to
	protected $fillable = ['username', 'fullname', 'email', 'password', 'address', 'role'];
	protected $dates = ['deleted_at'];

	//note: foriegn key is ClassName_id which is products_id in this case
	//it must added to the database column for the relation to work
	public function product()
	{
		//same as (Product::class, 'category_id', 'id' )// where category_id is foriegn key of category and id is primary key of product 
		return $this->hasMany(Product::class); //same as specify 'App\Models\Product'
	}

	public function transform($data)
	{
		$users = [];
		foreach($data as $item){
			$added = new Carbon($item->created_at);

			//push elements onto the end of array.
			//in this case each element of the array is array
			array_push($users, [
				'id' => $item->id,
				'username' => $item->username,
				'fullname' => $item->fullname,
				'email' => $item->email,
				'password' => $item->password,
				'address' => $item->address,
				'role' => $item->role,
				'added' => $added->toFormattedDateString(),
			]);

		}
		return $users;
	}
}

?>