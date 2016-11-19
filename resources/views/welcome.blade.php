@extends('layouts.app')

@section('content')



<div class="container-fluid"  style="padding-top:90px">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to the Cossa Design Challenge</div>

                <div class="panel-body">

                    <!-- use two col view per entery on large screen and one column view on small display-->

                    <div class="col-md-4 col-xs-12 panel" ng-repeat='entry in entries' ng-init='loadGallery($last)'>
                      <!-- image, designer name and email -->

                      <div class="form-horizontal">
                          <div class="form-group">
                            <img src="@{{entry.main}}" ng-init="entry.main=entry.src_front" alt="image of entry" class="img img-thumbnail img-corner center-block col-md-12"  ng-click='startGalleryThroughClick($index)'/>
                          </div>

                          <div class="form-group">
                            <div class="parent-container gallery-@{{$index}} popup-gallery">
                              <a  ng-mouseover='entry.main=entry.src_front' href="@{{entry.src_front}}"  class="col-md-4 col-xs-4"><img src="@{{entry.src_front}}" class='img-responsive center-block' alt="" /></a>
                              <a  ng-mouseover='entry.main=entry.src_back'  href="@{{entry.src_back}}" class="col-md-4 col-xs-4"><img src="@{{entry.src_back}}" class='img-responsive center-block' alt="" /></a>
                              <a  ng-mouseover='entry.main=entry.src_side'  href="@{{entry.src_side}}" class="col-md-4 col-xs-4"><img src="@{{entry.src_side}}" class='img-responsive center-block' alt="" /></a>
                            </div>
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

                          <div class="form-group">
                            <label for="" class="col-md-3 col-xs-12">Votes</label>
                            <div class="col-md-9 col-xs-12">
                              <input type="button" name="name" value="@{{entry.votes}}" readonly="" class="form-control">
                            </div>
                          </div>

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









@include('modals')
@endsection
