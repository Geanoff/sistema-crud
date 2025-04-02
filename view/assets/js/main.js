function mostrar_toast(id) {
    let toast = document.getElementById(id);
    toast.style.right = "0px";
    toast.style.opacity = "1";

    setTimeout(() => {
        toast.style.right = "-300px";
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