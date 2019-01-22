<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barcode;
use  PDF;
use DNS1D;

class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                    $Barcode = Barcode::where('RECORD_STATUS', 'N')
                    ->orderBy('CREATE_DATE', 'desc')
                    ->get();
         
              $Data['Barcode']= $Barcode;
        return View('barcode.list')
            ->with('Data', $Data);
    }

    public function create()
    {
        $amount = 59 ; //59+1 = 60
        $Max_to = Barcode::where('RECORD_STATUS', 'N')->max('NUM_TO');
        $num_from = $Max_to +1;
        $num_to = $num_from + $amount;
        $Barcode = new Barcode;
                $Barcode->NUM_FROM = $num_from ;
		$Barcode->NUM_TO = $num_to;
		$Barcode->save();
return redirect('barcode');
        
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
PDF::SetTitle('Barcode');
PDF::SetSubject('Barcode');
PDF::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 027', PDF_HEADER_STRING);
PDF::setBarcode(date('Y-m-d H:i:s'));
// set font
PDF::SetFont('helvetica', '', 11);
// add a page
PDF::AddPage();
PDF::SetFont('helvetica', '', 10);
// define barcode style
$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);

$barcode = Barcode::findOrFail($id);
//print_r($barcode);
            $i=$barcode->NUM_TO - $barcode->NUM_FROM;
            $c_row=$i/4;
        $i=0;
        $col1=5;
        $col2=53.5;
        $col3=102;
        $col4=150;
        $row=5;
        $from=$barcode->NUM_FROM;
        $date = date("Y");
        $txt = $date;
        while($i<=$c_row){
          PDF::write1DBarcode($txt.$from, 'C128', $col1, $row, '', 18, 0.4, $style, 'N');
          $from++;
          PDF::write1DBarcode($txt.$from, 'C128', $col2, $row, '', 18, 0.4, $style, 'N');
          $from++;
          PDF::write1DBarcode($txt.$from, 'C128', $col3, $row, '', 18, 0.4, $style, 'N');
          $from++;
          PDF::write1DBarcode($txt.$from, 'C128', $col4, $row, '', 18, 0.4, $style, 'N');  
          $from++;
          $row=$row+18;
          $i++;
        }




//Close and output PDF document
PDF::Output('example_027.pdf', 'I');

$Barcode = Barcode::findOrFail($id);
		$Barcode->PRINT_STATUS = 'T';
		$Barcode->save();
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
      	$Barcode = Barcode::findOrFail($id);
		$Barcode->RECORD_STATUS = 'D';
		$Barcode->save();
 
//		// redirect
		return redirect('barcode')->with('message', 'ลบข้อมูลสำเร็จ!');
    }
}
