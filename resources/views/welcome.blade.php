@extends('layouts.app')

@section('content')
<div class="container-fluid" ng-app='cossa_dc' ng-controller='entriesCtrl'>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to the Cossa Design Challenge</div>

                <div class="panel-body">

                    <!-- use two col view per entery on large screen and one column view on small display-->

                    <div class="col-md-6 col-xs-12 well" ng-repeat='entry in entries'>
                      <!-- image, designer name and email -->

                      <div class="form-horizontal">
                          <div class="form-group col-md-12">
                            <img src="@{{entry.src}}" alt="image of entry" class="img img-responsive img-thumbnail center-block"  />
                          </div>
                          <div class="form-group">
                            <label for="" class="col-md-3 col-xs-12">Designer</label>
                            <div class="col-md-9 col-xs-12">
                              <input type="button" name="name" value="@{{entry.designer | uppercase}}" readonly="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-md-3 col-xs-12">Email</label>
                            <div class="col-md-9 col-xs-12">
                              <input type="button" name="name" value="@{{entry.email}}" readonly="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-md-3 col-xs-12">Phone No.</label>
                            <div class="col-md-9 col-xs-12">
                              <input type="button" name="name" value="@{{entry.phone}}" readonly="" class="form-control">
                            </div>
                          </div>

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/angular.js')}}"></script>
<script type="text/javascript" src="{{asset('js/angular-ui-router.js')}}"></script>
<script type="text/javascript" src="{{asset('js/angular-resource.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>


@endsection
