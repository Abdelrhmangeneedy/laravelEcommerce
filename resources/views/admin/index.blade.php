@extends('layouts.admin')

@section('title')
    dashboard
@endsection
@section('content')

    <div class='card p-5'>
        <div class="card-head">
            <h1>Geneedy Coder</h1>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
              <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card btn btn-success">
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-8">
                        <a href="users">
                          <h3 class="text-sm mb-0 text-capitalize font-weight-bold">Users</h3>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card btn btn-info">
                    <div class="card-body p-3">
                      <div class="row">
                        <div class="col-8">
                          <a href="orders">
                            <h3 class="text-sm mb-0 text-capitalize font-weight-bold">Orders</h3>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card btn btn-danger">
                    <div class="card-body p-3">
                      <div class="row">
                        <div class="col-8">
                          <a href="categories">
                            <h3 class="text-sm mb-0 text-capitalize font-weight-bold">Categories</h3>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="card btn btn-warning">
                    <div class="card-body p-3">
                      <div class="row">
                        <div class="col-8">
                          <a href="products">
                            <h3 class="text-sm mb-0 text-capitalize font-weight-bold">Products</h3>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>

    @endsection
