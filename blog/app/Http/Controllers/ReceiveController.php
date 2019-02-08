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
//            $Document = Document::all()->sortByDesc('DATE_IN');
       $gid = session()->get('gid');
            $Document_item = Vw_document_item::select('DOCUMENT_ID','DOCUMENT_ITEM_ID','FACULTY_ID','DOCUMENT_ST_NUMBER','DOCUMENT_NAME','DOCUMENT_NOTATION','DOCUMENT_NUMBER','DOCUMENT_TO')
                    ->distinct()
                    ->where('DEPARTMENT_ID', $gid)
                    ->where('CKT', 'S')
                     ->orderBy('DATE_IN', 'desc')
                    ->orderBy('DOCUMENT_ID', 'desc')
                    ->get();
//            dd($Document_item);
            return View('receive.index')
            ->with('Document', $Document_item);
        
//         $this->layout->content = View('list')->with('Document', $Document);
    }

       public function add(Request $request)
    {
     
	
           $document_item_id = explode(",",$request->input('hidden_document_item_id'));
           date_default_timezone_set("Asia/Bangkok");
//           dd(date("Y-m-d H:i:s"));
           foreach ($document_item_id as $key => $val){
               //update date in
               $item_id = explode("_",$val);
           $item = Document_Item::findOrFail($item_id[0]);
		$item->DATE_IN = date("Y-m-d H:i:s") ;
                $item->STATUS_ID = 2;
		$item->save();
           }
		// redirect
//		return redirect('sent')->with('message', 'เพิ่มเอกสารสำเร็จ!');
    }
}