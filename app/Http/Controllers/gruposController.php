<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carreras;
use App\Materias;
use App\Alumnos;
use App\Maestros;
use App\Grupos;
use App\horarios;
use DB;

class gruposController extends Controller
{
    public function registrar(){
    	$materias = Materias::all();
        $maestros = Maestros::all();
        $horarios = Horarios::all();
    	return view('registrarGrupo', compact('materias','maestros','horarios'));
    }

    public function guardar(Request $datos){
    	$grupo = new Grupos();
    	$grupo->horario_id=$datos->input('horario');
        $grupo->aula=$datos->input('aula');
        $grupo->maestro_id=$datos->input('maestro');
    	$grupo->materia_id=$datos->input('materia');
    	$grupo->save();

    	return redirect('/consultarGrupos');
    }

    public function consultar(){
        $grupos=DB::table('grupo')
            ->join('maestro','grupo.maestro_id', '=', 'maestro.id')
            ->join('materia','grupo.materia_id', '=', 'materia.id')
            ->join('horario','grupo.horario_id', '=', 'horario.id')
            ->select('grupo.id','horario.nombre as nom_horario','grupo.aula', 'maestro.nombre as nom_maestro', 'materia.nombre AS nom_materia')
            ->paginate(5);
            
    	return view('consultarGrupos',compact('grupos'));
    }

    public function eliminar($id){
        $grupos = Grupos::find($id);
        $grupos->delete();

        return redirect ('/consultarGrupos');
    }

    public function editar($id){ 
        $grupo= Grupos::find($id);
        $grupo=DB::table('grupo')
            ->where('grupo.id', '=', $id)
            ->join('maestro','grupo.maestro_id', '=', 'maestro.id')
            ->join('materia','grupo.materia_id', '=', 'materia.id')
            ->join('horario','grupo.horario_id', '=', 'horario.id')
            ->select('grupo.*','horario.nombre as nom_horario','grupo.aula', 'maestro.nombre as nom_maestro', 'materia.nombre AS nom_materia')
            ->first();

        $maestros =Maestros::all();
        $materias =Materias::all();
        $horarios =Horarios::all();

        return view('/editarGrupo', compact('grupo','maestros','materias','horarios') );
    }

    public function actualizar($id, Request $datos){
        $grupo= Grupos::find($id);
        $grupo->horario_id=$datos->input('horario');
        $grupo->aula=$datos->input('aula');
        $grupo->maestro_id=$datos->input('maestro');
        $grupo->materia_id=$datos->input('materia');
        $grupo->save();

        return redirect ('/consultarGrupos');
    }
}
