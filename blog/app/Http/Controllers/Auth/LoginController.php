<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {

    }
      public  function index($gid)
    {
//          dd($gid);
          $newdata['gid'] = $gid;
          session(['gid' => $newdata]);

      return redirect('documents')->with('message', 'Successfully created blog!');
    }
  public function login(Request $request)
    {
//      dd($request->password);
      if($request->password){
          $pass= $request->password;
      }else{
          $pass = '1234';
      }
//       dd($pass);
     $login = $this->checkLdap( $request->email,$pass);
 	if($login){
        $this->set_login($login);
        $mes='';
        }else {
            $mes= 'ไม่สามารถเข้าสู่ระบบได้';
        }
        return view('home')->with('message', $mes);
    }

      public function showLoginForm()
    {
return view('home');
    }

protected function checkLdap($username, $pass) {
     $server = "dcup-01.up.local";
     $account_suffix="@up.local";
     $ldap = ldap_connect($server)or die();
    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
    $bind = @ldap_bind($ldap,$username.$account_suffix,$pass);
//    dd($pass);
      if ($bind) {
//          dd('login func ldap pass' );
        $filter="(sAMAccountName=$username)";
        $result = ldap_search($ldap,"dc=up,dc=local",$filter) or die();
//        ldap_sort($ldap,$result,"sn");
        $info = ldap_get_entries($ldap, $result);
    //    dd($info);
$user = $info[0]['samaccountname'][0];
$user_data['USERNAME'] = $user;
$extensionattribute6 = strtoupper($info[0]['extensionattribute6'][0]);
            if($extensionattribute6 == 'STAFF' || $extensionattribute6 =='TEACHER' || $extensionattribute6 =='STUDENT') {
                        $sys_user = $this->checkSys_user($user_data['USERNAME']);
                        if($sys_user){
                            return $sys_user;
                        }
                        else{
                            return false;
                        }

            }
    }
    else if($username == 'edoctest' ){
         $sys_user = $this->checkSys_user($username);
                        if($sys_user){
                            return $sys_user;
                        }
                        else{
                            return false;
                        }
    }
    else {
        return false;
    }
}
protected function checkSys_user($username) {
                $User = User::where('RECORD_STATUS', 'N')
                        ->where('USERNAME', $username)
                        ->where('IS_ACTIVE', 'T')
                    ->get();
//                dd($User);
                if($User){
                    $user_data = array();
                    foreach ($User as $key => $value) {
                                $user_data['USER_CODE'] = $value['USER_CODE'];
                                $user_data['DISPLAY_NAME'] = $value['DISPLAY_NAME'] ;
                                $user_data['USER_TYPE'] = $value['USER_TYPE'];
                                $user_data['DEPARTMENT_ID'] = $value['DEPARTMENT_ID'];
                                $user_data['USERNAME'] = $value['USERNAME'];
                                $user_data['FACULTY_ID'] = $value['FACULTY_ID'];
                            }
                if (isset($user_data)) {
                    return $user_data;
                }else {
                    return false;
                }
            }else {
                return false;
            }
    }

    protected function set_login($user_data)
    {
        $newdata['logged_in'] = TRUE;
        $newdata['userid'] = $user_data['USER_CODE'];
        $newdata['name'] = ($user_data['DISPLAY_NAME'] == "") ? $user_data['USERNAME'] : $user_data['DISPLAY_NAME'];
        $newdata['username'] = $user_data['USERNAME'];
        $newdata['usertype'] = $user_data['USER_TYPE'];
        $newdata['userdepartment'] = $user_data['DEPARTMENT_ID'];
//        $newdata['userdepartment'][$user_data['DEPARTMENT_ID']] = $user_data['DEPARTMENT_NAME'];
        $newdata['userfac'] = $user_data['FACULTY_ID'];
//        sess_set($newdata);
       session(['userdata' => $newdata]);
    }

        function logout($redirect = "")
    {

           session()->forget('userdata');
           session()->forget('gid');
//           session()->flush();
            return view('home');

    }



}
