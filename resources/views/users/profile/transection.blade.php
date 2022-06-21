@extends('layouts.user') @section('title','Profile') @section('content')
<main>
  <section class="transition-sec pt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-white">
          <h3>User Transection</h3>
          <div class="table-responsive">
            <table class="table text-white">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Type</th>
                  <th scope="col">Description</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <tr>
                  <th scope="row">1</th>
                  <td>60</td>
                  <td>Pool Join</td>
                  <td>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit!
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>60</td>
                  <td>Pool Join</td>
                  <td>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit!
                  </td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>60</td>
                  <td>Pool Join</td>
                  <td>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit!
                  </td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>60</td>
                  <td>Pool Join</td>
                  <td>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit!
                  </td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>60</td>
                  <td>Pool Join</td>
                  <td>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit!
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div
            class="transection-ft d-sm-flex justify-content-sm-between align-items-sm-center"
          >
            <h6 class="fs-6">Total Record: 14, Page of pages: 1 of 2</h6>
            <nav aria-label="...">
              <ul class="pagination">
                <li class="page-item disabled">
                  <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
