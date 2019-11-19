@extends ('task/layout')

    @section ('content')

    <a href="{{ action('TaskController@create') }}" class="btn btn-info btn-sm float-right mb-4"> Add New Task </a>

   <table class="table table-striped">
        <thead class="bg-success text-white">
            <th> Task Title </th>
            <th> Decription </th>
            <th> Category </th>
            <th> Duration </th>
            <th> Created At </th>
            <th width="10%"> Action </th>
        </thead>

        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td> {{ $task->task_title }} </td>
                <td> {{ $task->description }} </td>
                <td> {{ $task->category }}</td>
                <td> {{ $task->created_at }}</td>
                <td> {{ $task->updated_at }} </td>
                <td> 
                    <a href="" class="badge badge-success"> Edit </a> 
                     <a href="" class="badge badge-danger"> Delete </td>
            </tr>
            @endforeach
        </tbody>

        <tfoot>

        </tfoot>
   </table>
@endsection