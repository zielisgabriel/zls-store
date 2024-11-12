// Seleciona todos os inputs de rádio
document.querySelectorAll('.tamanhos input[type="radio"]').forEach((radio) => {
    radio.addEventListener('change', function() {
        // Remove a classe 'selected' de todos os labels
        document.querySelectorAll('.tamanhos .tamanhoLabel').forEach((label) => {
            label.classList.remove('selected');
        });

        // Adiciona a classe 'selected' ao label correspondente ao input marcado
        const label = document.querySelector(`label[for="${this.id}"]`);
        if (label) {
            label.classList.add('selected');
        }
    });
});

document.querySelectorAll('.enviado').forEach((radio) => {
    radio.addEventListener('change', function() {
        document.querySelectorAll('.enviados .enviadoLabel').forEach((label) => {
            label.classList.remove('selected');
        });

        const labelEnviado = document.querySelector(`label[for="${this.id}"]`);
        if (labelEnviado) {
            labelEnviado.classList.add('selected');
        }
    });
});

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