<?php  
require('fpdf/includes.php');
$htmlTable='<TABLE>
<TR>
<td>S. No.</td><td>Added</td>
<td>Name</td><td>Added</td>
<td>Age</td><td>Added</td>
</TR>

<TR>
<td>1</td><td>Added</td>
<td>Azeem</td><td>Added</td>
<td>24</td><td>Added</td>
</TR>

<TR>
<td>2</td><td>Added</td>
<td>Atiq</td><td>Added</td>
<td>24</td><td>Added</td>
</TR>

<TR>
<td>3</td><td>Added</td>
<td>Shahid</td><td>Added</td>
<td>24</td><td>Added</td>
</TR>

<TR>
<td>4</td><td>Added</td>
<td>Roy Montgome</td><td>Added</td>
<td>36</td><td>Added</td>
</TR>

<TR>
<td>5</td><td>Added</td>
<td>M.Bony</td><td>Added</td>
<td>18</td><td>Added</td>
</TR>
</TABLE>';

$pdf=new PDF_HTML_Table();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->WriteHTML("Start of the HTML table.<BR>$htmlTable<BR>End of the table.");
$pdf->Output();
?>