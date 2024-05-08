{{-- O @csrf faz um tratamento dos dados enviados do formulário --}}

<x-layout title="Adicionar nova série">
    <form action="/series/salvar" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nova Série</label>
            <input class="form-control"
            type="text" 
            name="nome" 
            placeholder="Digite aqui a sua série!">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>        
    </form>
</x-layout>