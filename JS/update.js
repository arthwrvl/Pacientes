const idfield = document.querySelector("#cod");
const pcfield = document.querySelector("#paci");
const mdfield = document.querySelector("#medi");
const hrfield = document.querySelector("#horaa");
const dtfield = document.querySelector("#dataa");

function passValues(id, medico, paciente, hora, data) {
    idfield.value = id;
    pcfield.value = paciente;
    mdfield.value = medico;
    hrfield.value = hora;
    dtfield = data;
    upd();
}

$("#table tr").dblclick(function () {
    var id = $(this).find('td').eq(0).html();
    var md = $(this).find('td').eq(2).html();
    var pc = $(this).find('td').eq(1).html();
    var dt = $(this).find('td').eq(6).html();
    var hr = $(this).find('td').eq(7).html();
    passValues(id, md, pc, hr, dt);
});