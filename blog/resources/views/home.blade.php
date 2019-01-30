@extends('layouts.app')

@section('content')

<style>
    div.bg{
        background-image:url('');
        height: 100%;
        background-repeat: no-repeat;
    }
</style>

<div class="bg">

    <!-- Content -->
    <div class="container">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-8 white-text text-center text-md-left mt-xl-5 mb-5 wow fadeInLeft" data-wow-delay="0.3s">
                    <h1 class="h1-responsive font-weight mt-sm-5">E-document </h1>
                    <h3>ระบบสารบัญเอกสาร มหาวิทยาลัยพะเยา</h3>
                    <hr class="hr-light">
                    <h6 class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt
                    dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae
                    iste.</h6>
                    <button type="button" class="btn btn-light"> <i class="fas fa-address-card"></i> &nbsp; เกี่ยวกับเรา</button>
                    <button type="button" class="btn btn-link"> <i class="fab fa-leanpub"></i>&nbsp; วิธีการใช้งาน</button>
                </div>
                <!--Grid column-->

            <div class="col-md-4">
            <!-- Default form login -->
                <form class=" p-5">

                    <p class="h4 mb-4">เข้าสู่ระบบ</p>

                    <!-- Email -->
                    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Username">

                    <!-- Password -->
                    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">
                    <button class="btn btn-success btn-block my-4" type="submit">เข้าสู่ระบบ</button>


                    <p>ไม่สามารถลงชื่อเข้าใช้ได้หรือลืมรหัสผ่าน กรุณาติดต่อ
                        <a href="">Admin</a>
                    </p>

                </form>

            </div>
                    <!--Grid column-->
        </div>
                <!--Grid row-->
    </div>
                <!-- Content -->
</div>


@endsection

