@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $page_title }}
                    </h3>
                 
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('task.create') }}" class="btn btn-dark btn-sm ">Add
                                task</a>
                          </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('message.alert_msg')
                    <table id="taskTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>task_name</th>
                                <th>priority</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($task->count()>0)
                            @foreach ($task as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->task_name }}</td>
                                <td>
                                    @if($item->priority == "Yes")
                                    <button type="button" class="btn btn-primary">yes</button>
                                    @else
                                    <button type="button" class="btn btn-danger">no</button>
                                    @endif 
                                </td>

                                <td>
                                    <form class="deleteForm float-left"
                                        action="{{ route('task.destroy',$item->id) }}" method="post">
                                        <button class="btn btn-sm btn-danger ml-2" type="submit"
                                            id="deleteButton">delete
                                        </button>
                                        {!! method_field('delete') !!}
                                        {!! csrf_field() !!}
                                    </form>
                                    <a href="{{ route('task.edit', $item->id)}}"
                                        class="btn btn-sm  ml-2 btn-primary">edit</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <td>No task is available</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




