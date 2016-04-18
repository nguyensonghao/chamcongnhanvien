<?php 
	/*
	</copyright>
		<author>NguyenSongHao</author>
		<email>nguyensonghao974@gmail.com</email>
		<date-create>2015-10-20</date-create>
		<date-update>2015-11-10</date-update>
		<summary>Controller quan li tuong tac voi tai khoan nguoi dung cua he thong</summary>
	*/

?>

<?php 


class AcountController extends BaseController {

	public function showLogin () {
		return View::make('login');
	}

	public function showChangePassword () {
		return View::make('template.change-password');
	}

	public function actionLogout () {
		Auth::logout();
		return Redirect::to('login')->with('error', 'Bạn vừa đăng đăng xuất');
	}

	public function actionLogin () {
		$username = $_POST['username'];
		$password = $_POST['password'];

		// validate data 
		if ($username == null || $password == null) {
			return Redirect::back()->with('error', 'Hãy nhập đầy đủ thông tin khi đăng nhập');
			// return screen login with error -2 => validate fails
		} else {
			if (Auth::attempt(array('username' => $username, 'password' => $password))) {
				// login success
				return Redirect::to('user/add')->with('notify', 'Đăng nhập thành công');
			} else {
				// login fails
				return Redirect::back()->with('error', 'Tài khoản hoặc mật khẩu không tồn tại');
			}
		}
	}

	public function actionChangePassword () {
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		$new_password_confirm = $_POST['new_password_confirm'];
		if (!Input::has('old_password') || !Input::get('new_password') || Input::get('new_password_confirm')) {
			// validate password
			return Redirect::back()->with('error', 'Hãy điền đầy đủ thông tin');
		} else if ($new_password != $new_password_confirm) {
			// check confirm password
			return Redirect::back('change-password')->with('error', 'Mật khẩu nhập lại không khớp');
		} else if (Hash::check(Auth::user()->password, $old_password)) {
			// check old password exist
			return Redirect::back()->with('error', 'Mật khẩu không khớp');
		} else {
			// change password in database
			$user = Auth::user();
			$user->password = Hash::make($new_password);
			$user->save();
			return Redirect::back()->with('notify', 'Thay đổi mật khẩu thành công');
		}
	}

	public function showProfile () {
		$list['user'] = Auth::user();
		return View::make('template.module.information', $list);
	}

	public function actionUpdateProfile () {
		if (!Input::has('username') || !Input::has('fullname') || !Input::has('email')) {
			return Redirect::back()->with('error', 'Điền đầy đủ thông tin trước khi cập nhật');
		} else {
			if (User::where('id', Auth::user()->id)->update(Input::all())) {
				return Redirect::back()->with('notify', 'Cập nhật thông tin tài khoản thành công');
			} else {
				return Redirect::back()->with('error', 'Có lỗi trong quá trình xử lý');
			}
		}
	}

}

?>