<?php
    use App\Models\Sys_Department;
      use App\Models\Faculty;
//        use App\Models\Sys_Department;
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
//    return "$strDay $strMonthThai $strYear $strHour:$strMinute";
    return "$strDay $strMonthThai $strYear";
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

function form_select_faculty()
{
    
        $Faculty = Faculty::where('RECORD_STATUS', 'N')
                    ->get();
   $html="";
   $html .="<select id='FACULTY_ID' name='FACULTY_ID' class='form-control'>";
    $html .="<option value='".'0'."'>".'กรุณาเลือกข้อมูล'."</option>";
    foreach ($Faculty as $key => $val){
        $html .="<option value='".$val['FACULTY_ID']."'>".$val['FACULTY_NAME_TH']."</option>";
    }
  $html .="</select>";
    echo "$html";
}
function form_select_document_notation(){
//    print_r(Lang::get('master.DOCUMENT_NOTATION')) ;
    $document_notation = Lang::get('master.DOCUMENT_NOTATION');
    $html="";
    $html .="<select id='DOCUMENT_NOTATION' name='DOCUMENT_NOTATION' class='form-control'>";
    $html .="<option value='".'0'."'>".'กรุณาเลือกข้อมูล'."</option>";
    foreach ($document_notation as $key => $val){
        if( intval($key)){
        $html .="<option value='".$key."'>".$val."</option>";
        }
    }
  $html .="</select>";
    echo "$html";
    
}

function form_select_document_to(){
//    print_r(Lang::get('master.DOCUMENT_NOTATION')) ;
    $document_to = Lang::get('master.DOCUMENT_TO');
    $html="";
    $html .="<select id='DOCUMENT_TO' name='DOCUMENT_TO' class='form-control'>";
    $html .="<option value='".'0'."'>".'กรุณาเลือกข้อมูล'."</option>";
    foreach ($document_to as $key => $val){
        if( intval($key)){
        $html .="<option value='".$key."'>".$val."</option>";
        }
    }
  $html .="</select>";
    echo "$html";
    
}
function get_document_notation($id=null){
    $document_notation = Lang::get('master.DOCUMENT_NOTATION');
    $text=$document_notation[$id];
    return "$text";
    
}

function get_document_to($id=null){
    $DOCUMENT_TO = Lang::get('master.DOCUMENT_TO');
    $text=$DOCUMENT_TO[$id];
    return "$text";
    
}

function get_faculty($id=null){
        $Faculty =Faculty::findOrFail($id);
//        dd($Faculty);
   return "$Faculty->FACULTY_NAME_TH";
    
}

function get_document_status($id=null){
    $DOCUMENT_STATUS = Lang::get('master.DOCUMENT_STATUS');
    $text=$DOCUMENT_STATUS[$id];
    return "$text";
    
}

function get_department($id=null)
{
    
        $Department = Sys_Department::findOrFail($id);
 return "$Department->DEPARTMENT_NAME";
}