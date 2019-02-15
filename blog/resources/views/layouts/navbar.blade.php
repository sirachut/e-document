@php

    use App\Models\Vw_sys_security_permis;
    $list = Vw_sys_security_permis::where('IS_ACTIVE', 'T')->where('DEPARTMENT_ID', Session::get('gid'))
        ->orderBy('MOD_ORDER', 'ASC')
        ->get();

        $arr_menu_lv0 = array();
        $arr_menu_lv1 = array();
        $arr_menu_lv2 = array();

@endphp

@foreach ($list as $ke => $rs)

   @if ($rs['MOD_LEVEL'] == 0)
        @php
            $arr_menu_lv0[] = array(
                'MOD_ID' => $rs['MOD_ID'],
                'MOD_NAME' => $rs['MOD_NAME'],
                'MOD_PAGE' => $rs['MOD_PAGE'],
            );
        @endphp
   @elseif ($rs['MOD_LEVEL'] == 1)
        @php
            $arr_menu_lv1[$rs['MOD_PARENT_ID']][] = array(
                'MOD_ID' => $rs['MOD_ID'],
                'MOD_NAME' => $rs['MOD_NAME'],
                'MOD_PAGE' => $rs['MOD_PAGE'],
            );
        @endphp
    @else
        @php
            $arr_menu_lv2[$rs['MOD_PARENT_ID']][] = array(
                'MOD_NAME' => $rs['MOD_NAME'],
                'MOD_PAGE' => $rs['MOD_PAGE'],
            );
        @endphp

   @endif

@endforeach

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom" >

    <a class="navbar-icon col-form-label" href="{{ url('/') }}" style="text-decoration:none;">
        <img src="{{ url('/images/UPLogo.png') }}" alt="" style="width: auto ; height: 35px;">
        &nbsp; ระบบสารบัญเอกสาร &nbsp;
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            @foreach ($arr_menu_lv0 as $k0 => $v0)

                @if (!isset($arr_menu_lv1[$v0['MOD_ID']]))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('http://127.0.0.1:8000' . $v1['MOD_PAGE']) }}">
                            @php
                               echo $v0['MOD_NAME'];
                            @endphp
                        </a>
                    </li>

                @else
                    <li class="nav-item dropdown">

                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-align-left"></i> &nbsp;
                            @php
                                echo $v0['MOD_NAME']
                            @endphp
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @foreach ($arr_menu_lv1[$v0['MOD_ID']] as $k1 => $v1)
                                @if (!isset($arr_menu_lv2[$v1['MOD_ID']]))
                                    <a class="dropdown-item" href="{{ URL::to('http://127.0.0.1:8000' . $v1['MOD_PAGE']) }}">
                                        @php
                                            echo $v1['MOD_NAME']
                                        @endphp
                                    </a>
                                @endif
                            @endforeach

                        </div>

                    </li>

                @endif

            @endforeach

        </ul>
    </div>
</nav>
