<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vw_document_item;
use App\Models\Document_Item;

class SentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($get_gid= null)
    {
//            $Document = Document::all()->sortByDesc('DATE_IN');
        if($get_gid){
             $gid = $get_gid;
        }else{
            $gid = session()->get('gid');
        }
       
//        dd($gid);
            $Document_item = Vw_document_item::select('DOCUMENT_ID','DOCUMENT_ITEM_ID','FACULTY_ID','DOCUMENT_ST_NUMBER','DOCUMENT_NAME','DOCUMENT_NOTATION','DOCUMENT_NUMBER','DOCUMENT_TO')
                    ->distinct()
                    ->where('DEPARTMENT_ID', $gid)
                    ->where('CKT', 'R')
                     ->orderBy('DATE_IN', 'desc')
                    ->orderBy('DOCUMENT_ID', 'desc')
                    ->get();
//            dd($Document_item);
            return View('sent.index')
            ->with('Document', $Document_item)
            ->with('get_gid', $gid);
        
//         $this->layout->content = View('list')->with('Document', $Document);
    }

       public function add(Request $request)
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
                
                $department_id=$request->input('department_id');
                 $item = new Document_Item;
                //ผู้อำนวยการ / ผู้บริหาร
                if($department_id = 10){
                $item->DEPARTMENT_ID = $request->input('department_id');
                $item->DATE_IN = date("Y-m-d H:i:s") ;
                $item->STATUS_ID = 2;
		$item->DETAIL = $request->input('DETAIL');
                $item->DOCUMENT_ID = $item_id[1];
		$item->save();
                }
                //ส่วนงานทั่วไป
                else{
                $item->DEPARTMENT_ID = $request->input('department_id');
		$item->DETAIL = $request->input('DETAIL');
                $item->DOCUMENT_ID = $item_id[1];
		$item->save();
                }
		
                
           }
		// redirect
//		return redirect('sent')->with('message', 'เพิ่มเอกสารสำเร็จ!');
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
