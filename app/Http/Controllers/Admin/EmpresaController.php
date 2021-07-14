<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Storage;
use App\Models\Log\LogSistema;


class EmpresaController extends Controller
{
    
    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver los dato de la empresa a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.empresas.index');
    }


    public function show(Empresa $empresa)
    {
        return view('admin.empresas.show', compact('empresa'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
        $empresa = Empresa::find($id);
        $empresa->fill($request->all())->save();
        //IMAGE
        if($request->file('file')){
            $path = Storage::disk('public')->put('image',  $request->file('file'));
            $empresa->fill(['file' => asset($path)])->save();
        }

        return redirect()->route('admin.empresas.index')->with('success', 'Empresa actualizado con éxito.');
    }

}
