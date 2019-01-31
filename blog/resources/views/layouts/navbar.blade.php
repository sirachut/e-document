<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom" >

    <a class="navbar-icon" href="{{ URL('') }}"><img src="{{url('/images/UPLogo.png')}}" alt="" style="width: auto ; height: 35px;"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">

                <a class="nav-link" href="{{ URL('/') }}">ระบบสารบัญเอกสาร <span class="sr-only">(current)</span></a>

            </li>

            <li class="nav-item">

                <a class="nav-link" href="{{ URL('/document') }}"><i class="fas fa-align-left"></i> &nbsp; ดูรายการเอกสาร</a>

            </li>

            <li class="nav-item">

                <a class="nav-link" href="{{ URL('/barcode') }}"><i class="fas fa-align-left"></i> &nbsp; Barcode</a>

            </li>

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <i class="fas fa-address-card"></i> &nbsp; เกี่ยวกับเรา

                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="#"><img src="{{url('/images/morpor.png')}}" style="width: 30px ; height: 15px;"> &nbsp; ติดต่อกองบริการการศึกษา</a>
                    <a class="dropdown-item" href="#"> &nbsp;<i class="fas fa-question-circle"></i> &nbsp;&nbsp; คำถามที่พบเจอบ่อย ๆ</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">โครงสร้างหน่วยงาน</a>

                </div>

            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-tools"></i> &nbsp; ติดต่อ admin</a>
            </li>

      </ul>

{{-- <img src="{{url('/images/Capture.JPG')}}" alt="Image"/> --}}

      {{-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> --}}
    </div>
  </nav>

<?php

/* use App\Models\Vw_sys_security_permis;

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
                echo '<a class="navbar-icon" href="' . URL('') . '">' . '<img src="'. url('/images/UPLogo.png').  '"' . ' alt="" style="width: auto ; height: 35px;">' . '</a>';
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
*/

