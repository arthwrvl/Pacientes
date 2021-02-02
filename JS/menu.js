function disableAll() {
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
    var btn1 = document.getElementById("btn1");
    var btn2 = document.getElementById("btn2");
    var btn3 = document.getElementById("btn3");
    var btn4 = document.getElementById("btn4");
    var btn5 = document.getElementById("btn5");
    btn1.style.background = "linear-gradient(to bottom left, #0071bc9f, #0071bc46)";
    btn2.style.background = "linear-gradient(to bottom left, #0071bc9f, #0071bc46)";
    btn3.style.background = "linear-gradient(to bottom left, #0071bc9f, #0071bc46)";
    btn4.style.background = "linear-gradient(to bottom left, #0071bc9f, #0071bc46)";
    btn5.style.background = "linear-gradient(to bottom left, #0071bc9f, #0071bc46)";
}
function defaultview() {
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
    dv0.style.display = "flex";
    var btn1 = document.getElementById("btn1");
    var btn2 = document.getElementById("btn2");
    var btn3 = document.getElementById("btn3");
    var btn4 = document.getElementById("btn4");
    var btn5 = document.getElementById("btn5");
    btn1.style.background = "linear-gradient(to bottom left, #0071bc9f, #0071bc46)";
    btn2.style.background = "linear-gradient(to bottom left, #0071bc9f, #0071bc46)";
    btn3.style.background = "linear-gradient(to bottom left, #0071bc9f, #0071bc46)";
    btn4.style.background = "linear-gradient(to bottom left, #0071bc9f, #0071bc46)";
    btn5.style.background = "linear-gradient(to bottom left, #0071bc9f, #0071bc46)";
}

function Option1() {
    var btn = document.getElementById("btn1");
    var dv1 = document.getElementById("op1");
    if (dv1.style.display != "flex") {
        disableAll();
        dv1.style.display = "flex";
        btn.style.background = "linear-gradient(to right top, #019aff, #1fdeb8)";
    } else {
        defaultview();
    }

}
function Option2() {
    var btn = document.getElementById("btn2");
    var dv2 = document.getElementById("op2");
    if (dv2.style.display != "flex") {
        disableAll();
        dv2.style.display = "flex";
        btn.style.background = "linear-gradient(to right top, #019aff, #1fdeb8)";
    } else {
        defaultview();
    }
}
function Option3() {
    var btn = document.getElementById("btn3");
    var dv3 = document.getElementById("op3");
    if (dv3.style.display != "flex") {
        disableAll();
        dv3.style.display = "flex";
        btn.style.background = "linear-gradient(to right top, #019aff, #1fdeb8)";
    } else {
        defaultview();
    }
}
function Option4() {
    var btn = document.getElementById("btn4");
    var dv4 = document.getElementById("op4");
    if (dv4.style.display != "flex") {
        disableAll();
        dv4.style.display = "flex";
        btn.style.background = "linear-gradient(to right top, #019aff, #1fdeb8)";
    } else {
        defaultview();
    }
}
function Option5() {
    var btn = document.getElementById("btn5");
    var dv5 = document.getElementById("op5");
    if (dv5.style.display != "flex") {
        disableAll();
        dv5.style.display = "flex";
        btn.style.background = "linear-gradient(to right top, #019aff, #1fdeb8)";
    } else {
        defaultview();
    }
}