@extends('documents.app')

@section('content')
<div class="bghome">
<link rel="stylesheet" href="/css/home_css_pong.css">
<!-- Content -->
<!-- Call to action Section -->
<section class="call-to-action-section">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-md-12 col-lg-7 col-xs-12 text-left wow animated fadeInLeft titiindex1 " data-wow-delay=".2s">
              <h1> </h1><br>
    
              <div class="col-md-8 white-text text-center text-md-left mt-xl-5 mb-5 wow animated fadeInRight" >
                    <h1 class="h1-responsive font-weight mt-sm-5">E-document </h1>
                    <h3>ระบบสารบัญเอกสาร มหาวิทยาลัยพะเยา</h3>
                   
                    <h4 class="mb-4 ">e-document เป็นระบบติดตามเอกสารทางราชการของมหาวิทยาลัยพะเยา ผ่านระบบ online ทั้งเอกสารภายใน และเอกสารภายนอก
                        นอกจากนี้ยังสามารถ ตรวจสอบประวัติของเอกสารที่เข้าสู่ระบบ e-document ทั้งหมดได้
                    </h4>
                    <button type="button" class="btn btn-light"> <i class="fas fa-address-card"></i> &nbsp; เกี่ยวกับเรา</button>
                    <button type="button" class="btn btn-link"> <i class="fab fa-leanpub"></i>&nbsp; วิธีการใช้งาน</button>
                </div>
            </div>
            
            <div class="col-md-12 col-lg-4 col-xs-12 mt-4 text-left wow animated fadeInleft row" data-wow-delay=".3s"><br>
              <!-- Login -->
              <div class="container margincontenthome">

                    <!--Grid row-->
                    <div class="row" style="background:white border-radius: 20px:">
                        <!--Grid column-->
                        
                        <!--Grid column-->
                        {{-- <div class="col-md-1"></div>s --}}
                        <div class="col-md-12">
                            <!--CardLogin-->
                            
                        <!-- Default form login -->
                            {{-- <form class=" p-5">
            
                                <p class="h4 mb-4">เข้าสู่ระบบ</p>
            
                                <!-- Email -->
                                <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Username">
            
                                <!-- Password -->
                                <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">
                                <button class="btn btn-success btn-block my-4" type="submit">เข้าสู่ระบบ</button>
            
            
                                <p>ไม่สามารถลงชื่อเข้าใช้ได้หรือลืมรหัสผ่าน กรุณาติดต่อ
                                    <a href="">Admin</a>
                                </p>
            
                            </form> --}}
            
                            <?php
                                use App\Models\Sys_Department;
                                $userdata = Session::get('userdata');
                                // print_r($userdata);
                                //    echo $userdata['logged_in'];
                            ?>
            
                            <?php
            
                                if (!$userdata['logged_in']) {
            
                            ?>
            
                                    <form class=" p-5" id="login_form" name="login_form" method="POST" action="{{ route('login') }}">
            
                                        @csrf
            
                                        <p class="h4 mb-4">เข้าสู่ระบบ</p>
            
                                        <fieldset>
                                            <div class="bs-callout bs-callout-info">
                                                <h4 style="margin-bottom: 0px">
                                                    <?php
                                                        if (isset($message)){
                                                            echo $message;
                                                        }
                                                    ?>
                                                </h4>
                                            </div>
            
                                            <div class="br"></div>
                                            <div id="status"></div>
            
                                                <div class="form-group input-group">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-user"></span>
                                                        <input class="form-control" placeholder="Username" name="email" id="tqf_username" type="text" autocomplete="off">
                                                </div>
            
                                                <div class="form-group input-group">
                                                    <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-lock"></span>
                                                    <input class="form-control" placeholder="Password" name="password" type="password" id="tqf_password" autocomplete="off">
                                                </div>
            
                                                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnLogin" ><b>User Login</b></button>
            
                                        </fieldset>
                                    </form>
            
                            <?php
            
                                } else {
            
                            ?>
            
                                    <div class="bs-callout bs-callout-info">
                                        <h4 style="margin-bottom: 0px">
                                            <b>ผู้ใช้งาน :</b>
                                            <?= $userdata['username']; ?>
                                        </h4>
                                    </div>
            
                                    <div class="br"></div>
                                    <div class="list-group" style="margin-bottom: 0px">
                                        <a href="javascript:void(0);" class="list-group-item disabled" style=" color: #4d4b4b; font-weight: bold">เลือกสิทธิ์การใช้งาน</a>
            
                                        <?php
            
                                            $user_group = $userdata['userdepartment'];
                                            $user_group= explode(",",$user_group);
            
                                            if (!empty($user_group) && sizeof($user_group) > 0) {
            
                                                $i_group = 1;
            
                                                foreach ($user_group as $key => $gid) {
            
                                                    $Sys_Department = Sys_Department::findOrFail($gid);
                                        ?>
                                                    <a href="<?= url('').'/group/'.$gid; ?>" class="list-group-item">
                                                        <?= $i_group . '. ' . $Sys_Department->DEPARTMENT_NAME; ?>
                                                    </a>
            
                                                    <?php
                                                        $i_group++;
                                                }
            
                                            } else {
            
                                                    ?>
            
                                                    <a href="javascript:void(0);" class="list-group-item" style="text-align: center; color: #b500d0">ไม่พบกลุ่มผู้ใช้งานในระบบ</a>
            
                                        <?php
            
                                            }
            
                                        ?>
            
                                        <a href="<?= url('').'/logout'; ?>"  style=" color: #cc0000; font-weight: bold" class="list-group-item"> ออกจากระบบ</a>
            
                                    </div>
            
                            <?php
            
                                }
            
                            ?>
            
                        </div>
                            <!--Grid column-->
                    </div>
                        <!--Grid row-->
                </div>
                      
    
    
              <!-- End Login -->
            </div>
          </div>
        </div>
      </section>
      <!-- Call to action Section End -->

   
      


@endsection

