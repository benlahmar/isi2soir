<?php

namespace App\Http\Controllers;

use App\Models\utilisateur;
use Illuminate\Http\Request;
use IUtilisateurService;

class UtilisateurController extends Controller
{
    private $utilisateurService;

    public function __construct(IUtilisateurService $utilisateurService)
    {
        $this->utilisateurService = $utilisateurService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->utilisateurService->getAllUtilisateurs();
        return view('utilisateurs.index', [
            'utilisateurs' => $this->utilisateurService->getAllUtilisateurs()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(utilisateur $utilisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(utilisateur $utilisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, utilisateur $utilisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(utilisateur $utilisateur)
    {
        //
    }
}
