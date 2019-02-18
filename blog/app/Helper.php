<?php
    use App\Models\Sys_Department;
function formatDateThai($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear $strHour:$strMinute";
}

function form_select_department()
{
    
        $Department = Sys_Department::where('RECORD_STATUS', 'N')
                    ->get();
//        dd($Department);
   $html="";
   $html .="<select id='department_id' name='department_id' class='form-control'>";
    $html .="<option value='".'0'."'>".'กรุณาเลือกข้อมูล'."</option>";
    foreach ($Department as $key => $val){
        $html .="<option value='".$val['DEPARTMENT_ID']."'>".$val['DEPARTMENT_NAME']."</option>";
    }
  $html .="</select>";
    echo "$html";
}