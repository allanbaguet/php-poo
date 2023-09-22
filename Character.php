<?php 

    class Character { //création de la classe Character
        private int $health; //private correspond à la portée des attributs / $health est un attribut
        private int $rage;

        /**
         * Méthode magique appelée automatiquement lors de l'instanciation de la classe
         * Hydrate l'objet -> affecte des valeurs
         * @param int $health
         * @param int $rage
         */
        public function __construct(int $health, int $rage) { //méthode crée afin d'accéder aux attribut de la classe
            $this -> setHealth($health);
            $this -> setRage($rage);

            // $this->health = $health; 
            // $this->rage = $rage;
        }

        

        /**
         * méthode retournant la valeur de la santé d'un personnage
         * @return int (valeur comprises entre x et x )
         */
        public function getHealth(): int //récupération des valeurs de l'attribut / Getter / et un entier
        {
            return $this->health; //
        }

        /**
         * Méthode affectant la valeur de la santé à un personnage
         * @param int $health
         */
        public function setHealth(int $health)
        {
            $this->health = $health;
        }


        
        /**
         * méthode retournant la valeur de la rage d'un personnage
         * @return int
         */
        public function getRage(): int {
            return $this->rage;
        }
        

        /**
         * Méthode affectant la valeur de la rage à un personnage
         * @param mixed $rage
         */
        public function setRage(int $rage) {
            $this->rage = $rage;
        }

    }

    
?>