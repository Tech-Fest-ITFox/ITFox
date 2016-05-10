angular.module('MainCtrl', []).controller('MainController', function($scope, $http) {

	$scope.dialogs =
    	[ { name: 'register', title: 'Регистрация', url: 'views/dialogs/register.html'},
      	{ name: 'login', title: 'Вход', url: 'views/dialogs/login.html'} ];

  	$scope.showDialog = function(which) {
  		for (var i = 0; i < $scope.dialogs.length; i++) {
  			if($scope.dialogs[i].name == which) $scope.dialog = $scope.dialogs[i];
  		};
    };

    $http.get('/profile').success(function(data) {
		$scope.user = data;
	});

	$scope.tagline = 'To the moon and back!';	

});