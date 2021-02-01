function disableAll(){
    var dv1 = document.getElementById("op1");
    var dv2 = document.getElementById("op2");
    var dv3 = document.getElementById("op3");
    var dv4 = document.getElementById("op4");
    var dv5 = document.getElementById("op5");
    var dv0 = document.getElementById("op0");
    dv1.style.display = "none";
    dv2.style.display = "none";
    dv3.style.display = "none";
    dv4.style.display = "none";
    dv5.style.display = "none";
    dv0.style.display = "none";
}
function Option1() {
    disableAll();
    var dv1 = document.getElementById("op1");
    dv1.style.display = "flex";

}
function Option2() {
    disableAll();
    var dv2 = document.getElementById("op2");
    dv2.style.display = "flex";
}
function Option3() {
    disableAll();
    var dv3 = document.getElementById("op3");
    dv3.style.display = "flex";
}
function Option4() {
    disableAll();
    var dv4 = document.getElementById("op4");
    dv4.style.display = "flex";
}
function Option5() {
    disableAll();
    var dv5 = document.getElementById("op5");
    dv5.style.display = "flex";
}