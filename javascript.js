const slider=document.querySelector("#slider");
let sliderSection=document.querySelectorAll(".slider__section");
let sliderSectionLast=sliderSection[sliderSection.length-1]; /*Para obtener el último de los query*/ 

const btnLeft=document.querySelector("#btn-left");
const btnRight=document.querySelector("#btn-right");

slider.insertAdjacentElement("afterbegin",sliderSectionLast); /*Método que coloca en este caso, el ultimo al principio*/ 

function Next(){
    let sliderSectionFirst=document.querySelectorAll(".slider__section")[0]; /*Asi le decimos que solo coja uno*/
    slider.style.marginLeft="-200%"; /*Las imaganes avanzan por el Css se cambia y asi avanza*/
    slider.style.transition="all 0.5s";
    /*No podemos hacer todo a la vez por lo que ponemos un TimeOut*/ 
    setTimeout(function(){
        slider.style.transition="none";
        slider.insertAdjacentElement('beforeend',sliderSectionFirst);
        slider.style.marginLeft="-100%";
    }, 500);/*500 es 0.5seg para que sea igual que arriba */
}

function Prev(){
    let sliderSection=document.querySelectorAll(".slider__section");
    let sliderSectionLast=sliderSection[sliderSection.length-1];
    slider.style.marginLeft="0"; 
    slider.style.transition="all 0.5s";
    /*No podemos hacer todo a la vez por lo que ponemos un TimeOut*/ 
    setTimeout(function(){
        slider.style.transition="none";
        slider.insertAdjacentElement('afterbegin',sliderSectionLast);
        slider.style.marginLeft="-100%";
    }, 500);/*500 es 0.5seg para que sea igual que arriba */
}

btnRight.addEventListener('click',function(){
    Next();
});
btnLeft.addEventListener('click',function(){
    Prev();
});


setInterval(function(){
    Next();
},2000);
