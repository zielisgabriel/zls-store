//apresentação
window.addEventListener('load', function(){
    const fraseApresentacao = document.querySelector('.apresentacaoNikeContent')
    fraseApresentacao.classList.toggle('active')
})

//if (window.screenY == 0){
//    const fraseApresentacao = document.querySelector('.apresentacaoNikeContent')
//    fraseApresentacao.classList.toggle('active')
//}

//header
window.addEventListener('scroll', function(){
    const header = document.querySelector('#header')
    header.classList.toggle('rolagem', window.scrollY > 50)
})

//botão de sair
const btnSair = document.querySelector('.sairContent')
btnSair.addEventListener('click', function(){
    const barraSair = document.querySelector('.barraSairContent')
    barraSair.classList.toggle('active')
})