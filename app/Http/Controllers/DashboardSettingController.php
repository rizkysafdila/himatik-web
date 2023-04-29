<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view('dashboard.settings.index', [
            "title" => "Setting",
            "setting" => $setting
        ]);
    }


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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $validateData = $request->validate([
            "title" => ['required'],
            "email" => ['email'],
            "motto" => ['required'],
            "description" => ['required', 'min:10'],
        ]);

        $oldImage = Setting::where('id', $setting->id)->first();

        if ($request->file('icon') != $oldImage->icon) {
            $validateData["icon"]  = $oldImage->icon;
        } else {
            $validateData["icon"]  = "file|icon|required";
        }

        if ($request->file('icon')) {
            if ($oldImage->icon) {
                Storage::delete($oldImage->icon);
            }
            $icon = date('dmy') . $request->file('icon')->getClientOriginalName();
            $validateData['icon'] = $request->file('icon')->storeAs('settings', $icon);
        }

        if ($request->file('favicon') != $oldImage->favicon) {
            $validateData["favicon"]  = $oldImage->favicon;
        } else {
            $validateData["favicon"]  = "file|favicon|required";
        }

        if ($request->file('favicon')) {
            if ($oldImage->favicon) {
                Storage::delete($oldImage->favicon);
            }
            $favicon = date('dmy') . $request->file('favicon')->getClientOriginalName();
            $validateData['favicon'] = $request->file('favicon')->storeAs('settings', $favicon);
        }

        $setting->update($validateData);
        return back()->with('success', 'Setting has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
