<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
class ConfigController extends Controller
{
    public function produtos(Request $request){
        /*
        //all query get ||  input post
        //$data = $request->all();
        $name = $request->input('nome', 'visitante');
        echo "meu nome é ".$name;
        //echo "meu nome é ".$data['nome']; all

        // has foi enviado?
        //filled está preenchido?
        //missign está faltando dados?
        //only  $dados = $request->only(['nome', 'idade']);
        /*
            if($request->filled('estado')){
                echo "tem estado";
            }else{
                echo "n tem";
            }
        
        //outro jeito
        $estado = $request->input('estado', 'Sp');
        echo "$estado <br/>";
        return view('produtos'); 
        */

        //Eloquent ORM (2/2)

        //$list = Tarefa::all();
        //$list = Tarefa::where('resolvido', 0)->get();
        //id
        //$list = Tarefa::find($id);

        //inserir
        //$t = new Tarefa;
        //$t->titulo = 'aa';
        //$t->save();
        
        //update
        //$t = Tarefa::find(2);
        //$t->titulo = 'sad'
        //$t->save();

        //Tarefa::where('resolvido', 1)->update([
          //  'resolvido' => 0
        //]);

        
    }

    public function contato(){
        //Blade: Recebendo dados no View
        $nome = 'Tess';
        $idade = 24;

        $lista = [
            ['nome'=> 'abc', 'idade' => 12],
            ['nome'=> 'csd', 'idade' => 62],
        ];

        $data = [
            'nome' => $nome,
            'idade' => $idade,
            'lista' => $lista
        ];

        return view('contato.contato', $data);
    }

}
