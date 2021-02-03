const card = document.querySelector(".card1");
const circle1 = document.querySelector(".circle3");
const circle2 = document.querySelector(".circle8");
const container = document.querySelector(".example");

container.addEventListener("mousemove", (e) => {
    let xAxis = (window.innerWidth / 2 - e.pageX) / 15;
    let yAxis = (window.innerHeight / 2 - e.pageY) / 10;
    card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
    circle1.style.transform = `translateX(${-xAxis/2}px) translateY(${-yAxis/2}px)`;
    circle2.style.transform = `translateX(${xAxis/2}px) translateY(${yAxis/2}px)`;
});

container.addEventListener("mouseenter", (e) => {
    circle1.style.transition = 'none';
    circle2.style.transition = 'none';

    card.style.transition = 'none';
})
container.addEventListener("mouseleave", (e) => {
    circle1.style.transition = 'all 0.5s ease';
    circle2.style.transition = 'all 0.5s ease';
    card.style.transition = 'all 0.5s ease';
    card.style.transform = `rotateY(0deg) rotateX(0deg)`;
    circle2.style.transform = `translateX(0px) translateY(0px)`;
    circle1.style.transform = `translateX(0px) translateY(0px)`;


});