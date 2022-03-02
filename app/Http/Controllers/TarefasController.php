<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tarefa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;



class TarefasController extends Controller
{

    //Transformando CRUD p/ Eloquent

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(){
        $list = Tarefa::all();
        //info do usuario logado
        $user = Auth::user();

       


        return view('tarefas.list', [
            'list' => $list,
            'user' => $user,
            'showName' => Gate::allows('see-name'),
        ]);
    
    }

    public function add(){
        return view('tarefas.add');
    }
    
    public function addAction(Request $request){
        $request->validate([
            'titulo' => ['required', 'string']
        ]);

        $titulo = $request->input('titulo');

        $t = new Tarefa;
        $t->titulo = $titulo;
        $t->save();

        return redirect('/tarefas');
    }

    public function edit($id){
        $data = Tarefa::find($id);

        if($data){
            return view('tarefas.edit', [
                'data' => $data
            ]);
        }
    }
    
    public function editAction(Request $request, $id){
        $request->validate([
            'titulo' => ['required', 'string']
        ]);

        $titulo = $request->input('titulo');
        /*
        $t = Tarefa::find($id);
        $t->titulo = $titulo;
        $t->save();
        */
        Tarefa::find($id)->update(['titulo' => $titulo]);
        return redirect('/tarefas');

    }

    public function del($id){
        Tarefa::find($id)->delete();

        return redirect('/tarefas');
    }

    public function done($id){
        $t = Tarefa::find($id);
        if($t){
            $t->resolvido = 1 - $t->resolvido;
            $t->save();
        }
        return redirect('/tarefas');

    }
    /*
    
    public function list(){
        $list = DB::select('SELECT * FROM tarefas');
        return view('tarefas.list', [
            'list' => $list
        ]);
    }

    public function add(){
        
        return view('tarefas.add');
    }
    public function addAction(Request $request){
        $request->validate([
            'titulo' => ['required', 'string'],
        ]);
        $titulo = $request->input('titulo');
            DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', [
                'titulo' => $titulo,        
            ]);

        return redirect('/tarefas');

      /*
       if($request->filled('titulo')){
            $titulo = $request->input('titulo');
            DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', [
                'titulo' => $titulo,        
            ]);

            return redirect('/tarefas');

       } else{  

            return redirect('/tarefas/add')->with('warning', 'Voce precisa preecher o titulo');

       }
      
    }
    
    public function edit($id){
        $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
            'id' => $id
        ]);

        if(count($data) > 0){
            return view('tarefas.edit', [
                'data' => $data[0]
            ]);

        }else{
            return redirect('/tarefas')->with('warning', 'Não encontrado tarefa');

        }


    }

    public function editAction(Request $request, $id){
        $request->validate([
            'titulo' => ['required', 'string'],
        ]);

        $titulo = $request->input('titulo');

        DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
            'id' => $id,
            'titulo' => $titulo
        ]);
        
        return redirect('/tarefas');

       
        
        if($request->filled('titulo')){
            $titulo = $request->input('titulo');

            DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
                'id' => $id,
                'titulo' => $titulo
            ]);
            
            return redirect('/tarefas');
        } else{
            return redirect('/tarefas/edit/'.$id)->with('warning', 'Não encontrado tarefa para atualizar');

        }
        
        

    }
    
    public function del($id){
        DB::delete("DELETE from tarefas WHERE id = :id", [
            'id' => $id
        ]);
        return redirect('/tarefas');
    }
    
    public function done($id){

        DB::select('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
            'id' => $id
        ]);

        return redirect('/tarefas');
   
    }
    */

}
