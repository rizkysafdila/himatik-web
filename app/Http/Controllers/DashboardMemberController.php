<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DashboardMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.members.index', [
            'title' => 'Daftar Anggota',
            'members' => Member::latest()->with('department')->orderBy('department_id', 'asc')->get(),
            'departments' => Department::all()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->file('image'));
        $validateData = $request->validate([
            "nim" => ['required', 'numeric'],
            "name" => ['required'],
            "email" => ['email'],
            "department_id" => ['required'],
            "class" => ['required'],
            "image" => ['image', 'file', 'required'],
        ]);

        if ($request->file('image')) {
            $image = date('dmy') . $request->file('image')->getClientOriginalName();
            $validateData['image'] = $request->file('image')->storeAs('members', $image);
        }

        Member::create($validateData);
        return back()->with('success', 'Member has been created!');
    }

    public function update(Request $request, Member $member)
    {
        $validateData = $request->validate([
            "nim" => ['required', 'numeric'],
            "name" => ['required'],
            "email" => ['email'],
            "department_id" => ['required'],
            "class" => ['required'],
        ]);


        $oldImage = Member::where('id', $member->id)->first();

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
            $validateData['image'] = $request->file('image')->storeAs('members', $image);
        }

        $member->update($validateData);
        return back()->with('success', 'Member has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $oldImage = Member::where('id', $member->id)->first();
        if ($oldImage->image) {
            Storage::delete($oldImage->image);
        }
        $member->delete();
        return back()->with('success', 'Member has been deleted!');
    }
}
