const form = document.getElementById("formLogin")
const inputes = document.querySelectorAll("#formLogin input")

const expresiones = {
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    texto: /^[a-zA-ZÀ-ÿ\s]{1,100}$/
}
const validarFormulario = (e) =>{
    switch (e.target.name){
       
        case "identification":
            if( isNaN(e.target.value) ) {
                document.getElementById("identificationAlert").style.display = "block";
                
            }else{
                document.getElementById("identificationAlert").style.display = "none";
            }
        break;
        case "password":
            if( isNaN(e.target.value) || (e.target.value.length != 4)) {
                document.getElementById("passwordAlert").style.display = "block";
                document.getElementById('btnLogin').disabled = true;
            }else{
                document.getElementById("passwordAlert").style.display = "none";
                document.getElementById('btnLogin').disabled = false;
            }
        break;
    }
    
}
inputes.forEach((input) => {
    input.addEventListener('keyup',validarFormulario);
    input.addEventListener('blur',validarFormulario);
});

const num = document.getElementById('identification');


    const check = () => {
    if (!num.validity.valid) num.value = null;
    if (+num.value < 0) num.value = null;
    
    };

    num.addEventListener('keyup', check);
    num.addEventListener('blur', check);