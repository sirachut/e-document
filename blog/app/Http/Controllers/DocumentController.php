<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Vw_document;
use App\Models\Document_Item;
use App\Models\Faculty;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return View('documents.index');

    }

    public function create()
    {
        return view('documents.create');
    }


    public function store(Request $request)
    {

		$request->validate([
            'DOCUMENT_PRIORITY',
            'DOCUMENT_ST_NUMBER',
            'DOCUMENT_NAME',
            'FACULTY_ID',
            'FACULTY_DEPRATMENT',
            'FACULTY_TEL',
            'DOCUMENT_NUMBER',
            'DOCUMENT_TO',
            'DOCUMENT_NOTATION',
        ]);

        $documents = Document::create($request->all());
         $LastInsertId = $documents->DOCUMENT_ID;
//dd($LastInsertId);
		// insert frist document item
             date_default_timezone_set("Asia/Bangkok");
		 $Document_Item = new Document_Item;
                 $Document_Item->STATUS_ID = 2;
		 $Document_Item->DATE_IN = date("Y-m-d H:i:s") ;
		 $Document_Item->DEPARTMENT_ID = 8;
                 $Document_Item->ROUTE_NO = 1;
                 $Document_Item->DOCUMENT_ID = $LastInsertId;
		 $Document_Item->save();
		// redirect
        return redirect()->route('documents.index')
                        ->with('success','เพิ่มข้อมูลสำเร็จ');
    }


    public function show(Document $document)
    {
        return view('documents.show',compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('documents.edit',compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'DOCUMENT_PRIORITY',
            'DOCUMENT_ST_NUMBER',
            'DOCUMENT_NAME',
            'FACULTY_ID',
            'FACULTY_DEPRATMENT',
            'FACULTY_TEL',
            'DOCUMENT_NUMBER',
            'DOCUMENT_TO',
            'DOCUMENT_NOTATION',
        ]);

        $document->update($request->all());

		// store
		// $document = new Document;
        // $document->DOCUMENT_NUMBER = $request->input('DOCUMENT_NUMBER');
		// $document->DOCUMENT_ST_NUMBER = $request->input('DOCUMENT_ST_NUMBER');
		// $document->DOCUMENT_PRIORITY = $request->input('DOCUMENT_PRIORITY');
		// $document->save();

		// redirect
        return redirect()->route('documents.index')
                        ->with('success','เพิ่มข้อมูลสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)

    {
		// $Document = Document::findOrFail($id);
		// $Document->RECORD_STATUS = 'D';
		// $Document->save();

		// // redirect
        // return redirect('document')->with('message', 'ลบข้อมูลสำเร็จ!');

        $document->delete();

        return redirect()->route('documents.index')
                        ->with('success','ลบข้อมูลสำเร็จ');
    }

    public static function DateThai($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        // $strHour= date("H",strtotime($strDate));
        // $strMinute= date("i",strtotime($strDate));
        // $strSeconds= date("s",strtotime($strDate));
        $strMonthFull = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthFull[$strMonth];
        return "$strDay $strMonthThai $strYear";
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
                    $Document_order = Vw_document::where('RECORD_STATUS', 'N')
                    ->where($equal_filter)
                    ->where($like_filter)
                    ->orderBy('DATE_IN', 'desc')
                    ->offset($request['start'])
                    ->limit($request['length'])
                    ->get();
                    
                    $Document_order_all = Vw_document::where('RECORD_STATUS', 'N')
                    ->where($equal_filter)
                    ->where($like_filter)
                    ->orderBy('DATE_IN', 'desc')
                    ->get();
          
            $rs = $Document_order;
            $num_row=count($Document_order_all);
            $num_row_order=count($Document_order);
            
        }else{
            $Document= Vw_document::where('RECORD_STATUS', 'N')
                     ->orderBy('DATE_IN', 'desc')
                     ->offset($request['start'])
                    ->limit($request['length'])
                    ->get();
            
            //          select  all
              $Document_all =Vw_document::where('RECORD_STATUS', 'N')
                     ->orderBy('DATE_IN', 'desc')
                    ->get();
            $rs = $Document;
             $num_row_order=count($Document);
            $num_row=count($Document_all);
        }
        
            $i=1;
            $data=array();
            foreach($rs as $key => $value){
                
                $subdata=array();
                 $subdata[]= $i;
                 $subdata[]= $value->FACULTY_NAME_TH;
                 $subdata[]= $value->DOCUMENT_ST_NUMBER;
                 $subdata[]= ($value->DOCUMENT_DATE? formatDateThai($value->DOCUMENT_DATE) :'-' );
                 $subdata[]= $value->DOCUMENT_NAME;
                 $subdata[]= get_document_to($value->DOCUMENT_TO);
                 $subdata[]= get_document_notation($value->DOCUMENT_NOTATION);
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

}
