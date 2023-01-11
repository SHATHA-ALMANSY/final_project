@extends('layouts.dashboard')

@section('title','Categories')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>PARENT ID</th>
            <th>CREATED AT</th>
            <th>UPDATED_AT</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td><strong>{{ $category->name }}</strong><br>
					<span class="text-muted">{{ $category->slug }}</span></td>
            <td>{{ $category->parent_id }}</td>
            <td>{{ $category->created_at}}</td>
            <td>{{ $category->UPDATED_AT ?? 'No Updated' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection