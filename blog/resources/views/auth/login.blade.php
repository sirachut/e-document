@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
<!--                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>


                            </div>
                        </div>
                    </form>-->
<?php
  use App\Models\Sys_Department;
$userdata = Session::get('userdata');
// dd($userdata);
//    echo $userdata['logged_in'];



?>
<?php if (!$userdata['logged_in']) { ?>
    <form id="login_form" name="login_form" method="POST" action="{{ route('login') }}">
         @csrf
        <fieldset>
               <div class="bs-callout bs-callout-info">
        <h4 style="margin-bottom: 0px"><?php if (isset($message)){
            echo $message;
        }
            ?></h4>
    </div>
    <div class="br"></div>
            <div id="status"></div>
            <div class="form-group input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>

                <input class="form-control" placeholder="Username" name="email" id="tqf_username" type="text" autocomplete="off">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>

                <input class="form-control" placeholder="Password" name="password" type="password" id="tqf_password" autocomplete="off">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnLogin" ><b>User Login</b></button>
        </fieldset>
    </form>
<?php  } else { ?>
    <div class="bs-callout bs-callout-info">
        <h4 style="margin-bottom: 0px"><b>ผู้ใช้งาน :</b> <?= $userdata['username']; ?></h4>
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
                <a href="<?= url('').'/group/'.$gid; ?>" class="list-group-item"><?= $i_group . '. ' . $Sys_Department->DEPARTMENT_NAME; ?></a>
                <?php
                $i_group++;
            }
        } else {
            ?>
            <a href="javascript:void(0);" class="list-group-item" style="text-align: center; color: #b500d0">ไม่พบกลุ่มผู้ใช้งานในระบบ</a>
        <?php } ?>
        <a href="<?= url('').'/logout'; ?>"  style=" color: #cc0000; font-weight: bold" class="list-group-item"> ออกจากระบบ</a>
    </div>
<?php } ?>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
