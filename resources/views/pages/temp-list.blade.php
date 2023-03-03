@extends('layouts.app')
@section('content')


<div class="container mt-5">

    <div class="row">

        @forelse ($emailTemps as  $emailTemp)

        <div class="col-md-6 border">
         
         
            {!! html_entity_decode($emailTemp->emailTemp, ENT_QUOTES, 'UTF-8') !!}
        </div>
            
        @empty
            
        @endforelse


    </div>

</div>

@endsection