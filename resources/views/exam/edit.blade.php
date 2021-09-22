@extends('app')

@section('title', 'Examination')

@section('heading', 'Examination')

@section('content')
<div class="mt-2">
    <p>Date Visit: {{ $opdcard->date_visit }}</p>
    <p>HN: {{ $opdcard->hn }} {{ $opdcard->patient_name }} {{ $opdcard->gender }} {{ $opdcard->age_at_visit }} Yo</p>
    <p>Triage: {{ $opdcard->triage_text }} BP: {{ $opdcard->bp }} BT: {{ $opdcard->body_temperature }} BW: {{ $opdcard->weight }} Ht: {{ $opdcard->height }}</p>
</div>
<hr>
<form action="{{ url('/exam/' . $opdcard->id) }}" method="POST" class="mt-2">
    @csrf
    @method('patch')

    <div class="mt-2">
        <label for="diagnosis">Diagnosis :</label>
        <input type="text" id="diagnosis" name="diagnosis" /> <br>
    </div>

    <div class="mt-2">
        <label for="oders">Order :</label>
        <textarea id="oders" name="oders"></textarea>
    </div>

    @can('procedure', $opdcard)
    <div class="mt-2">
        <label for="procedures">Procedure :</label>
        <textarea id="procedures" name="procedures"></textarea>
    </div>
    @endcan

    <div class="mt-2">
        <label for="medications">Medication :</label>
        <textarea id="medications" name="medications"></textarea>
    </div>

    <div class="mt-2">
        <label for="note">Note :</label>
        <textarea id="note" name="note">{{ $opdcard->note }}</textarea>
    </div>

    <input class="mt-2" type="submit" value="Confirm" />
</form>
@endsection