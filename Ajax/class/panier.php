<?php
class Panier
{
    private $panier;

    public function __construct()
    {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
        $this->panier = &$_SESSION['panier'];
    }
    public function getPanier()
    {
        return $this->panier;
    }
    public function ajouter($id, $qte)
    {
        if (!isset($this->panier[$id])) {
            $this->panier[$id] = 0;
        }
        $this->panier[$id] += $qte;
    }

    public function retirer($id)
    {
        unset($this->panier[$id]);
    }

    public function vider()
    {
        $this->panier = array();
    }
}
