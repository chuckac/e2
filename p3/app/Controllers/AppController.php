<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */
    public function index()
    {
        $results = $this->app->old('results');

        return $this->app->view('index', [

           'results' => $results
           
        ]);
    }

    public function history()
    {
        
        $battles = $this->app->db()->all('battles');

        return $this->app->view('history', [
            'battles' => $battles
        ]);
    }

    public function battles()
    {
        $id = $this->app->param('id');

        $battle = $this->app->db()->findById('battles', $id);

        return $this->app->view('battles', ['battle'=> $battle]);
        
    }

    public function play()
    {
        $this->app->validate([
            'pathchoice' => 'required'
        ]);
        
        $playerchoice = $this->app->input('pathchoice');

        $playerpaths = [
            'ice' => ['playerpower' => 'Path of Cold Ice', 'powerbonus' => 12, 'powerattack' => 'blizzard'],
            'fire' => ['playerpower' => 'Path of Toasty Fire', 'powerbonus' => 2, 'powerattack' => 'cheap gas station lighter'],
            'wind' => ['playerpower' => 'Path of the Gentle Breeze', 'powerbonus' => 15, 'powerattack' => 'mighty sneeze due to allergies'],
            'water' => ['playerpower' => 'Path of the Water Droplet', 'powerbonus' => 10, 'powerattack' => 'bucket of dirty bath water'],
            'heart' => ['playerpower' => 'Path of Peace & Love', 'powerbonus' => 25, 'powerattack' => 'a drum circle of one million hippies'],
        ];
        
        $attackpower = $playerpaths[$playerchoice]['powerbonus'];
        
        $dicerollplayer = rand(1, 20);
        
        $playerattack = $attackpower + $dicerollplayer;
        
        $dicerolldragon = rand(1, 20);
        
        // dragon stats and power
        
        $dragons = [
            'dragon1' => ['dragontype' => 'Blue Dragon', 'attackpower' => 15, 'attacktype' => 'waterjet'],
            'dragon2' => ['dragontype' => 'Red Dragon', 'attackpower' => 8, 'attacktype' => 'weak fire'],
            'dragon3' => ['dragontype' => 'Black Dragon', 'attackpower' => 10, 'attacktype' => 'smoke'],
            'dragon4' => ['dragontype' => 'Gold Dragon', 'attackpower' => 27, 'attacktype' => 'phoenix of the blazing sun mega light'],
            'dragon5' => ['dragontype' => 'Grey Dragon', 'attackpower' => 20, 'attacktype' => 'deadly assassin poison'],
            'dragon6' => ['dragontype' => 'Fuchsia Dragon', 'attackpower' => 17, 'attacktype' => 'cherry petal tornado'],
        ];
        
        $battledragon = $dragons[array_rand($dragons)];
        
        $dragonattack = $battledragon['attackpower'] + $dicerolldragon;
        
        if ($playerattack > $dragonattack) {
            $playeroutcome = 'The wizard wins!';
        } elseif ($playerattack < $dragonattack) {
            $playeroutcome = 'The wizard lost!';
        } else {
            $playeroutcome = 'There was a tie.';
        }
    

        $data = [
            'playerpath' => $playerpaths[$playerchoice]['playerpower'],
            'playerroll' => $playerattack,
            'dragon' => $battledragon['dragontype'],
            'dragonattack' => $dragonattack,
            'outcome' => $playeroutcome,
            'time' => date('Y-m-d H:i:s')
        ];

        $this->app->db()->insert('battles', $data);

        $this->app->redirect('/', [
            'results' => [
            
                'playerpath' => $playerpaths[$playerchoice]['playerpower'],
                'dicerollplayer' => $dicerollplayer,
                'playerroll' => $playerattack,
                'playerattacktype' => $playerpaths[$playerchoice]['powerattack'],
                'dragon' => $battledragon['dragontype'],
                'dragonattack' => $dragonattack,
                'dragonpowertype' => $battledragon['attacktype'],
                'outcome' => $playeroutcome
            ]
        ]);
    
    }
}