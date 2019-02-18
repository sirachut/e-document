<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vw_document_item;
use App\Models\Document_Item;
use App\Models\Document;

class SentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($get_gid= null)
    {
        if($get_gid){
             $gid = $get_gid;
        }else{
            $gid = session()->get('gid');
        }
            return View('sent.index')
            ->with('get_gid', $gid);
    }
    
       public function getdata($get_gid= null)
    {
        if($get_gid){
             $gid = $get_gid;
        }else{
            $gid = session()->get('gid');
        }
            $request=$_REQUEST;
//               print_r($request);
//        dd($request);
            $Document_item = Vw_document_item::select('DOCUMENT_ID','DOCUMENT_ITEM_ID','FACULTY_ID','DOCUMENT_ST_NUMBER','DOCUMENT_NAME','DOCUMENT_NOTATION','DOCUMENT_NUMBER','DOCUMENT_TO')
                    ->distinct()
                    ->where('DEPARTMENT_ID', $gid)
                    ->where('CKT', 'R')
                     ->orderBy('DATE_IN', 'desc')
                    ->orderBy('DOCUMENT_ID', 'desc')
                    ->get();
//            print_r($Document_item);
            $i=1;
            foreach($Document_item as $key => $value){
                $data=array();
                 $subdata[]= '<input type="checkbox" class="select_document" name="select_document[]" value="'.$value->DOCUMENT_ITEM_ID.'_'.$value->DOCUMENT_ID.'">';
                 $subdata[]= $i++;
                 $subdata[]= $value->FACULTY_ID;
                 $subdata[]= $value->DOCUMENT_ST_NUMBER;
                 $subdata[]= $value->DOCUMENT_NAME;
                 $subdata[]= $value->DOCUMENT_NOTATION;
                 $subdata[]= $value->DOCUMENT_NUMBER;
                 $subdata[]= $value->DOCUMENT_TO;
                 $subdata[]= '<a class="btn btn-xs btn-success" href="'. URL('documentitem/' . $value->DOCUMENT_ID) .'" target="_blank">Show</a>';
                 $data[]=$subdata;
                 $i++;
            }
            
           
//            $subdata=array();
//                 $subdata[]= 1;
//                 $subdata[]= 2;
//                 $subdata[]= 3;
//                 $subdata[]= 4;
//                 $subdata[]= 5;
//                 $subdata[]= 6;
//                 $subdata[]= 7;
//                 $subdata[]= 8;
//                 $subdata[]= 9;
//                 $data[]=$subdata;
            
            $json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  count($Document_item),
    "recordsFiltered"   =>  count($Document_item),
    "data"              =>  $data
);
             echo json_encode($json_data);

    }
    

       public function add(Request $request)
    {
           $document_item_id = explode(",",$request->input('hidden_document_item_id'));
           date_default_timezone_set("Asia/Bangkok");
//           dd($document_item_id);
           foreach ($document_item_id as $key => $val){
               //update date out
                $item_id = explode("_",$val);
           $item = Document_Item::findOrFail($item_id[0]);
		$item->DATE_OUT = date("Y-m-d H:i:s") ;
                $item->STATUS_ID = 1;
		$item->save();
                // add new item
                $department_id=$request->input('department_id');
                 $item = new Document_Item;
                // ถึง ผู้อำนวยการกอง / ผู้บริหาร
//                 dd($department_id);
                if($department_id == 10){
                $item->DEPARTMENT_ID = $request->input('department_id');
                $item->DATE_IN = date("Y-m-d H:i:s") ;
                $item->STATUS_ID = 2;
		$item->DETAIL = $request->input('DETAIL');
                $item->DOCUMENT_ID = $item_id[1];
		$item->save();
                }
//                //ส่วนงานทั่วไป
                else{
                $item->DEPARTMENT_ID = $request->input('department_id');
		$item->DETAIL = $request->input('DETAIL');
                $item->DOCUMENT_ID = $item_id[1];
		$item->save();
                }
		
                
           }
           
            $response = array("error" => true);
            echo json_encode($response);

    }
    
           public function add_control_code(Request $request)
    {
          
           $gid= session()->get('gid');
           $document_item_id = Vw_document_item::select('DOCUMENT_ITEM_ID','DOCUMENT_ID')
                   ->where('DOCUMENT_NUMBER', $request->input('DOCUMENT_NUMBER'))
                   ->where('DEPARTMENT_ID', $gid)
                    ->where('CKT', 'R')
                   ->get();
           date_default_timezone_set("Asia/Bangkok");
            $result = true;            
           foreach ($document_item_id as $key => $val){
               //update date out
                $item_id = $val->DOCUMENT_ITEM_ID;
                $item = Document_Item::findOrFail($item_id);
		$item->DATE_OUT = date("Y-m-d H:i:s") ;
                $item->STATUS_ID = 1;
		$item->save();
//                dd($item);
                // add new item
                
                $department_id=$request->input('department_id');
                 $item = new Document_Item;
                // ถึง ผู้อำนวยการกอง / ผู้บริหาร
//                 dd($department_id);
                if($department_id == 10){
                $item->DEPARTMENT_ID = $request->input('department_id');
                $item->DATE_IN = date("Y-m-d H:i:s") ;
                $item->STATUS_ID = 2;
		$item->DETAIL = $request->input('DETAIL');
                $item->DOCUMENT_ID = $val->DOCUMENT_ID;
//		$item->save();
                }
                //ส่วนงานทั่วไป
                else{
                $item->DEPARTMENT_ID = $request->input('department_id');
		$item->DETAIL = $request->input('DETAIL');
                $item->DOCUMENT_ID = $val->DOCUMENT_ID;
		$item->save();
                }
                 $result = false;
           }

               
            $response = array("error" => $result);
            echo json_encode($response);
    }
           
         public function director(Request $request)  // ผอ. ลงนามเสร็จ
    {
     
	
           $document_item_id = explode(",",$request->input('hidden_document_item_id'));
           date_default_timezone_set("Asia/Bangkok");
//           dd($document_item_id);
           foreach ($document_item_id as $key => $val){
               //update date out
                $item_id = explode("_",$val);
//                dd($item_id);
           $item = Document_Item::findOrFail($item_id[0]);
		$item->DATE_OUT = date("Y-m-d H:i:s") ;
                $item->STATUS_ID = 1;
		$item->save();
                
                
                // add new item
                //ธุระการ
                $department_id=8;
                 $item = new Document_Item;
                $item->DEPARTMENT_ID = $department_id;
                $item->DATE_IN = date("Y-m-d H:i:s") ;
                $item->STATUS_ID = 2;
		$item->DETAIL = $request->input('DETAIL');
                $item->DOCUMENT_ID = $item_id[1];
		$item->save();
           }
		// redirect
//		return redirect('sent')->with('message', 'เพิ่มเอกสารสำเร็จ!');
    }
    
}
