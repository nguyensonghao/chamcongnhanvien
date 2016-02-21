<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function getListEmployee ($type) {
		if ($type == 1) {
			$listUser = User::where('token', 0)
			->join('db_positions', 'users.position', '=', 'db_positions.id', 'left outer')
			->where('lock', 0)->get();
		} else {
			$listUser = User::where('token', 0)
			->join('db_positions', 'users.position', '=', 'db_positions.id', 'left outer')
			->where('lock', 1)->get();
		}

		return $listUser;
	}

	public function getListUserCheckGo () {
		$listUser = User::where('lock', 0)
					->where('token', 0)
					->join('db_positions', 'users.position', '=', 'db_positions.id', 'left outer')
					->paginate(10);
		return $listUser;
	}

	public function getListUserCheckBack () {
		$date = date("Y-m-d");
		$listUser = User::where('lock', 0)
					->where('token', 0)
					->where('db_timekeeps.dateCurrent', $date)
					->join('db_timekeeps', 'users.id', '=', 'db_timekeeps.userId', 'left outer')
					->join('db_positions', 'users.position', '=', 'db_positions.id', 'left outer')
					->paginate(10);
		return $listUser;
	}

	public function searchbyKey ($keySearch) {
		$resultSearch = User::where('token', 0)->where('lock', 0)
			->where(function ($query) use ($keySearch){
				$query->orWhere('username', 'like', "%$keySearch%")
				->orWhere('fullname', 'like', "%$keySearch%")
				->orWhere('email', 'like', "%$keySearch%");
			})
			->get();
		return $resultSearch;
	}

}
