function PrintDiv() {    
    var divToPrint = document.getElementById('DivIdToPrint');
    var popupWin = window.open('', '_blank', 'width=300,height=300');
    popupWin.document.open();
    popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
     popupWin.document.close();
};;