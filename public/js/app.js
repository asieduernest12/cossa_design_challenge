var cossa_dc = angular.module('cossa_dc',['ngResource','ui.router']);

cossa_dc.factory('API_RESOURCE',['$resource',function($resource){

    return {
      entry:$resource('/design_entry/:id',{id:'@id'},{
          update: {
          method: 'PUT' // this method issues a PUT request
        }}),
      account:$resource('/account/:id',{id:'@id'},{
          update: {
          method: 'PUT' // this method issues a PUT request
        }}),
      sale_order_transport_invoice:$resource('/transportinvoice/:id',{id:'@id'},{
          update: {
          method: 'PUT' // this method issues a PUT request
        }}),
      production:$resource('/production/:id',{id:'@id'},{
        updade:{
          method: 'PUT' //this method issues a PUT request
        }
      }),
      sheet:$resource('/sheet/:id',{id:'@id'},{
        updade:{
          method: 'PUT' //this method issues a PUT request
        }
      }),
      stock:$resource('/stock/stock')
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


cossa_dc.controller('entriesCtrl',function(API_RESOURCE,$scope){
  function initEntries(){
    API_RESOURCE.entry.query(function(response){
      $scope.entries = response;
    },function(err){
      // swal('Failed to connect to server','Please check the network connection and try again','error');
    })
  }

  initEntries();
});
