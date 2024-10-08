@extends('layouts.user_layout')

@section('content')
<h1>Plano de Treino</h1>
@if($plano != null)
    <div class="text-right">
        <a href="{{ route('exportar_pdf') }}" class="btn btn-danger">Exportar PDF</a>
    </div>

    <br>

    <ul class="list-group">
        <li class="list-group-item">
            <h6>Nome: {{ \App\Models\User::find($plano->user_id)->name }}</h6>
            <h6>Objetivo: {{$plano->objetivo}}</h6>
            <h6>Ínicio: {{$plano->created_at->format('d/m/Y')}}</h6>
        </li>
    </ul>

    <br>
    @if ($plano->youtube_link)
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $plano->youtube_link }}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    @else
        <p>Vídeo não disponível.</p>
    @endif
    <br>

    @foreach(App\Models\Dia::where("plano_treino_id", $plano->id)->get() as $dia)
        <br>
        <ul class="list-group">
            <li class="list-group-item col-md-12" style="background-color: darkgrey; color: whitesmoke">
                <h6>Dia {{$dia->numero}} ({{$dia->titulo}})</h6>
            </li>
            @foreach(\App\Models\DiaExercicio::where('dia_id', $dia->id)->get() as $diaExercicio)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <div class="text-left">
                                <h6>{{\App\Models\Exercicio::where('id', $diaExercicio->exercicio_id)->first()->nome}}</h6>
                            </div>
                            <img style="max-width: 100%"
                                src="{{ asset(\App\Models\Exercicio::where('id', $diaExercicio->exercicio_id)->first()->foto_video)}}">
                        </div>
                        <div class="col-md-5">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Repetições:</b> {{$diaExercicio->rep}}</li>
                                <li class="list-group-item"><b>Série:</b> {{$diaExercicio->serie}}</li>
                                <li class="list-group-item"><b>Tempo de Descanso:</b> {{$diaExercicio->tempo_desc}}</li>
                                <li class="list-group-item">
                                    @if($diaExercicio->carga == null)
                                        Sem Carga
                                    @else
                                        <b>Carga:</b> {{$diaExercicio->carga}}
                                    @endif
                                </li>
                                <li class="list-group-item">
                                    <b>Técnica:</b> {{$diaExercicio->tecnica}}
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 text-left">
                            <label for="obseravoces"> Observações</label><br>
                            <TEXTAREA cols="42" rows="6" id="observacoes"
                                name="observacoes">{{$diaExercicio->observacoes}}</TEXTAREA>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endforeach
@else
    <p>Ainda não tem nenhum plano de treino atribuido.</p>
@endif
@endsection