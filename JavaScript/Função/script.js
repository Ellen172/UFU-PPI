function max(a, b){
    if(a>b)
        return a;
    else    
        return b;
    // se não houver um retorna, é devolvido undefined;
}

let maior = max(2, 5);


// TRATANDO EVENTO
function funcaoIniciaPagina(event) {
    // operações
}

window.onload = funcaoIniciaPagina;


// FUNÇÃO ANÔNIMA
window.onload = function (e) {
    // operações
}


// ARROW FUNCTION
window.onload = (a, b) => {
    // operações
}

window.onload = (a, b) => alert("Pagina carregada"); // uma unica operação

window.onload = e => alert("Pagina carregada"); // um unico paramentor

