<?php 

class Work extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'db_works';
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function getListWork ($type) {
		switch ($type) {
		    case 1:
		        $listWork = Work::select('db_works.id as workId', 'username', 'name', 'dateStart', 'note', 'db_works.status as workStatus', 'noteRate')
		        ->join('users', 'users.id', '=', 'db_works.userId', 'left outer')
		        ->paginate(10);
		        break;
		    case 2:
		        $listWork = Work::select('db_works.id as workId', 'username', 'name', 'dateStart', 'note', 'db_works.status as workStatus', 'noteRate')
		        ->join('users', 'users.id', '=', 'db_works.userId', 'left outer')
		        ->where('db_works.status', 1)->paginate(10);
		        break;
		    case 3:
		        $listWork = Work::select('db_works.id as workId', 'username', 'name', 'dateStart', 'note', 'db_works.status as workStatus', 'noteRate')
		        ->join('users', 'users.id', '=', 'db_works.userId', 'left outer')
		        ->where('db_works.status', 0)->paginate(10);
		        break;
		    default:
		        $listWork = Work::select('db_works.id as workId', 'username', 'name', 'dateStart', 'note', 'db_works.status as workStatus', 'noteRate')
		        ->join('users', 'users.id', '=', 'db_works.userId', 'left outer')
		        ->where('db_works.status', 2)->paginate(10);
		}
		return $listWork;
	}

	public function getWorkbyId ($id) {
		$work = Work::select('db_works.id as workId', 'username', 'name', 'dateStart', 'note', 'db_works.status as workStatus', 'noteRate')
		->where('db_works.id', $id)
		->join('users', 'db_works.userId', '=', 'users.id')->first();
		return $work;
	}

	public function getWorkbyName ($work_name) {
		$work = Work::select('db_works.id as workId', 'name', 'note', 'dateStart', 'username')
		->join('users', 'db_works.userId', '=', 'users.id', 'left outer')
		->where('name', $work_name)->first();
		return $work;
	}

	public function getListRateWork () {
		$listWork = Work::select('db_works.id as workId', 'username', 'name', 'dateStart')
		->where('db_works.status', 1)
		->join('users', 'db_works.userId', '=', 'users.id')->paginate(10);
		return $listWork;
	}

	public function searchbyKey ($keySearch) {
		$resultSearch = Work::select('db_works.id as workId', 'username', 'name', 'dateStart', 'note', 'db_works.status as workStatus', 'noteRate')
		->join('users', 'db_works.userId', '=', 'users.id', 'left outer')
		->where(function ($query) use ($keySearch) {
			$query->orWhere('users.username','like', "%$keySearch%")
			->orWhere('db_works.name', 'like', "%$keySearch%")
			->orWhere('db_works.note', 'like', "%$keySearch%");
		})
		->get();
		return $resultSearch;
	}

}


?>