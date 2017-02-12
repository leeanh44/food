<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Input;
use Validator;
use Auth;
use Session;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/book';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected $redirectAfterLogout = '/user/book';
    protected $redirectAfterLogin = '/user/book';

    public function logout(Request $request)
    {   
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect($this->redirectAfterLogout);
    }

    public function login() {
    // Getting all post data
    $data = Input::all();
    // Applying validation rules.
    $rules = array(
        'email' => 'required|email',
        'password' => 'required|min:6',
         );
    $validator = Validator::make($data, $rules);
    if ($validator->fails()){
      // If validation falis redirect back to login.
      return Redirect::to('/user/book')->withInput(Input::except('password'))->withErrors($validator);
    }
    else {
      $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
          );
      // doing login.
      if (Auth::validate($userdata)) {
        if (Auth::attempt($userdata)) {
            Session::flash('success', trans('Đăng nhập thành công!'));
          return Redirect::intended('/user/book');
        }
      } 
      else {
        // if any error send back with message.
            Session::flash('success', trans('Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại!')); 
        return Redirect::intended('/user/book');
      }
    }
  }


}
