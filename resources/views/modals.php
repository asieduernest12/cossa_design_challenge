<!-- submitEntryModal begin -->
<div class="modal" id="submitEntryModal">
  <form class="form-horizontal" ng-submit='create(nEntry)' name='submitEntryForm'>

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Submit new design entry</h4>
        </div>
        <div class="modal-body">


          <div class="form-group">
            <label for="" class="col-md-3">Designer name*</label>
            <div class="col-md-9">
              <input type="text" name="name"  ng-model='nEntry.designer' class="form-control" required ng-required='true'>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3">Designer email*</label>
            <div class="col-md-9">
              <input type="text" name="email"  ng-model='nEntry.email' class="form-control" required ng-required='true'>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3">Designer phone</label>
            <div class="col-md-9">
              <input type="text" name="name" ng-model='nEntry.phone' class="form-control" >
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3">Description</label>
            <div class="col-md-9">
              <textarea name="name" rows="3" cols="40" class="form-control" ng-model='nEntry.description'></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3">Front view*</label>
            <div class="col-md-9">
              <input type="file" accept="image/*" name='front' onchange="angular.element(this).scope().uploadedFile(this,'front')" class="form-control" required ng-required='true'>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3">Back view*</label>
            <div class="col-md-9">
              <input type="file" accept="image/*" name="back" onchange="angular.element(this).scope().uploadedFile(this,'back')" class="form-control" required ng-required='true'>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3">Side view*</label>
            <div class="col-md-9">
              <input type="file" accept="image/*" name="side" onchange="angular.element(this).scope().uploadedFile(this,'side')" class="form-control" required ng-required='true'>
            </div>
          </div>


        </div>
        <!-- values here {{nEntry}} -->
        <div class="modal-footer">
          <input type="submit" name="submit" value="Add Modal" class="btn btn-primary">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- end or submitEntryModal -->

<!-- verifyVoterModal -->
<div class="modal" id="verifyVoterModal">
  <form class="form-horizontal" ng-submit='verifyVoter(vote)' name='verifyVoterForm'>

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Verify student id</h4>
        </div>
        <div class="modal-body">


          <div class="form-group">
            <label for="" class="col-md-3">Student id*</label>
            <div class="col-md-10 col-md-offset-1 col-xs-12">
              <input type="text" name="student_id"  ng-model='vote.student_id' class="form-control" required ng-required='true' placeholder="Please provide your student id">
            </div>
          </div>



        </div>
        <!-- values here {{nEntry}} -->
        <div class="modal-footer">
          <input type="submit" name="submit" value="Proceed to vode" class="btn btn-primary">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- end verifyVoterModal -->

<!-- voterOptionModal -->
<div class="modal modal-horizontal" id="voteOptionModal">
  <form class="form-horizontal" ng-submit='castVote(vote)' name='voterOptionForm'>

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Click on an image or designer to select</h4>
        </div>
        <div class="modal-body">


          <div class="row panel panel-primary">
            <!-- show front for all entries along with designer -->
            <div class="col-md-6 col-xs-12 form-horizontal" ng-click='vote.ballot=entry' ng-repeat='entry in entries'>
              <div class="form-group">
                <img src="{{entry.src_front}}" alt="{{entry.description}}" class="img img-responsive col-md-12" />
              </div>

              <div class="form-group">
                <label for="">Designer</label>
                <div class="col-md-12">
                  <input type="text" name="name" value="" ng-model='entry.designer' class="form-control" readonly="">
                </div>
              </div>

            </div>
          </div>

          <div class="row">
            <!-- show front for all entries along with designer -->
            <div class="col-md-6 col-xs-12 form-horizontal">
              Your pick:
              <div class="form-group">
                <img src="{{vote.ballot.src_front}}" alt="{{vote.ballot.description}}" class="img img-responsive col-md-12" />
              </div>

              <div class="form-group">
                <label for="">Designer</label>
                <div class="col-md-12">
                  <input type="text" name="name" value="" ng-model='vote.ballot.designer' class="form-control" readonly="" required ng-required='true'>
                </div>
              </div>

            </div>
          </div>



        </div>
        <!-- values here {{nEntry}} -->
        <div class="modal-footer">
          <input type="submit" name="submit" value="Cast vote" class="btn btn-primary">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </form>
</div>
