<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Http\Requests;
use  PDF;
use DNS1D;
use App\Models\Barcode;
 
class PdfDemoController extends Controller
{
	public function index(){
    	return view('pdfdemo.PdfDemo');
    }
 
    public function samplePDF()
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
// PRINT VARIOUS 1D BARCODES
// CODE 128 AUTO
// CODE 128 A
// $x = PDF::GetX();
//$y = PDF::GetY();
$barcode = Barcode::findOrFail(1);
//print_r($barcode);

            $i=$barcode->NUM_TO - $barcode->NUM_FROM;
            $c_row=$i/4;
     
//        echo $i;
//        echo $c_row;
        $i=0;
        $col1=5;
        $col2=53.5;
        $col3=102;
        $col4=150;
        $row=5;
        $from=$barcode->NUM_FROM;
        
        while($i<=$c_row){
          PDF::write1DBarcode($from, 'C128', $col1, $row, '', 18, 0.4, $style, 'N');
          $from++;
          PDF::write1DBarcode('000000'.$from, 'C128', $col2, $row, '', 18, 0.4, $style, 'N');
          $from++;
          PDF::write1DBarcode($from, 'C128', $col3, $row, '', 18, 0.4, $style, 'N');
          $from++;
          PDF::write1DBarcode($from, 'C128', $col4, $row, '', 18, 0.4, $style, 'N');  
          $from++;
          $row=$row+18;
          $i++;
        }




//Close and output PDF document
PDF::Output('example_027.pdf', 'I');
    }
 
 
    public function savePDF()
    {    
        $html_content = '<h1>Generate a PDF using TCPDF in laravel </h1>
        		<h4>by<br/>Learn Infinity</h4>';
      
 
        PDF::SetTitle('Sample PDF');
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');
 
        PDF::Output(public_path(uniqid().'_SamplePDF.pdf'), 'F');
    }
 
    public function downloadPDF()
    {    
        $html_content = '<h1>Generate a PDF using TCPDF in laravel </h1>
        		<h4>by<br/>Learn Infinity</h4>';
      
 
        PDF::SetTitle('Sample PDF');
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');
 
        PDF::Output(uniqid().'_SamplePDF.pdf', 'D');
    }
 
 
    public function HtmlToPDF()
    {    
        $view = \View::make('pdfdemo.HtmlToPDF');
        $html_content = $view->render();
      
 
        PDF::SetTitle('Sample PDF');
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');
 
        PDF::Output(uniqid().'_SamplePDF.pdf');
    }
}