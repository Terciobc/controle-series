<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;


class SeriesController extends Controller
{
    public function index(Request $request){
        // Aqui exibimos todas as séries contidas no banco,
        $series = Serie::all();
        // Com o comando a baixo a gente adiciona uma mensagem em tela ao excluir
        $mensagemSucesso = $request->session()->get("mensagem.sucesso");
    
        return view("series.index")
        ->with("series",$series)
        ->with("mensagemSucesso",$mensagemSucesso);
    }

    public function create()
    {
        return view("series.create");
    }
    
    public function store(Request $request)
    {   
        // Validação dos campos.
        $request -> validate([
            'nome' => ['required', 'min:3'],
        ]);
        $series = Serie::create($request->all());
    

        // O comando acima faz a requisição de todos os dados contidos no banco de dados.

        // $nomeSerie = $request->nome;
        // $serie = new Serie();
        // $serie-> nome = $nomeSerie;
        // $serie-> save();

        return to_route('series.index')
            ->with('mensagem.sucesso',"Série '{$series->nome}' adicionada com sucesso!");
    }

    // public function destroy(Request $request){
    //     // dd($request->route());
    //     $serie = Serie::find($request->series);
    //     Serie::destroy($request -> series);

    //     // Esse trecho de código realiza o carregamento da mensagem e após
    //     // a atualização dá pagina a mensagem deixa de ser exibida. 
    //     session()->flash('mensagem.sucesso',"Série '{$serie->nome}' removida com sucesso!");

    //     return to_route('series.index');
    // }

    public function destroy(Serie $series){
        $series->delete();
        
        return to_route("series.index")
        ->with('mensagem.sucesso',"Série {$series->nome} removida com sucesso!");
    }

    public function edit(Serie $series){
        return view("series.edit")->with("series", $series);
    }

    public function update(Serie $series, Request $request){

        $request -> validate([
            'nome' => ['required', 'min:3'],
        ]);
        // $series->nome = $request->nome;
        $series->fill($request->all());
        $series->save();   
        
        
        return redirect()->route("series.index")
            ->with("mensagem.sucesso","Série '$series->nome' atualizada com sucesso!");
    }
}
