<?php 
require_once __DIR__ . "/Character.php";

class Orc extends Character 
{
    private int $damage;


    public function __construct(int $health, int $rage, int $damage = 0)
    {
        parent::__construct($health, $rage);
        $this->setDamage($damage);
    }

    public function __toString():string
    {
        return "Orc : point de vie :" . $this->getHealth() . "<br>" . "Point de rage :" . $this->getRage() . "<br>" . "Dégats :" . $this->getDamage();
    }

    /**
     * méthode retournant la valeur des dégats de l'orc
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }


    /**
     * méthode affectant la valeur des dégats de l'orc
     * @param int $damage
     */
    public function setDamage(int $damage)
    {
        $this->damage = $damage;
    }

    public function attack()
    {
        $this->setDamage(rand(600, 800));
    }

    // public function attacked(int $damage)
    // {
    //     $damageTaken = $this->getHealth() - $damage;
    //     if ($damageTaken > 0) {
    //         $this
    //     }
    // }
    
}