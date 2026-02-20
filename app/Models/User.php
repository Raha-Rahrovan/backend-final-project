<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $order_id
 * @property string $mobile
 * @property string $email
 * @property string $password
 * @property bool $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public static $snakeAttributes = false;

	protected $casts = [
		'order_id' => 'int',
		'status' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'order_id',
		'mobile',
		'email',
		'password',
		'status'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
