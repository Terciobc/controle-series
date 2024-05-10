<x-layout title="Séries buscadas">
    <a href=" {{ route('series.create')}}" class="btn btn-dark mb-2">Adicionar uma nova série</a>

    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>  
    @endisset
    

    <ul class="list-group">
        @foreach($series as $series)
            <li class="list-group-item mb-1 d-flex justify-content-between align-items-center">
                {{ $series -> nome }} 

                <span class="d-flex">
                    <a href="{{ route('series.edit', $series->id) }}" class="btn btn-primary btn-sm">
                        E
                    </a>
                    <form action="{{route("series.destroy", $series->id)}}"
                            method="post" 
                            class="ms-2">
                     
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                X
                            </button>
                        </form>
                </span>
            </li>
        @endforeach
    </ul>

</x-layout>
