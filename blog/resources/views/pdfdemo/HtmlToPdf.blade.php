<h1>Generate a PDF using TCPDF in laravel </h1>
<h4>by<br/>Learn Infinity</h4>


<table border="1" width="100%" cellpadding="10" >
	<tr>
		<th width="10%">SNo.</th>
		<th width="40%">Name</th>
		<th width="25%">Email</th>
                <th width="25%">Barcode</th>
	</tr>

	@for($i=1; $i<=2; $i++)

		<tr>
			<td align="center">{{$i}}</td>
			<td>User {{$i}}</td>
			<td>useremail{{$i}}@li.com</td>
                        <td>{!!'<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("4", "C39+") . '" alt="barcode"   />';!!}</td>
		</tr>

	@endfor

</table>