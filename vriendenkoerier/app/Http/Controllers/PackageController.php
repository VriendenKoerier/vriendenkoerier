<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => ['required', 'string','min:3', 'max:50'],
            'name' => ['required', 'string','min:3', 'max:50'],
            'description' => ['required', 'string', 'min:10', 'max:800'],
            'height' => ['required', 'integer'],
            'width' => ['required', 'integer'],
            'length' => ['required', 'integer'],
            'weight' => ['required', 'integer'],
            'photo' => ['required', 'file'],
            'email' => ['required', 'e-mail'],
            'phone_number' => ['min:10', 'max:20'],
            'postcode_a' => ['required', 'string', 'min:6', 'max:7'],
            'postcode_b' => ['required', 'string', 'min:6', 'max:7'],
            'avg_confirmed' => ['required']
        ]);

        $postA = preg_replace('~\x{00a0}~','',$request->postcode_a);
        $postB = preg_replace('~\x{00a0}~','',$request->postcode_b);

        //Photo hier opslaan en path terug geven

        $package = [
            'title' => $request->title,
            'name' => $request->name,
            'description' => $request->description,
            'height' => $request->height,
            'width' => $request->width,
            'length' => $request->length,
            'weight' => $request->weight,
            'photo' => 'path hier',
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'postcode_a' => $postA,
            'postcode_b' => $postB,
            'avg_confirmed' => $request->avg_confirmed,
            'show_hash' => Hash::make($request->title)
        ];

        Package::Create($package);

        //return naar de package show pagina
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
