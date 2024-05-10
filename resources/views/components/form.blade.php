    <form action="{{ $action }}" method="post">
        @csrf
        @if($update)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input class="form-control" 
            type="text" 
            name="nome" 
            id="nome"
            placeholder="Digite aqui a sua série!"
            @isset($nome)value="{{ $nome }}"@endisset>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>        
    </form>
