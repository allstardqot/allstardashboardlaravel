@extends('layouts.user') @section('title', 'Fixture Data') @section( 'content')

<section class="fixture-sec">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <div class="fixture-card">
          <div class="fixture-head">
            <div class="row justify-content-between">
              <div class="col-md-5 col-sm-6">
                <div class="head-content">
                  <h3>FIXTURES</h3>
                  <small>23rd April 2022 - 29th April 2022</small>
                  <a href="#" class="btn btn-danger">Gameweek</a>
                </div>
              </div>
              <div class="col-md-5 col-sm-6">
                <div class="calendor-btn">
                  <div class="dropdown">
                    <button
                      class="btn btn-danger btn-dropCla"
                      type="button"
                      onclick="closeCalendor()"
                    >
                      Match Schedule
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu" id="calendarMenu">
                      <li>
                        <div
                          class="calendar calendar-first"
                          id="calendar_first"
                        >
                          <div class="calendar_header">
                            <button class="switch-month switch-left">
                              <i class="fa fa-chevron-left"></i>
                            </button>
                            <h2></h2>
                            <button class="switch-month switch-right">
                              <i class="fa fa-chevron-right"></i>
                            </button>
                          </div>
                          <div class="calendar_weekdays"></div>
                          <div class="calendar_content"></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="fixture-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"><h3>Matches</h3></th>
                  {{-- <th scope="col">
                    <div class="date-aprial"><p>on 23rd April 2022</p></div>
                  </th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach ($fixturedata as $fixturValue )
                @if(empty($fixturValue['localteam_name']) && empty($fixturValue['visitorteam_name']))
                    @continue
                @endif
                <tr>
                    <td>
                        <div class="tean-show">
                          <div class="tem-one">
                            <span>{{$fixturValue['localteam_name']}}</span>
                            <img
                              class="img-fluid"
                              src="{{
                                asset('public/assets/image/tshirt-1-svg.svg')
                              }}"
                            />
                          </div>

                          <div class="vs-icon">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="icon"
                              height="512"
                              viewBox="0 0 1024 1024"
                              version="1.1"
                            >
                              <path
                                d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                              />
                            </svg>
                          </div>

                          <div class="tem-one tem-two">
                            <span>{{$fixturValue['visitorteam_name']}}</span>
                            <img
                              class="img-fluid"
                              src="{{
                                asset('public/assets/image/tshirt-1-svg2.svg')
                              }}"
                            />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="fropdown-bar-menu">
                          <div class="dropdown">
                            <button
                              class="btn"
                              type="button"
                              data-bs-toggle="collapse"
                              data-bs-target="#collapseExample"
                              aria-expanded="false"
                              aria-controls="collapseExample"
                            >
                            <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                            </button>
                          </div>
                        </div>
                      </td>
                </tr>
                <tr class="collapse" id="collapseExample">
                    <td colspan="2">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="tean-show">
                                <div class="tem-one">
                                  <span>BRE</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg.svg'
                                      )
                                    }}"
                                  />
                                </div>

                                <div class="vs-icon">
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon"
                                    height="512"
                                    viewBox="0 0 1024 1024"
                                    version="1.1"
                                  >
                                    <path
                                      d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                                    />
                                  </svg>
                                </div>

                                <div class="tem-one tem-two">
                                  <span>Two</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg2.svg'
                                      )
                                    }}"
                                  />
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="fropdown-bar-menu">
                                <div class="dropdown">
                                  <button
                                    class="btn"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample1"
                                    aria-expanded="false"
                                    aria-controls="collapseExample1"
                                  >
                                   <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                                  </button>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="tean-show">
                                <div class="tem-one">
                                  <span>BRE</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg.svg'
                                      )
                                    }}"
                                  />
                                </div>

                                <div class="vs-icon">
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon"
                                    height="512"
                                    viewBox="0 0 1024 1024"
                                    version="1.1"
                                  >
                                    <path
                                      d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                                    />
                                  </svg>
                                </div>

                                <div class="tem-one tem-two">
                                  <span>Two</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg2.svg'
                                      )
                                    }}"
                                  />
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="fropdown-bar-menu">
                                <div class="dropdown">
                                  <button
                                    class="btn"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample1"
                                    aria-expanded="false"
                                    aria-controls="collapseExample1"
                                  >
                                   <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                                  </button>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="tean-show">
                                <div class="tem-one">
                                  <span>BRE</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg.svg'
                                      )
                                    }}"
                                  />
                                </div>

                                <div class="vs-icon">
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon"
                                    height="512"
                                    viewBox="0 0 1024 1024"
                                    version="1.1"
                                  >
                                    <path
                                      d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                                    />
                                  </svg>
                                </div>

                                <div class="tem-one tem-two">
                                  <span>Two</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg2.svg'
                                      )
                                    }}"
                                  />
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="fropdown-bar-menu">
                                <div class="dropdown">
                                  <button
                                    class="btn"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample1"
                                    aria-expanded="false"
                                    aria-controls="collapseExample1"
                                  >
                                   <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                                  </button>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="tean-show">
                                <div class="tem-one">
                                  <span>BRE</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg.svg'
                                      )
                                    }}"
                                  />
                                </div>

                                <div class="vs-icon">
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon"
                                    height="512"
                                    viewBox="0 0 1024 1024"
                                    version="1.1"
                                  >
                                    <path
                                      d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                                    />
                                  </svg>
                                </div>

                                <div class="tem-one tem-two">
                                  <span>Two</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg2.svg'
                                      )
                                    }}"
                                  />
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="fropdown-bar-menu">
                                <div class="dropdown">
                                  <button
                                    class="btn"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample1"
                                    aria-expanded="false"
                                    aria-controls="collapseExample1"
                                  >
                                   <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                                  </button>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="tean-show">
                                <div class="tem-one">
                                  <span>BRE</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg.svg'
                                      )
                                    }}"
                                  />
                                </div>

                                <div class="vs-icon">
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon"
                                    height="512"
                                    viewBox="0 0 1024 1024"
                                    version="1.1"
                                  >
                                    <path
                                      d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                                    />
                                  </svg>
                                </div>

                                <div class="tem-one tem-two">
                                  <span>Two</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg2.svg'
                                      )
                                    }}"
                                  />
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="fropdown-bar-menu">
                                <div class="dropdown">
                                  <button
                                    class="btn"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample1"
                                    aria-expanded="false"
                                    aria-controls="collapseExample1"
                                  >
                                   <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                                  </button>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="tean-show">
                                <div class="tem-one">
                                  <span>BRE</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg.svg'
                                      )
                                    }}"
                                  />
                                </div>

                                <div class="vs-icon">
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon"
                                    height="512"
                                    viewBox="0 0 1024 1024"
                                    version="1.1"
                                  >
                                    <path
                                      d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                                    />
                                  </svg>
                                </div>

                                <div class="tem-one tem-two">
                                  <span>Two</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg2.svg'
                                      )
                                    }}"
                                  />
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="fropdown-bar-menu">
                                <div class="dropdown">
                                  <button
                                    class="btn"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample1"
                                    aria-expanded="false"
                                    aria-controls="collapseExample1"
                                  >
                                   <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                                  </button>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="tean-show">
                                <div class="tem-one">
                                  <span>BRE</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg.svg'
                                      )
                                    }}"
                                  />
                                </div>

                                <div class="vs-icon">
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon"
                                    height="512"
                                    viewBox="0 0 1024 1024"
                                    version="1.1"
                                  >
                                    <path
                                      d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                                    />
                                  </svg>
                                </div>

                                <div class="tem-one tem-two">
                                  <span>Two</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg2.svg'
                                      )
                                    }}"
                                  />
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="fropdown-bar-menu">
                                <div class="dropdown">
                                  <button
                                    class="btn"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample1"
                                    aria-expanded="false"
                                    aria-controls="collapseExample1"
                                  >
                                   <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                                  </button>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="tean-show">
                                <div class="tem-one">
                                  <span>BRE</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg.svg'
                                      )
                                    }}"
                                  />
                                </div>

                                <div class="vs-icon">
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon"
                                    height="512"
                                    viewBox="0 0 1024 1024"
                                    version="1.1"
                                  >
                                    <path
                                      d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                                    />
                                  </svg>
                                </div>

                                <div class="tem-one tem-two">
                                  <span>Two</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg2.svg'
                                      )
                                    }}"
                                  />
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="fropdown-bar-menu">
                                <div class="dropdown">
                                  <button
                                    class="btn"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample1"
                                    aria-expanded="false"
                                    aria-controls="collapseExample1"
                                  >
                                   <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                                  </button>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="tean-show">
                                <div class="tem-one">
                                  <span>BRE</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg.svg'
                                      )
                                    }}"
                                  />
                                </div>

                                <div class="vs-icon">
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon"
                                    height="512"
                                    viewBox="0 0 1024 1024"
                                    version="1.1"
                                  >
                                    <path
                                      d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                                    />
                                  </svg>
                                </div>

                                <div class="tem-one tem-two">
                                  <span>Two</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg2.svg'
                                      )
                                    }}"
                                  />
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="fropdown-bar-menu">
                                <div class="dropdown">
                                  <button
                                    class="btn"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample1"
                                    aria-expanded="false"
                                    aria-controls="collapseExample1"
                                  >
                                   <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                                  </button>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="tean-show">
                                <div class="tem-one">
                                  <span>BRE</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg.svg'
                                      )
                                    }}"
                                  />
                                </div>

                                <div class="vs-icon">
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon"
                                    height="512"
                                    viewBox="0 0 1024 1024"
                                    version="1.1"
                                  >
                                    <path
                                      d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                                    />
                                  </svg>
                                </div>

                                <div class="tem-one tem-two">
                                  <span>Two</span>
                                  <img
                                    class="img-fluid"
                                    src="{{
                                      asset(
                                        'public/assets/image/tshirt-1-svg2.svg'
                                      )
                                    }}"
                                  />
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="fropdown-bar-menu">
                                <div class="dropdown">
                                  <button
                                    class="btn"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample1"
                                    aria-expanded="false"
                                    aria-controls="collapseExample1"
                                  >
                                   <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                                  </button>
                                </div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                @endforeach
                {{-- <tr>
                  <td>
                    <div class="tean-show">
                      <div class="tem-one">
                        <span>BRE</span>
                        <img
                          class="img-fluid"
                          src="{{
                            asset('public/assets/image/tshirt-1-svg.svg')
                          }}"
                        />
                      </div>

                      <div class="vs-icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="icon"
                          height="512"
                          viewBox="0 0 1024 1024"
                          version="1.1"
                        >
                          <path
                            d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                          />
                        </svg>
                      </div>

                      <div class="tem-one tem-two">
                        <span>Two</span>
                        <img
                          class="img-fluid"
                          src="{{
                            asset('public/assets/image/tshirt-1-svg2.svg')
                          }}"
                        />
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fropdown-bar-menu">
                      <div class="dropdown">
                        <button
                          class="btn"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#collapseExample2"
                          aria-expanded="false"
                          aria-controls="collapseExample2"
                        >
                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                        </button>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="tean-show">
                      <div class="tem-one">
                        <span>BRE</span>
                        <img
                          class="img-fluid"
                          src="{{
                            asset('public/assets/image/tshirt-1-svg.svg')
                          }}"
                        />
                      </div>

                      <div class="vs-icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="icon"
                          height="512"
                          viewBox="0 0 1024 1024"
                          version="1.1"
                        >
                          <path
                            d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                          />
                        </svg>
                      </div>

                      <div class="tem-one tem-two">
                        <span>Two</span>
                        <img
                          class="img-fluid"
                          src="{{
                            asset('public/assets/image/tshirt-1-svg2.svg')
                          }}"
                        />
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fropdown-bar-menu">
                      <div class="dropdown">
                        <button
                          class="btn"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#collapseExample2"
                          aria-expanded="false"
                          aria-controls="collapseExample2"
                        >
                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                        </button>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="tean-show">
                      <div class="tem-one">
                        <span>BRE</span>
                        <img
                          class="img-fluid"
                          src="{{
                            asset('public/assets/image/tshirt-1-svg.svg')
                          }}"
                        />
                      </div>

                      <div class="vs-icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="icon"
                          height="512"
                          viewBox="0 0 1024 1024"
                          version="1.1"
                        >
                          <path
                            d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                          />
                        </svg>
                      </div>

                      <div class="tem-one tem-two">
                        <span>Two</span>
                        <img
                          class="img-fluid"
                          src="{{
                            asset('public/assets/image/tshirt-1-svg2.svg')
                          }}"
                        />
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fropdown-bar-menu">
                      <div class="dropdown">
                        <button
                          class="btn"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#collapseExample2"
                          aria-expanded="false"
                          aria-controls="collapseExample2"
                        >
                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                        </button>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="tean-show">
                      <div class="tem-one">
                        <span>BRE</span>
                        <img
                          class="img-fluid"
                          src="{{
                            asset('public/assets/image/tshirt-1-svg.svg')
                          }}"
                        />
                      </div>

                      <div class="vs-icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="icon"
                          height="512"
                          viewBox="0 0 1024 1024"
                          version="1.1"
                        >
                          <path
                            d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                          />
                        </svg>
                      </div>

                      <div class="tem-one tem-two">
                        <span>Two</span>
                        <img
                          class="img-fluid"
                          src="{{
                            asset('public/assets/image/tshirt-1-svg2.svg')
                          }}"
                        />
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fropdown-bar-menu">
                      <div class="dropdown">
                        <button
                          class="btn"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#collapseExample2"
                          aria-expanded="false"
                          aria-controls="collapseExample2"
                        >
                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                        </button>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="tean-show">
                      <div class="tem-one">
                        <span>BRE</span>
                        <img
                          class="img-fluid"
                          src="{{
                            asset('public/assets/image/tshirt-1-svg.svg')
                          }}"
                        />
                      </div>

                      <div class="vs-icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="icon"
                          height="512"
                          viewBox="0 0 1024 1024"
                          version="1.1"
                        >
                          <path
                            d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                          />
                        </svg>
                      </div>

                      <div class="tem-one tem-two">
                        <span>Two</span>
                        <img
                          class="img-fluid"
                          src="{{
                            asset('public/assets/image/tshirt-1-svg2.svg')
                          }}"
                        />
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fropdown-bar-menu">
                      <div class="dropdown">
                        <button
                          class="btn"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#collapseExample2"
                          aria-expanded="false"
                          aria-controls="collapseExample2"
                        >
                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                        </button>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="tean-show">
                      <div class="tem-one">
                        <span>BRE</span>
                        <img
                          class="img-fluid"
                          src="{{
                            asset('public/assets/image/tshirt-1-svg.svg')
                          }}"
                        />
                      </div>

                      <div class="vs-icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="icon"
                          height="512"
                          viewBox="0 0 1024 1024"
                          version="1.1"
                        >
                          <path
                            d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                          />
                        </svg>
                      </div>

                      <div class="tem-one tem-two">
                        <span>Two</span>
                        <img
                          class="img-fluid"
                          src="{{
                            asset('public/assets/image/tshirt-1-svg2.svg')
                          }}"
                        />
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fropdown-bar-menu">
                      <div class="dropdown">
                        <button
                          class="btn"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#collapseExample2"
                          aria-expanded="false"
                          aria-controls="collapseExample2"
                        >
                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                        </button>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="tean-show">
                      <div class="tem-one">
                        <span>BRE</span>
                        <img
                          class="img-fluid"
                          src="{{
                            asset('public/assets/image/tshirt-1-svg.svg')
                          }}"
                        />
                      </div>

                      <div class="vs-icon">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="icon"
                          height="512"
                          viewBox="0 0 1024 1024"
                          version="1.1"
                        >
                          <path
                            d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                          />
                        </svg>
                      </div>

                      <div class="tem-one tem-two">
                        <span>Two</span>
                        <img
                          class="img-fluid"
                          src="{{
                            asset('public/assets/image/tshirt-1-svg2.svg')
                          }}"
                        />
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="fropdown-bar-menu">
                      <div class="dropdown">
                        <button
                          class="btn"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#collapseExample2"
                          aria-expanded="false"
                          aria-controls="collapseExample2"
                        >
                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                        </button>
                      </div>
                    </div>
                  </td>
                </tr> --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function closeCalendor() {
    var x = document.getElementById("calendarMenu");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
</script>

@endsection
