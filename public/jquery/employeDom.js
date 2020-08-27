$(document).ready(function() {

    var txtNumero = $('#num');
    var txtNom = $('#nom');
    var txtLogin = $('#login');
    var txtAdresse = $('#adresse');

    var tableEmploye = $('#tableEmploye');

    function refreshTab() {
        //txtNom[0].value

        tableEmploye.load('/bank_giage/public/jquery/ajax/tableEmploye.php?nom='+txtNom[0].value+'&num='+txtNumero[0].value+'&login='+txtLogin[0].value+'&adresse='+txtAdresse[0].value);
    }
        txtNom.keypress, txtNom.keyup(function () {
            refreshTab();
    });
        txtLogin.keypress, txtLogin.keyup(function () {
            refreshTab();
    });
        txtNumero.keypress, txtNumero.keyup(function () {
            refreshTab();
    });
        txtAdresse.keypress, txtAdresse.keyup(function () {
            refreshTab();
    });


})