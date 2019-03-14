<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vw_document_item;
use App\Models\Document_Item;

class ReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

         $navi_menu = 'รับเอกสาร';
            return View('receive.index')
          ->with('navi_menu', $navi_menu);
    }
    
           public function getdata($get_gid= null)
    {
        
        if($get_gid){
             $gid = $get_gid;
        }else{
            $gid = session()->get('gid');
        }
            $request=$_REQUEST;
            
            
            $equal_filter =array();
            $like_filter =array();
        if($request['data_search'] != ''){
            header('Content-type:application/json;charset=utf-8');
            echo json_decode($request['data_search']);
        $data_search = explode("&",$request['data_search']);
        foreach($data_search as $key => $value){$dd_search[] = explode("=",$value);}
        $val_search  = array();
        foreach($dd_search as $key => $value){
            if($value[1]){
            $val_search[$value[0]] = $value[1];
            }
        
        }
//        print_r($val_search);
       
        //like fill
        $like_fill = array("DOCUMENT_ST_NUMBER", "DOCUMENT_NAME", "DOCUMENT_NUMBER");
        foreach($val_search as $key => $value){
            if(in_array($key, $like_fill) ){
                $like_filter[] = [$key, 'LIKE', "%" . $value . "%"];
            }
//            = fill
            else{
                $equal_filter[$key] = $value;
            }
            
        }
//                     echo($like_filter[0][2]);
                    $Document_item_order = Vw_document_item::select('DOCUMENT_ID','DOCUMENT_ITEM_ID','FACULTY_ID','DOCUMENT_ST_NUMBER','DOCUMENT_NAME','DOCUMENT_NOTATION','DOCUMENT_NUMBER','DOCUMENT_TO')
                    ->distinct()
                    ->where('DEPARTMENT_ID', $gid)
                    ->where('CKT', 'S')
                    ->where($equal_filter)
                    ->where($like_filter)
                    ->orderBy('DATE_IN', 'desc')
                    ->orderBy('DOCUMENT_ID', 'desc')
                    ->offset($request['start'])
                    ->limit($request['length'])
                    ->get();
                    
                    $Document_item_order_all = Vw_document_item::select('DOCUMENT_ID','DOCUMENT_ITEM_ID','FACULTY_ID','DOCUMENT_ST_NUMBER','DOCUMENT_NAME','DOCUMENT_NOTATION','DOCUMENT_NUMBER','DOCUMENT_TO')
                    ->distinct()
                    ->where('DEPARTMENT_ID', $gid)
                    ->where('CKT', 'S')
                    ->where($equal_filter)
                    ->where($like_filter)
                    ->orderBy('DATE_IN', 'desc')
                    ->orderBy('DOCUMENT_ID', 'desc')
                    ->get();
          
            $rs = $Document_item_order;
            $num_row=count($Document_item_order_all);
            $num_row_order=count($Document_item_order);
            
        }else{
            
            $Document_item = Vw_document_item::select('DOCUMENT_ID','DOCUMENT_ITEM_ID','FACULTY_ID','DOCUMENT_ST_NUMBER','DOCUMENT_NAME','DOCUMENT_NOTATION','DOCUMENT_NUMBER','DOCUMENT_TO')
                    ->distinct()
                    ->where('DEPARTMENT_ID', $gid)
                    ->where('CKT', 'S')
                     ->orderBy('DATE_IN', 'desc')
                    ->orderBy('DOCUMENT_ID', 'desc')
                     ->offset($request['start'])
                    ->limit($request['length'])
                    ->get();
            
            //          select  all
              $Document_item_all = Vw_document_item::select('DOCUMENT_ID','DOCUMENT_ITEM_ID','FACULTY_ID','DOCUMENT_ST_NUMBER','DOCUMENT_NAME','DOCUMENT_NOTATION','DOCUMENT_NUMBER','DOCUMENT_TO')
                    ->distinct()
                    ->where('DEPARTMENT_ID', $gid)
                    ->where('CKT', 'S')
                     ->orderBy('DATE_IN', 'desc')
                    ->orderBy('DOCUMENT_ID', 'desc')
                    ->get();
            $rs = $Document_item;
             $num_row_order=count($Document_item);
            $num_row=count($Document_item_all);
        }
        
            $i=1;
            $data=array();
            foreach($rs as $key => $value){
                
                $subdata=array();
                 $subdata[]= '<input onchange="ck_select()" type="checkbox" class="select_document" name="select_document[]" value="'.$value->DOCUMENT_ITEM_ID.'_'.$value->DOCUMENT_ID.'">';
                 $subdata[]= $i;
                 $subdata[]= get_faculty($value->FACULTY_ID);
                 $subdata[]= $value->DOCUMENT_ST_NUMBER;
                 $subdata[]= get_document_notation($value->DOCUMENT_NOTATION);
                 $subdata[]= $value->DOCUMENT_NAME;
                 $subdata[]= get_document_to($value->DOCUMENT_TO);
                 $subdata[]= $value->DOCUMENT_NUMBER;
                 $subdata[]= '<a class="btn btn-xs btn-success" href="'. URL('documentitem/' . $value->DOCUMENT_ID) .'" target="_blank">Show</a>';
                 $data[]=$subdata;
            $i++;
            }
            
//            print_r($num_row);
            $json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($num_row_order),
    "recordsFiltered"   =>  intval($num_row),
    "data"              =>  $data
);
             echo json_encode($json_data);

    }

       public function add(Request $request)
    {
           $userdata = session()->get('userdata');
           $document_item_id = explode(",",$request->input('hidden_document_item_id'));
           date_default_timezone_set("Asia/Bangkok");
//           dd(date("Y-m-d H:i:s"));
           foreach ($document_item_id as $key => $val){
               //update date in
               $item_id = explode("_",$val);
                $item = Document_Item::findOrFail($item_id[0]);
		$item->DATE_IN = date("Y-m-d H:i:s") ;
                $item->STATUS_ID = 2;
                $item->RECEIVE_USER =  $userdata['username'];
                $item->LAST_USER =  $userdata['username'];
                $item->LAST_DATE = date("Y-m-d H:i:s") ;
		$item->save();
           }
		
    }
    
               public function add_control_code(Request $request)
    {
           $userdata = session()->get('userdata');
           $gid= session()->get('gid');
           $document_item_id = Vw_document_item::select('DOCUMENT_ITEM_ID','DOCUMENT_ID')
                   ->where('DOCUMENT_NUMBER', $request->input('DOCUMENT_NUMBER'))
                   ->where('DEPARTMENT_ID', $gid)
                    ->where('CKT', 'S')
                   ->get();
           date_default_timezone_set("Asia/Bangkok");
            $result = true;
            if(count($document_item_id)){
                foreach ($document_item_id as $key => $val){
                    //update date in
                    $item_id = $val->DOCUMENT_ITEM_ID;
                    $item = Document_Item::findOrFail($item_id);
                    $item->DATE_IN = date("Y-m-d H:i:s") ;
                    $item->STATUS_ID = 2;
                    $item->RECEIVE_USER =  $userdata['username'];
                    $item->LAST_USER =  $userdata['username'];
                    $item->LAST_DATE = date("Y-m-d H:i:s") ;
                    $item->save();
                    
                    $result = false;
                }
            }
 
            $response = array("error" => $result);
            echo json_encode($response);
    }
}