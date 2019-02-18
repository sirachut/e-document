

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
                ?>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
    <?php
                foreach ($arr_menu_lv0 as $k0 => $v0) {
                    if (!isset($arr_menu_lv1[$v0['MOD_ID']])) {
                        echo '<li class="nav-item"><a class="nav-link" href="' . URL('') . $v0['MOD_PAGE'] . '">' .'<i class="fas fa-fw fa-chart-area"></i><span>'. $v0['MOD_NAME'] . '</span></a></li>';
                    } else {
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i><span>' . $v0['MOD_NAME'] .'</span></a>';

                        echo '<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">'
                        . '<div class="bg-white py-2 collapse-inner rounded">';

                        foreach ($arr_menu_lv1[$v0['MOD_ID']] as $k1 => $v1) {

                            if (!isset($arr_menu_lv2[$v1['MOD_ID']])) {
                                echo '<a a class="collapse-item" href="' . URL('') . $v1['MOD_PAGE'] . '">' . $v1['MOD_NAME'] . '</a>';
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
                        echo '</div></div></li>';
                    }
                }
            
                ?>
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->
    
<?php
//
// use App\Models\Vw_sys_security_permis;
//
//            $list = Vw_sys_security_permis::where('IS_ACTIVE', 'T')->where('DEPARTMENT_ID', Session::get('gid'))
//                ->orderBy('MOD_ORDER', 'ASC')
//                ->get();
//
//                $arr_menu_lv0 = array();
//                $arr_menu_lv1 = array();
//                $arr_menu_lv2 = array();
////                    while ($rs = $list->FetchRow()) {
//foreach($list as $key => $rs){
//                    if ($rs['MOD_LEVEL'] == 0) {
//                        $arr_menu_lv0[] = array(
//                            'MOD_ID' => $rs['MOD_ID'],
//                            'MOD_NAME' => $rs['MOD_NAME'],
//                            'MOD_PAGE' => $rs['MOD_PAGE'],
//                        );
//                    } else if ($rs['MOD_LEVEL'] == 1) {
//                        $arr_menu_lv1[$rs['MOD_PARENT_ID']][] = array(
//                            'MOD_ID' => $rs['MOD_ID'],
//                            'MOD_NAME' => $rs['MOD_NAME'],
//                            'MOD_PAGE' => $rs['MOD_PAGE'],
//                        );
//                    } else {
//                        $arr_menu_lv2[$rs['MOD_PARENT_ID']][] = array(
//                            'MOD_NAME' => $rs['MOD_NAME'],
//                            'MOD_PAGE' => $rs['MOD_PAGE'],
//                        );
//                    }
//                }
//echo '<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom fixed-top" >';
//                echo '<a class="navbar-icon" href="' . URL('') . '">' . '<img src="'. url('/images/UPLogo.png').  '"' . ' alt="" style="width: auto ; height: 35px;">' . '</a>';
//echo ' <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
//            <span class="navbar-toggler-icon"></span>
//            </button>'; echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">'; echo '<ul class="navbar-nav mr-auto">';
//                foreach ($arr_menu_lv0 as $k0 => $v0) {
//                    if (!isset($arr_menu_lv1[$v0['MOD_ID']])) {
//                        echo '<li class="nav-item"><a class="nav-link" href="' . URL('') . $v0['MOD_PAGE'] . '">' . $v0['MOD_NAME'] . '</a></li>';
//                    } else {
//                        echo '<li class="nav-item dropdown">';
//                        echo '<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-align-left"></i> &nbsp;' . $v0['MOD_NAME'] .'</a>';
//
//                        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
//
//                        foreach ($arr_menu_lv1[$v0['MOD_ID']] as $k1 => $v1) {
//
//                            if (!isset($arr_menu_lv2[$v1['MOD_ID']])) {
//                                echo '<a class="dropdown-item" href="' . URL('') . $v1['MOD_PAGE'] . '">' . $v1['MOD_NAME'] . '</a>';
//                            } else {
////                                    echo '<li class="dropdown sub-dropdown">';
////                                    echo '<a href=\"javascript:void(null)\" >' . $v1['MOD_NAME'] . ' <span class="caret-right"></span></a>';
////
////                                    echo '<ul class="dropdown-menu sub-menu">';
////                                    foreach ($arr_menu_lv2[$v1['MOD_ID']] as $k2 => $v2) {
////                                        echo '<li><a href="' . URL('') . $v2['MOD_PAGE'] . '">' . $v2['MOD_NAME'] . '</a></li>';
////                                    }
////                                    echo '</ul></li>';
//                            }
//                        }
//                        echo '</div></li>';
//                    }
//                } echo '</ul>';echo '</div>';echo '</nav>';
                ?>


