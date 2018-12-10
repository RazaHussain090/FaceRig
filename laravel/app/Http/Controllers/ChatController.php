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

class ChatController extends Controller
{

  public function StartChat()
  {

      return redirect()->route('chat');
  }


}

 ?>
