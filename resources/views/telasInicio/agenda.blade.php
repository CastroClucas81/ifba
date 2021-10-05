@extends('layouts.app')

@section('content')
<link href="{{ asset('css/main.css') }}" rel='stylesheet' />
<link href="{{ asset('css/fullCalendar.css') }}" rel='stylesheet' />

<!-- MODAL VIEW INFO-->
<div class="modal" id="visualizador">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Informações do evento</p>
            <button class="delete" aria-label="close" data-bulma-modal="close"></button>
        </header>
        <section class="modal-card-body">
            <div id="mensagemApagar"></div>
            <div class="visualizarEvento">
                <div id="title" style="font-size: 2rem; font-weight:bold;display: table;margin: 0 auto;">
                </div>
                <br>
                <article class="message is-primary">
                    <div class="message-body">
                        Início do evento: <strong id="inicial"></strong>
                    </div>
                </article>

                <article class="message is-primary">
                    <div class="message-body">
                        Fim do Evento: <strong id="final"></strong>
                    </div>
                </article>

                <!--

                <div id="start">
                </div>

                <div id="end">
                </div>
                -->

                <br>
                @auth
                <div class="buttons">
                    <button class="button is-warning is-fullwidth" name="editarEvento" id="editarEvento">Editar evento</button>
                </div>

                <form id="formularioApagar" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="idApagar" id="id" type="hidden">
                    <button type="submit" class="button is-danger is-fullwidth" name="apagarEvento" id="apagarEvento">apagar evento</button>
                </form>
                @endauth

            </div>
            @auth
            <div class="formularioEditar">
                <div id="mensagemEditar"></div>
                <form method="post" id="formularioEvento" enctype="multipart/form-data">
                    @csrf

                    <input name="id" id="id" type="hidden">
                    <div class="field">
                        <label class="label">Título</label>
                        <div class="control">
                            <input class="input" name="title" id="title" type="text" placeholder="Título do evento">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Cor</label>
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="color" id="color">
                                    <option value="">Selecione</option>
                                    <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                    <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                    <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                    <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                    <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                    <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                    <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                    <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                    <option style="color:#228B22;" value="#228B22">Verde</option>
                                    <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Início do evento</label>
                        <div class="control">
                            <input class="input" type="text" name="start" id="start" placeholder="Data de inicio" onkeypress="DataHora(event, this)">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Fim do evento</label>
                        <div class="control">
                            <input class="input" type="text" name="end" id="end" placeholder="Data fim">
                        </div>
                    </div>

                    <div class="buttons">
                        <button type="submit" class="button is-primary is-fullwidth" name="cadastrarEvento" id="cadastrarEvento" value="cadastrar">Editar evento</button>
                        <button type="button" class="button is-warning is-fullwidth" name="cancelarEditar" id="cancelarEditar" value="cadastrar">Cancelar edição</button>
                    </div>

                </form>
            </div>
            @endauth
        </section>
    </div>
</div>

<!-- MODAL CADASTRAR / DELETAR -->
@auth
<div class="modal" id="cadastrar">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Cadastrar um novo evento</p>
            <button class="delete" aria-label="close" data-bulma-modal="close"></button>
        </header>
        <section class="modal-card-body">
            <div id="mensagemCadastro"></div>

            <form method="post" id="adicionarEvento" enctype="multipart/form-data">
                @csrf
                <div class="field">
                    <label class="label">Título</label>
                    <div class="control">
                        <input class="input" name="title" id="title" type="text" placeholder="Título do evento">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Cor</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="color" id="color">
                                <option value="">Selecione</option>
                                <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                <option style="color:#228B22;" value="#228B22">Verde</option>
                                <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Início do evento</label>
                    <div class="control">
                        <input class="input" type="text" name="start" id="start" placeholder="Data de inicio" onkeypress="DataHora(event, this)">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Fim do evento</label>
                    <div class="control">
                        <input class="input" type="text" name="end" id="end" placeholder="Data fim">
                    </div>
                </div>

                <div class="buttons">
                    <button type="submit" class="button is-primary is-fullwidth" name="cadastrarEvento" id="cadastrarEvento" value="cadastrar">Cadastrar evento</button>
                </div>

            </form>
        </section>

    </div>
</div>
@endauth

<!-- FULL CALENDAR -->
<div class="container is-fluid">
    <div class="box">
        <p class="title has-text-centered">Agenda de eventos</p>
        <hr>
        <!-- MESSAGE SUCCESS -->
        @if (session('success'))
        <div class="notification is-success">
            <button class="delete"></button>
            {{ session('success') }}
        </div>
        @endif

        <div class="calendario">
            <div id='calendar'></div>
        </div>
    </div>
</div>


<!-- BUTTONS ACTIVE MODAL VIEW INFO -->
<button id="btnVisualizar" style="visibility: hidden;"></button>
<button id="btnCadastrar" style="visibility: hidden;"></button>

<script src="{{ asset('js/fullCalendar.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/pt-br.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

@endsection