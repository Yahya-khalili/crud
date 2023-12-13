@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Ajouter une nouvelle tache </title>
</head>
<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-2"> </div>
            <div class="col-md-8">
                <form method="post" action="{{route('tasks.update' , ['id'=>$task->id])}}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="formGroupExampleInput" class="mb-2">Nom du tache </label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="task" value="{{$task->task}}" placeholder="Nom du tache" >
                    </div>
                    <div class="form-group mt-4">
                        <button class="btn btn-primary"> Modifier </button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

</body>
@endsection
</html>
