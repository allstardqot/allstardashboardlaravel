<div
  class="tab-pane fade"
  id="player-tab1"
  role="tabpanel"
  aria-labelledby="player-tab"
>
  <div class="sdbndbnuj">
    <h4 class="mt-3 jsdfndf6">Top Players by Gameweek</h4>
    @foreach($topplayers as $key => $value) @php $goals =
    json_decode($value->goals,true); @endphp

    <div class="sdnnsk7">
      <div class="sdjdj78" onclick="ShowPlayerDetails('{{ $value->id }}','{{ $value->display_name }}','{{ $value->position_id }}','{{ $value->total_point }}')">
        <div class="sdkdfj89">
          <div class="sdjdk0">
            <img src="{{ asset('public/assets/image/Rectangle 312.png') }}" />
          </div>
          <div class="askak76">
            <h5>{{ $value->display_name}}</h5>
            {{--
            <li>
              <p>5.25 Million</p>
              --}}
            </li>
          </div>
        </div>
      </div>
      <div id="SectionName" style="display: none">
        <div class="sdksks78">
          {{--
          <div class="jksdjkdod7889">
            <div class="askak76">
              <li><p>Appearances</p></li>
            </div>

            <div class="asskk87">
              <li><p>63</p></li>
            </div>
          </div>
          --}}
          <div class="jksdjkdod7889">
            <div class="askak76">
              <li><p>Goals</p></li>
            </div>

            <div class="asskk87">
              <li>
                <p>{{ !empty($goals["scored"]) ? $goals["scored"] : "0" }}</p>
              </li>
            </div>
          </div>
          <div class="jksdjkdod7889">
            <div class="askak76">
              <li><p>Assists</p></li>
            </div>

            <div class="asskk87">
              <li>
                <p>{{ !empty($goals["assists"]) ? $goals["assists"] : "0" }}</p>
              </li>
            </div>
          </div>
        </div>
        <div class="jksdksdjdj">
          <div class="jksdjkdod7889">
            <div class="askak76">
              <li><p>Total Points</p></li>
            </div>

            <div class="asskk87">
              {{--
              <li>
                <p>{{ $value->total_points }}</p>
                --}}
              </li>
            </div>
          </div>
          {{--
          <div class="jksdjkdod7889">
            <div class="askak76">
              <li><p>Bought</p></li>
            </div>

            <div class="asskk87">
              <li><p>45</p></li>
            </div>
          </div>
          --}} {{--
          <div class="jksdjkdod7889">
            <div class="askak76">
              <li><p>Sold</p></li>
            </div>

            <div class="asskk87">
              <li><p>78</p></li>
            </div>
          </div>
          --}} {{--
          <div class="jksdjkdod7889">
            <div class="askak76">
              <li><p>GMW</p></li>
            </div>

            <div class="asskk87">
              <li><p>35+4 point</p></li>
            </div>
          </div>
          --}}
        </div>
      </div>
      <hr />
    </div>

    @endforeach
  </div>
</div>

{{-- PLayer Details Popup --}}
<div class="modal fade" id="playerDetails" role="dialog">
  <div class="modal-dialog text-white">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="p-3 text-end">
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-header py-0">
        <h3 class="modal-title text-center" id="player_names">Tammy Johnson</h3>
      </div>
      <div class="modal-body text-center">
        <ul class="list-unstyled">
          <li class="mb-3" id="category_model">Forward</li>
          <li class="mb-3" id="total_p_points">
            <strong> Total Fantasy Points:</strong> <span id="playTotalPoints">100</span>
          </li>
          <li class="mb-3" id="total_cgw_points">
            <strong> Bought:</strong> <span> 100</span>
          </li>
          <li class="mb-3"><strong>Total Picks:</strong> <span> 0</span></li>
          {{-- <li class="mb-3">
            <strong>Sold:</strong> <span> 0</span>
          </li>
          <li class="mb-3">
            <strong>GMW:</strong> <span> 0</span>
          </li> --}}
          
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>
