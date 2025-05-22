<?php

class UtilisateurService implements IUtilisateurService
{
    protected $utilisateurRepository;

    public function __construct(IUtilisateurRepository $utilisateurRepository)
    {
        $this->utilisateurRepository = $utilisateurRepository;
    }

    public function getAllUtilisateurs()
    {
        return $this->utilisateurRepository->getAllUtilisateurs();
    }

    public function getUtilisateurById($id)
    {
        return $this->utilisateurRepository->getUtilisateurById($id);
    }

    public function createUtilisateur(array $data)
    {
        // You can add validation logic here if needed

        
        return $this->utilisateurRepository->createUtilisateur($data);
    }

    public function updateUtilisateur($id, array $data)
    {
        return $this->utilisateurRepository->updateUtilisateur($id, $data);
    }
}
?>