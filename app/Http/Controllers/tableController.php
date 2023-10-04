<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class tableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        if (strlen($cari)) {
            $data = employee::where('name', ' like', '%$cari%')->orWhere('age', 'like', '%$cari%')->paginate(5);
        }else{
            $data = employee::orderBy('name','desc')->paginate(5);
        }
        return view('table.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('table.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Session::flash('name', $request->name); //gar data di label tidak hilang

        $request->validate([
            'name'=>'required|unique:employee,name',
            'age'=>'required|numeric',
            'hobby'=>'required',
        ],[
            'name.required'=>'name harus diisi',
            'name.unique'=>'name sudah ada',
            'age.numeric'=>'age harus angka',
        ]);
        $data = [
            'name'=>$request->name,
            'age'=>$request->age,
            'hobby'=>$request->hobby,
        ];
        employee::create($data);
        return redirect()->to('table')->with('Success', 'data uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = employee::where('name', $id)->first();
        return view('table.edit')->with('data', $data);
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
        $request->validate([
            'name'=>'required',
            'age'=>'required|numeric',
            'hobby'=>'required',
        ],[
            'name.required'=>'name harus diisi',
            'name.unique'=>'name sudah ada',
            'age.numeric'=>'age harus angka',
        ]);
        $data = [
            'name'=>$request->name,
            'age'=>$request->age,
            'hobby'=>$request->hobby,
        ];
        employee::where('name', $id)->update($data);
        return redirect()->to('table')->with('Success', 'data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        employee::where('name',$id)->delete();
        return redirect()->to('table')->with('success','deleted'); 
    }
}
