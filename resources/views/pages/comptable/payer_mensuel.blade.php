@extends('pages.comptable.master_comptable', ['title' => ' | Inscription'])

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/fullcalendar/dist/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Mensualité</h6>
    <h6 class="fullcalendar-title h2 text-white d-inline-block mb-0">Full calendar</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('payement.create') }}">Payement</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mensualité</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
    <div class="row">
        <div class="col">
          <!-- Fullcalendar -->
          <div class="card card-calendar">
            <!-- Card header -->
            <div class="card-header">
              <!-- Title -->
              <h5 class="h3 mb-0">Calendar</h5>
            </div>
            <!-- Card body -->
            <div class="card-body p-0">
              <div class="calendar" data-toggle="calendar" id="calendar"></div>
            </div>
          </div>
          <!-- Modal - Add new event -->
          <!--* Modal header *-->
          <!--* Modal body *-->
          <!--* Modal footer *-->
          <!--* Modal init *-->
          <div class="modal fade" id="new-event" tabindex="-1" role="dialog" aria-labelledby="new-event-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
              <div class="modal-content">
                <!-- Modal body -->
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
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary new-event--add">Add event</button>
                  <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal - Edit event -->
          <!--* Modal body *-->
          <!--* Modal footer *-->
          <!--* Modal init *-->
          <div class="modal fade" id="edit-event" tabindex="-1" role="dialog" aria-labelledby="edit-event-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
              <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                  <form class="edit-event--form">
                    <div class="form-group">
                      <label class="form-control-label">Event title</label>
                      <input type="text" class="form-control form-control-alternative edit-event--title" placeholder="Event Title">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label d-block mb-3">Status color</label>
                      <div class="btn-group btn-group-toggle btn-group-colors event-tag mb-0" data-toggle="buttons">
                        <label class="btn bg-info active"><input type="radio" name="event-tag" value="bg-info" autocomplete="off" checked></label>
                        <label class="btn bg-warning"><input type="radio" name="event-tag" value="bg-warning" autocomplete="off"></label>
                        <label class="btn bg-danger"><input type="radio" name="event-tag" value="bg-danger" autocomplete="off"></label>
                        <label class="btn bg-success"><input type="radio" name="event-tag" value="bg-success" autocomplete="off"></label>
                        <label class="btn bg-default"><input type="radio" name="event-tag" value="bg-default" autocomplete="off"></label>
                        <label class="btn bg-primary"><input type="radio" name="event-tag" value="bg-primary" autocomplete="off"></label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">Description</label>
                      <textarea class="form-control form-control-alternative edit-event--description textarea-autosize" placeholder="Event Desctiption"></textarea>
                      <i class="form-group--bar"></i>
                    </div>
                    <input type="hidden" class="edit-event--id">
                  </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button class="btn btn-primary" data-calendar="update">Update</button>
                  <button class="btn btn-danger" data-calendar="delete">Delete</button>
                  <button class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('extra-js')
    <script src="{{ asset('assets/vendor/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
@endsection