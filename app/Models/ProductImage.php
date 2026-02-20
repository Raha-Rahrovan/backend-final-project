<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductImage
 *
 * @property int $id
 * @property int $product_id
 * @property int $file_id
 * @property bool $is_defult
 * @property Carbon $created_at
 *
 * @property File $file
 * @property Product $product
 *
 * @package App\Models
 */
class ProductImage extends Model
{
	protected $table = 'product_images';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'product_id' => 'int',
		'file_id' => 'int',
		'is_defult' => 'bool'
	];

	protected $fillable = [
		'product_id',
		'file_id',
		'is_defult'
	];

	public function file()
    {
		return $this->belongsTo(File::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
