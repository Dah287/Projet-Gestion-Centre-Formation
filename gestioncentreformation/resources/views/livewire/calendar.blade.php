<style>
    #calendar-container{
        width: 100%;
    }
    #calendar{
        padding: 0px;
        width: 1100px;
        height: 570px;
        border:2px solid black;
    }
    .fc-daygrid {
        width: 1090px; /* Adjust the width of the the daygrid */
    }

</style>

<div>
    <div id='calendar-container' wire:ignore>
        <div id='calendar'></div>
    </div>
</div>

@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>
    


@push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            var Calendar = FullCalendar.Calendar;
        
            var calendarEl = document.getElementById('calendar');
            var events = @json($events);

            console.log(events); // Add this line to check if the events data is received correctly

            var calendar = new Calendar(calendarEl, {
                events: events,
                editable: false,
                selectable: false,
                displayEventTime: false,

            });
        
            calendar.render();
        });
    </script>
@endpush

          
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
@endpush