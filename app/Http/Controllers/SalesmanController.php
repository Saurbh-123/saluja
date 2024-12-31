<?php

namespace App\Http\Controllers;

use App\Models\Salesman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesmanController extends Controller
{
    public function index()
    {
        $salesman = Salesman::all();
        return view('salesman.index');
    }

  
    public function create()
    {
        return view('salesman.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'salesman_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'phone' => 'required|string|max:12',
            'email' => 'required|email']);
            
        $validated['created_by']=Auth::user()->name ;
        // Create the contact record
        Salesman::create($validated);
        return redirect()->route('salesman.index')->with('success', 'Salesman created successfully');
    }
 
    public function show(string $id)
    {
        $salesman = Salesman::findOrFail($id);
        return view('salesman.show', compact('salesman'));
    }

  
    public function edit(string $id)
    {
        $salesman=Salesman::findOrFail($id);
    //    dd($contact);
        return view('salesman.edit',compact('salesman'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'salesman_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
        ]);
        $data['created_by'] = Auth::user()->name;
        $salesman = Salesman::findOrFail($id); $salesman->update($data); 
        return redirect()->route('salesman.index')->with('success', 'Salesman updated successfully!');
    }

    public function destroy(string $id)
    {
        $salesman=Salesman::findOrFail($id);
        $salesman->delete();
        return  redirect()->route('salesman.index')->with('success','Salesman deleted successfully');

    }
}
