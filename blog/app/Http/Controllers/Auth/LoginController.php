<?php

namespace App\Http\Controllers\Auth;
//use App\Libraries\adLDAP;
//require base_path('App\Libraries\adLDAP.php') ;
use App\Http\Controllers\Controller;
//use Ldap;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {

    }
  public function login(Request $request)
    {
//      dd($request->password);
 	if($this->checkLdap( $request->email,$request->password)!=0){



                        
        }
			else{
                          
                        
                        }
    }
    
      public function showLoginForm()
    {
return view('auth.login');
    }

protected function checkLdap($username, $pass) {
     $server = "dcup-01.up.local";
     $account_suffix="@up.local";
     $ldap = ldap_connect($server)or die();
    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
    $bind = @ldap_bind($ldap,$username.$account_suffix,$pass);;
//    dd($bind);
      if ($bind) {
//          dd('login func ldap pass' );
        $filter="(sAMAccountName=$username)";
        $result = ldap_search($ldap,"dc=up,dc=local",$filter);
//        ldap_sort($ldap,$result,"sn");
        $info = ldap_get_entries($ldap, $result);
        print_r($info);
//        for ($i=0; $i<$info["count"]; $i++)
//        {
//            if($info['count'] > 1)
//                break;
//            echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
//            echo '<pre>';
//            var_dump($info);
//            echo '</pre>';
//            $userDn = $info[$i]["distinguishedname"][0]; 
//        }


    }
}

}
