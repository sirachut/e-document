@extends('documents.app')

@section('content')
<div class="bghome">

    <!-- Content -->
    <div class="container">
        <!--Grid row-->
        <div class="row" style="background:white border-radius: 20px:">

             <!-- Main Carousel Section Start -->
    <div id="main-slide" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#main-slide" data-slide-to="0" class="active"></li>

        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="responsive" src="{{url('/image/bg_up.jpg')}}" alt="First slide" style="weight: 600px;" important;>
            <div class="carousel-caption d-md-block">
              <h1 class="animated wow fadeInDown hero-heading" data-wow-delay=".4s">Crafted with Bootstrap 4</h1>
              <h5 class="animated fadeInUp wow hero-sub-heading" data-wow-delay=".6s">Material Design Meets With The Power of Bootstrap 4</h5>
              <a href="javascript:void(0)" class="animated fadeInUp wow btn btn-common" data-wow-delay=".8s"><i class="material-icons mdi mdi-lightbulb-outline"></i> Explore<div class="ripple-container"></div></a>
            </div>
          </div>
         
        </div>
      </div>
      <!-- Main Carousel Section End -->

            {{-- Main Carousel Section Start --}}
            <div class="carousel-item">
                <img class="d-block w-100" src="{{url('/image/bg_up.jpg')}}" alt="Third slide">
                <div class="carousel-caption d-md-block">
                  <h1 class="animated wow fadeInDown hero-heading" data-wow-delay=".6s">Multi-purpose Template</h1>
                  <h5 class="animated fadeInUp wow hero-sub-heading" data-wow-delay=".8s">Ready to Use for Business, Agency, Startup, Portfolio Sites and More...</h5>
                  <a href="javascript:void(0)" class="animated fadeInUp wow btn btn-common" data-wow-delay=".8s"><i class="material-icons mdi mdi-arrow-collapse-down"></i> Download Now</a>
                </div>
              </div>
            {{-- End Main Carousel Section Start --}}



            <!--Grid column-->
            <div class="col-md-8 white-text text-center text-md-left mt-xl-5 mb-5" style="background-color:white;padding:20px; border-radius:25px" data-wow-delay="0.3s">
                <h1 class="h1-responsive font-weight mt-sm-5">E-document </h1>
                <h3>ระบบสารบัญเอกสาร มหาวิทยาลัยพะเยา</h3>
                <hr class="hr-light">
                <h6 class="mb-4 ">e-document เป็นระบบติดตามเอกสารทางราชการของมหาวิทยาลัยพะเยา ผ่านระบบ online ทั้งเอกสารภายใน และเอกสารภายนอก
                    นอกจากนี้ยังสามารถ ตรวจสอบประวัติของเอกสารที่เข้าสู่ระบบ e-document ทั้งหมดได้
                </h6>
                <button type="button" class="btn btn-light"> <i class="fas fa-address-card"></i> &nbsp; เกี่ยวกับเรา</button>
                <button type="button" class="btn btn-link"> <i class="fab fa-leanpub"></i>&nbsp; วิธีการใช้งาน</button>
            </div>
            <!--Grid column-->
            {{-- <div class="col-md-1"></div>s --}}
            <div class="col-md-4" style="">
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
            <!-- Content -->
</div>


@endsection

