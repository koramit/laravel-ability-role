@extends('app')

@section('title', 'OPD')
@section('heading', 'OPD')

@section('content')

@can('create_case')
<button style="margin-right: 1rem;">
    <a href="{{ url('/create') }}">New Case</a>
</button>
@endcan

@if(session('message'))
<span style="color: green;">{{ session('message') }}</span>
@endif
<hr>

@foreach ($opdcards as $card)
<div style="margin: 2rem 0 2rem 0; display: flex">
    <div style="width: 40%">
        <span style="margin-right: 1rem;">{{ $card->id }}</span>
        <span style="margin-right: 1rem;">{{ $card->date_visit->format('M, d y') }}</span>
        <span style="margin-right: 1rem;">{{ $card->hn }}</span>
        <span style="margin-right: 1rem;">{{ $card->patient_name }}</span>
        <span style="margin-right: 1rem;">{{ $card->gender }}</span>
        <span style="margin-right: 1rem;">{{ $card->age_at_visit }} Yo</span>
        <span style="margin-right: 1rem;">{{ $card->triage_text }}</span>
    </div>
    <div style="width: 60%">
        @if($card->discharged_at)
        DISCHARGED
        @else
        @can('triage', $card)
        <button style="margin-right: 1rem;">
            <a style="text-decoration: none;" href="{{ url('/triage/' . $card->id) . '/edit' }}">Triage</a>
        </button>
        @endcan
        @can('exam', $card)
        <button style="margin-right: 1rem;">
            <a style="text-decoration: none;" href="{{ url('/exam/' . $card->id) . '/edit' }}">Exam</a>
        </button>
        @endcan
        @can('discharge', $card)
        <form action="{{ url('/discharge/' . $card->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('patch')
            <button type="submit" style="margin-right: 1rem; cursor: pointer;">Discharge</button>
        </form>
        @endcan
        @can('cancel', $card)
        <form action="{{ url('/' . $card->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('delete')
            <button type="submit" style="margin-right: 1rem; cursor: pointer;">Cancel</button>
        </form>
        @endcan
        @endif
    </div>
</div>
@endforeach

@endsection