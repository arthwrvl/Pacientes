const dv1 = document.querySelector("#op1");
const dv2 = document.querySelector("#op2");
const dv3 = document.querySelector("#op3");
const dv4 = document.querySelector("#op4");
const dv5 = document.querySelector("#op5");
const dv0 = document.querySelector("#op0");
const btn1 = document.querySelector("#btn1");
const btn2 = document.querySelector("#btn2");
const btn3 = document.querySelector("#btn3");
const btn4 = document.querySelector("#btn4");
const btn5 = document.querySelector("#btn5");

btn1.addEventListener('mouseenter', enterr);
btn1.addEventListener('mouseleave', leavee);
btn2.addEventListener('mouseenter', enterr);
btn2.addEventListener('mouseleave', leavee);
btn3.addEventListener('mouseenter', enterr);
btn3.addEventListener('mouseleave', leavee);
btn4.addEventListener('mouseenter', enterr);
btn4.addEventListener('mouseleave', leavee);
btn5.addEventListener('mouseenter', enterr);
btn5.addEventListener('mouseleave', leavee);
function enterr(event) {
    this.style.background = 'rgba(255,255,255,0.1)';
}
function leavee(event) {
    this.style.background = 'rgba(255,255,255,0)';
}
function disableAll() {
    dv1.style.display = "none";
    dv2.style.display = "none";
    dv3.style.display = "none";
    dv4.style.display = "none";
    dv5.style.display = "none";
    dv0.style.display = "none";
    btn1.style.background = 'transparent';
    btn2.style.background = 'transparent';
    btn3.style.background = 'transparent';
    btn4.style.background = 'transparent';
    btn5.style.background = 'transparent';
    btn1.addEventListener('mouseenter', enterr);
    btn1.addEventListener('mouseleave', leavee);
    btn2.addEventListener('mouseenter', enterr);
    btn2.addEventListener('mouseleave', leavee);
    btn3.addEventListener('mouseenter', enterr);
    btn3.addEventListener('mouseleave', leavee);
    btn4.addEventListener('mouseenter', enterr);
    btn4.addEventListener('mouseleave', leavee);
    btn5.addEventListener('mouseenter', enterr);
    btn5.addEventListener('mouseleave', leavee);
}
function defaultview() {
    dv1.style.display = "none";
    dv2.style.display = "none";
    dv3.style.display = "none";
    dv4.style.display = "none";
    dv5.style.display = "none";
    dv0.style.display = "flex";
    btn1.style.background = 'transparent';
    btn2.style.background = 'transparent';
    btn3.style.background = 'transparent';
    btn4.style.background = 'transparent';
    btn5.style.background = 'transparent';
    btn1.addEventListener('mouseenter', enterr);
    btn1.addEventListener('mouseleave', leavee);
    btn2.addEventListener('mouseenter', enterr);
    btn2.addEventListener('mouseleave', leavee);
    btn3.addEventListener('mouseenter', enterr);
    btn3.addEventListener('mouseleave', leavee);
    btn4.addEventListener('mouseenter', enterr);
    btn4.addEventListener('mouseleave', leavee);
    btn5.addEventListener('mouseenter', enterr);
    btn5.addEventListener('mouseleave', leavee);
}

function Option1() {
    if (dv1.style.display != "flex") {
        disableAll();
        dv1.style.display = "flex";
        btn1.style.background = 'rgba(255,255,255,0.2)';
        btn1.removeEventListener('mouseleave', leavee);
    } else {
        defaultview();
    }

}
function Option2() {
    if (dv2.style.display != "flex") {
        disableAll();
        dv2.style.display = "flex";
        btn2.style.background = 'rgba(255,255,255,0.2)';
        btn2.removeEventListener('mouseleave', leavee);
    } else {
        defaultview();
    }
}
function Option3() {
    if (dv3.style.display != "flex") {
        disableAll();
        dv3.style.display = "flex";
        btn3.style.background = 'rgba(255,255,255,0.2)';
        btn3.removeEventListener('mouseleave', leavee);
    } else {
        defaultview();
    }
}
function Option4() {
    if (dv4.style.display != "flex") {
        disableAll();
        dv4.style.display = "flex";
        btn4.style.background = 'rgba(255,255,255,0.2)';
        btn4.removeEventListener('mouseleave', leavee);
    } else {
        defaultview();
    }
}
function Option5() {
    if (dv5.style.display != "flex") {
        disableAll();
        dv5.style.display = "flex";
        btn5.style.background = 'rgba(255,255,255,0.2)';
        btn5.removeEventListener('mouseleave', leavee);
    } else {
        defaultview();
    }
}
