document.addEventListener("DOMContentLoaded", function() {
    var _URL = window.URL || window.webkitURL;

    $("#imagemBanner").change(function(e) {
        var file, img;

        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
                if (this.width > 830 || this.height > 200) {
                    alert(
                        "Tamanho permitido de apenas 828 x 200. A resolução do seu arquivo é de " +
                            this.width +
                            " x " +
                            this.height
                    );
                    $("#imagemBanner").val(null);
                    $("#file-nameImagemBanner").html(
                        "Formatos permitidos:<strong> jpg</strong>,<strong> jpeg</strong> ou<strong> png</strong>. O tamanho da imagem deve ser de <strong>830px / 200px</strong>."
                    );
                    return false;
                } else {
                    $("#file-nameImagemBanner").html(
                        $("#imagemBanner")
                            .val()
                            .split("\\")
                            .pop()
                    );
                    previewImagem();
                    return true;
                }
            };
            img.onerror = function() {
                alert("Formato inválido: " + file.type);

                $("#imagemBanner").val(null);
                $("#file-nameImagemBanner").html(
                    "Formatos permitidos:<strong> jpg</strong>,<strong> jpeg</strong> ou<strong> png</strong>. O tamanho da imagem deve ser de <strong>830px / 200px</strong>."
                );
            };
            img.src = _URL.createObjectURL(file);
        }
    });

    var inputInicio = document.getElementById("DataInicio");
    inputInicio.addEventListener("change", function() {
        var agora = new Date();
        var escolhida = new Date(this.value);
        if (escolhida < agora)
            this.value = [
                agora.getFullYear(),
                agora.getMonth() + 1,
                agora.getDate()
            ]
                .map(v => (v < 10 ? "0" + v : v))
                .join("-");
    });

    var inputFim = document.getElementById("DataFim");
    inputFim.addEventListener("change", function() {
        var agora = new Date();
        var escolhida = new Date(this.value);
        if (escolhida < agora)
            this.value = [
                agora.getFullYear(),
                agora.getMonth() + 1,
                agora.getDate()
            ]
                .map(v => (v < 10 ? "0" + v : v))
                .join("-");
    });
});

function previewImagem() {
    var imagem = document.querySelector("input[name=imagemBanner]").files[0];
    var preview = document.querySelector("img[name=preview]");
    var nomeArquivo = document.querySelector("span[class=file-name]");

    var reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
    };

    if (imagem) {
        reader.readAsDataURL(imagem);
    } else {
        preview.src = "";
    }
}
