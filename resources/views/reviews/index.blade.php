@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Ulasan Pengguna</h4>
    @foreach ($reviews as $review)
        <div class="card mb-2">
            <div class="card-body">
                <h6>{{ $review['user'] }} ★{{ str_repeat('★', $review['rating']) }}{{ str_repeat('☆', 5 - $review['rating']) }}</h6>
                <p>{{ $review['comment'] }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
