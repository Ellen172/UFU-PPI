
let pares = [2, 4, 6, 8]; // elementos entre colchete, separados por virgula

let primeiroPar = pares[0]; // primeiro elemento com indice 0

let nroElemento = pares.length; // tratado como objeto, possui metodos

let vetorMisto = [2, 'A', true]; // pode aceitar elementos de diferentes tipos 

let impar = []; // pode ser iniciado vazio

// PERCORRENDO

let cont = [1, 2, 3, 4, 5];

for(let i=0; i<cont.length; i++){
    console.log(cont[i]);
}

for (let item of cont) {
    console.log(item); // item é uma variavel definida para receber os elementos do vetor
}

cont.forEach (function(elemento) {
    soma += elemento; // elemento é definido como cada elemento do vetor
})

cont.forEach ( elemento => soma += elemento) // forma reduzida do forEach

