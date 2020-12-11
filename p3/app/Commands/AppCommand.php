<?php

namespace App\Commands;

class AppCommand extends Command
{
    
    public function fresh()
    {
            $this->migrate();
            $this->seed();
    }
        
    public function migrate()
    {
        $this->app->db()->createTable('battles', [
            'playerpath' => 'varchar(255)',
            'playerroll' => 'int',
            'dragon' => 'varchar(255)',
            'dragonattack' => 'int',
            'outcome' => 'varchar(255)', # win, lose, tie
            'time' => 'timestamp' 
        ]);
    }

    public function seed()
    {
        $faker = \Faker\Factory::create();

        # the loop creates fake past rounds of data for the db
        for ($i = 0; $i < 10; $i++) {
        
        $playerpaths = ['Path of Cold Ice', 'Path of Toasty Fire', 'Path of the Gentle Breeze', 'Path of the Water Droplet', 'Path of Peace & Love'];
        $randomplayerpath = array_rand($playerpaths);

        $playerrolls = [12, 2, 15, 10, 25];
        $playerdice = rand(1, 20);
        $playerattack = array_rand($playerrolls) + $playerdice;

        $dragons = [
            'dragon1' => ['dragontype' => 'Blue Dragon', 'attackpower' => 15, 'attacktype' => 'waterjet'],
            'dragon2' => ['dragontype' => 'Red Dragon', 'attackpower' => 8, 'attacktype' => 'weak fire'],
            'dragon3' => ['dragontype' => 'Black Dragon', 'attackpower' => 10, 'attacktype' => 'smoke'],
            'dragon4' => ['dragontype' => 'Gold Dragon', 'attackpower' => 27, 'attacktype' => 'phoenix of the blazing sun mega light'],
            'dragon5' => ['dragontype' => 'Grey Dragon', 'attackpower' => 20, 'attacktype' => 'deadly assassin poison'],
            'dragon6' => ['dragontype' => 'Fuchsia Dragon', 'attackpower' => 17, 'attacktype' => 'cherry petal tornado'],
        ];
        $battledragon = $dragons[array_rand($dragons)];

        $dicerolldragon = rand(1, 20);

        $dragonattack = $battledragon['attackpower'] + $dicerolldragon;

        if ($playerattack > $dragonattack) {
            $playeroutcome = 'The wizard wins!';
        } elseif ($playerattack < $dragonattack) {
            $playeroutcome = 'The wizard lost!';
        } else {
            $playeroutcome = 'There was a tie.';
        }
        

            $battle = [
                'playerpath' => $playerpaths[$randomplayerpath],
                'playerroll' => $playerattack,
                'dragon' => $battledragon['dragontype'],
                'dragonattack' => $dragonattack,
                'outcome' => $playeroutcome,
                'time' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s')
            ];

            $this->app->db()->insert('battles', $battle);
        }
    }
}