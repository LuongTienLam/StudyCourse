@extends('layouts.board')

@section('content')
<div class="course-container">
    <div class="course-heading">
        <a href="#" class="info-title " style="margin-bottom: 10px;">
            <i class="far fa-envelope" id="icon-padding"></i>
            <h5 class="title">Notification</h5>
        </a>
    </div>
    <hr class="sidebar-divider my-0" style="background-color: #4268D6;">
    <div class="note-msg">
        <div class="toast--success border-green" data-toggle="modal" data-target="#modalPrivate">
            <div class="toast__icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="toast__body">
                <div class="toast__msg">
                    <p class="toast__msg-title">
                        Specific Notification
                    </p>
                </div>
            </div>
        </div>
        <div class="toast--success border-warn" data-toggle="modal" data-target="#modalGeneral">
            <div class="toast__icon" style="color: #2f86eb;">
                <i class="fas fa-users"></i>
            </div>
            <div class="toast__body">
                <div class="toast__msg">
                    <p class="toast__msg-title">
                        Genera Notification
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalPrivate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header head-color--pri">
                <h4 class="modal-title" id="myModalLabel">Specific Notification</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">

                <div class="container-fluid">
                    @foreach ($note_privates as $note)
                        <div class="row curs">
                            <div class="col-sm-10">
                                <h3>{{ $note->title }}</h3>
                                <p>{{ $note->content }}</p>
                            </div>
                            <div class="col-sm-2">
                                <i class="far fa-bell"></i>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="modalGeneral" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header head-color--pub">
                <h4 class="modal-title" id="myModalLabel">General Notification</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="container-fluid">
                    @foreach ($note_generals as $note)
                        <div class="row curs-public">
                            <div class="col-sm-10">
                                <p>{{ $note->class->course->name }}</p>
                                <h3>{{ $note->title }}</h3>
                                <p>{{ $note->content }}</p>
                            </div>
                            <div class="col-sm-2">
                                <i class="far fa-bell"></i>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: modalCart -->

</div>
@endsection