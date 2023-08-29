@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Tecnologie</h1>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($technologies as $technologies)  
                            <tr>
                                <th scope="row">{{ $technologies->id }}</th>
                                <td>{{ $technologies->name }}</td>
                                <td>{{ $technologies->slug }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.technologies.show', $technologies->id) }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('admin.technologies.edit', $technologies->id) }}"><i class="fas fa-pen"></i></a>
                                    <form class="d-inline-block delete-technologies-form" action="{{ route('admin.technologies.destroy', $technologies->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('admin.technologies.create') }}" class="btn btn-sm btn-primary">Aggiungi una nuova tecnologia</a>
            </div>
        </div>
    </div>
    @include('admin.partials.modal_delete')
@endsection