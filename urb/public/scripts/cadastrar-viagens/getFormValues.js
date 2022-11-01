dataChegada = () => document.getElementById("data_chegada").value;
dataSaida = () => document.getElementById("data_saida").value;
// dataRota = () => document.getElementById("data_rota").value;

document.addEventListener('input', () => {
    document.getElementById("data_saida").setAttribute("min", dataChegada());  
    document.getElementById("data_rota_1").setAttribute("min", dataChegada());  
    document.getElementById("data_rota_1").setAttribute("max", dataSaida());  
});

// const rotasList = Array.from(document.getElementById("cadastro_rotas").querySelectorAll('input[type="date"]'));

const arrayAuxiliar = ['data_rota_1'];

function setRotasRangeDate(idRota) {
    console.log('Teste de datas');
    const rotaExiste = arrayAuxiliar.includes(idRota);
    if (!rotaExiste) {
        document.querySelector(`#${idRota}`).setAttribute("min", dataChegada());
        document.querySelector(`#${idRota}`).setAttribute("max", dataSaida());
        arrayAuxiliar.push(idRota)
    }
}
function removeRotasArrayAuxiliar(idRota) {
    const indexAi = arrayAuxiliar.indexOf(idRota);
    arrayAuxiliar.splice(indexAi, 1);
}

