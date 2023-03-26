@extends('shop.layouts.master')


@section('content-wrapper')

<style>
.bus-search .twitter-typeahead {
    width: auto;
}

.form-control:not(.form-control-sm) {
    padding: 0.81rem 0.96rem;
    height: inherit;
}
.icon-inside {
    position: absolute;
    right: 15px;
    top: calc(50% - 11px);
    pointer-events: none;
    font-size: 18px;
    font-size: 1.125rem;
    color: #c4c3c3;
    z-index: 3;
}
.position-relative {
    position: relative !important;
}
.form-control {
    border-radius: 0.25rem;
}
.travellers-class {
    position: relative;
}
.travellers-dropdown {
    position: absolute;
    display: none;
    -webkit-box-shadow: 0px 2px 12px rgb(0 0 0 / 18%);
    box-shadow: 0px 2px 12px rgb(0 0 0 / 18%);
    z-index: 11;
    background: #fff;
    padding: 20px;
    border-radius: 4px;
    min-width: 300px;
    width: 100%;
}
.input-group-append .btn, .input-group-prepend .btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    padding-left: 0.75rem;
    padding-right: 0.75rem;
}
.travellers-dropdown .qty .btn {
    padding-top: 0.2rem;
    padding-bottom: 0.2rem;
    border-radius: 0.25rem !important;
}
.travellers-dropdown .qty .qty-spinner {
    background: none;
    border: none;
    pointer-events: none;
    text-align: center;
    padding: 0.2rem 0.2rem;
}

.form-control:not(.form-control-sm) {
    padding: 0.81rem 0.96rem;
    height: inherit;
}
.bg-light-4 {
    background-color: #eff0f2 !important;
}
.text-4 {
    font-size: 1.125rem !important;
}
.bg-light-3 {
    background-color: #f5f5f5 !important;
}
.flight-list .flight-item, .train-list .train-item, .bus-list .bus-item {
    position: relative;
    border-bottom: 1px solid #e9e9e9;
}
.text-3 {
    font-size: 16px !important;
    font-size: 1rem !important;
}
.text-1 {
    font-size: 12px !important;
    font-size: 0.75rem !important;
}
.text-5 {
    font-size: 21px !important;
    font-size: 1.3125rem !important;
}
.text-muted {
    color: #8e9a9d !important;
}
</style>
@section('styles')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/elements.css')}}">
@endsection
    
    <section class="p-0 ratio2_1">
        <div class="container-fluid">
            <div class="row category-border">
                <div class="container">
                    <div class="row">
                    <div class="bg-white shadow-md rounded p-4">
                        <h2 class="text-4 mb-3">Book Bus Tickets</h2>
                        <form id="bookingBus" method="post">
                            <div class="row g-3">
                            <div class="col-md-6 col-lg">
                                <div class="position-relative">
                                <input type="text" class="form-control ui-autocomplete-input" id="busFrom" required="" placeholder="From" autocomplete="off">
                                <span class="icon-inside"><i class="fas fa-map-marker-alt"></i></span> </div>
                            </div>
                            <div class="col-md-6 col-lg">
                                <div class="position-relative">
                                <input type="text" class="form-control ui-autocomplete-input" id="busTo" required="" placeholder="To" autocomplete="off">
                                <span class="icon-inside"><i class="fas fa-map-marker-alt"></i></span> </div>
                            </div>
                            <div class="col-md-6 col-lg">
                                <div class="position-relative">
                                <input id="busDepart" type="text" class="form-control" required="" placeholder="Depart Date">
                                <span class="icon-inside"><i class="far fa-calendar-alt"></i></span> </div>
                            </div>
                            <div class="col-md-6 col-lg">
                                <div class="travellers-class">
                                <input type="text" id="busTravellersClass" class="travellers-class-input form-control" name="bus-travellers-class" placeholder="Seats" readonly="" required="" onkeypress="return false;">
                                <span class="icon-inside"><i class="fas fa-caret-down"></i></span>
                                <div class="travellers-dropdown" style="display: none;">
                                    <div class="row align-items-center mb-3">
                                    <div class="col-sm-7">
                                        <p class="mb-sm-0">Seats</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="qty input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn bg-light-4" data-value="decrease" data-target="#adult-travellers" data-toggle="spinner">-</button>
                                        </div>
                                        <input type="text" data-ride="spinner" id="adult-travellers" class="qty-spinner form-control" value="1" readonly="">
                                        <div class="input-group-append">
                                            <button type="button" class="btn bg-light-4" data-value="increase" data-target="#adult-travellers" data-toggle="spinner">+</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="d-grid">
                                    <button class="btn btn-solid btn-sm me-3 submit-done" type="button">Done</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-2 d-grid">
                                <button class="btn btn-solid hover-solid btn-animation me-3" type="submit">Search</button>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </section>

    <!-- section start -->
    <section class="section-b-space container element-page">
        <div class="row">
            <div class="left-sidebar col-lg-3">
                <a href="#" class="btn btn-solid btn-sm d-lg-none d-inline-block mb-4 element-btn"><i
                        class="fa fa-bars me-2" aria-hidden="true"></i> all elements</a>
                <div class="sticky-sidebar">
                    <div class="collection-mobile-back">
                        <span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span>
                    </div>
                    <ul class="nav list-unstyled nav-sidebar doc-nav">
                        <li class="nav-item direct">
                            <a class="nav-link" href="elements.html">Buttons</a>
                        </li>
                        <li class="nav-item direct">
                            <a class="nav-link" href="element-title.html">Title</a>
                        </li>
                        <li class="nav-item direct">
                            <a class="nav-link active" href="element-breadcrumb.html">breadcrumb</a>
                        </li>
                        <li class="nav-item direct">
                            <a class="nav-link" href="element-header.html">header</a>
                        </li>
                        <li class="nav-item direct">
                            <a class="nav-link" href="element-banner.html">collection banner</a>
                        </li>
                        <li class="nav-item direct">
                            <a class="nav-link" href="element-slider.html">home slider/banner</a>
                        </li>
                        <li class="nav-item direct">
                            <a class="nav-link" href="element-product.html">product box/style</a>
                        </li>
                        <li class="nav-item direct">
                            <a class="nav-link" href="element-category.html">category</a>
                        </li>
                        <li class="nav-item direct">
                            <a class="nav-link" href="element-footer.html">footer</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 content component-col">
            <div class="card">
            <div class="bg-white shadow-md rounded py-4">
            <div class="mx-3 mb-3 text-center">
              <h2 class="text-6 mb-4">Mumbai <small class="mx-2">to</small>Surat</h2>
            </div>
            <div class="text-1 bg-light-3 border border-end-0 border-start-0 py-2 px-3">
              <div class="row">
                <div class="col col-sm-3"><span class="d-none d-sm-block">Operators</span></div>
                <div class="col col-sm-2 text-center">Departure</div>
                <div class="col-sm-2 text-center d-none d-sm-block">Duration</div>
                <div class="col col-sm-2 text-center">Arrival</div>
                <div class="col col-sm-3 text-center d-none d-sm-block">Price</div>
              </div>
            </div>
            <div class="bus-list">
              <div class="bus-item">
                <div class="row align-items-sm-center flex-row py-4 px-3">
                  <div class="col col-sm-3"> <span class="text-3 text-dark operator-name">AK Tour &amp; Travels</span> <span class="text-1 text-muted d-block">AC Sleeper</span> </div>
                  <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">12:00</span> <small class="text-muted d-block">Mumbai</small> </div>
                  <div class="col col-sm-2 text-center d-none d-sm-block time-info"> <span class="text-3 duration">06h 32m</span> <small class="text-muted d-block">12 Stops</small> </div>
                  <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">05:15</span> <small class="text-muted d-block">Surat</small> </div>
                  <div class="col-12 col-sm-3 align-self-center text-end text-sm-center mt-2 mt-sm-0">
                    <div class="d-inline-block d-sm-block text-dark text-5 price mb-sm-1">$250</div>
                    <a href="#" class="btn btn-sm btn-outline-primary shadow-none" data-bs-toggle="modal" data-bs-target="#select-busseats"><i class="fas fa-ellipsis-h d-none d-sm-block d-lg-none" data-bs-toggle="tooltip" title="" data-bs-original-title="Select Seats" aria-label="Select Seats"></i> <span class="d-block d-sm-none d-lg-block">Select Seats</span></a> </div>
                </div>
              </div>
              <div class="bus-item">
                <div class="row align-items-sm-center flex-row py-4 px-3">
                  <div class="col col-sm-3"> <span class="text-3 text-dark operator-name">Gujarat Travels</span> <span class="text-1 text-muted d-block">AC Sleeper</span> </div>
                  <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">12:00</span> <small class="text-muted d-block">Mumbai</small> </div>
                  <div class="col col-sm-2 text-center d-none d-sm-block time-info"> <span class="text-3 duration">06h 32m</span> <small class="text-muted d-block">12 Stops</small> </div>
                  <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">05:15</span> <small class="text-muted d-block">Surat</small> </div>
                  <div class="col-12 col-sm-3 align-self-center text-end text-sm-center mt-2 mt-sm-0">
                    <div class="d-inline-block d-sm-block text-dark text-5 price mb-sm-1">$195</div>
                    <a href="#" class="btn btn-sm btn-outline-primary shadow-none" data-bs-toggle="modal" data-bs-target="#select-busseats"><i class="fas fa-ellipsis-h d-none d-sm-block d-lg-none" data-bs-toggle="tooltip" title="" data-bs-original-title="Select Seats" aria-label="Select Seats"></i> <span class="d-block d-sm-none d-lg-block">Select Seats</span></a> </div>
                </div>
              </div>
              <div class="bus-item">
                <div class="row align-items-sm-center flex-row py-4 px-3">
                  <div class="col col-sm-3"> <span class="text-3 text-dark operator-name">Shrinath Travels</span> <span class="text-1 text-muted d-block">AC Sleeper</span> </div>
                  <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">12:00</span> <small class="text-muted d-block">Mumbai</small> </div>
                  <div class="col col-sm-2 text-center d-none d-sm-block time-info"> <span class="text-3 duration">06h 32m</span> <small class="text-muted d-block">12 Stops</small> </div>
                  <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">05:15</span> <small class="text-muted d-block">Surat</small> </div>
                  <div class="col-12 col-sm-3 align-self-center text-end text-sm-center mt-2 mt-sm-0">
                    <div class="d-inline-block d-sm-block text-dark text-5 price mb-sm-1">$221</div>
                    <a href="#" class="btn btn-sm btn-outline-primary shadow-none" data-bs-toggle="modal" data-bs-target="#select-busseats"><i class="fas fa-ellipsis-h d-none d-sm-block d-lg-none" data-bs-toggle="tooltip" title="" data-bs-original-title="Select Seats" aria-label="Select Seats"></i> <span class="d-block d-sm-none d-lg-block">Select Seats</span></a> </div>
                </div>
              </div>
              <div class="bus-item">
                <div class="row align-items-sm-center flex-row py-4 px-3">
                  <div class="col col-sm-3"> <span class="text-3 text-dark operator-name">Vikas Travels</span> <span class="text-1 text-muted d-block">AC Sleeper</span> </div>
                  <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">12:00</span> <small class="text-muted d-block">Mumbai</small> </div>
                  <div class="col col-sm-2 text-center d-none d-sm-block time-info"> <span class="text-3 duration">06h 32m</span> <small class="text-muted d-block">12 Stops</small> </div>
                  <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">05:15</span> <small class="text-muted d-block">Surat</small> </div>
                  <div class="col-12 col-sm-3 align-self-center text-end text-sm-center mt-2 mt-sm-0">
                    <div class="d-inline-block d-sm-block text-dark text-5 price mb-sm-1">$245</div>
                    <a href="#" class="btn btn-sm btn-outline-primary shadow-none" data-bs-toggle="modal" data-bs-target="#select-busseats"><i class="fas fa-ellipsis-h d-none d-sm-block d-lg-none" data-bs-toggle="tooltip" title="" data-bs-original-title="Select Seats" aria-label="Select Seats"></i> <span class="d-block d-sm-none d-lg-block">Select Seats</span></a> </div>
                </div>
              </div>
              <div class="bus-item">
                <div class="row align-items-sm-center flex-row py-4 px-3">
                  <div class="col col-sm-3"> <span class="text-3 text-dark operator-name">VTK Travels</span> <span class="text-1 text-muted d-block">AC Sleeper</span> </div>
                  <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">12:00</span> <small class="text-muted d-block">Mumbai</small> </div>
                  <div class="col col-sm-2 text-center d-none d-sm-block time-info"> <span class="text-3 duration">06h 32m</span> <small class="text-muted d-block">12 Stops</small> </div>
                  <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">05:15</span> <small class="text-muted d-block">Surat</small> </div>
                  <div class="col-12 col-sm-3 align-self-center text-end text-sm-center mt-2 mt-sm-0">
                    <div class="d-inline-block d-sm-block text-dark text-5 price mb-sm-1">$199</div>
                    <a href="#" class="btn btn-sm btn-outline-primary shadow-none" data-bs-toggle="modal" data-bs-target="#select-busseats"><i class="fas fa-ellipsis-h d-none d-sm-block d-lg-none" data-bs-toggle="tooltip" title="" data-bs-original-title="Select Seats" aria-label="Select Seats"></i> <span class="d-block d-sm-none d-lg-block">Select Seats</span></a> </div>
                </div>
              </div>
            </div>
            
            <!-- Pagination
              ============================================= -->
            <ul class="pagination justify-content-center mt-4 mb-0">
              <li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a> </li>
              <li class="page-item active"> <a class="page-link" href="#">1</a> </li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"> <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a> </li>
            </ul>
            <!-- Pagination end --> 
          </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

    <div id="select-busseats" class="modal fade show" role="dialog" aria-modal="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bus Booking Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="bus-details">
          <div class="row align-items-sm-center flex-row mb-4">
            <div class="col col-sm-3"> <span class="text-4 text-dark operator-name">AK Tour &amp; Travels</span> <span class="text-muted d-block">AC Sleeper</span> </div>
            <div class="col col-sm-3 text-center time-info"> <span class="text-5 text-dark">12:00</span> <small class="text-muted d-block">Mumbai</small> </div>
            <div class="col col-sm-3 text-center d-none d-sm-block time-info"> <span class="text-3 duration">06h 32m</span> <small class="text-muted d-block">12 Stops</small> </div>
            <div class="col col-sm-3 text-center time-info"> <span class="text-5 text-dark">05:15</span> <small class="text-muted d-block">Surat</small> </div>
          </div>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item"> <a class="nav-link active" id="first-tab" data-bs-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">Available Seats</a> </li>
            <li class="nav-item"> <a class="nav-link" id="second-tab" data-bs-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">Cancellation Fee</a> </li>
          </ul>
          <div class="tab-content my-3" id="myTabContent">
            <div class="tab-pane fade active show" id="first" role="tabpanel" aria-labelledby="first-tab">
              <div class="row">
                <div class="col-12 col-lg-6 text-center">
                  <p class="text-muted text-1">Click on Seat to select/ deselect</p>
                  <div id="seat-map" class="seatCharts-container" tabindex="0">
                    <div class="front-indicator">Front</div>
                  <div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">1</div><div id="1_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available first-class">1</div><div id="1_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell first-class unavailable">2</div><div class="seatCharts-cell seatCharts-space"></div><div id="1_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available first-class">3</div><div id="1_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available first-class">4</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">2</div><div id="2_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available first-class">5</div><div id="2_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available first-class">6</div><div class="seatCharts-cell seatCharts-space"></div><div id="2_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available first-class">7</div><div id="2_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available first-class">8</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">3</div><div id="3_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">9</div><div id="3_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">10</div><div class="seatCharts-cell seatCharts-space"></div><div id="3_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">11</div><div id="3_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">12</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">4</div><div id="4_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell economy-class unavailable">13</div><div id="4_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">14</div><div class="seatCharts-cell seatCharts-space"></div><div id="4_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">15</div><div id="4_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">16</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">5</div><div id="5_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">17</div><div id="5_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">18</div><div class="seatCharts-cell seatCharts-space"></div><div class="seatCharts-cell seatCharts-space"></div><div class="seatCharts-cell seatCharts-space"></div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">6</div><div id="6_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">19</div><div id="6_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">20</div><div class="seatCharts-cell seatCharts-space"></div><div id="6_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">21</div><div id="6_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">22</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">7</div><div id="7_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell economy-class unavailable">23</div><div id="7_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell economy-class unavailable">24</div><div class="seatCharts-cell seatCharts-space"></div><div id="7_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">25</div><div id="7_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">26</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">8</div><div id="8_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">27</div><div id="8_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">28</div><div class="seatCharts-cell seatCharts-space"></div><div id="8_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">29</div><div id="8_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">30</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">9</div><div id="9_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">31</div><div id="9_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">32</div><div id="9_3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">33</div><div id="9_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">34</div><div id="9_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">35</div></div></div>
                  <div id="legend" class="seatCharts-legend"><ul class="seatCharts-legendList"><li class="seatCharts-legendItem"><div class="seatCharts-seat seatCharts-cell available first-class"></div><span class="seatCharts-legendDescription">First Class</span></li><li class="seatCharts-legendItem"><div class="seatCharts-seat seatCharts-cell available economy-class"></div><span class="seatCharts-legendDescription">Economy Class</span></li><li class="seatCharts-legendItem"><div class="seatCharts-seat seatCharts-cell unavailable first-class"></div><span class="seatCharts-legendDescription">Already Booked</span></li></ul></div>
                </div>
                <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                  <div class="booking-details">
                    <h2 class="text-5">Booking Details</h2>
                    <p>Selected Seats (<span id="counter">0</span>):</p>
                    <ul id="selected-seats">
                    </ul>
                    <div class="d-flex bg-light-4 px-3 py-2 mb-3">Total Fare: <span class="text-dark text-5 fw-600 ms-2">$<span id="total">0</span></span></div>
                    <div class="d-grid">
                      <button class="btn btn-primary">Continue</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th>Hours before Departure</th>
                    <th class="text-center">Refund Percentage</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Before 0 Hrs.</td>
                    <td class="text-center">0%</td>
                  </tr>
                  <tr>
                    <td>Before 24 Hrs.</td>
                    <td class="text-center">30%</td>
                  </tr>
                  <tr>
                    <td>Before 48 Hrs.</td>
                    <td class="text-center">60%</td>
                  </tr>
                  <tr>
                    <td>Before 60 Hrs.</td>
                    <td class="text-center">75%</td>
                  </tr>
                  <tr>
                    <td>Above 60 Hrs. </td>
                    <td class="text-center">80%</td>
                  </tr>
                </tbody>
              </table>
              <p class="fw-bold">Terms &amp; Conditions</p>
              <ul>
                <li>The penalty is subject to 24 hrs before departure. No Changes are allowed after that.</li>
                <li>The charges are per seat.</li>
                <li>Partial cancellation is not allowed on tickets booked under special discounted fares.</li>
                <li>In case of no-show or ticket not cancelled within the stipulated time, only statutory taxes are refundable subject to Service Fee.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>

<script>
    var buses = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        url: 'https://ecommerce.unitymall.in/bus/ajax-search/%QUERY',
        wildcard: '%QUERY'
    },
    });
    buses.initialize();

    $('.bus-booking').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
    },
    {
    name: 'buses',
    display: 'name',
    source: buses,
    templates: {
        empty: [
        '<div class="empty-message">',
        'No Record Found !',
        '</div>'
        ].join('\n'),
        suggestion: function (data) {
        return '<a href="javascript:;" class="man-section"><div class="image-section"><img ></div><div class="description-section"><h4>'+data.name+'</h4></div></a>';
    }
    }
    });


/* Bus Seats */
$('#busTravellersClass').on('click', function() {
        $('.travellers-dropdown').slideToggle('fast');
		/* Change value of Seats */
		$('.qty-spinner').on('change', function() {
        var ids = ['adult'];
		var totalCount = ids.reduce(function (prev, id) {
			return parseInt($('#' + id + '-travellers').val()) + prev}, 0);
		
        $('#busTravellersClass').val(totalCount + '  ' + 'Seats');
    }).trigger('change');
    });

 // Depart Date
 $('#busDepart').daterangepicker({
	singleDatePicker: true,
	autoApply: true,
	minDate: moment(),
	autoUpdateInput: false,
	}, function(chosen_date) {
  $('#busDepart').val(chosen_date.format('MM-DD-YYYY'));
  });
</script>

<script>
$(function() {
 'use strict';
  // Autocomplete
  $('#busFrom,#busTo').autocomplete({
	  minLength: 3,
	  delay: 100,
	  source: function (request, response) {
		$.getJSON(
		 'http://gd.geobytes.com/AutoCompleteCity?callback=?&q='+request.term,
		  function (data) {
			 response(data);
		}
	);
	},
  });
 // Depart Date
  $('#busDepart').daterangepicker({
	singleDatePicker: true,
	autoApply: true,
	minDate: moment(),
	autoUpdateInput: false,
	}, function(chosen_date) {
  $('#busDepart').val(chosen_date.format('MM-DD-YYYY'));
  });

// Departure Time Slider Range (jQuery UI)
	$("#slider-range-departure").slider({
  range: true,
  min: 0,
  max: 1439,
  values: [0, 1439],
  slide: function(e, ui) {
    $('.slider-time-departure').each(function(i) {
      var hours = ("00" + Math.floor(ui.values[i] / 60)).slice(-2);
      var mins = ("00" + (ui.values[i] - (hours * 60))).slice(-2);
      $(this).html(hours + ':' + mins);
    });
  }
});

// Slider Range (jQuery UI)
    $( "#slider-range" ).slider({
      range: true,
      min: 125,
      max: 1250,
      values: [ 125, 1250 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
 });
	
// Seat Charts
	var firstSeatLabel = 1;
	$(document).ready(function() {
		  var $cart = $('#selected-seats'),
			  $counter = $('#counter'),
			  $total = $('#total'),
			  sc = $('#seat-map').seatCharts({
			  map: [
				  'ff_ff',
				  'ff_ff',
				  'ee_ee',
				  'ee_ee',
				  'ee___',
				  'ee_ee',
				  'ee_ee',
				  'ee_ee',
				  'eeeee',
			  ],
			  seats: {
				  f: {
					  price   : 250,
					  classes : 'first-class', //your custom CSS class
					  category: 'First Class'
				  },
				  e: {
					  price   : 140,
					  classes : 'economy-class', //your custom CSS class
					  category: 'Economy Class'
				  }					
			  
			  },
			  naming : {
				  top : false,
				  getLabel : function (character, row, column) {
					  return firstSeatLabel++;
				  },
			  },
			  legend : {
				  node : $('#legend'),
				  items : [
					  [ 'f', 'available',   'First Class' ],
					  [ 'e', 'available',   'Economy Class'],
					  [ 'f', 'unavailable', 'Already Booked']
				  ]					
			  },
			  click: function () {
				  if (this.status() == 'available') {
					  //let's create a new <li> which we'll add to the cart items
					  $('<li>'+this.data().category+' Seat # '+this.settings.label+': <b>$'+this.data().price+'</b> <a href="#" class="cancel-cart-item text-danger text-4"><i class="far fa-times-circle"></i></a></li>')
						  .attr('id', 'cart-item-'+this.settings.id)
						  .data('seatId', this.settings.id)
						  .appendTo($cart);
					  
					  /*
					   * Lets update the counter and total
					   *
					   * .find function will not find the current seat, because it will change its stauts only after return
					   * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
					   */
					  $counter.text(sc.find('selected').length+1);
					  $total.text(recalculateTotal(sc)+this.data().price);
					  
					  return 'selected';
				  } else if (this.status() == 'selected') {
					  //update the counter
					  $counter.text(sc.find('selected').length-1);
					  //and total
					  $total.text(recalculateTotal(sc)-this.data().price);
				  
					  //remove the item from our cart
					  $('#cart-item-'+this.settings.id).remove();
				  
					  //seat has been vacated
					  return 'available';
				  } else if (this.status() == 'unavailable') {
					  //seat has been already booked
					  return 'unavailable';
				  } else {
					  return this.style();
				  }
			  }
		  });

		  //this will handle "[cancel]" link clicks
		  $('#selected-seats').on('click', '.cancel-cart-item', function () {
			  //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
			  sc.get($(this).parents('li:first').data('seatId')).click();
		  });

		  //let's pretend some seats have already been booked
		  sc.get(['1_2', '4_1', '7_1', '7_2']).status('unavailable');
  
  });
  function recalculateTotal(sc) {
	  var total = 0;
  
	  //basically find every selected seat and sum its price
	  sc.find('selected').each(function () {
		  total += this.data().price;
	  });
	  
	  return total;
  }
</script> 

@endsection