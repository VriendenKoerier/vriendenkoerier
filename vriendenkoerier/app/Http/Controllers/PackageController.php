<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/package/create');
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
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,giv,svg', 'max:2048'],
            'email' => ['required', 'e-mail'],
            'phone_number' => ['min:9', 'max:20'],
            'postcode_a' => ['required', 'string', 'min:6', 'max:7'],
            'postcode_b' => ['required', 'string', 'min:6', 'max:7'],
            'avg_confirmed' => ['required']
        ]);

        $imageName = time().'_'.$request->photo->extension();
        $request->photo->move(public_path('images'), $imageName);

        //spaties, white spaces, tabs etc allemaal weghalen
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
            'photo' => $imageName,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'postcode_a' => $postA,
            'postcode_b' => $postB,
            'avg_confirmed' => true,
            'show_hash' => Hash::make($request->title)
        ];

        $pk = Package::Create($package);

        //return naar de package show pagina
        return redirect('/package/'.$pk->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view('show');
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
