window.addEventListener('load', function(){

    var loader = document.querySelector('.loader');
    loader.classList.add('saida');

    this.setTimeout(function(){
        loader.style.display = 'none'
    },2000)
})
