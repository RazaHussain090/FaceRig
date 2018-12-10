<?php
namespace App\Http\Controllers;
//_______________________________________________________________________________

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

//_______________________________________________________________________________

class UserController extends Controller
{


  public function postSignUp(Request $request)
  {
    $this->validate($request,[
      'email' => 'required|email|unique:users',
      'username' => 'required|max:120',
      'password' => 'required|min:4'

    ]);
    //This is the variables for holding the incomming data from views
    $email = $request['email'];
    $username = $request['username'];
    $password = bcrypt($request['password']);

    //these are the variables for inputting into the database
    $user = new User();
    $user->email = $email;
    $user->username = $username;
    $user->password = $password;

    //This will write them all to the database
    $user->save();
    Auth::login($user);
    //redirecting to the same page in retuen
    return redirect()->route('dashboard');

  }

  public function postSignIn(Request $request)
  {
    $this->validate($request,[
      'email' => 'required',
      'password' => 'required'

    ]);
    if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']]))
    {
      return redirect()->route('dashboard');
    }
    return redirect()->back();
  }

  public function getLogout()
  {
    Auth::logout();
    return redirect()->route('home');
  }

  public function getAccount(){
    return view('account', ['user' => Auth::user()]);
  }

}

 ?>
