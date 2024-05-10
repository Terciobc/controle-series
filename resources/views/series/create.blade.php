<x-layout title="Adicionar nova série">
    <x-form action="{{ route('series.store')}}" 
    nome= {{old(nome)}}
    update={{false}} 
    />
</x-layout>