@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Progetti</h1>
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Azioni</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)  
                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->slug }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.projects.show', $project->id) }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('admin.projects.edit', $project->id) }}"><i class="fas fa-pen"></i></a>
                                    <form class="d-inline-block delete-project-form" action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-primary">Aggiungi un nuovo progetto</a>
            </div>
        </div>
    </div>
    @include('admin.partials.modal_delete')
@endsection