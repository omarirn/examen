<?php

namespace App\Http\Controllers;

use App\Empleados;
use App\Http\Models\EmpleadoModel;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Funcion para obtener todos los registros de empledos que no este eliminados
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return Empleados::where('eliminado',0)->get();
        }else{
            return view('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Funcion para guardar los registros
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Empleados::find($request->codigo)){
            return null;
        }
        if($request->id == '' && empty($request->id)){
            $empleado = new Empleados();
            $empleado->codigo=$request->codigo;
            $empleado->nombre=$request->nombre;
            $empleado->salarioDolares=$request->salarioDolares;
            $empleado->salarioPesos=$request->salarioPesos;
            $empleado->direccion=$request->direccion;
            $empleado->estado=$request->estado;
            $empleado->direccion=$request->direccion;
            $empleado->ciudad = $request->direccion;
            $empleado->telefono = $request->telefono;
            $empleado->correo = $request->correo;
            $empleado->activo = $request->activo;
            $empleado->eliminado = $request->eliminado;
        }else{
            $empleado = Empleados::find($request->id);
            $empleado->codigo=$request->codigo;
            $empleado->nombre=$request->nombre;
            $empleado->salarioDolares=$request->salarioDolares;
            $empleado->salarioPesos=$request->salarioPesos;
            $empleado->direccion=$request->direccion;
            $empleado->estado=$request->estado;
            $empleado->direccion=$request->direccion;
            $empleado->ciudad = $request->direccion;
            $empleado->telefono = $request->telefono;
            $empleado->correo = $request->correo;
            $empleado->activo = $request->activo;
            $empleado->eliminado = $request->eliminado;
        }
        $empleado->save();

        return $empleado;
    }

    /**
     * funcion para obtener el detalle
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Empleados::where('id',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * funcion para el eliminado logico
     * @param $id
     * @return bool
     * @author Omar
     */
    public function destroy($id){
        try{
            return Empleados::where('id',$id)->update(['eliminado' => true]);
            //$empleado = new EmpleadoModel();
            //$data = $empleado->eliminarEmpleado($id);
            //return $data;
        }catch (\Exception $e){
            return false;
        }
    }

    /**
     * @param Request $request
     * @return mixed
     * @author Omar
     */
    public function cambiarEstatus(Request $request){
        return Empleados::where('id',$request->id)->update(['activo' => $request->activo]);
    }
}
