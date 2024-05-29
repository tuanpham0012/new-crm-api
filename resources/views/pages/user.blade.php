@extends('layouts.main')
@section('main')
    <user
    :genders="{{ @json_encode($genders)}}"
    :statuses="{{ @json_encode($statuses)}}"
    ></user>
@endsection

