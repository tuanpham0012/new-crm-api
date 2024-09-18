@extends('layouts.main')
@section('main')
    <customer
    :types="{{ @json_encode($types)}}"
    :sources="{{ @json_encode($sources)}}"
    {{-- :genders="{{ @json_encode($genders)}}"
    :statuses="{{ @json_encode($statuses)}}" --}}
    ></customer>
@endsection

