<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index(Request $request){
      
      if($request->has('search')){

        $data = Employee::where('nama','LIKE','%'.$request->search.'%')->paginate(10);

      }else{

        $data = Employee::paginate(10);

      }

        
        return view('datapegawai', compact('data'));
    }
    public function tambahpegawai(){ 
            return view('tambahdata');
    }

    public function insertdata(Request $request){ 

      // $requestData = $request->all();
      // $filename = $request->file('foto')->getClientOriginalName();
      // $path =$request->file('foto')->storeAs('images', $filename, 'public');
      // $requestData["foto"] = '/storage/'.$path;
      // Employee::create($requestData);
      // return redirect ('employee')->with('flash _message', 'Employee Added!');
      
      $data = Employee::create($request->all());
      if($request->hasFile('foto')){
        $request->file('foto')->move('gambarpegawai/', $request->file('foto')->getClientOriginalName());
        $data->foto = $request->file('foto')->getClientOriginalName();
        $data->save();
      
      }
      return redirect()->route('pegawai')->with('success',' Data berhasil disimpan !'); 
    }

    public function tampilkandata($id){ 
        $data = Employee::find($id);
        return view('tampildata', compact('data'));
}

public function updatedata (Request $request, $id){ 
$data = Employee::find($id);
$data->update($request->all());

return redirect()->route('pegawai')->with('success',' Data berhasil di Update ^_^');
}

public function delete ($id){ 
    $data = Employee::find($id);
    $data->delete();
    
    return redirect()->route('pegawai')->with('success',' Data berhasil di Hapus ^_^');
    }

    public function exportexcel (){

      return Excel::download(new EmployeeExport,'datapegawai.xlsx');
      } 
      
public function importexcel (Request $request){
$data = $request->file('file');

$namafile = $data->getClientOriginalName();
$data->move('EmployeeData', $namafile);

Excel::import(new EmployeeImport, \public_path('/EmployeeData/'.$namafile));

return \redirect()->back();
}
}
