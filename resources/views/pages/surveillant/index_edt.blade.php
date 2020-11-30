@extends('pages.surveillant.master_surveillant', ['title' => 'Créer emploi du temps'])

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Surveillant</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="{{route('surveillant.index')}}"><i class="fas fa-home"></i> Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Créer EDT</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
    <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Créer l'emploi du temps</h3>
        </div>
        <!-- Card body -->
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card-body">
                    <div class="table-responsive py-4">
                        <!--<table class="table table-bordered" id="datatable-basic">
                            
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    @foreach ($liste_jour as $item)
                                        <th class="text-uppercase">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                        
                            <tbody>                             
                                @foreach ($liste_heure as $item)
                                    <tr>
                                        <td class="text-center">{{ $item }}</td>
                                        <td data-toggle="modal" data-target="#new-edt">{{ $loop->count + $loop->index }}</td>
                                        <td data-toggle="modal" data-target="#new-edt">{{ $loop->count + $loop->index }}</td>
                                        <td data-toggle="modal" data-target="#new-edt">{{ $loop->count + $loop->index }}</td>
                                        <td data-toggle="modal" data-target="#new-edt">{{ $loop->count + $loop->index }}</td>
                                        <td data-toggle="modal" data-target="#new-edt">{{ $loop->count + $loop->index }}</td>
                                        <td data-toggle="modal" data-target="#new-edt">{{ $loop->count + $loop->index }}</td>
                                    </tr>
                                    {{-- Modal ici --}}
                                    <div class="modal fade" id="new-edt" tabindex="-1" role="dialog" aria-labelledby="new-event-label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
                                          <div class="modal-content">
                                             {{-- Modal body  --}}
                                            <div class="modal-body">
                                              <form class="new-event--form">
                                                <div class="form-group">
                                                  <label class="form-control-label">Event title</label>
                                                  <input type="text" class="form-control form-control-alternative new-event--title" placeholder="Event Title">
                                                </div>
                                                <div class="form-group mb-0">
                                                  <label class="form-control-label d-block mb-3">Status color</label>
                                                  <div class="btn-group btn-group-toggle btn-group-colors event-tag" data-toggle="buttons">
                                                    <label class="btn bg-info active"><input type="radio" name="event-tag" value="bg-info" autocomplete="off" checked></label>
                                                    <label class="btn bg-warning"><input type="radio" name="event-tag" value="bg-warning" autocomplete="off"></label>
                                                    <label class="btn bg-danger"><input type="radio" name="event-tag" value="bg-danger" autocomplete="off"></label>
                                                    <label class="btn bg-success"><input type="radio" name="event-tag" value="bg-success" autocomplete="off"></label>
                                                    <label class="btn bg-default"><input type="radio" name="event-tag" value="bg-default" autocomplete="off"></label>
                                                    <label class="btn bg-primary"><input type="radio" name="event-tag" value="bg-primary" autocomplete="off"></label>
                                                  </div>
                                                </div>
                                                <input type="hidden" class="new-event--start" />
                                                <input type="hidden" class="new-event--end" />
                                              </form>
                                            </div>
                                            {{-- Modal footer  --}}
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-primary new-event--add">Add event</button>
                                              <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>-->

                        <div id="dp"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')

    <script src="{{ asset('js/daypilot-all.min.js') }}"></script>


    <script type="text/javascript">
        var dp = new DayPilot.Calendar("dp");
      
        //Date format
        dp.locale= "fr-fr";
        dp.viewType= "Week";
        dp.headerDateFormat= "dddd";
      
        //Heure de debut et Heure de fin
        dp.dayBeginsHour= 8,
        dp.dayEndsHour= 20,
      
        // view
        /* dp.startDate = new DayPilot.Date("2020-09-01");  // or just dp.startDate = "2020-09-01";
        dp.viewType = "Week";
       */
        // no events at startup, we will load them later using loadEvents()
        dp.events.list = [];
      
        dp.eventDeleteHandling = "Update";
      
        dp.onBeforeEventRender = function (args) {
        };
      
        dp.onBeforeCellRender = function (args) {
          if (args.cell.start.getHours() === 13) {
            args.cell.backColor = "#eee";
          }
        };
      
        dp.onEventMoved = function (args) {
          DayPilot.Http.ajax({
            url: "backend_move.php",
            data: args,
            success: function(ajax) {
              var response = ajax.data;
              dp.message("Moved: " + response.message);
            }
          });
        };
      
        dp.onEventResized = function (args) {
          DayPilot.Http.ajax({
            url: "backend_move.php",
            data: args,
            success: function(ajax) {
              var response = ajax.data;
              dp.message("Resized: " + response.message);
            }
          });
        };
      
        dp.onEventDeleted = function (args) {
          DayPilot.Http.ajax({
            url: "backend_delete.php",
            data: { id: args.e.id() },
            success: function(ajax) {
              var response = ajax.data;
              dp.message("Deleted: " + response.message);
            }
          });
        };
      
      
        // event creating
        dp.onTimeRangeSelected = function (args) {
          DayPilot.Modal.prompt("New event name:", "Event").then(function(modal) {
      
            dp.clearSelection();
            if (modal.canceled) {
              return;
            }
      
            var name = modal.result;
      
            var params = {
              start: args.start,
              end: args.end,
              text: name
            };
      
            DayPilot.Http.ajax({
              url: "backend_create.php",
              data: params,
              success: function(ajax) {
      
                params.id = ajax.data.id;
                dp.events.add(params);
      
                var response = ajax.data;
                dp.message("Created: " + response.message);
              }
            });
          });
      
        };
      
        dp.init();
      
        loadEvents();
      
        function loadEvents() {
          dp.events.load("backend_events.php");
        }
      
        var elements = {
          day: document.querySelector("#day"),
          week: document.querySelector("#week"),
          
        };

        elements.week.addEventListener("click", function() {
          dp.update({viewType: "Week"});
          dp.events.load("backend_events.php");
        });
      
        /* elements.day.addEventListener("click", function() {
          dp.update({viewType: "Day"});
          dp.events.load("backend_events.php");
        }); */
      
        
    </script>

    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>

@endsection
