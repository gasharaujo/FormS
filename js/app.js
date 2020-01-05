/*
 *
 *  -- finished on 11:45 --
 * --- created by ガシユアラウジョ ---
 *  -- finished on 30/3/2017 --
 *
 */

// Ionic Starter App
// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', ['ionic'])

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    if(window.cordova && window.cordova.plugins.Keyboard) {
      // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
      // for form inputs)
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

      // Don't remove this line unless you know what you are doing. It stops the viewport
      // from snapping when text inputs are focused. Ionic handles this internally for
      // a much nicer keyboard experience.
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });
})


.controller('ctrl', function ($scope,$ionicLoading) {
    $scope.mensagem = 'APRENDENDO ';

    // criar metodo no angular
	
   $scope.calcular = function(){
     var tot;
	 if($scope.preco <= 10){tot = $scope.preco/$scope.numero;}
	 else if ($scope.preco<=50){tot = ($scope.preco/$scope.numero)*0.95;}
	 else if ($scope.preco<=50){tot = ($scope.preco/$scope.numero)*0.92;}
	 else{tot = ($scope.preco/$scope.numero)*0.90;}
	 return $scope.total = tot.toFixed(2);
   }
	$scope.limpar = function(){
		$scope.preco = "";
		$scope.total = "";
		return $scope.numero = "";
	}

    
})

