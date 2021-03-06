@extends('layouts.user')
@section('title','Create Pool')
@section('content')
<main>

    <div class="container asjk45">
        <h3 class="text-white text-center mt-5">Create New Pool</h3>
        <form method="POST" action="{{ url('/insert') }}">
            @csrf

            <div class="row">
                <div class="col-lg-6 text-center">
                    <input type="text" id="pool_name" class="inmutsfg" name="pool_name" placeholder="Create your Pool Name" value="{{ old('pool_name') }}" />
                    <br />
                    <input class="inmutsfg" type="number" id="entry_fees" name="entry_fees" placeholder="Enter Entry Amount" value="{{ old('entry_fees') }}"/><br />

                    <select class="hdydtsb" id="poolTeamId" name="team_id">
                        <option class="jytf" >Select Team</option>
                        
                        @foreach($team as $key => $value)
                        <option class="nhbgyuhd" value="{{$value->id }}" {{old('team_id') == $value->id  ? 'selected' : ''}} >{{ $value->name }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="text-white">
                        <select class="hdydtsb" id="poolType" name="pool_type">
                            <option class="jytf" value="{{old('pool_type')}}" selected>Pool Type</option>
                            <option class="jytf" value="1">Private</option>
                            <option class="jytf" value="0">Public</option>
                        </select>
                    </div>

                    <input class="inmutsfg" type="number" id="max_participants" name="max_participants" placeholder="Enter max participants" value="{{ old('max_participants') }}"/><br />

                    

                    <input class="inmutsfg" type="password" id="poolpassword" name="password" placeholder="Create Password" /><br />
                </div>
            </div>
                <input type="submit" class="form-control btnColor mt-4 order-last order-lg-first masbsdis htryfg" value="Save" />
        </form>
    </div>
</main>

@endsection
