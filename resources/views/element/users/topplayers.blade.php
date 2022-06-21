<div class="tab-pane fade" id="player-tab1" role="tabpanel" aria-labelledby="player-tab">
    <div class="sdbndbnuj">
        <h4 class="mt-3 jsdfndf6">Top Players by Gameweek</h4>
        @foreach($topplayers as $key => $value)
        @php
            $goals = json_decode($value->goals,true);
        @endphp
        
          
        <div class="sdnnsk7">
            <div class="sdjdj78" onclick="ShowAndHide()">
                <div class="sdkdfj89">
                    <div class="sdjdk0"><img src="{{ asset('public/assets/image/Rectangle 312.png') }}">
                    </div>
                    <div class="askak76">
                        <h5>{{ $value->display_name}}</h5>
                        {{-- <p> 5.25 Million</p> --}}
                    </div>
                </div>
            </div>
            <div id="SectionName" style="display:none">
                <div class="sdksks78">
                    {{-- <div class="jksdjkdod7889">
                        <div class="askak76">
                            <p>Appearances</p>
                        </div>
                        <div class="asskk87">
                            <p>63</p>
                        </div>
                    </div> --}}
                    <div class="jksdjkdod7889">
                        <div class="askak76">
                            <p>Goals</p>
                        </div>
                        <div class="asskk87">
                            <p>{{ !empty($goals['scored'])?$goals['scored']:'0' }}</p>
                        </div>
                    </div>
                    <div class="jksdjkdod7889">
                        <div class="askak76">
                            <p>Assists</p>
                        </div>
                        <div class="asskk87">
                            <p>{{ !empty($goals['assists'])?$goals['assists']:'0' }}</p>
                        </div>
                    </div>
                </div>
                <div class="jksdksdjdj">
                    <div class="jksdjkdod7889">
                        <div class="askak76">
                            <p>Total Points</p>
                        </div>
                        <div class="asskk87">
                            {{-- <p>{{ $value->total_points }}</p> --}}
                        </div>
                    </div>
                    {{-- <div class="jksdjkdod7889">
                        <div class="askak76">
                            <p>Bought</p>
                        </div>
                        <div class="asskk87">
                            <p>45</p>
                        </div>
                    </div> --}}
                    {{-- <div class="jksdjkdod7889">
                        <div class="askak76">
                            <p>Sold</p>
                        </div>
                        <div class="asskk87">
                            <p>78</p>
                        </div>
                    </div> --}}
                    {{-- <div class="jksdjkdod7889">
                        <div class="askak76">
                            <p>GMW</p>
                        </div>
                        <div class="asskk87">
                            <p>35+4 point</p>
                        </div>
                    </div> --}}
                </div>
            </div>
            <hr>
        </div>
            
        @endforeach

        
       
    </div>




</div>