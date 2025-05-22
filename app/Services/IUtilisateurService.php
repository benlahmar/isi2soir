<?php

interface IUtilisateurService
{
    public function getAllUtilisateurs();
    public function getUtilisateurById($id);
    public function createUtilisateur(array $data);
    public function updateUtilisateur($id, array $data);
}

?>