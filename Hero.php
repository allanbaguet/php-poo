<?php
require_once __DIR__ . '/Character.php'; //appel du fichier Character contenant la classe Character


/**
 * classe Hero -> classe Fille / classe Character -> classe Mère
 * [Description Hero]
 */
class Hero extends Character
{
    private string $weapon; //string car l'attribut doit définir le nom de l'arme
    private int $weaponDamage; //int car l'attribut doit indiqué les dégats basiques de l'arme
    private string $shield;
    private int $shieldValue;


    public function __construct(int $health, int $rage, string $weapon, int $weaponDamage, string $shield, int $shieldValue = 0) //le = 0 le rend facultatif
    {
        parent::__construct($health, $rage);
        $this->setWeapon($weapon);
        $this->setWeaponDamage($weaponDamage);
        $this->setShield($shield);
        $this->setShieldValue($shieldValue);
    }

    public function __toString()
    {
        return "Hero: Point de vie = " . $this->getHealth() . "<br>" . "Rage =" . $this->getRage() . "<br>" . "Type d'arme =" . $this->weapon . "<br>" . "Dégats de l'arme =" . $this->weaponDamage . "<br>" . "Type d'armure =" . $this->shield . "<br>" . "valeur de l'armure =" . $this->shieldValue;
    }


    /**
     *  méthode retournant la valeur du nom de l'arme du Hero en chaine de caractère
     * @return string
     */
    public function getWeapon(): string
    {
        return $this->weapon;
    }

    /**
     * Méthode affectant la valeur du nom de l'arme du Hero en chaine de caractère
     * @param string $weapon
     */
    public function setWeapon(string $weapon)
    {
        $this->weapon = $weapon;
    }



    /**
     * méthode retournant la valeur des dégats basique de l'arme du Hero
     * @return int
     */
    public function getWeaponDamage(): int
    {
        return $this->weaponDamage;
    }

    /**
     * méthode affectant la valeur des dégats basique de l'arme du Hero
     * @param int $weaponDamage
     */
    public function setWeaponDamage(int $weaponDamage)
    {
        $this->weaponDamage = $weaponDamage;
    }



    /**
     * méthode retournant la valeur du nom de l'armure du Hero en chaine de caractère
     * @return string
     */
    public function getShield(): string
    {
        return $this->shield;
    }

    /**
     * Méthode affectant la valeur du nom de l'armure du Hero en chaine de caractère
     * @param string $shield
     */
    public function setShield(string $shield)
    {
        $this->shield = $shield;
    }



    /**
     * méthode retournant la valeur des dégats encaissé par l'armure du Hero
     * @return int
     */
    public function getShieldValue(): int
    {
        return $this->shieldValue;
    }

    /**
     * méthode affectant la valeur des dégats encaissé par l'armure du Hero
     * @param int $shieldValue
     */
    public function setShieldValue(int $shieldValue)
    {
        $this->shieldValue = $shieldValue;
    }



    /**
     * méthode affectant la valeur des dégats 
     * @param int $damage
     * @return [type]
     */
    public function attacked(int $damage)
    {
        $damageTaken = $damage - $this->getShieldValue();
        if ($damageTaken > 0){
            $this->setHealth($this->getHealth() - $damageTaken);
        }
        $newValue = round($this->getShieldValue() - ($damage / 15));
        $newValue = ($newValue > 0) ? $newValue : 0 ;
        $this->setShieldValue($newValue);
        $this->setRage($this->getRage() + 30);
    }
}