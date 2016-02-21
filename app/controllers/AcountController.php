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
		return Redirect::to('login')->with('result-logout', 1);
	}

	public function actionLogin () {
		$username = $_POST['username'];
		$password = $_POST['password'];

		// validate data 
		if ($username == null || $password == null) {
			return Redirect::back()->with('result-login', -2);
			// return screen login with error -2 => validate fails
		} else {
			if (Auth::attempt(array('username' => $username, 'password' => $password))) {
				// login success
				return Redirect::to('user/add')->with('result-login', 1);
			} else {
				// login fails
				return Redirect::back()->with('result-login', -1);
			}
		}
	}

	public function actionChangePassword () {
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		$new_password_confirm = $_POST['new_password_confirm'];
		if (!Input::has('old_password') || !Input::get('new_password') || Input::get('new_password_confirm')) {
			// validate password
			return Redirect::back()->with('result-change-password', -1);
		} else if ($new_password != $new_password_confirm) {
			// check confirm password
			return Redirect::back('change-password')->with('result-change-password', -2);
		} else if (Hash::check(Auth::user()->password, $old_password)) {
			// check old password exist
			return Redirect::back()->with('result-change-password', -3);
		} else {
			// change password in database
			$user = Auth::user();
			$user->password = Hash::make($new_password);
			$user->save();
			return Redirect::back()->with('result-change-password', 1);
		}
	}

}

?>