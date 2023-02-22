<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function index()
    {
        $motors = Motor::all();
        return view('content.motor.index', compact('motors'));
    }

    public function create()
    {
        return view('content.motor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_motor' => 'required',
            'harga' => 'required',
        ]);

        Motor::create([
            'nama' => $request->nama,
            'jenis_motor' => $request->jenis_motor,
            'harga' => $request->harga
        ]);

        return redirect(route('list_motor'));
    }

    public function edit(Motor $motor)
    {
        return view('content.motor.edit', compact('motor'));
    }

    public function update(Request $request, Motor $motor)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_motor'=> 'required',
            'harga' => 'required'
             
        ]);

        $motor->update([
            'nama' => $request->nama,
            'jenis_motor' => $request->jenis_motor,
            'harga' => $request->harga
        ]);

        return redirect(route('list_motor'));
    }

    public function delete(Motor $motor)
    {
        $motor->delete();
        return redirect(route('list_motor'));
    }    
    
    
}