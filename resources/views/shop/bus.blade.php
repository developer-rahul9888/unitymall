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

</style>
@section('styles')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
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

    <!--section start-->

    <section class="about-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-section"><img src="../assets/images/about/vendor.jpg" class="img-fluid blur-up lazyloaded" alt=""></div>
                </div>
                <div class="col-sm-12">
                    <h4>Start your business with Multikart &amp; reach customers across the World...</h4>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    </p>
                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and
                        demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot
                        foresee
                        the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their
                        duty through weakness of will, which is the same as saying through shrinking from toil and pain.
                        These cases are perfectly simple and easy to distinguish. In a free hour, when our power of
                        choice
                        is untrammelled and when nothing prevents our being able to do what we like best, every pleasure
                        is
                        to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of
                        duty
                        or the obligations of business it will frequently occur that pleasures have to be repudiated and
                        annoyances accepted. The wise man therefore always holds in these matters to this principle of
                        selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to
                        avoid
                        worse pains.</p>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->

    <!-- service section start -->
    <div class="container">
        <section class="service section-b-space pt-0 ">
            <div class="row partition4 ">
                <div class="col-lg-3 col-md-6 service-block1">
                    <svg viewBox="-29 0 487 487.71902" xmlns="http://www.w3.org/2000/svg">
                        <path d="m220.867188 266.175781c-.902344-.195312-1.828126-.230469-2.742188-.09375-9.160156-1.066406-16.070312-8.816406-16.085938-18.035156 0-4.417969-3.582031-8-8-8-4.417968 0-8 3.582031-8 8 .023438 15.394531 10.320313 28.878906 25.164063 32.953125v8c0 4.417969 3.582031 8 8 8s8-3.582031 8-8v-7.515625c17.132813-3.585937 28.777344-19.542969 26.976563-36.953125-1.804688-17.410156-16.472657-30.640625-33.976563-30.644531-10.03125 0-18.164063-8.132813-18.164063-18.164063s8.132813-18.164062 18.164063-18.164062 18.164063 8.132812 18.164063 18.164062c0 4.417969 3.582031 8 8 8 4.417968 0 8-3.582031 8-8-.023438-16.164062-11.347657-30.105468-27.164063-33.441406v-7.28125c0-4.417969-3.582031-8-8-8s-8 3.582031-8 8v7.769531c-16.507813 4.507813-27.132813 20.535157-24.859375 37.496094s16.746094 29.621094 33.859375 29.617187c9.898437 0 17.972656 7.925782 18.152344 17.820313.183593 9.894531-7.597657 18.113281-17.488281 18.472656zm0 0"></path>
                        <path d="m104.195312 222.5c0 64.070312 51.9375 116.007812 116.007813 116.007812s116.007813-51.9375 116.007813-116.007812-51.9375-116.007812-116.007813-116.007812c-64.039063.070312-115.933594 51.96875-116.007813 116.007812zm116.007813-100.007812c55.234375 0 100.007813 44.773437 100.007813 100.007812s-44.773438 100.007812-100.007813 100.007812-100.007813-44.773437-100.007813-100.007812c.0625-55.207031 44.800782-99.945312 100.007813-100.007812zm0 0"></path>
                        <path d="m375.648438 358.230469-62.667969 29.609375c-8.652344-16.09375-25.25-26.335938-43.515625-26.851563l-57.851563-1.589843c-9.160156-.261719-18.148437-2.582032-26.292969-6.789063l-5.886718-3.050781c-30.140625-15.710938-66.066406-15.671875-96.175782.101562l.367188-13.335937c.121094-4.417969-3.359375-8.097657-7.777344-8.21875l-63.4375-1.746094c-4.417968-.121094-8.09375 3.359375-8.214844 7.777344l-3.832031 139.210937c-.121093 4.417969 3.359375 8.097656 7.777344 8.21875l63.4375 1.746094h.21875c4.335937 0 7.882813-3.449219 8-7.78125l.183594-6.660156 16.480469-8.824219c6.46875-3.480469 14.03125-4.308594 21.097656-2.308594l98.414062 27.621094c.171875.050781.34375.089844.519532.128906 7.113281 1.488281 14.363281 2.234375 21.628906 2.230469 15.390625.007812 30.601562-3.308594 44.589844-9.730469.34375-.15625.675781-.339843.992187-.546875l142.691406-92.296875c3.554688-2.300781 4.703125-6.96875 2.621094-10.65625-10.59375-18.796875-34.089844-25.957031-53.367187-16.257812zm-359.070313 107.5625 3.390625-123.21875 47.441406 1.304687-3.390625 123.222656zm258.925781-2.09375c-17.378906 7.84375-36.789062 10.007812-55.46875 6.191406l-98.148437-27.550781c-11.046875-3.121094-22.871094-1.828125-32.976563 3.605468l-8.421875 4.511719 2.253907-81.925781c26.6875-17.75 60.914062-19.574219 89.335937-4.765625l5.886719 3.050781c10.289062 5.3125 21.636718 8.242188 33.210937 8.578125l57.855469 1.589844c16.25.46875 30.050781 12.039063 33.347656 27.960937l-86.175781-2.378906c-4.417969-.121094-8.09375 3.363282-8.21875 7.777344-.121094 4.417969 3.363281 8.097656 7.777344 8.21875l95.101562 2.617188h.222657c4.332031-.003907 7.875-3.453126 7.992187-7.78125.097656-3.476563-.160156-6.957032-.773437-10.378907l64.277343-30.371093c.0625-.027344.125-.058594.1875-.089844 9.117188-4.613282 20.140625-3.070313 27.640625 3.871094zm0 0"></path>
                        <path d="m228.203125 84v-76c0-4.417969-3.582031-8-8-8s-8 3.582031-8 8v76c0 4.417969 3.582031 8 8 8s8-3.582031 8-8zm0 0"></path>
                        <path d="m288.203125 84v-36c0-4.417969-3.582031-8-8-8s-8 3.582031-8 8v36c0 4.417969 3.582031 8 8 8s8-3.582031 8-8zm0 0"></path>
                        <path d="m168.203125 84v-36c0-4.417969-3.582031-8-8-8s-8 3.582031-8 8v36c0 4.417969 3.582031 8 8 8s8-3.582031 8-8zm0 0"></path>
                    </svg>
                    <h4>lowest cost</h4>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
                </div>
                <div class="col-lg-3 col-md-6 service-block1 ">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512">
                        <g>
                            <g>
                                <path d="m266.1,237.1h-82.2c-6.2,0-10.4,5.2-10.4,10.4v243c0,6.3 5.2,10.4 10.4,10.4h82.2c5.2,0 10.4-4.2 10.4-10.4v-243c0-6.2-5.2-10.4-10.4-10.4zm-10.4,243h-61.4v-222.1h61.4v222.1z"></path>
                                <path d="M103.7,272.6H21.5c-6.2,0-10.4,5.2-10.4,10.4v207.6c0,6.3,5.2,10.4,10.4,10.4h82.2c5.2,0,10.4-4.2,10.4-10.4V283    C114.1,276.7,108.9,272.6,103.7,272.6z M93.3,480.1H31.9V293.4h61.4V480.1z"></path>
                                <path d="m499.2,157.8l-103-142.9c-4.2-5.2-12.5-5.2-16.6,0l-103,142.9c-4.2,5.9-2.6,15.6 8.3,15.6h51v317.1c0,6.3 5.2,10.4 10.4,10.4h82.2c5.2,0 10.4-4.2 11.4-10.4v-317h51c10.2,0 12.4-10.4 8.3-15.7zm-70.8-5.2c-6.2,0-10.4,5.2-10.4,10.4v317.1h-61.4-1v-317.1c0-6.3-5.2-10.4-10.4-10.4h-41.6l83.2-114.7 83.2,114.7h-41.6z"></path>
                            </g>
                        </g>
                    </svg>
                    <h4>high growth rate</h4>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
                </div>
                <div class="col-lg-3 col-md-6 service-block1 border border-0">
                    <svg viewBox="0 -31 480 479" xmlns="http://www.w3.org/2000/svg">
                        <path d="m152 352.5h16v16h-16zm0 0"></path>
                        <path d="m376 352.5h16v16h-16zm0 0"></path>
                        <path d="m0 328.5h40v16h-40zm0 0"></path>
                        <path d="m16 296.5h24v16h-24zm0 0"></path>
                        <path d="m24 264.5h16v16h-16zm0 0"></path>
                        <path d="m477.65625 250.84375-99.257812-99.28125c-4.503907-4.539062-10.640626-7.082031-17.039063-7.0625h-89.359375c-1.648438.035156-3.242188.597656-4.550781 1.601562-13.421875-44.203124-54.390625-74.253906-100.582031-73.777343-46.195313.472656-86.535157 31.359375-99.046876 75.828125-12.507812 44.46875 5.8125 91.859375 44.980469 116.347656h-40.800781c-4.417969 0-8 3.582031-8 8v72c0 13.253906 10.746094 24 24 24h16.640625c1.746094 12.164062 7.453125 23.410156 16.238281 32h-120.878906v16h384c27.8125-.03125 51.386719-20.472656 55.359375-48h16.640625c13.253906 0 24-10.746094 24-24v-88c0-2.121094-.84375-4.15625-2.34375-5.65625zm-13.65625 13.65625h-120v-72h52.6875l67.3125 67.3125zm-384-88c0-48.601562 39.398438-88 88-88s88 39.398438 88 88-39.398438 88-88 88c-48.578125-.058594-87.941406-39.421875-88-88zm184 39.9375v48.0625h-40.800781c18.21875-11.445312 32.46875-28.226562 40.800781-48.0625zm-144 144.0625c0-22.089844 17.910156-40 40-40s40 17.910156 40 40-17.910156 40-40 40c-22.082031-.027344-39.972656-17.917969-40-40zm79.121094 40c8.785156-8.589844 14.492187-19.835938 16.238281-32h113.28125c1.746094 12.164062 7.453125 23.410156 16.238281 32zm184.878906 0c-22.089844 0-40-17.910156-40-40s17.910156-40 40-40 40 17.910156 40 40c-.027344 22.082031-17.917969 39.972656-40 40zm72-48h-16.640625c-3.953125-27.535156-27.542969-47.976562-55.359375-47.976562s-51.40625 20.441406-55.359375 47.976562h-113.28125c-3.953125-27.535156-27.542969-47.976562-55.359375-47.976562s-51.40625 20.441406-55.359375 47.976562h-16.640625c-4.417969 0-8-3.582031-8-8v-64h192c4.417969 0 8-3.582031 8-8v-112h81.359375c2.148437.003906 4.203125.867188 5.703125 2.398438l13.601562 13.601562h-36.664062c-8.835938 0-16 7.164062-16 16v72c0 8.835938 7.164062 16 16 16h120v64c0 4.417969-3.582031 8-8 8zm0 0"></path>
                        <path d="m304 296.5h32v16h-32zm0 0"></path>
                        <path d="m168 32.5h128v16h-128zm0 0"></path>
                        <path d="m136 32.5h16v16h-16zm0 0"></path>
                        <path d="m120 .5h144v16h-144zm0 0"></path>
                        <path d="m88 .5h16v16h-16zm0 0"></path>
                        <path d="m114.347656 218.84375 96.003906-96 11.3125 11.3125-96.003906 96.003906zm0 0"></path>
                        <path d="m200 184.5c-13.253906 0-24 10.746094-24 24s10.746094 24 24 24 24-10.746094 24-24-10.746094-24-24-24zm0 32c-4.417969 0-8-3.582031-8-8s3.582031-8 8-8 8 3.582031 8 8-3.582031 8-8 8zm0 0"></path>
                        <path d="m136 168.5c13.253906 0 24-10.746094 24-24s-10.746094-24-24-24-24 10.746094-24 24 10.746094 24 24 24zm0-32c4.417969 0 8 3.582031 8 8s-3.582031 8-8 8-8-3.582031-8-8 3.582031-8 8-8zm0 0"></path>
                    </svg>
                    <h4>dedicated pickup</h4>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
                </div>
                <div class="col-lg-3 col-md-6 service-block1 border border-0">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M404.267,315.41c-10.048-20.949-45.995-50.027-80.725-78.123c-19.371-15.659-37.675-30.464-49.344-42.133
			c-2.923-2.944-7.296-3.883-11.157-2.496c-7.189,2.603-11.627,4.608-15.125,6.165c-5.333,2.389-7.125,3.2-14.315,3.925
			c-3.179,0.32-6.037,2.027-7.808,4.672c-15.083,22.549-30.699,20.629-41.131,17.131c-3.328-1.109-3.925-2.539-4.245-3.904
			c-2.24-9.365,9.003-31.168,23.573-45.739c34.667-34.688,52.544-43.371,90.304-26.496c42.837,19.157,85.76,34.155,86.187,34.304
			c5.611,1.941,11.648-1.003,13.589-6.571c1.92-5.568-1.003-11.648-6.571-13.589c-0.427-0.149-42.496-14.848-84.48-33.643
			c-48.917-21.867-75.755-7.467-114.091,30.891c-14.592,14.592-34.411,44.117-29.291,65.771c2.197,9.216,8.683,16.043,18.325,19.221
			c24.171,7.979,46.229,0.341,62.656-21.461c6.784-1.045,10.475-2.581,16.021-5.077c2.005-0.896,4.352-1.941,7.467-3.2
			c12.203,11.456,28.672,24.789,46.016,38.805c31.36,25.365,66.923,54.123,74.923,70.763c3.947,8.213-0.299,13.568-3.179,16.021
			c-4.224,3.627-10.005,4.779-13.141,2.581c-3.456-2.368-7.957-2.517-11.52-0.384c-3.584,2.133-5.589,6.165-5.141,10.304
			c0.725,6.784-5.483,10.667-8.171,12.011c-6.827,3.456-13.952,2.859-16.619,0.384c-2.987-2.773-7.275-3.584-11.072-2.176
			c-3.797,1.429-6.443,4.928-6.827,8.981c-0.64,6.997-5.824,13.717-12.587,16.341c-3.264,1.237-8,1.984-12.245-1.899
			c-2.645-2.389-6.315-3.307-9.749-2.475c-3.477,0.853-6.272,3.371-7.488,6.72c-0.405,1.067-1.323,3.627-11.307,3.627
			c-7.104,0-19.883-4.8-26.133-8.939c-7.488-4.928-54.443-39.957-94.997-73.92c-5.696-4.8-15.552-15.083-24.256-24.171
			c-7.723-8.064-14.784-15.381-18.411-18.453c-4.544-3.84-11.264-3.264-15.04,1.259c-3.797,4.501-3.243,11.243,1.259,15.04
			c3.307,2.795,9.707,9.557,16.768,16.917c9.515,9.941,19.349,20.224,25.963,25.771c39.723,33.259,87.467,69.163,96.981,75.413
			c7.851,5.163,24.768,12.416,37.867,12.416c10.517,0,18.603-2.411,24.213-7.125c7.509,2.923,16.043,2.944,24.256-0.256
			c9.707-3.755,17.685-11.328,22.208-20.501c8.405,1.792,18.027,0.533,26.773-3.861c8.555-4.309,14.741-10.901,17.813-18.603
			c8.491,0.448,17.237-2.56,24.469-8.768C407.979,346.407,411.349,330.109,404.267,315.41z"></path>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M213.333,138.663h-96c-5.888,0-10.667,4.779-10.667,10.667s4.779,10.667,10.667,10.667h96
			c5.888,0,10.667-4.779,10.667-10.667S219.221,138.663,213.333,138.663z"></path>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M435.52,292.711c-3.307-4.885-9.92-6.229-14.805-2.901l-31.189,20.949c-4.885,3.285-6.187,9.92-2.901,14.805
			c2.069,3.051,5.44,4.715,8.875,4.715c2.027,0,4.096-0.576,5.931-1.813l31.189-20.949
			C437.504,304.231,438.805,297.597,435.52,292.711z"></path>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M369.301,343.613c-7.637-6.016-41.792-40.981-62.912-62.997c-4.075-4.267-10.837-4.416-15.083-0.32
			c-4.267,4.075-4.395,10.837-0.32,15.083c5.483,5.717,53.845,56.128,65.088,65.003c1.941,1.536,4.288,2.283,6.592,2.283
			c3.136,0,6.272-1.408,8.405-4.075C374.72,353.981,373.931,347.261,369.301,343.613z"></path>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M326.677,365.01c-12.779-10.219-44.885-44.331-52.139-52.224c-4.011-4.352-10.731-4.608-15.083-0.64
			c-4.331,3.989-4.629,10.752-0.64,15.083c0.384,0.405,38.699,41.771,54.528,54.443c1.963,1.557,4.331,2.325,6.656,2.325
			c3.115,0,6.229-1.387,8.341-3.989C332.011,375.399,331.264,368.679,326.677,365.01z"></path>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M284.224,386.493c-15.211-12.821-46.336-45.952-52.416-52.459c-4.032-4.309-10.795-4.544-15.083-0.512
			c-4.309,4.032-4.523,10.773-0.512,15.083c8.747,9.365,38.528,40.939,54.251,54.208c2.005,1.685,4.437,2.517,6.869,2.517
			c3.029,0,6.059-1.301,8.171-3.797C289.301,397.01,288.725,390.29,284.224,386.493z"></path>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M124.672,120.253C106.389,102.93,33.28,97.319,11.307,96.018c-3.029-0.149-5.824,0.853-7.957,2.88
			C1.216,100.903,0,103.719,0,106.663v192c0,5.888,4.779,10.667,10.667,10.667h64c4.608,0,8.704-2.965,10.133-7.36
			c1.557-4.779,38.315-117.589,43.157-173.056C128.235,125.671,127.04,122.471,124.672,120.253z M66.88,287.997H21.333V118.098
			c34.283,2.709,71.275,8.597,84.715,15.125C100.395,179.943,74.816,262.951,66.88,287.997z"></path>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M501.333,117.33c-83.755,0-130.219,21.44-132.16,22.336c-2.773,1.301-4.843,3.712-5.696,6.635s-0.427,6.059,1.173,8.661
			c13.184,21.227,54.464,139.115,62.4,167.872c1.28,4.629,5.483,7.829,10.283,7.829h64c5.888,0,10.667-4.779,10.667-10.667v-192
			C512,122.087,507.221,117.33,501.333,117.33z M490.667,309.33h-45.355c-10.112-32.939-39.979-118.827-56.64-154.325
			c16.277-5.525,51.243-15.019,101.995-16.213V309.33z"></path>
                            </g>
                        </g>
                    </svg>
                    <h4>most approachable</h4>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
                </div>
            </div>
        </section>
    </div>
    <!-- service section end -->

    <!--section start-->
    <section class="authentication-page" style="height:70vh;">
        <div class="container">
            <section class="search-block">
                <div class="container">
                    <div class="row">
                        <div class="title1">
                            <h2 class="title-inner1">Book Now</h2>
                        </div>
                        <div class="col-lg-7 offset-lg-3">
                            <form class="form-header ajax-search bus-search" action="" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input  type="text" name="from" class="form-control bus-booking" aria-label="From" placeholder="From">
                                    <input type="text" name="to" class="form-control bus-booking" aria-label="To" placeholder="To">
                                    <input type="date" name="date" class="form-control" aria-label="Date" placeholder="Date">
                                    <div class="input-group-append">
                                        <button class="btn btn-solid" type="submit"><i class="fa fa-search"></i>Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- section end -->



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