<?php  
    class Game {     
        
        protected $player;
        protected $map; 
        function __construct($player){
        $this->player = $player;
        }     
        public function init(){
            $map = [
                [2,1,0],
                [0,0,0],
                [1,3,1],
            ];
            $this->setMap($map);
        }
        public function launch(){
            echo 'Bienvenue dans le jeu du labyrinthe pour avancer ZQSD';
            $choix = $this->getPlayer()->menuDeplacement();
            $choix = rtrim(fgets(STDIN));
            return $choix;
        }
        public function setMap($map){         
            $this->map = $map;   
        } 
        public function setPos($pos){
            $this->pos = $pos;
        }
        public function getPlayer(){
            return $this->player;
        }
        public function getMap(){
            return $this->map;
        }
        public function getPos(){
            for($line = 0; $line < count($this->getMap()); $line++){
                for($cell = 0; $cell < count($this->getMap()[$line]); $cell++){
                  if($this->getPos()[$line][$cell] === '2'){
                    return [$line,$cell];
                  }
                }
            
            }
        }
        public function showMap(){
            for($line = 0; $line < count($this->getMap()); $line++){
                for($cell = 0; $cell < count($this->getMap()[$line]); $cell++){
                    echo $this->getMap()[$line][$cell];
                }
                echo "\n";
            }
        }
    }
    class Player{ 
        function __construct(){
        }
        public function play($choix, $pos){
            $end = false;
            $map = init();
            do{
                if($choix === 'Z'){
                    echo "Vous montez...\n";
                    $pos->getMap()[0-1][0];
                }elseif($choix === 'Q'){
                    echo "Vous allez à gauche...\n";
                    $pos->getMap()[0][0-1];
                }elseif($choix === 'S'){
                    echo "Vous descendez...\n";
                    $pos->getMap()[0+1][0];
                }elseif($choix === 'D'){
                    echo "Vous allez à droite...\n";
                    $pos->getMap()[0][0+1];
                }elseif($choix) {
                    echo "Choisissez ou vous déplacé \n";
                } else {
                    $choix = $this->menuDeplacement();
                }
            
            }while(!$end);
        }
        public function menuDeplacement(){
            echo "Z - Avancer \n Q- A gauche \n S- Reculer \n D- A droite  ";
            return(int)rtrim(fgets(STDIN));
        }
    }
   
    $player = new Player();    
    $game = new Game($player);
    $game->init();
    $game->showMap();
    $choix = $game->launch();
    $player->play($choix,$pos);
    /* 1 - créer une méthode qui va demander à l'utilisateur de se déplacer 
        2- tester si c'est est un mur
        $this->getMap()[$line][$cell] 
        à chaque tour de boucles demander à l'utlisateur de se déplacer 
        check les coordonnées si il peux se déplacer le but c'est d'avoir atteint 3 
*/
