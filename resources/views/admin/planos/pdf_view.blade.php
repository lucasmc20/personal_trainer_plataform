<!DOCTYPE html>
<html>
    <head>
        <title>Alo</title>
    </head>
    <body style="  font-family: Verdana, sans-serif;">
        <h5 style="float:right">Nome: {{$cliente->name}}  <br></br>Objetivo: {{$plano->objetivo}}</h5>
        <div style="clear:both; margin-bottom: 5%"></div>
            @foreach(App\Models\Dia::where("plano_treino_id", $plano->id)->get() as $dia)
                <div style="width: 100%; margin-top: 5%">
                    <table style="width:100%; background-color: #FFF; color:black; text-align: center; border-collapse: collapse; border-spacing: 0;">
                        <thead>
                        <tr>
                            <td colspan="6" style="border: 1px solid darkred; padding:15px; text-align: center; color: whitesmoke; background-color: darkred">Dia {{$dia->numero}} ({{$dia->titulo}})</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid lightgrey; padding:7px; background-color: lightgrey;">
                                Exercícios
                            </td>
                            <td style="border: 1px solid lightgrey; padding:7px; background-color: lightgrey;">
                                Reps
                            </td>
                            <td style="border: 1px solid lightgrey; padding:7px; background-color: lightgrey;">
                                Séries
                            </td>
                            <td style="border: 1px solid lightgrey; padding:7px; background-color: lightgrey;">
                                Descanso
                            </td>
                            <td style="border: 1px solid lightgrey; padding:7px; background-color: lightgrey;">
                                Carga
                            </td>
                            <td style="border: 1px solid lightgrey; padding:7px; background-color: lightgrey;">
                                Técnica
                            </td>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\DiaExercicio::where('dia_id', $dia->id)->get() as $diaExercicio)
                            <tr>
                                <td style="padding: 7px; border-bottom: solid 1px black;">{{\App\Models\Exercicio::where('id', $diaExercicio->exercicio_id)->first()->nome}}</td>
                                <td style="padding: 7px; border-bottom: solid 1px black;">{{$diaExercicio->rep}}</td>
                                <td style="padding: 7px; border-bottom: solid 1px black;">{{$diaExercicio->serie}}</td>
                                <td style="padding: 7px; border-bottom: solid 1px black;">{{$diaExercicio->tempo_desc}}</td>
                                <td style="padding: 7px; border-bottom: solid 1px black;">{{$diaExercicio->carga}}</td>
                                <td style="padding: 7px; border-bottom: solid 1px black;">{{$diaExercicio->tecnica}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach

    </body>
</html>
