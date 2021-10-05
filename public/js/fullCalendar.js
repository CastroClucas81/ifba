document.addEventListener("DOMContentLoaded", function() {
    var calendarEl = document.getElementById("calendar");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: "pt-br",
        dayMaxEventRows: true,
        views: {
            timeGrid: {
                dayMaxEventRows: 6
            }
        },
        initialView: "dayGridMonth",
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,listYear"
        },
        editable: true,
        //initialDate: '2019-05-12',
        displayEventTime: false,
        //{{ route('fullCalendar.index')}}
        events: "/fullCalendar",
        eventClick: function(info) {
            info.jsEvent.preventDefault();

            let dateStart = new Date(info.event.start);
            let dateEnd = new Date(info.event.end);

            let dataStartFormat = dateStart.toLocaleString("en-GB");

            let dataFinalFormat = dateEnd.toLocaleString("en-GB");

            $("#visualizador #inicial").text(dataStartFormat);
            $("#visualizador #final").text(dataFinalFormat);

            $("#visualizador #id").text(info.event.id);
            $("#visualizador #title").text(info.event.title);
            $("#visualizador #start").text(info.event.start);
            $("#visualizador #end").text(info.event.end);

            $("#visualizador #id").val(info.event.id);
            $("#visualizador #title").val(info.event.title);
            $("#visualizador #start").val(info.event.start.toLocaleString());
            $("#visualizador #end").val(info.event.end.toLocaleString());
            $("#visualizador #color").val(info.event.backgroundColor);
            $("#btnVisualizar").click();
        },
        selectable: true,
        select: function(info) {
            $("#cadastrar #start").val(info.start.toLocaleString());
            $("#cadastrar #end").val(info.end.toLocaleString());
            $("#btnCadastrar").click();
            //alert('Início do evento ' + info.start.toLocaleString());
        }
    });
    calendar.render();

    $(document).ready(function() {
        $("#adicionarEvento").on("submit", function(event) {
            event.preventDefault();
            $.ajax({
                method: "post",
                //{{ route('fullCalendar.store') }}
                url: "/fullCalendarCadastro",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(retorno) {
                    if (retorno["situacao"]) {
                        //$('#mensagemCadastro').html(retorno['mensagem']);
                        location.reload();
                    } else {
                        $("#mensagemCadastro").html(retorno["mensagem"]);
                    }
                }
            });
        });

        $("#editarEvento").on("click", function() {
            $(".visualizarEvento").slideToggle();
            $(".formularioEditar").slideToggle();
        });

        $("#cancelarEditar").on("click", function() {
            $(".formularioEditar").slideToggle();
            $(".visualizarEvento").slideToggle();
        });

        $("#formularioEvento").on("submit", function(event) {
            event.preventDefault();
            $.ajax({
                method: "post",
                //{{ route('fullCalendar.edit') }}
                url: "/fullCalendarEditar",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(retorno) {
                    if (retorno["situacao"]) {
                        //$('#mensagemCadastro').html(retorno['mensagem']);
                        location.reload();
                    } else {
                        $("#mensagemEditar").html(retorno["mensagem"]);
                    }
                }
            });
        });

        $("#formularioApagar").on("submit", function(event) {
            event.preventDefault();
            $.ajax({
                method: "post",
                //{{ route('fullCalendar.delete') }}
                url: "/fullCalendarApagar",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(retorno) {
                    if (retorno["situacao"]) {
                        location.reload();
                    } else {
                        $("#mensagemApagar").html(retorno["mensagem"]);
                    }
                }
            });
        });
    });

    class BulmaModal {
        constructor(selector) {
            this.elem = document.querySelector(selector);
            this.close_data();
        }

        show() {
            this.elem.classList.toggle("is-active");
            this.on_show();
        }

        close() {
            this.elem.classList.toggle("is-active");
            this.on_close();
        }

        close_data() {
            var modalClose = this.elem.querySelectorAll(
                "[data-bulma-modal='close'], .modal-background"
            );
            var that = this;
            modalClose.forEach(function(e) {
                e.addEventListener("click", function() {
                    that.elem.classList.toggle("is-active");

                    var event = new Event("modal:close");

                    that.elem.dispatchEvent(event);
                });
            });
        }

        on_show() {
            var event = new Event("modal:show");

            this.elem.dispatchEvent(event);
        }

        on_close() {
            var event = new Event("modal:close");

            this.elem.dispatchEvent(event);
        }

        addEventListener(event, callback) {
            this.elem.addEventListener(event, callback);
        }
    }

    //MODAL VIEW
    var btn = document.querySelector("#btnVisualizar");
    var mdl = new BulmaModal("#visualizador");

    btn.addEventListener("click", function() {
        mdl.show();
    });

    mdl.addEventListener("modal:show", function() {
        console.log("opened");
    });

    mdl.addEventListener("modal:close", function() {
        console.log("closed");
    });

    //MODAL CADASTRAR
    var btn1 = document.querySelector("#btnCadastrar");
    var md2 = new BulmaModal("#cadastrar");

    btn1.addEventListener("click", function() {
        md2.show();
    });

    md2.addEventListener("modal:show", function() {
        console.log("opened");
    });

    md2.addEventListener("modal:close", function() {
        console.log("closed");
    });
});
