<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Emploi;

class Calendar extends Component
{
    public $events = [];

    public function getEvents()
    {
        $events = Emploi::select('id', 'date', 'professeur_id', 'salle_id', 'groupe_formation_id')->get();
        $formattedEvents = [];

        foreach ($events as $event) {
            
            $formattedEvents[] = [
                'id' => $event->id,
                'title' => " {$event->salle->nomSalle}, {$event->professeur->prenom} {$event->professeur->nom}, {$event->groupeFormation->nomGroupe },{$event->date}",
                'start' => $event->date,
                'allDay' => true,
            ];
        }

        return $formattedEvents;
    }

    public function render()
    {
        $this->events = $this->getEvents();

        return view('livewire.calendar');
    }
}
