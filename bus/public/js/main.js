import { FormsValidation } from "./validation.js"

new FormsValidation

const choiceAuth = document.querySelectorAll('.authorization__choice-text')
const choiceForm = document.querySelectorAll('.authorization__form')

choiceAuth.forEach((element, index) =>{
    element.addEventListener('click', ()=>{
        if (index === 0){
            element.classList.add('authorization__choice-text--selected')
            choiceForm[0].classList.add('authorization__form--active')
            choiceAuth[1].classList.remove('authorization__choice-text--selected')
            choiceForm[1].classList.remove('authorization__form--active')
        }
        else{
            element.classList.add('authorization__choice-text--selected')
            choiceForm[1].classList.add('authorization__form--active')
            choiceAuth[0].classList.remove('authorization__choice-text--selected')
            choiceForm[0].classList.remove('authorization__form--active')
        }
    })
})

window.checkFileSize = (input) => {
    const errorText = document.querySelector('.authorization__error-img');
    if(input.files[0].size > 1024 * 1024) {
        errorText.style.display = 'block';
        input.value = '';
    }
    else errorText.removeAttribute("style");
}

window.previewFile = () =>{
    const file = document.querySelector('input[type="file"]').files[0];
    let reader = new FileReader();
    reader.addEventListener('load',
        () => {
        const imgBlock = document.querySelector('.authorization__img');
        imgBlock.src = reader.result;
        imgBlock.style.display = "block";
    }, 
    false);

    if (file) {
        reader.readAsDataURL(file);
    }
}


const img = document.querySelector('.authorization__img');
img.addEventListener('click', (event) => {
    img.removeAttribute("src");
    img.removeAttribute("style");
})

document.addEventListener('click', (event)=>{
    const { target } = event
    
    if(!target.closest('.eye')) return

    target.closest('.eye').classList.toggle('slash');
    const password = target.closest('.eye').parentElement.querySelector(':first-child');
    if(password.getAttribute('type') === 'password'){
        password.setAttribute('type', 'text');
    }
    else {
        password.setAttribute('type', 'password');
    }
})






