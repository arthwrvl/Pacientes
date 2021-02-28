const dv1 = document.querySelector("#op1");
const dv2 = document.querySelector("#op2");
const dv3 = document.querySelector("#op3");
const dv0 = document.querySelector("#op0");

const dvcadp1 = document.querySelector("#cadp1");
const dveditp1 = document.querySelector("#editp1");
const dvviewp1 = document.querySelector("#viewp1");

const dvcadf2 = document.querySelector("#cadF2");
const dveditf2 = document.querySelector("#editF2");

const dvmarcc1 = document.querySelector("#marc");
const dvviewc1 = document.querySelector("#vis");
const dvrealc1 = document.querySelector("#rea");


const btcadp1 = document.querySelector("#cad1");
const bteditp1 = document.querySelector("#edit1");
const btviewp1 = document.querySelector("#view1");

const btcadf2 = document.querySelector("#cad2");
const bteditf2 = document.querySelector("#edit2");

const btmarc1 = document.querySelector("#marc1");
//const btview1 = document.querySelector("#vieww1");
const btreal1 = document.querySelector("#real1");

const btn1 = document.querySelector("#btn1");
const btn2 = document.querySelector("#btn2");
const btn3 = document.querySelector("#btn3");

const ok = document.querySelector(".popup");

btn1.addEventListener('mouseenter', enterr);
btn1.addEventListener('mouseleave', leavee);
btn2.addEventListener('mouseenter', enterr);
btn2.addEventListener('mouseleave', leavee);
btn3.addEventListener('mouseenter', enterr);
btn3.addEventListener('mouseleave', leavee);
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
    dv0.style.display = "none";
    btn1.style.background = 'transparent';
    btn2.style.background = 'transparent';
    btn3.style.background = 'transparent';
    btn1.addEventListener('mouseenter', enterr);
    btn1.addEventListener('mouseleave', leavee);
    btn2.addEventListener('mouseenter', enterr);
    btn2.addEventListener('mouseleave', leavee);
    btn3.addEventListener('mouseenter', enterr);
    btn3.addEventListener('mouseleave', leavee);
}
function defaultview() {
    dv1.style.display = "none";
    dv2.style.display = "none";
    dv3.style.display = "none";
    dv0.style.display = "flex";
    btn1.style.background = 'transparent';
    btn2.style.background = 'transparent';
    btn3.style.background = 'transparent';
    btn1.addEventListener('mouseenter', enterr);
    btn1.addEventListener('mouseleave', leavee);
    btn2.addEventListener('mouseenter', enterr);
    btn2.addEventListener('mouseleave', leavee);
    btn3.addEventListener('mouseenter', enterr);
    btn3.addEventListener('mouseleave', leavee);
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
function okPop() {
    ok.style.transform = ''
    ok.style.display = 'none';
}
function cadP() {
    if (dvcadp1.style.display != "flex") {
        dvcadp1.style.display = "flex";
        dveditp1.style.display = "none";
        dvviewp1.style.display = "none";
        btcadp1.style.background = "#11111170";
        bteditp1.style.fontWeight = "300";
        btviewp1.style.fontWeight = "300";
        btcadp1.style.fontWeight = "700";
        bteditp1.style.background = "#ecf0f11a";
        btviewp1.style.background = "#ecf0f11a";
    }
}
function viewP() {
    if (dvviewp1.style.display != "flex") {
        dvviewp1.style.display = "flex";
        dveditp1.style.display = "none";
        dvcadp1.style.display = "none";
        btviewp1.style.background = "#11111170";
        bteditp1.style.fontWeight = "300";
        btcadp1.style.fontWeight = "300";
        btviewp1.style.fontWeight = "700";
        bteditp1.style.background = "#ecf0f11a";
        btcadp1.style.background = "#ecf0f11a";
    }
}

function editP() {
    if (dveditp1.style.display != "flex") {
        dveditp1.style.display = "flex";
        dvviewp1.style.display = "none";
        dvcadp1.style.display = "none";
        bteditp1.style.background = "#11111170";
        btviewp1.style.background = "#ecf0f11a";
        btcadp1.style.background = "#ecf0f11a";
        bteditp1.style.fontWeight = "700";
        btcadp1.style.fontWeight = "300";
        btviewp1.style.fontWeight = "300";
    }

}

function cadF() {
    if (dvcadf2.style.display != "flex") {
        dvcadf2.style.display = "flex";
        dveditf2.style.display = "none";
        btcadf2.style.background = "#11111170";
        bteditf2.style.fontWeight = "300";
        btcadf2.style.fontWeight = "700";
        bteditf2.style.background = "#ecf0f11a";
    }
}

function editF() {
    if (dveditf2.style.display != "flex") {
        dveditf2.style.display = "flex";
        dvcadf2.style.display = "none";
        bteditf2.style.background = "#11111170";
        btcadf2.style.background = "#ecf0f11a";
        bteditf2.style.fontWeight = "700";
        btcadf2.style.fontWeight = "300";
    }
}
function marc() {
    if (dvmarcc1.style.display != "flex") {
        dvmarcc1.style.display = "flex";
        dvrealc1.style.display = "none";
        //dvviewc1.style.display = "none";
        btmarc1.style.background = "#11111170";
        // btview1.style.background = "#ecf0f11a";
        btreal1.style.background = "#ecf0f11a";
        btmarc1.style.fontWeight = "700";
        //btview1.style.fontWeight = "300";
        btreal1.style.fontWeight = "300";
    }
}

function view() {
    if (dvviewc1.style.display != "flex") {
        dvviewc1.style.display = "flex";
        dvmarcc1.style.display = "none";
        dvrealc1.style.display = "none";
        btview1.style.background = "#11111170";
        btreal1.style.background = "#ecf0f11a";
        btmarc1.style.background = "#ecf0f11a";
        btview1.style.fontWeight = "700";
        btreal1.style.fontWeight = "300";
        btmarc1.style.fontWeight = "300";
    }
}
function real() {
    if (dvrealc1.style.display != "flex") {
        dvrealc1.style.display = "flex";
        dvmarcc1.style.display = "none";
        //dvviewc1.style.display = "none";
        btreal1.style.background = "#11111170";
        //btview1.style.background = "#ecf0f11a";
        btmarc1.style.background = "#ecf0f11a";
        btreal1.style.fontWeight = "700";
        // btview1.style.fontWeight = "300";
        btmarc1.style.fontWeight = "300";
    }
}

