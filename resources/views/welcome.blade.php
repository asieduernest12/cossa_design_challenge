@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to the Cossa Design Challenge</div>

                <div class="panel-body">

                    <!-- use two col view per entery on large screen and one column view on small display-->

                    <div class="col-md-6 col-xs-12" ng-repeat='entry in entries'>
                      <!-- image, designer name and email -->
                      <img src="@{{entry.src}}" alt="image of entry" class="img img-responsive img-rounded" />
                      <div class="form-horizontal">

                          <div class="form-group">
                            <label for="" class="col-md-3 col-xs-12">Designer</label>
                            <div class="col-md-9 col-xs-12">
                              <input type="button" name="name" value="@{{entry.designer | uppercase}}" readonly="">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-md-3 col-xs-12">Email</label>
                            <div class="col-md-9 col-xs-12">
                              <input type="button" name="name" value="@{{entry.email}}" readonly="">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-md-3 col-xs-12">Phone No.</label>
                            <div class="col-md-9 col-xs-12">
                              <input type="button" name="name" value="@{{entry.phone}}" readonly="">
                            </div>
                          </div>

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
