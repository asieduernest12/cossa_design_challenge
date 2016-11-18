var cossa_dc = angular.module('cossa_dc',['ngResource','ui.router']);

cossa_dc.factory('API_RESOURCE',['$resource',function($resource){

  function formDataObject (data) {
      var fd = new FormData();
      // console.log('the file data for sending',data.files);
      //   angular.forEach(data.files, function(value, key) {
      //     console.log('key is :',key);
      //       angular.forEach(value,function(a_file,a_key){
      //         fd.append('file_upload_'+key, value);
      //         console.log('key',key,'val',value);
      //       });
      //
      //   });

        $(data.files).each(function(k,lev_1){
          //front
          $(lev_1.front).each(function(i,files){
            $(files).each(function(j,file){
              fd.append('front',file);
            });
          });
          // side
          $(lev_1.side).each(function(i,files){
            $(files).each(function(j,file){
              fd.append('side',file);
            });
          });

          // back
          $(lev_1.back).each(function(i,files){
            $(files).each(function(j,file){
              fd.append('back',file);
            });
          });
        });

        // console.log(data.data);

        angular.forEach(data.data,function(value,key){
          console.log('val',value,'key',key);
          fd.append(key,value);
        });
        console.log('form-data',fd);

        return fd;
    }

    return {
      entry:$resource('/design_entry/:id',{id:'@id'},{
          update: {
          method: 'PUT' // this method issues a PUT request
        },save: {
                method: 'POST',
                // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                transformRequest: formDataObject,
                headers: {'Content-Type':undefined, enctype:'multipart/form-data'}
        }}),
      voter:$resource('/voter/:id',{id:'@id'},{
          }),
      vote:$resource('/vote/:id',{id:'@id'},{
          update: {
          method: 'PUT' // this method issues a PUT request
        }})
    }
  }]);

  //view routes for angular
 cossa_dc.config(['$stateProvider','$urlRouterProvider','$locationProvider',function($stateProvider, $urlRouterProvider,$locationProvider) {
    //
    // For any unmatched url, redirect to /state1
    // $urlRouterProvider.otherwise("/dashboard");
    //
    // Now set up the states
    $stateProvider
      .state('home',{
        url: '/home',
        templateUrl:'/partials/entries.html',
        controller:'entriesCtrl'
      })
      .state('submssion',{
        url:'/submission/',
        templateUrl:'/partials/submission.html',
        controller: 'somCtrl'
      });
      // $locationProvider.html5Mode({enabled:true,requireBase:false});
  }]);


cossa_dc.controller('entriesCtrl',function(API_RESOURCE,$filter,$scope){
  function initEntries(){
    API_RESOURCE.entry.query(function(response){
      $scope.entries = $filter('orderBy')(response,['-votes']);
      $scope.files = {};
      $scope.nEntry = {};
      $('input[type=file]').val(null);
      magPop();
    },function(err){
      swal('Failed to connect to server','Please check the network connection and try again','error');
    })
  }

  initEntries();

  $scope.popup = function(obj){
    $(document).ready(function() {
    $(obj).magnificPopup({type:'image'});
    });
  }

  function magPop(){
    $('.parent-container').magnificPopup({
      delegate: 'a', // child items selector, by clicking on it popup will open
      type: 'image',
      gallery: {enabled:true}
      // other options
    });
  }

  $scope.uploadedFile = function(element,type) {
     $scope.$apply(function($scope) {
       switch (type) {
         case 'front':
            $scope.files.front = element.files;
           break;
          case 'back':
            $scope.files.back = element.files;
            break;
          case 'side':
            $scope.files.side = element.files;
            break;
         default:

       }
     });
    }

  $scope.create = function(p_newEntry){
    $('#submitEntryModal').modal('hide');

        //  t_course.student_id = $scope.student.id;
        console.log(p_newEntry);
        var ent = {'data':p_newEntry,'files':$scope.files}
        API_RESOURCE.entry.save(ent,function(data){
           swal('Design has been entered successfully','','success');

           initEntries();
        },function(err){
          swal({
              title: "Submission failed",
              text: "Pleas review information and resubmit your design entry",
              type: "warning",
              showCancelButton: false,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Continue",
              closeOnConfirm: true
          }, function(){
              //show addClientModal again
              $('#submitEntryModal').modal('show');
          });
        });
  }

  $scope.verifyVoter = function(nVote){
    $('#verifyVoterModal').modal('hide');
    API_RESOURCE.voter.get({'id':nVote.student_id},function(response){
      //show voteOptionModal
      $('#voteOptionModal').modal('show');
      // $scope.vote = {};
    },function(err){
      console.log(err.status);
      var err_msg = '';
      switch (err.status) {
        case 500:
          err_msg = "ID provided was found amon voter records";
          break;
        case 501:
          err_msg = 'It seems you have already cast your voted';
          break;
        default:

      }

      swal('Error verifying voter',err_msg,'error');

      $('#verifyVoterModal').modal('show');
    })
  }

  $scope.castVote = function(pVote){
    $('#voteOptionModal').modal('hide');
    API_RESOURCE.vote.save(pVote,function(response){
      console.log(pVote);
      swal('Vote completed','You "'+ pVote.student_id +'" have cast your vote for the design by "'+pVote.ballot.designer +'"','success');
      pVote = {};
      $scope.vote = {};
      initEntries();
    },function(err){
      swal('Voting failed','','error');
      $('#voteOptionModal').modal('show');
    })
  }

});
