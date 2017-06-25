<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carreras;
use App\Maestros;
use DB;

class maestrosController extends Controller
{
    public function registrar(){
    	$carreras = Carreras::all();
    	//dd($carreras);
    	return view('registrarMaestro',compact('carreras'));
    }

    public function guardar(Request $datos){
    	$maestro = new Maestros();
    	$maestro->nombre=$datos->input('nombre');
    	$maestro->clave=$datos->input('clave');
    	$maestro->edad=$datos->input('edad');
    	$maestro->sexo=$sexo=$datos->input('sexo');
    	$maestro->carrera_id=$datos->input('carrera');
    	$maestro->save();

    	return redirect('/consultarMaestros');
    }

    public function consultar(){
        $maestros=DB::table('maestro')
            ->join('carrera','maestro.carrera_id', '=', 'carrera.id')
            ->select('maestro.*', 'carrera.nombre AS nom_carrera')
            ->paginate(5);
            
    	return view('consultarMaestros',compact('maestros'));
    }

    public function eliminar($id){
        $maestro = Maestros::find($id);
        $maestro->delete();

        return redirect ('/consultarMaestros');
    }

    public function editar($id){
        $maestro=DB::table('maestro')
            ->where('maestro.id', '=', $id)
            ->join('carrera','maestro.carrera_id', '=', 'carrera.id')
            ->select('maestro.*', 'carrera.nombre AS nom_carrera')
            ->first();

        $carreras =Carreras::all();

        return view('/editarMaestro', compact('maestro','carreras'));
    }

    public function actualizar($id, Request $datos){
        $maestro= Maestros::find($id);
        $maestro->nombre=$datos->input('nombre');
        $maestro->clave=$datos->input('clave');
        $maestro->edad=$datos->input('edad');
        $maestro->sexo=$sexo=$datos->input('sexo');
        $maestro->carrera_id=$datos->input('carrera');
        $maestro->save();

        return redirect ('/consultarMaestros');
    }
}
