<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carreras;
use App\Alumnos; 
use DB;

class alumnosController extends Controller
{
    public function registrar(){
    	$carreras = Carreras::all();
        
    	return view('registrarAlumno',compact('carreras'));
    }

    public function guardar(Request $datos){
    	$alumno = new Alumnos();
    	$alumno->nombre=$datos->input('nombre');
    	$alumno->numero_control=$datos->input('control');
    	$alumno->edad=$datos->input('edad');
    	$alumno->sexo=$sexo=$datos->input('sexo');
    	$alumno->carrera_id=$datos->input('carrera');
    	$alumno->save();

    	return redirect('/consultarAlumnos');
    }

    public function consultar(){
    	//$alumnos=Alumnos::paginate(5);
        $alumnos=DB::table('alumnos')
            ->join('carrera','alumnos.carrera_id', '=', 'carrera.id')
            ->select('alumnos.*', 'carrera.nombre AS nom_carrera')
            ->paginate(5);
        //dd($alumnos);    
    	return view('consultarAlumnos',compact('alumnos'));
    }

    public function eliminar($id){
        $alumno = Alumnos::find($id);
        $alumno->delete();
        return redirect ('/consultarAlumnos');
    }

    public function editar($id){
        $alumno=DB::table('alumnos')
            ->where('alumnos.id', '=', $id)
            ->join('carrera','alumnos.carrera_id', '=', 'carrera.id')
            ->select('alumnos.*', 'carrera.nombre AS nom_carrera')
            ->first();

        $carreras =Carreras::all();

        //dd($alumno);

        return view('/editarAlumno', compact('alumno','carreras'));
    }

    public function actualizar($id, Request $datos){
        $alumno= Alumnos::find($id);
        $alumno->nombre=$datos->input('nombre');
        $alumno->numero_control=$datos->input('control');
        $alumno->edad=$datos->input('edad');
        $alumno->sexo=$sexo=$datos->input('sexo');
        $alumno->carrera_id=$datos->input('carrera');
        $alumno->save();

        return redirect ('/consultarAlumnos');
    }
} 
