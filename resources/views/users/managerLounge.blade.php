@extends('layouts.user') @section('title',"Manager's Lounge")
@section('content')

<main>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        {{-- <button type="button" class="close" data-dismiss="alert">×</button>     --}}
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="container-fluid p-4 text-white">
        <div class="row">
            <div class="col-lg-8">
                <div class="pt-3 sdjhdksmn">
                    <h3 class="sdhjdl"><b>Manager’s Lounge</b></h3>
                    <p class="mt-4">
                        Nullam lectus magna, dignissim tempus est in, volutpat scelerisque
                        tortor. Curabitur nec ex risus.
                    </p>
                    <div class="jkasdhd78">
                        <form action="{{ url('store-post') }}" method="POST" id="postForm">
                            @csrf
                            <input id="div_editor1" name="description" />
                        </form>
                    </div>
                    <button class="mt-4 sdhsjd98" id="storePost">+ Create Post</button>


                    @foreach($post as $key => $value)
                      <div class="comment-sec">
                          <div class="comments">
                              {{-- <h5 class="mt-5">Nestlevera</h5>
                              <p class="mt-3">
                                  Suspendisse tincidunt, eros non commodo tristique, turpis elit
                                  placerat mauris. Suspe ndisse tincidunt, eros non commodo
                                  tristique, turpis elit placerat mauris Suspendisse tincidunt,
                                  eros non commodo tristique, turpis elit placerat mauris. Suspe
                                  ndisse tincidunt, eros non commodo tristique, turpis elit
                                  placerat mauris
                              </p> --}}
                              {!! $value->description !!}
                              <div class="sdjdhjkdnk">
                                  <div class="sdjjhd87">
                                      <a class="sdhdj89" href="javascript:void(0)" id="hideShow">+Add Comment</a>
                                  </div>
                                  <div class="sdjsks89">
                                      <a class="sdjksj98" href="">2 Comment</a>
                                      <a class="sdkjd8909 share" href="#"  id='share'>
                                        Share
                                        <p class="result"></p>
                                      </a>
                                      
                                  </div>
                              </div>
                          </div>

                          <div class="commentArea" id="comments">
                              <textarea class="text-white sdhfj9754" placeholder="Write a comment"></textarea>

                              <div class="hsdkdf97">
                                  <a class="mt-2 sdjnhcfn90874">Submit</a>
                              </div>
                          </div>
                      </div>
                    @endforeach

                </div>
            </div>

            <div class="col-lg-4">
                <div class="htavb">
                    <h4 class="mt-3 mkuytg">Trending Feeds</h4>
                    <h6 class="mt-3 assx45">NestleVera</h6>
                    <p class="jsdx58">
                        There are many variations of passages of Lorem Ipsum available,but
                        the majority have suffered alteration.
                    </p>
                    <a class="hyujh45" href="#">2 Comment</a>
                    <a class="jkyts778" href="#">Share</a>
                    <hr />
                    <h6 class="jyth78">NestleVera</h6>
                    <p class="lkuh456">
                        There are many variations of passages of Lorem Ipsum available,but
                        the majority have suffered alteration.
                    </p>
                    <a class="hyujh45" href="#">2 Comment</a>
                    <a class="jlopnn" href="#">Share</a>
                    <hr />
                    <h6 class="jyth78">NestleVera</h6>
                    <p class="lkuh456">
                        There are many variations of passages of Lorem Ipsum available,but
                        the majority have suffered alteration.
                    </p>
                    <a class="hyujh45" href="#">2 Comment</a>
                    <a class="jlopnn" href="#">Share</a>
                </div>

                <div class="htavb">
                    <h4 class="mt-3 mkuytg">Latest Feeds</h4>
                    {{-- <h6 class="mt-3 assx45">NestleVera</h6>
                    <p class="jsdx58">
                        There are many variations of passages of Lorem Ipsum available,but
                        the majority have suffered alteration.
                    </p>
                    <a class="hyujh45" href="#">2 Comment</a>
                    <a class="jkyts778" href="#">Share</a> --}}

                    @foreach($post as $key => $value)
                     {!! $value->description !!}
                     <a class="hyujh45" href="#">2 Comment</a>
                    <a class="jkyts778" href="#">Share</a>
                    <hr />
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
