<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//            $Document = Document::all()->sortByDesc('DATE_IN');
            $Document = Document::where('RECORD_STATUS', 'N')
                     ->orderBy('DATE_IN', 'desc')
                    ->get();
        return View('list')
            ->with('Document', $Document);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
     
		$this->validate($request, [
                                'DOCUMENT_NUMBER' => 'required|string',
				'DOCUMENT_PRIORITY' => 'required|string',
				'DOCUMENT_ST_NUMBER' => 'required|string',
		]);
		
		// store
		$document = new Document;
                $document->DOCUMENT_NUMBER = $request->input('DOCUMENT_NUMBER');
		$document->DOCUMENT_ST_NUMBER = $request->input('DOCUMENT_ST_NUMBER');
		$document->DOCUMENT_PRIORITY = $request->input('DOCUMENT_PRIORITY');
		$document->save();
 
		// redirect
		return redirect('list')->with('message', 'เพิ่มเอกสารสำเร็จ!');
    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
            
    {
		$Document = Document::findOrFail($id);
		$Document->RECORD_STATUS = 'D';
		$Document->save();
 
		// redirect
		return redirect('document')->with('message', 'ลบข้อมูลสำเร็จ!');
    }
}
