<?php

namespace App\Console\Commands;

use App\Http\Resources\ActiviteRessource;
use App\Models\Activite;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DailyActivityDispo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verif:daily {date?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description =  'Vérifie les disponibilités des activités dans chaque salle';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $strDateDepart = $this->argument('date');
        if (!$strDateDepart) {
            $dateDepart = Carbon::now()->locale("fr_FR");
        } else {
            $dateDepart = Carbon::createFromFormat("Y-m-d", $strDateDepart)->locale("fr_FR");
        }

        $lesActivites = Activite::all();
        // Pour chaque activité, on vérifie les disponibilités
        foreach ($lesActivites as $activites) {
            $date = new Carbon($dateDepart);
            DailyActivityDispo::verifActivite($activites, $date);
        }
        return Command::SUCCESS;
    }

    static function verifActivite(Activite $activite, DateTime $now) {
        Log::info(sprintf("Date départ : %s", $now->format("Y-m-d")));
        $disponibilites = $activite->disponibilites;
        if (!$disponibilites || count($disponibilites) == 0) {
            $disponibilites = [];

            for ($i = 0; $i < 5; $i++) {
                while ($now->dayOfWeek == 6 || $now->dayOfWeek == 0)
                    $now = $now->add("1 day");
                $tab = self::createCreneauxDispo($now);
                $disponibilites[] = $tab;
                $now = $now->add("1 day");
            }
        } else {
            while (count($disponibilites) > 0) {
                $diff = $now->diffInDays(Carbon::createFromFormat("Y-m-d", $disponibilites[0]['date']), false);
                if ($diff < 0) {
                    array_shift($disponibilites);
                } else
                    break;
            }
            $i = 0;
            $lastDay = Carbon::now()->locale("fr_FR")->sub("1 day");
            while ($i < 5 && isset($disponibilites[$i])) {
                $lastDay = Carbon::createFromFormat("Y-m-d", $disponibilites[$i]['date']);
                $i++;
            }
            $now = $lastDay->add("1 day");
            for ($i; $i < 5; $i++) {
                while ($now->dayOfWeek == 6 || $now->dayOfWeek == 0)
                    $now = $now->add("1 day");
                $disponibilites[] = self::createCreneauxDispo($now);
                $now = $now->add("1 day");
            }
        }
        $activite->disponibilites = $disponibilites;
        $activite->save();
        return $activite;
    }


    static function createCreneauxDispo(DateTime $date) {
        return [
            "date" => $date->format("Y-m-d"),
            "dispo" => [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]
        ];
    }
}

