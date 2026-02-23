<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\AdminStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 *
 * @property int $id
 * @property string $full_name
 * @property string $username
 * @property string $password
 * @property bool $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Admin extends Model
{
	protected $table = 'admins';
	public static $snakeAttributes = false;

	protected $casts = [
		'status' => AdminStatus::class
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'full_name',
		'username',
		'password',
		'status'
	];
}
