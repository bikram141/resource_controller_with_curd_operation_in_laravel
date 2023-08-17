@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                   <div class="card-header">
                        <h3 class="card-title">{{ $page_title }}
                        </h3>
                        <a href="{{ url()->previous() }}" class="btn btn-white mr-2"><i class="fa fa-arrow-left"
                            aria-hidden="true"></i> Go Back</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('message.alert_msg')
                        <form action="{{route('task.update',[$task->id])}}" method="post">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="col-md-4 pr-5">
                                    <div class="form-group">
                                        <label for="task_name">task_name</label>
                                        <input type="text" class="form-control" name="task_name" value="{{ $task->task_name }}"
                                            id="task_name" placeholder="task_name">
                                    </div>
                                </div>

                                <div class="col-ms-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="gridCheck">
                                            priority
                                          </label>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="priority" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Yes" @if($task->priority == "Yes") checked
                                            @endif>
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="priority" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="No"  @if($task->priority == "No") checked
                                            @endif>
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                <div class="col-md-12 mt-5">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-warning mr-2"> Cancel</a>

                                </div>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
       </div>
    </section>
    <!-- /.content -->


@endsection

