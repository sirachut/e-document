@extends('documents.app')

@section('content')

@php
    use App\Models\Sys_Department;
    $userdata = Session::get('userdata');
    // print_r($userdata);
@endphp

<div class="row align-items-center">
    <div class="col-sm-8 wow animated fadeInRight">
        <h1 class="h1-responsive font-weight mt-sm-5">E-document </h1>
        <h3>ระบบสารบัญเอกสาร มหาวิทยาลัยพะเยา</h3>

        <h4 style="font-size:16px">e-document เป็นระบบติดตามเอกสารทางราชการของมหาวิทยาลัยพะเยา ผ่านระบบ online ทั้งเอกสารภายใน และเอกสารภายนอก
            นอกจากนี้ยังสามารถ ตรวจสอบประวัติของเอกสารที่เข้าสู่ระบบ e-document ทั้งหมดได้
        </h4>
        <button type="button" class="btn btn-light"> <i class="fas fa-address-card"></i> &nbsp; เกี่ยวกับเรา</button>
        <button type="button" class="btn btn-link"> <i class="fab fa-leanpub"></i>&nbsp; วิธีการใช้งาน</button>
    </div>
        @if (!$userdata['logged_in'])

    <div class="col-sm-4">


            <form class=" p-5" id="login_form" name="login_form" method="POST" action="{{ route('login') }}">
                @csrf

                <p class="h4 mb-4">เข้าสู่ระบบ</p>
                <div class="bs-callout bs-callout-info">
                    <h4 style="margin-bottom: 0px">
                        @if (isset($message))
                            {{ $message }}
                        @endif
                    </h4>
                </div>
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

                <div id="status"></div>
            </form>
    </div>
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

@endsection
