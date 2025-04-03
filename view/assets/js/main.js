function mostrar_toast(id) {
    let toast = document.getElementById(id);
    toast.style.top = "50px";
    toast.style.opacity = "1";

    setTimeout(() => {
        toast.style.top = "-60px";
        toast.style.opacity = "0";
    }, 2000);
}

function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

function verificarMensagem() {
    const mensagem = getQueryParam('mensagem');
    
    if (mensagem === 'sucesso') {
        mostrar_toast("sucesso");
    }
    else if (mensagem === 'erro') {
        mostrar_toast("erro");
    }
}

window.onload = function() {
    verificarMensagem();
};