
<?php



function calc_idade($nascimento) {
    $time = strtotime($nascimento);
    if ($time === false) {
        return '';
    }
    $year_diff = '';
    $date = date('Y-m-d', $time);
    list($year, $month, $day) = explode('-', $date);
    $year_diff = date('Y') - $year;
    $mont_diff = date('Y') - $month;
    $day_diff = date('d') - $day;
    if ($day_diff < 0 || $mont_diff < 0)
        $year_diff - 1;
    return $year_diff;
}

/* include ('pdf/mpdf.php');

  $pagina =
  "<html>
  <body>
  <h1>Relatório de lead cadastrado</h1>
  <ul>
  <li>cesar@celke.com.br</li>
  <li>kelly@celke.com.br</li>
  <li>atendimento@celke.com.br</li>
  </ul>
  <h4>http://www.celke.com.br</h5>
  </body>
  </html>
  ";

  $arquivo = 'Cadastro01.pdf';

  $mpdf = new mPDF();
  $mpdf->WriteHTML($pagina);

  $mpdf->Output($arquivo, 'I'); */

// I - Abre no navegador
// F - Salva o arquivo no servido
// D - Salva o arquivo no computador do usuário
// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf_min/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ngolasystems');
$pdf->SetTitle('Lista');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->AddPage();
$sql = 'SELECT *FROM tb_pessoa ORDER BY Codigo DESC';
$cons = mysqli_query($conn, $sql);
$cab = "
<html> 
<head>
        <title></title>
        
    </head>
    <body>";
$html = '<h4>PDF Example</h4><br><p>Welcome to the Jungle</p>';
$html .= "<table>
        <tr>
            <th>Codigo</th>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Data de Nascimento</th>
            <th>Idade</th>
            <th>Telefone</th>
            <th>Data Registo</th>
            <th>Curso</th>
            <th>Accao</th>
        </tr>
    ";

While (($row = mysqli_fetch_array($cons, MYSQLI_ASSOC)) != NULL) {
    $html .= "<tr>
    <td>" . $row['Codigo'] . "</td>;
            <td>" . $row['Nome'] . " </td>;
            <td>" . $row['Sexo'] . " </td>;
           <td>" . $row['DataNascimento'] . "</td>;
             <td>" . calc_idade($row['DataNascimento']) . "</td>;
             <td>" . $row['Telefone'] . "</td>;
             <td>" . $row['DataCadastro'] . "</td>;
             <td> " . $row['Curso'] . "</td>;
    <td><a>Apagar</a></td>;
    </tr>";
}
$html .= "</table>";
$rod = "  </body>
</html>";


$pdf->writeHTML($html, true, false, true, false, '');
// add a page
$pdf->AddPage();

$html = '<h1>Hey</h1>';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
$pdf->Output('example_007.pdf', 'I');
?>
