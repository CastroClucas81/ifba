@extends('layouts.app')

@section('content')
<div class="container is-fluid">
    <div class="columns">
        <div class="column is-12">
            <div class="box">
                @if (isset($posts))
                @foreach ($posts as $post)
                <p>
                    {{ 'Publicado por '. $post->NomeAutorPublicacao .' no dia '. date('d/m/Y', strtotime($post->updated_at)). ' às ' . date('h:i:s', strtotime($post->updated_at)).'.' }}
                </p>
                <p class="title has-text-centered">{{ $post->tituloPost }}</p>
                <hr>
                <?php echo $post->CorpoPost ?>
                @endforeach
                @else
                <div class="notification is-primary is-centered">
                    <button class="delete"></button>
                    Notícia não encontrada
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection