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
   $html .="<select name='department_id' class='form-control'>";
    $html .="<option value='".'0'."'>".'กรุณาเลือกข้อมูล'."</option>";
    foreach ($Department as $key => $val){
        $html .="<option value='".$val['DEPARTMENT_ID']."'>".$val['DEPARTMENT_NAME']."</option>";
    }
  $html .="</select>";
    echo "$html";
}
function form_select_faculty()
{
    
        $Faculty = Faculty::where('RECORD_STATUS', 'N')
                    ->get();

   $html="";
   $html .="<select name='faculty_id' class='form-control'>";
    $html .="<option value='".'0'."'>".'กรุณาเลือกข้อมูล'."</option>";
    foreach ($Faculty as $key => $val){
        $html .="<option value='".$val['FACULTY_ID']."'>".$val['FACULTY_NAME_TH']."</option>";
    }
  $html .="</select>";
    echo "$html";
}

function form_select_mas_status()
{
  $array = [1,2,3,4,5,6,7];
  
    $Status = Mas_Status::where('STATUS_ID',$array)
                ->get();

   $html="";
   $html .="";
    foreach ($Status as $key => $val){
        $html .="<option value='".$val['STATUS_ID']."'>".$val['STATUS_NAME']."</option>";
    }
  $html .="</select>";
    echo "$html";
}

?>

