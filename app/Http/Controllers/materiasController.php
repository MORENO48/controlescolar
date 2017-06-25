<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carreras;
use App\Materias;
use DB;

class materiasController extends Controller
{
    public function registrar(){
    	$carreras = Carreras::all();
    	//dd($carreras);
    	return view('registrarMateria', compact('carreras'));
    }

    public function guardar(Request $datos){
        //dd($datos);
    	$materia = new Materias();
    	$materia->nombre=$datos->input('nombre');
    	$materia->credito=$datos->input('credito');
        $materia->carrera_id=$datos->input('carrera');
    	$materia->save();

        //dd($materia);
    	return redirect('/consultarMaterias');
    }

    public function consultar(){
        $materias=DB::table('materia')
            ->join('carrera','materia.carrera_id', '=', 'carrera.id')
            ->select('materia.*', 'carrera.nombre AS nom_carrera')
            ->paginate(5);
            
    	return view('consultarMaterias',compact('materias'));
    }

    public function eliminar($id){
        $materia = Materias::find($id);
        $materia->delete();

        return redirect ('/consultarMaterias');
    }

    public function editar($id){
        $materia=DB::table('materia')
            ->where('materia.id', '=', $id)
            ->join('carrera','materia.carrera_id', '=', 'carrera.id')
            ->select('materia.*', 'carrera.nombre AS nom_carrera')
            ->first();

        $carreras =Carreras::all();

        return view('/editarMateria', compact('materia','carreras'));
    }

    public function actualizar($id, Request $datos){
        $materia= Materias::find($id);
        $materia->nombre=$datos->input('nombre');
        $materia->credito=$datos->input('credito');
        $materia->carrera_id=$datos->input('carrera');
        $materia->save();

        return redirect ('/consultarMaterias');
    }
}
