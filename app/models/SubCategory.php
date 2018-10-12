<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

// class nameing convention must follow Eloquent rule
// php class SubCategory 
// database class sub_category
class SubCategory extends Model
{
	//Illuminate setup6
	use SoftDeletes;
	public $timestamps = true;
	// vars to be inserted to
	protected $fillable = ['name', 'slug', 'category_id'];
	protected $dates = ['deleted_at'];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function product()
	{
		return $this->hasMany(Product::class);
	}
	public function transform($data)
	{
		$subcategories = [];
		foreach($data as $item){
			$added = new Carbon($item->created_at);

			//push elements onto the end of array.
			//in this case each element of the array is array
			array_push($subcategories, [
				'id' => $item->id,
				'category_id' => $item->category_id,
				'name' => $item->name,
				'slug' => $item->slug,
				'added' => $added->toFormattedDateString(),
			]);
		}
		return $subcategories;
	}
}

?>