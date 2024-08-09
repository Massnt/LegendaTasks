function mostrarLegendaApenasNoQuadro() {
    let quadro = document.getElementById('board-container');
    let legendaComponente = document.getElementById('legenda-componente');

    if(quadro){
        legendaComponente.classList.remove('hide');
        legendaComponente.classList.add('show');
    } else {
        legendaComponente.classList.remove('show');
        legendaComponente.classList.add('hide');
    }
}

$('#btn-icone').on('click', function () {
    let legenda = document.getElementById('legenda');
    let icone = document.getElementsByClassName('icone')[0];
    let btnIcone = document.getElementById('btn-icone');

    if(legenda.classList.contains('hide')){
        legenda.classList.remove('hide');
        setTimeout(function() {
            legenda.classList.add('show');
        }, 10);

        icone.textContent = '✖';
        btnIcone.style.bottom = (80 + legenda.getElementsByTagName('li').length * 25).toString() + "px";
    } else {
        legenda.classList.remove('show');
        setTimeout(function() {
            legenda.classList.add('hide');
        }, 10);
        icone.textContent = '?';
        btnIcone.style.bottom = "0"
    }
});

mostrarLegendaApenasNoQuadro();