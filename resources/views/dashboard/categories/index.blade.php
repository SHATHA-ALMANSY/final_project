@extends('layouts.dashboard')

@section('title','Categories')

@section('content')

<x-flash-message />

<x-alert type="info" />
<x-alert type="success">
    <h4>alert tital</h4>
    <p>alert message</p>
</x-alert>

<div class="mb-4">
    <a href="{{ route ('dashboard.categories.create') }}" class="btn btn-outline-primary">
        <i class="fas fa-plus"></i> Add New</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>NAME</th>
            <th>PARENT ID</th>
            <th>CREATED AT</th>
            <th>UPDATED_AT</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td> <img class="img-fluid" src="{{ $category->image_url }}" width="80" alt=""></td>
            <td><strong>{{ $category->name }}</strong><br>
					<span class="text-muted">{{ $category->slug }}</span></td>
            <td>{{ $category->parent_name }}</td>
            <td>{{ $category->created_at}}</td>
            <td>{{ $category->UPDATED_AT ?? 'No Updated' }}</td>
            <td><a href="{{ route( 'dashboard.categories.edit', $category->id ) }}" class="btn btn-sm btn-outline-primary">
              <i class="fas fa-edit"></i>  EDIT</a></td>
            <td>
                <form action="{{ route('dashboard.categories.destroy' , $category->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-trash"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection