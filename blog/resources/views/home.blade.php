@extends('documents.app')

@section('content')

<style>
    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
        padding: 60px;
    }
    html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Sarabun', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
/*
            .content {
                text-align: center;
            } */
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .logogendoc{
                max-width: 100%;
                height: auto;
                padding-bottom: 20px;
            }
</style>

@php
    use App\Models\Sys_Department;
    $userdata = Session::get('userdata');
    // print_r($userdata);
@endphp

<div class="row align-items-center flex-center height" style="padding:30% 0px 25px 0px;"
    <div class="col-sm-7 wow animated fadeInRight height">
        <h1 class="h1-responsive font-weight ">E-document </h1>
        <h3>ระบบสารบัญเอกสาร มหาวิทยาลัยพะเยา</h3>

        <h4 style="font-size:16px">e-document เป็นระบบติดตามเอกสารทางราชการของมหาวิทยาลัยพะเยา ผ่านระบบ online ทั้งเอกสารภายใน และเอกสารภายนอก
            นอกจากนี้ยังสามารถ ตรวจสอบประวัติของเอกสารที่เข้าสู่ระบบ e-document ทั้งหมดได้
        </h4>
        <button type="button" class="btn btn-light"> <i class="fas fa-address-card"></i> &nbsp; เกี่ยวกับเรา</button>
        <button type="button" class="btn btn-link"> <i class="fab fa-leanpub"></i>&nbsp; วิธีการใช้งาน</button>
    </div>

    @if (!$userdata['logged_in'])

    <div class="col-sm-5">

            <div class="card">
                <div class="card-header">
                    เข้าสู่ระบบ
                </div>
                <div class="card-body">
                        <form class="" id="login_form" name="login_form" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label for="email" class="col-form-label">Username </label>
                                        </div>
                                        <div class="col-sm-9    ">
                                                <input class="form-control" name="email" id="tqf_username" type="text" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                                <label for="password" class="col-form-label">Password </label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="password" type="password" id="tqf_password" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div id="status"></div>
                                @if (isset($message))
                                    <p style="text-align:center; color:red" class="form-group">{{ $message }}</p>
                                @endif
                                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnLogin" >ล็อกอิน</b></button>

                            </form>
                            @else
                            <div class="col-sm-4">

                                <div class="bs-callout bs-callout-info">
                                    <h4 style="margin-bottom: 0px">
                                        <b>ผู้ใช้งาน :</b>
                                        <?= $userdata['username']; ?>
                                    </h4>
                                </div>

                                <div class="br"></div>
                                <div class="list-group" style="margin-bottom: 0px">
                                <a href="javascript:void(0);" class="list-group-item disabled" style=" color: #4d4b4b; font-weight: bold">เลือกสิทธิ์การใช้งาน</a>

                                @php
                                    $user_group = $userdata['userdepartment'];
                                    $user_group= explode(",",$user_group);
                                @endphp

                                @if (!empty($user_group) && sizeof($user_group) > 0)

                                    @php
                                        $i_group = 1;
                                    @endphp

                                    @foreach ($user_group as $key => $gid)
                                        @php
                                            $Sys_Department = Sys_Department::findOrFail($gid);
                                        @endphp
                                            <a href="<?= url('').'/group/'.$gid; ?>" class="list-group-item">
                                                <?= $i_group . '. ' . $Sys_Department->DEPARTMENT_NAME; ?>
                                            </a>
                                        @php
                                            $i_group++;
                                        @endphp
                                    @endforeach
                                </div>
                                @endif

                                {{-- <a href="javascript:void(0);" class="list-group-item" style="text-align: center; color: #b500d0">ไม่พบกลุ่มผู้ใช้งานในระบบ</a> --}}
                                <a href="<?= url('').'/logout'; ?>"  style=" color: #cc0000; font-weight: bold" class="list-group-item"> ออกจากระบบ</a>
                            @endif
                </div>
            </div>
    </div>

    </div>

@endsection
