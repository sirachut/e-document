<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Document_attachment;

class DocumentAttachmentController extends Controller
{
 
    public function index($id)
    {

            $attachment = Document_attachment::where('DOCUMENT_ID', $id)
                     ->orderBy('DATE_IN', 'asc')
                    ->get();
            
            $attachment = Vw_document::where('DOCUMENT_ID', $id)
                    ->get();
             $navi_menu = 'รายละเอียดเอกสาร';
             
            return View('document_item.index')
            ->with('Document_item', $Document_item)
            ->with('Document', $Document)
             ->with('navi_menu', $navi_menu);;
    }

               public function getdata($id= null)
    {

            $request=$_REQUEST;
            
            
            $equal_filter =array();
            $like_filter =array();
            
            $attachment = Document_attachment::where('DOCUMENT_ID', $id)
                    ->where('RECORD_STATUS', 'N')
                     ->orderBy('CREATE_DATE', 'desc')
                     ->offset($request['start'])
                    ->limit($request['length'])
                    ->get();
            
            //          select  all
              $attachment_all = Document_attachment::where('DOCUMENT_ID', $id)
                     ->where('RECORD_STATUS', 'N')
                     ->orderBy('CREATE_DATE', 'desc')
                    ->get();
            $rs = $attachment;
             $num_row_order=count($attachment);
            $num_row=count($attachment_all);
      
        
            $i=1;
            $data=array();
            foreach($rs as $key => $value){
                
                $subdata=array();
                 $subdata[]= $i;
                 $subdata[]= $value->ATTACHMENT_FILE;
                 $subdata[]= '<a class="btn btn-xs btn-success" href="'. URL('attachmentdownload/' . $value->ATTACHMENT_FILE) .'" >Download</a>';
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

               public function download($filename = null)
    {
                   return Storage::download('uploads/'.$filename);
    }
}