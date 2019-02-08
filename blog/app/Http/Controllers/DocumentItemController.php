<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vw_document_item;
use App\Models\Document_Item;
use App\Models\Vw_document;

class DocumentItemController extends Controller
{
 
    public function index($id)
    {

            $Document_item = Vw_document_item::where('DOCUMENT_ID', $id)
                     ->orderBy('DATE_IN', 'asc')
                    ->get();
            
            $Document = Vw_document::where('DOCUMENT_ID', $id)
                    ->get();
            return View('document_item.index')
            ->with('Document_item', $Document_item)
            ->with('Document', $Document);
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
		
    }
}