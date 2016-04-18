<?php 

/*
</copyright>
	<author>NguyenSongHao</author>
	<email>nguyensonghao974@gmail.com</email>
	<date-create>2015-10-20</date-create>
	<date-update>2015-11-10</date-update>
	<summary>Quan li tuong tac nhan vien trong he thong</summary>
*/

?>

<?php 

class EmployeeController extends AuthController {
	public $user;

	public function __construct () {
		parent::__construct();
		$this->user = new User();
	}

	public function showAddEmployee () {
		$list['listPosition'] = Position::get();
		return View::make('manager.user.add', $list);
	}

	public function showSearchEmployee () {
		return View::make('manager.user.search');
	}

	public function showUpdateEmployee () {
		$list['listUser'] = User::where('lock', 0)->where('token', 0)->get();
		return View::make('manager.user.rate', $list);
	}

	public function showListEmployee ($type) {
		$listUser = $this->user->getListEmployee($type);
		return View::make('manager.user.list')->with('listUser', $listUser);
	}

	public function showCheckGoEmployee () {
		$list['listUser'] = $this->user->getListUserCheckGo();
		return View::make('manager.user.check-go', $list);
	}

	public function showCheckBackEmployee () {
		$list['listUser'] = $this->user->getListUserCheckBack();
		return View::make('manager.user.check-back', $list);
	}

	public function actionDeleteEmployee ($id) {
		if (User::where('id', $id)->delete()) {
			return Redirect::back()->with('notify', 'Xóa tài khoản thành công');
		} else {
			return Redirect::back()->with('error', 'Có lỗi trong quá trình xử lý');
		}		
	}

	public function actionBlockEmployee ($id) {
		if (User::where('id', $id)->update(array('lock'=> 1))) {
			return Redirect::back()->with('notify', 'Khóa tài khoản thành công ');
		} else {
			return Redirect::back()->with('error', 'Có lỗi trong quá trình xử lý');
		}
	}

	public function actionUnlockEmployee ($id) {
		if (User::where('id', $id)->update(array('lock'=> 0))) {
			return Redirect::back()->with('notify', 'Mở khóa người dùng thành công');
		} else {
			return Redirect::back()->with('error', 'Có lỗi trong quá trình xử lý');
		}		
	}

	public function actionAddEmployee () {
		if (!Input::has('username') || !Input::has('password') || !Input::has('email') || !Input::has('fullname')) {
			// Validate form
			return Redirect::back()->with('error', 'Điền đầy đủ thông tin trước khi thêm nhân viên');
		} else if (Input::get('password') != Input::get('password_confirm')) {
			// Kiểm tra mật khẩu có trùng nhau
			return Redirect::back()->with('error', 'Mật khẩu nhập lại không khớp');
		} else {
			// Kiểm tra tồn tại tài khoản chưa
			$numberUser = User::where('username', Input::get('username'))->where('token', 0)->count();
			if ($numberUser == 0) {
				$user = new User();
				$user->username = Input::get('username');
				$user->email = Input::get('email');
				$user->fullname = Input::get('fullname');
				$user->password = Hash::make(Input::get('password'));
				$user->token = 0;
				$user->status = 0;
				$user->lock = 0;
				$user->position = Input::get('position');
				if ($user->save()) {
					return Redirect::back()->with('notify', 'Thêm nhân viên thành công');
				} else {
					return Redirect::back()->with('error', 'Có lỗi trong quá trình xử lý');
				}				
			} else {
				return Redirect::back()->with('error', 'Nhân viên này đã tồn tại');
			}
		}
	}

	public function actionSearchEmployee () {
		if (!Input::has('key_search'))
			return Redirect::back()->with('error', 'Hãy nhập đầy đủ thông tin trước khi tìm kiếm');

		$keySearch = Input::get('key_search');
		$resultSearch = $this->user->searchbyKey($keySearch);
		return Redirect::to('user/search')->with('resultSearch', $resultSearch);
	}

	public function actionGetEmployeeByUsername () {
		// Trả về danh sách công việc đã hoàn thành dạng json
		$username = Input::get('username');
		$userId = User::where('username', $username)->first()->id;
		$listWork = Work::where('userId', $userId)->where('status', 0)->get();
		return Response::json($listWork);
	}	

	public function actionCheckGo () {
		$result = array();
		$time = $_POST['time'];
		$userId = $_POST['userId'];
		$date = date("Y-m-d");
		if ($time == null || $userId == null) {
			$result['flag'] = -1;
		} if($time > '08::30') {
			$result['flag'] = -2;
		}else {
			if (TimeKeep::where('dateCurrent', $date)->where('userId', $userId)->count() == 0) {
				$timekeep = new TimeKeep();
				$timekeep->userId = $userId;
				$timekeep->type = 0;
				$timekeep->dateCurrent = $date;
				$timekeep->time = $time;
				if ($timekeep->save()) {
					$result['flag'] = 1;
				} else {
					$result['flag'] = -3;	
				}
			} else {
				$result['flag'] = -4;
			}
			
		}

		return Response::json($result);
	}

	public function actionCheckBack () {
		$result = array();
		$time = $_POST['time'];
		$userId = $_POST['userId'];
		$date = date("Y-m-d");
		if ($time == null || $userId == null) {
			$result['flag'] = -1;
		} if($time < '17::30') {
			$result['flag'] = -2;
		}else {
			if (TimeKeep::where('dateCurrent', $date)->where('userId', $userId)
				->where('type', 1)->count() == 0) {
				$timekeep = new TimeKeep();
				$timekeep->userId = $userId;
				$timekeep->type = 1;
				$timekeep->dateCurrent = $date;
				$timekeep->time = $time;
				if ($timekeep->save()) {
					$result['flag'] = 1;
				} else {
					$result['flag'] = -3;	
				}
			} else {
				$result['flag'] = -4;
			}
			
		}

		return Response::json($result);
	}


}

?>