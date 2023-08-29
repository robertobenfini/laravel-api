@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Tipi di progetto</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>                     
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)  
                            <tr>
                                <th scope="row">{{ $type->id }}</th>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->slug }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.types.show', $type->id) }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('admin.types.edit', $type->id) }}"><i class="fas fa-pen"></i></a>
                                    <form class="d-inline-block delete-type-form" action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('admin.types.create') }}" class="btn btn-sm btn-primary">Aggiungi un nuovo tipo di progetto</a>
            </div>
        </div>
    </div>
    @include('admin.partials.modal_delete')
@endsection