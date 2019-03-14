<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\document;
use App\Models\Vw_document_item;
use App\Models\Document_Item;
use App\Models\Document_attachment;

class DoneController extends Controller
{
    public function index($get_gid= null)
    {
        
             
       if($get_gid){
             $gid = $get_gid;
        }else{
            $gid = session()->get('gid');
        }
        $navi_menu = 'ดำเนินการเสร็จสิ้น';
            return View('done.index')
            ->with('get_gid', $gid)
            ->with('navi_menu', $navi_menu);

    }

    
    
       public function done(Request $request)
    {
          $userdata = session()->get('userdata');
           $document_item_id = explode(",",$request->input('hidden_document_item_id'));
           date_default_timezone_set("Asia/Bangkok");
           foreach ($document_item_id as $key => $val){
               //update date out
                $item_id = explode("_",$val);
                $item = Document_Item::findOrFail($item_id[0]);
		$item->DATE_OUT = date("Y-m-d H:i:s") ;
                $item->STATUS_ID = 6;
                $item->DETAIL = $request->input('DETAIL');
                $item->SENT_USER =  $userdata['username'];
                $item->LAST_USER =  $userdata['username'];
                $item->LAST_DATE = date("Y-m-d H:i:s") ;
                
		$item->save();
                 
                $document = Document::findOrFail($item_id[1]);
		$document->DOCUMENT_STATUS = 'S';
                
                $document->LAST_USER = $userdata['username'];
                $document->LAST_DATE = date("Y-m-d H:i:s") ;
		$document->save();
            }

    }
    
           
         public function director(Request $request)  // ผอ. ลงนามเสร็จ
    {
     
	
           $document_item_id = explode(",",$request->input('hidden_document_item_id'));
           date_default_timezone_set("Asia/Bangkok");
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
    
               public function done_control_code(Request $request)
    {
           $userdata = session()->get('userdata');
           $gid= session()->get('gid');
           $document_item_id = Vw_document_item::select('DOCUMENT_ITEM_ID','DOCUMENT_ID')
                   ->where('DOCUMENT_NUMBER', $request->input('DOCUMENT_NUMBER'))
                   ->where('DEPARTMENT_ID', $gid)
                    ->where('CKT', 'R')
                   ->get();
           date_default_timezone_set("Asia/Bangkok");
            $result = true;
            if(count($document_item_id)){
                foreach ($document_item_id as $key => $val){
                    //update date out
                        $item_id = $val->DOCUMENT_ITEM_ID;
                        $item = Document_Item::findOrFail($item_id);
                       $item->DATE_OUT = date("Y-m-d H:i:s") ;
                       $item->STATUS_ID = 6;
                       $item->DETAIL = $request->input('DETAIL');
                       $item->SENT_USER =  $userdata['username'];
                       $item->LAST_USER =  $userdata['username'];
                       $item->LAST_DATE = date("Y-m-d H:i:s") ;
                       
                     $item->save();
                     
                $document = Document::findOrFail($val->DOCUMENT_ID);
		$document->DOCUMENT_STATUS = 'S';
                $document->LAST_USER = $userdata['username'];
                $document->LAST_DATE = date("Y-m-d H:i:s") ;
		$document->save();
                
//                print_r($request->file('image'));
//                $path = $request->file('image')->store('uploads');
                
//                $md5Name =  $request->input('DOCUMENT_NUMBER') . '_' . md5_file($request->file('image')->getRealPath());
                $Name = date("YmdHis"). '_' .$request->input('DOCUMENT_NUMBER') . '_' . md5_file($request->file('image')->getRealPath()); 
                $guessExtension = $request->file('image')->guessExtension();
                $path = $request->file('image')->storeAs('uploads', $Name.'.'.$guessExtension);
                
                 $attachment = new Document_attachment;
                $attachment->DOCUMENT_ID = $val->DOCUMENT_ID;
                $attachment->ATTACHMENT_FILE = $Name.'.'.$guessExtension;
                $attachment->LAST_DATE = date("Y-m-d H:i:s") ;
                $attachment->CREATE_USER =  $userdata['username'];
                $attachment->LAST_USER =  $userdata['username'];
         
		$attachment->save();
             
                 
                $result = false;
                }
            }

               
            $response = array("error" => $result);
            echo json_encode($response);
    }
    
}
