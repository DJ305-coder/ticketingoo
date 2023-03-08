@extends('admin.layout.layout')
@section('header')
<style>
  .card {
    border: none;
  }

  .card-title {
    font-size: 15px;
    position: relative;
  }

  .badge-soft-light {
    color: #e9ecef;
    background-color: rgba(233, 236, 239, 0.18);
  }

  .progress {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    height: 1rem;
    overflow: hidden;
    font-size: .60938rem;
    background-color: #e9ecef;
    border-radius: .2rem;
  }

  .progress-bar {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    background-color: #7266bb;
    -webkit-transition: width 0.6s ease;
    transition: width 0.6s ease;
  }
</style>
@endsection
@section('content')

<div id="">
  <div id="dashboard" class="content-body">
    <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
        <div class="col-12 mb-2">
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Dashboard</h4>


          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-md-6 col-xl-3">
          <div class="card bg-primary border-primary">
            <div class="card-body">
              <div class="mb-4">
                <span class="badge badge-soft-light float-right">Toal</span>
                <h5 class="card-title mb-0 text-white">Banner</h5>
              </div>
              <div class="row d-flex align-items-center mb-4">
                <div class="col-8">
                  <h2 class="d-flex align-items-center mb-0 text-white">
                    {{!empty($total_banners) ? $total_banners : 0}}
                  </h2>
                </div>

              </div>

              <div class="progress badge-soft-light shadow-sm" style="height: 5px;">
                <div class="progress-bar bg-light" role="progressbar" style="width: 38%;"></div>
              </div>
            </div>
          </div>
        </div> <!-- end col-->
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')


@endsection