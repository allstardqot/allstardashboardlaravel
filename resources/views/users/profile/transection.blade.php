@extends('layouts.user') @section('title','Profile') @section('content')
<main>
  <section class="transition-sec pt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-white">
          <h3>User Transactions</h3>
          <div class="table-responsive">
            <table class="table text-white">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Type</th>
                  <td scope="col">Status</td>
                  
                  {{-- <th scope="col">Description</th> --}}
                </tr>
              </thead>
              <tbody class="table-group-divider">
                @php
                  $i = 1;
                  
                @endphp
                 @if (!empty($transection) && $transection->count() > 0)
                  @foreach($transection as $key => $value)
                  @php
                  $status = ''; 
                  $color = '';

                      if($value->status == 1){
                        $status = 'Pending';
                        $color = 'red';
                      }else{
                        $status = 'Success';
                        $color = '#209f00';

                      }
                      // echo $status;die;
                      @endphp
                    <tr>
                      <th scope="row">{{ $i }}</th>
                      <td>{{ $value->amount }}</td>
                      <td>{{ $value->type }}</td>

                      <td style="color:{{ $color }};">  {{ $status }} </td>                    
                    
                    </tr>
                    @php
                      $i ++;
                    @endphp
                  @endforeach
                  @else
                    <tr>
                        <td colspan="10">There are no data.</td>
                    </tr>
              @endif
              </tbody>
            </table>
          </div>
          <div class="d-felx justify-content-center">
            {!! $transection->links() !!}  
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
