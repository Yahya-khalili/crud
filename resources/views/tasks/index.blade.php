@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Ltse of tasks </title>
</head>
<body>
@section('content')
    <div class="container">
            <div class="row justify-content-center">
                <h1 class="mx-auto">Liste des taches </h1>
            </div>
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                  <form class="d-flex" method="get" action="{{route('tasks.search')}}">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{isset($search) ? $search : ''}}">
                    <button  class="btn btn-secondary" type="submit">Search</button>
                  </form>
                </div>
              </nav>
            <a class="btn btn-success" href="{{route('tasks.create')}}" > Ajouter une tache </a>
            @if(session('noTasksFound'))
    <div style="margin: 10px 0px" class="alert alert-danger" role="alert">
        No tasks found for the search term: {{ $search }}
      </div>
    @else
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Task</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
<tbody>

            @foreach($tasks as $task)
            <tr data-task-id="{{ $task->id }}">
            <td>
                {{$task->task}}
            </td>
            <td>
               <a href="{{route('tasks.destroy' , ['id' => $task -> id])}}" class="btn btn-danger">supprimer</a>
               <a href="{{route('tasks.edit' , ['id' => $task -> id])}}" class="btn btn-primary">modifier</a>
               
            </td>
            <td>
                
                
            </td>
            </tr>
            @endforeach
            @endif
        </tbody>


        </table>
        <a href="{{route('tasks.gerer')}}" class="btn btn-info">Gérer vos tâches</a>


    </div>
    <script>
        $('.delete-btn').on('click', function(event){
            event.preventDefault();
            var taskId = $(this).closest('tr').data('task-id');

            Swal.fire({
            title: 'Supprission du tache',
            text: "Vous voulez vraiment supprimer cette tache ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                type: 'GET',
                url: '/task/delete/' +taskId ,
                data: {

            },
            });
                Swal.fire( 'Supprimer!','success')
                location.reload();
            }
            })
        })
    </script>
</body>
@endsection
</html>
