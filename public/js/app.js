$("#imgPost").change(function() {
    var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
        case "jpg":
        case "jpeg":
        case "png":
            $("#uploadButton").attr("disabled", false);
            $("#file-name").html(
                $("#imgPost")
                    .val()
                    .split("\\")
                    .pop()
            );
            break;
        default:
            alert("Este arquivo não é compatível com os formatos permitidos.");
            $("#file-name").html(
                "Formatos permitidos: <strong> jpg</strong>,<strong> jpeg</strong> ou<strong> png</strong>."
            );
            this.value = "";
    }
});

new jBox("Modal", {
    attach: $(".telaCarregamento"),
    content: $(".grabMe"),
    animation: "zoomIn",
    width: "auto",
    height: "auto",
    closeOnEsc: false,
    closeOnClick: false,
    closeButton: false
});

document.addEventListener("DOMContentLoaded", () => {
    $("#cmpTelefone").mask("(00) 00000-0000");

    (document.querySelectorAll(".notification .delete") || []).forEach(
        $delete => {
            const $notification = $delete.parentNode;

            $delete.addEventListener("click", () => {
                $notification.parentNode.removeChild($notification);
            });
        }
    );
});

document.addEventListener("DOMContentLoaded", () => {
    const $navbarBurgers = Array.prototype.slice.call(
        document.querySelectorAll(".navbar-burger"),
        0
    );

    if ($navbarBurgers.length > 0) {
        $navbarBurgers.forEach(el => {
            el.addEventListener("click", () => {
                const target = el.dataset.target;
                const $target = document.getElementById(target);
                el.classList.toggle("is-active");
                $target.classList.toggle("is-active");
            });
        });
    }
});

$(".owl-carousel").owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});

$(".owl-carousel1").owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});

function btnCarregaModalDelete(id) {
    let str = id.replace("modal", "");
    $(".modal").addClass("is-active");
    $(".modal #idPost").val(str);
}

function btnCarregaModalEditar(button) {
    var linha = $(button).closest("tr");
    var nomeMunicipio = linha
        .find("td:eq(0)")
        .text()
        .trim();
    var siglaEstado = linha
        .find("td:eq(1)")
        .text()
        .trim();

    $(".modal #idMunicipio").val(button.id);
    $(".modal #nomeMunicipio").val(nomeMunicipio);
    $(".modal #siglaEstado").val(siglaEstado);

    $(".modal").addClass("is-active");
}

function btnCarregaModalEditarMembro(button) {
    var linha = $(button).closest("tr");
    var Nome = linha
        .find("td:eq(0)")
        .text()
        .trim();
    var Sobrenome = linha
        .find("td:eq(1)")
        .text()
        .trim();
    var DataNascimento = linha
        .find("td:eq(2)")
        .text()
        .trim();

    switch (
        linha
            .find("td:eq(3)")
            .text()
            .trim()
    ) {
        case "Masculino":
            var Sexo = "M";
            break;

        case "Feminino":
            var Sexo = "F";
            break;

        case "Outros":
            var Sexo = "O";
            break;
    }

    var Email = linha
        .find("td:eq(4)")
        .text()
        .trim();
    var Telefone = linha
        .find("td:eq(5)")
        .text()
        .trim();

    $(".modal #cmpIdMembro").val(button.id);
    $(".modal #cmpNome").val(Nome);
    $(".modal #cmpSobreNome").val(Sobrenome);
    $(".modal #cmpDataNascimento").val(DataNascimento);
    $(".modal #cmpSexo").val(Sexo);
    $(".modal #cmpEmail").val(Email);
    $(".modal #cmpTelefone").val(Telefone);

    $(".modal").addClass("is-active");
}

$(".modal-close").click(function() {
    $(".modal").removeClass("is-active");
});

$(".closebtn").click(function() {
    $(".modal").removeClass("is-active");
});

$(".showModal").click(function() {
    $(".modal").addClass("is-active");
});

document.addEventListener("DOMContentLoaded", () => {
    var cont = 0;

    $("#add-campo").click(function() {
        cont++;
        $("#municipios").append(
            '<div id="campo' +
                cont +
                '" style="margin-top: 18px;margin-bottom: 18px">' +
                '<div class="field has-addons">' +
                '<input class="input is-fullwidth is-uppercase" type="text" name="dadosMunicipio[' +
                cont +
                '][cmpNomeMunicipio]" placeholder="Insira aqui..." required>' +
                '<div class="cmpEstado">' +
                '<div class="select" required>' +
                '<select name="dadosMunicipio[' +
                cont +
                '][cmpSiglaEstado]">' +
                "<option selected>Estado...</option>" +
                '<option value="BA">BA</option>' +
                '<option value="SP">SP</option>' +
                "</select>" +
                "</div>" +
                "</div>" +
                '<button class="button is-danger btn-apagar" type="button" id="' +
                cont +
                '"> Remover </button>' +
                "</div>" +
                "</div>"
        );
    });

    $("form").on("click", ".btn-apagar", function() {
        cont--;
        var button_id = $(this).attr("id");
        $("#campo" + button_id + "").remove();
    });
});

document.addEventListener("DOMContentLoaded", () => {
    var contMembros = 0;

    $("#btnAdicionarMembro").click(function() {
        contMembros++;

        $("#divMembroTerritorio").append(
            '<div id="campoMembros' +
                contMembros +
                '">' +
                '<div class="box">' +
                '<div class="columns">' +
                '<div class="column is-11">' +
                '<div class="columns">' +
                '<div class="column is-6">' +
                '<label class="label">Nome</label>' +
                '<div class="control has-icons-left has-icons-right">' +
                '<input class="input" type="text" name="dadosMembro[' +
                contMembros +
                '][cmpNome]" placeholder="Insira o nome do membro aqui" required>' +
                '<span class="icon is-small is-left">' +
                '<i class="fa fa-user"></i>' +
                "</span>" +
                "</div>" +
                "</div>" +
                '<div class="column is-6">' +
                '<div class="control has-icons-left has-icons-right">' +
                '<label class="label">Sobrenome</label>' +
                '<div class="control">' +
                '<input class="input" type="text" name="dadosMembro[' +
                contMembros +
                '][cmpSobreNome]" placeholder="Insira o sobrenome do membro aqui" required>' +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                '<div class="columns">' +
                '<div class="column is-3">' +
                '<label class="label">Data de Nascimento</label>' +
                '<div class="control">' +
                '<input class="input" type="date" name="dadosMembro[' +
                contMembros +
                '][cmpDataNascimento]" placeholder="Text input">' +
                "</div>" +
                "</div>" +
                '<div class="column is-2">' +
                '<label class="label">Sexo</label>' +
                '<div class="control">' +
                '<div class="select is-fullwidth">' +
                '<select name="dadosMembro[' +
                contMembros +
                '][cmpSexo]">' +
                "<option selected disabled>Selecione aqui</option>" +
                '<option value="M">Masculino</option>' +
                '<option value="F">Feminino</option>' +
                '<option value="O">Outros</option>' +
                "</select>" +
                "</div>" +
                "</div>" +
                "</div>" +
                '<div class="column is-4">' +
                '<label class="label">E-mail</label>' +
                '<div class="control has-icons-left has-icons-right">' +
                '<input class="input is-success" type="email" name="dadosMembro[' +
                contMembros +
                '][cmpEmail]" placeholder="Insira o seu E-mail aqui">' +
                '<span class="icon is-left">' +
                '<i class="fa fa-envelope"></i>' +
                "</span>" +
                "</div>" +
                '<p class="help is-success">Este campo não é obrigatório</p>' +
                "</div>" +
                '<div class="column is-3">' +
                '<label class="label">N. Telefone</label>' +
                '<div class="control">' +
                '<input class="input" type="tel" name="dadosMembro[' +
                contMembros +
                '][cmpTelefone]" id="cmpTelefone" required>' +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                '<div class="column">' +
                '<button type="button" class="button is-danger is-fullwidth btnRemoverMembro btnAdicionarRemoverMembro" id="' +
                contMembros +
                '">' +
                '<span class="icon">' +
                '<i class="fa fa-trash fa-2x"></i>' +
                "</span>" +
                "</button>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "<br>" +
                "</div>"
        );

        $("form").on("click", ".btnRemoverMembro", function() {
            contMembros--;
            var button_id = $(this).attr("id");
            $("#campoMembros" + button_id + "").remove();
        });
    });
});

function countChar(val) {
    var len = val.value.length;
    if (len >= 80) {
        val.value = val.value.substring(0, 80);
    } else {
        $(".charNum").text(80 - len);
    }
}
