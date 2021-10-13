function printDiv()
{
    var divToPrint=document.getElementById("print-area");

    newWin= window.open();
    newWin.document.write('<html><title>Student Registration Form</title>');
    newWin.document.write('<style>' +
        '.print-card {border: 0.3px solid #000;width:50%;padding:3px;display: inline-block;margin-left: 40px;margin-top: 20px;}' +
        '.print-card table tr td{font-weight: 600;}'+
        '.print-header{text-decoration: none; color:#000 !important;font-size:20px;font-weight:600;}' +
        '.print-body{ background-color: #fff !important;padding: 30px;}' +
        '.print-form-header{text-align: center;font-weight: 600;font-size: 16px;margin-bottom: 2px;}' +
        '.photo-card{display: inline-block;}'+
        'table{border-collapse: collapse;}'+
        '.student-info-table,.scholar-info-table {margin-top: 14px;}' +
        '.siblings-info-table{margin-top: 50px;}'+
        '.adoptive-info-table{margin-top: 100px;}'+
        '</style>');
    newWin.document.write('<body class="print-body">');
    newWin.document.write(divToPrint.innerHTML);
    newWin.document.write('</body></html>');
    newWin.print();
    newWin.close();
}
