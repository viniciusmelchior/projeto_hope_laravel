@extends('_layout.layout_base')


@section('content')
    
    <div class="form-flex">
        <div>
            <h2>Escolha uma instituição de sua confiança e doe qualquer valor </h2>
            <form action="{{route('doar')}}" method="post">
                @csrf
                <div class="input-div">
                    <label for="instituicao">Instituição</label>
                    <select name="instituicao" id="" class="input-div">
                        @foreach ($instituicoes as $instituicao )
                            <option value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-div">
                    <label for="valor">Valor da Doação</label>
                    <input type="number" name="valor" id="">
                </div>
                <div>
                    <input type="submit" value="Confirmar Doação" class="btn btn-principal">
                </div>
            </form>
        </div>
    </div>
  

@endsection

    
