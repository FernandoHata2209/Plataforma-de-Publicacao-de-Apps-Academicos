const descricaoInput = document.getElementById("description-project-publish");
const contadorCaracteres = document.getElementById("contador");

descricaoInput.addEventListener("input", updateCaracteres);

function updateCaracteres() {
    const descricao = descricaoInput.value;
    const numCaracteres = descricao.length;

    if (numCaracteres <= 125) {
        contadorCaracteres.textContent = `${numCaracteres}/255 caracteres`;
        contadorCaracteres.style.color = 'green'
    }else if(numCaracteres >= 125 && numCaracteres <= 200 ){
        contadorCaracteres.style.color = 'yellow'
        contadorCaracteres.textContent = `${numCaracteres}/255 caracteres`;
    } 
    else if(numCaracteres >= 200 ) {
        contadorCaracteres.style.color = 'red'
        descricaoInput.value = descricao.slice(0, 254);
        contadorCaracteres.textContent = `${numCaracteres}/255 caracteres`;
    }
}
