{{-- @php

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

@php
    use App\Models\Sys_Department;
    $userdata = Session::get('userdata');
    $department = Session::get('DEPARTMENT_NAME')
    // print_r($userdata);
@endphp

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

    <form class="form-inline my-2 my-lg-0">
        เข้าใช้ระบบโดย :
        @php
            echo $userdata['username'];
        @endphp
    </form>
</nav>


<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">
            profile
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">
            buzz
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#references" role="tab" data-toggle="tab">
            references
        </a>
    </li>
</ul>

          <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="profile">
            ...
        </div>
        <div role="tabpanel" class="tab-pane fade" id="buzz">
            bbb
        </div>
        <div role="tabpanel" class="tab-pane fade" id="references">
            ccc
        </div>
    </div> --}}



    <?php
 use App\Models\Vw_sys_security_permis;
            $list = Vw_sys_security_permis::where('IS_ACTIVE', 'T')->where('DEPARTMENT_ID', Session::get('gid'))
                ->orderBy('MOD_ORDER', 'ASC')
                ->get();
                $arr_menu_lv0 = array();
                $arr_menu_lv1 = array();
                $arr_menu_lv2 = array();
//                    while ($rs = $list->FetchRow()) {
foreach($list as $key => $rs){
                    if ($rs['MOD_LEVEL'] == 0) {
                        $arr_menu_lv0[] = array(
                            'MOD_ID' => $rs['MOD_ID'],
                            'MOD_NAME' => $rs['MOD_NAME'],
                            'MOD_PAGE' => $rs['MOD_PAGE'],
                        );
                    } else if ($rs['MOD_LEVEL'] == 1) {
                        $arr_menu_lv1[$rs['MOD_PARENT_ID']][] = array(
                            'MOD_ID' => $rs['MOD_ID'],
                            'MOD_NAME' => $rs['MOD_NAME'],
                            'MOD_PAGE' => $rs['MOD_PAGE'],
                        );
                    } else {
                        $arr_menu_lv2[$rs['MOD_PARENT_ID']][] = array(
                            'MOD_NAME' => $rs['MOD_NAME'],
                            'MOD_PAGE' => $rs['MOD_PAGE'],
                        );
                    }
                }
echo '<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom fixed-top" >';
                echo '<a class="navbar-icon" style="text-decoration:none;" href="' . URL('') . '">' . '<img src="'. url('/images/UPLogo.png').  '"' . ' alt="" style="width: auto ; height: 35px;">' . '&nbsp; ระบบสารบัญเอกสาร &nbsp;'. '</a>';

echo ' <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>'; echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">'; echo '<ul class="navbar-nav mr-auto">';
                foreach ($arr_menu_lv0 as $k0 => $v0) {
                    if (!isset($arr_menu_lv1[$v0['MOD_ID']])) {
                        echo '<li class="nav-item"><a class="nav-link" href="' . URL('') . $v0['MOD_PAGE'] . '">' . $v0['MOD_NAME'] . '</a></li>';
                    } else {
                        echo '<li class="nav-item dropdown">';
                        echo '<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-align-left"></i> &nbsp;' . $v0['MOD_NAME'] .'</a>';
                        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                        foreach ($arr_menu_lv1[$v0['MOD_ID']] as $k1 => $v1) {
                            if (!isset($arr_menu_lv2[$v1['MOD_ID']])) {
                                echo '<a class="dropdown-item" href="' . URL('') . $v1['MOD_PAGE'] . '">' . $v1['MOD_NAME'] . '</a>';
                            } else {
//                                    echo '<li class="dropdown sub-dropdown">';
//                                    echo '<a href=\"javascript:void(null)\" >' . $v1['MOD_NAME'] . ' <span class="caret-right"></span></a>';
//
//                                    echo '<ul class="dropdown-menu sub-menu">';
//                                    foreach ($arr_menu_lv2[$v1['MOD_ID']] as $k2 => $v2) {
//                                        echo '<li><a href="' . URL('') . $v2['MOD_PAGE'] . '">' . $v2['MOD_NAME'] . '</a></li>';
//                                    }
//                                    echo '</ul></li>';
                            }
                        }
                        echo '</div></li>';
                    }
                } echo '</ul>';echo '</div>';echo '</nav>';
                ?>
