<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username','lastname','phoneNumber','name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	public function farm(){
		return $this->belongsToMany('App\Farm');
	}
	public function activity(){
		return $this->belongsToMany('App\activity');
	}
	public function taskList(){
		return $this->belongsToMany('App\TaskList')->orderBy('date', 'desc')->orderBy('time', 'desc');
	}
	public function ownTask(){
		return $this->hasMany('App\TaskList');
	}
}
