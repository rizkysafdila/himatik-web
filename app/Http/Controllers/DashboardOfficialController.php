<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Official;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardOfficialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.officials.index', [
            'title' => 'Struktur Kepengurusan',
            'officials' => Official::all()
        ]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Official  $official
     * @return \Illuminate\Http\Response
     */
    public function show(Official $official)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Official  $official
     * @return \Illuminate\Http\Response
     */
    public function edit(Official $official)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Official  $official
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Official $official)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
        ]);

        $oldImage = Official::where('id', $official->id)->first();

        if ($request->file('image') != $oldImage->image) {
            $validateData["image"]  = $oldImage->image;
        } else {
            $validateData["image"]  = "file|image|required";
        }

        if ($request->file('image')) {
            if ($oldImage->image) {
                Storage::delete($oldImage->image);
            }
            $image = date('dmy') . $request->file('image')->getClientOriginalName();
            $validateData['image'] = $request->file('image')->storeAs('officials', $image);
        }

        $official->update($validateData);

        return redirect('/dashboard/officials')->with('success', 'Struktur Kepengurusan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Official  $official
     * @return \Illuminate\Http\Response
     */
    public function destroy(Official $official)
    {
    }
}
