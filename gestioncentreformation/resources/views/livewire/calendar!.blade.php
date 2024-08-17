<style>
    #calendar-container{
        width: 100%;
    }
    #calendar{
        padding: 10px;
        width: 1000px;
        height: 570px;
        border:2px solid black;
    }
</style>

<div>
  <div id='calendar-container' wire:ignore>
    <div id='calendar'></div>
  </div>
</div>

@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>
    
    <script>
        document.addEventListener('livewire:load', function() {
            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;
            function eventClick(){
                alert(4)
            }  

            function afficherContenuPrompt() {
                // Récupérer le contenu du clic
                var contenu = event.target.textContent;

                // Afficher une boîte de dialogue prompt avec le contenu
                var valeurPrompt = prompt("Entrez le contenu", contenu);

                // Utilisez la valeur saisie dans le prompt selon vos besoins
                if (valeurPrompt) {
                    // Faites quelque chose avec la valeur saisie
                    console.log("La valeur saisie : " + valeurPrompt);
                }
            }

            var calendarEl = document.getElementById('calendar');
            var checkbox = document.getElementById('drop-remove');
            var data =   @this.events;
            var calendar = new Calendar(calendarEl, {
            events: JSON.parse(data),
            dateClick(info)  {
               var title = prompt('Enter le titre de l\'événement');
               var date = new Date(info.dateStr + 'T00:00:00');
               if(title != null && title != ''){
                 calendar.addEvent({
                    title: title,
                    start: date,
                    allDay: true
                  });
                 var eventAdd = {title: title,start: date};
                 @this.addevent(eventAdd);
                 alert('Great. Now, update your database...');
               }else{
                alert('Event Title Is Required');
               }
            },
            editable: true,
            selectable: true,
            displayEventTime: false,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            },
            eventClick: function(afficherContenuPrompt) {
                console.log(info.event.title)
            },
            

            eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
            loading: function(isLoading) {
                    if (!isLoading) {
                        // Reset custom events
                        this.getEvents().forEach(function(e){
                            if (e.source === null) {
                                e.remove();
                            }
                        });
                    }
                }
            });
            calendar.render();
            @this.on(`refreshCalendar`, () => {
                calendar.refetchEvents()
            });
        });
    </script>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
@endpush