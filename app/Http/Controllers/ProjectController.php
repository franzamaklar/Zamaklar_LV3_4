<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::where('user_id', auth()->user()->id)->get();
        $projects = Project::all();
        return view('dashboard', compact('project', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = new Project;

        $project->user_id = auth()->user()->id;
        $project->clanovi = $request->clanovi;
        $project->naziv_projekta = $request->naziv_projekta;
        $project->opis_projekta = $request->opis_projekta;
        $project->cijena_projekta = $request->cijena_projekta;
        $project->obavljeni_poslovi = $request->obavljeni_poslovi;
        $project->datum_pocetka = $request->datum_pocetka;
        $project->datum_zavrsetka = $request->datum_zavrsetka;

        $project->save();

        return redirect('/dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

}
