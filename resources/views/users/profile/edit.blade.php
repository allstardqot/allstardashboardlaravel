@extends('layouts.user')
@section('title','Profile')
@section('content')
<main>
    <div class="container hgftrsde">
        <h3 class="text-white text-center mt-5">Edit Profile</h3>
        <form method="POST" action="{{ url('update') }}">
            
           
            @csrf
            <div class="row">
                <div class="col-lg-6 mt-5 text-center">
                    <input class="inpuytgfcv" type="text" id="user_name" name="user_name" placeholder="Name" value="{{$user['user_name']}}" /><br />
                    <input class="inpuytgfcv mt-4" type="text" id="email" name="email" placeholder="Email" value="{{$user['email']}}" /><br />
                    <br>

                    <input class="inpuytgfcv" type="date" name="dob" placeholder="DD | MM | YY" />
                    <br>
                    {{-- <i class="fa fa-calendar icon ujhtf" aria-hidden="true"></i> --}}
                    <div class="text-white">
                        <select class="hgyui89" name="country_code">
                            <option value="{{old('country_code')}}">Select Country Code</option>
                            @foreach ($code as $data)
                            <option value="{{$data}}" <?= ($data == $user['country_code'])?"selected":''; ?>>{{ $data }} </option>
                            @endforeach

                        </select>
                    </div>

                    <input class="inpuytgfcv mt-3" type="text" id="phone" name="phone" placeholder="Phone Number" value="{{$user['phone']}}" /><br />
                    <div class="form-group d-flex justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" <?= ($user['gender']=='Male')?"checked":''; ?> />
                            <label class="form-check-label" for="flexRadioDefault1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" <?= ($user['gender']=='Female')?"checked":''; ?> />
                            <label class="form-check-label" for="flexRadioDefault2">
                                Female
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <input class="inpuytgfcv mt-5" type="text" id="address" name="address" placeholder="Address" value="{{$user['address']}}" /><br />

                    <input class="inpuytgfcv mt-4" type="text" id="pincode" name="pincode" placeholder="Zipcode" value="{{$user['pincode']}}" /><br />

                    <div class="text-white">
                        <select class="hgtfr56" name="country">
                            <option value="{{old('country')}}">Select Country</option>
                            @foreach ($nationlity as $data)
                            <option value="{{$data->country}}" <?= ($data->country==$user['country'])?"selected":''; ?>>{{ $data->country }} </option>
                            @endforeach
                        </select>
                    </div>

                   

                    <input class="inpuytgfcv mt-4" type="text" id="city" name="city" placeholder="City" value={{$user['city']}}><br />
                </div>
            </div>
            <input type="submit" class="form-control btnColor mt-4 order-last order-lg-first hgvfr56" value="Save" />
        </form>
    </div>
</main>

@endsection
