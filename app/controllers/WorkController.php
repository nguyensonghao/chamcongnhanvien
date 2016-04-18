<?php 

/*
</copyright>
	<author>NguyenSongHao</author>
	<email>nguyensonghao974@gmail.com</email>
	<date-create>2015-10-20</date-create>
	<date-update>2015-11-10</date-update>
	<summary>Quan li tuong tac cong viec trong he thong</summary>
*/

?>

<?php 

class WorkController extends AuthController {

	public $work;

	public function __construct () {
		parent::__construct();
		$this->work = new Work();
	}

	public function showListWork ($type) {
		// status = 0 => Chưa giao, 1 => Đã giao , 2 => Hoàn thành
		$listWork = $this->work->getListWork($type);
		return View::make('manager.work.list')->with('list_work', $listWork);
	}

	public function showAddWork () {
		$list['list_user'] = User::where('token', 0)->where('lock', 0)->get();
		return View::make('manager.work.add', $list);
	}

	public function showSearchWork () {
		return View::make('manager.work.search');
	}

	public function showUpdateWork () {
		$list['list_work'] = Work::where('status', '<>', 2)->get();
		return View::make('manager.work.update', $list);
	}

	public function showGiveWork () {
		$list['list_work'] = Work::where('status', 0)->get();
		$list['list_user'] = User::where('token', 0)->where('lock', 0)->get();
		return View::make('manager.work.give', $list);
	}

	public function showRateWork () {
		$list['listWork'] = $this->work->getListRateWork();
		return View::make('manager.work.rate', $list);
	}

	public function showRateWorkDetail ($id) {
		$list['work'] = $this->work->getWorkbyId($id);
		$list['listLevel'] = Level::get();
		return View::make('manager.work.rate-detail', $list);	
	}

	public function showDetailWork ($id) {
		$list['work'] = $this->work->getWorkbyId($id);
		return View::make('manager.work.detail-work', $list);	
	}

	public function actionDeleteWork ($id) {
		if (Work::where('id', $id)->delete()) {
			return Redirect::back()->with('notify', 'Xóa công việc thành công');
		} else {
			return Redirect::back()->with('error', 'Có lỗi trong quá trình xử lý');
		}		
	}

	public function actionAddWork () {
		if (!Input::has('name') || !Input::has('note')) {
			return Redirect::back()->with('error', 'Điền đầy đủ thông tin trước khi thêm');
		} else {
			// Nếu trường người được giao chống thì status của công việc là null
			$work = Input::all();
			if (Input::get('username') == null || Input::get('username') == '') {
				$work = new Work();
				$work->name = Input::get('name');
				$work->note = Input::get('note');
				$work->userId = -1;
				$work->status = 0;
				$work->dateStart = date("Y-m-d H:i:s");
				if ($work->save()) {
					return Redirect::back()->with('notify', "Thêm công việc thành công");
				} else {
					return Redirect::back()->with('error', "Có lỗi trong quá trình xử lý");
				}
			} else {
				$work = new Work();
				$work->name = Input::get('name');
				$work->note = Input::get('note');
				$work->userId = User::where('username', Input::get('username'))->first()->id;
				$work->status = 1;
				$work->dateStart = date("Y-m-d H:i:s");
				if ($work->save()) {
					return Redirect::back()->with('notify', "Thêm công việc thành công");
				} else {
					return Redirect::back()->with('error', "Có lỗi trong quá trình xử lý");
				}
			}						
		}
		
	}

	public function actionSearchWork () {
		// Tìm kiếm theo tên người nhận công việc hoặc tên công việc
		$keySearch = Input::get('key_search');
		if (!Input::has('key_search')) {
			return Redirect::back()->with('error', "Hãy điền từ khóa trước khi tìm kiếm");
		} else {
			$resultSearch = $this->work->searchbyKey($keySearch);
			return Redirect::back()->with('resultSearch', $resultSearch);
		}
	}

	public function actionGiveWork () {
		// Hàm xử lí giao công việc
		$username = Input::get('username');
		$userId = User::where('username', $username)->first()->id;
		if (Work::where('name', Input::get('name'))
				->update(array ('userId' => $userId, 'status' => 1))) {
			return Redirect::back()->with('notify', 'Giao công việc thành công');	
		} else {
			return Redirect::back()->with('error', 'Có lỗi trong quá trình xử lý');
		}
	}

	public function actionGetWorkByName () {
		$workName = $_POST['work_name'];
		$resultWork = $this->work->getWorkbyName($workName);
		return Response::json($resultWork);
	}

	public function actionUpdateWork () {
		if (!Input::has('workId') || !Input::has('name') || !Input::has('note')) {
			return Redirect::back()->with('error', 'Điền đầy đủ thông tin trước khi cập nhật công việc');
		} else {
			if (Work::where('id', Input::get('workId'))
				->update(array('name' => Input::get('name'), 'note' => Input::get('note')))) {
				return Redirect::back()->with('notify', 'Cập nhật công việc thành công');
			} else {
				return Redirect::back()->with('error', 'Có lỗi trong quá trình xử lý');
			}			
		}
	}

	public function actionRateWork () {
		$workId = Input::get('workId');
		$noteRate = Input::get('noteRate');
		$level = Input::get('level');
		if (Work::where('id', $workId)
			->update(array('noteRate' => $noteRate, 'level' => $level, 'status' => 2)) ) {
			return Redirect::back()->with('notify', 'Đánh giá công việc thành công');
		} else {
			return Redirect::back()->with('error', 'Có lỗi trong quá trình xử lý');
		}
	}


}

?>