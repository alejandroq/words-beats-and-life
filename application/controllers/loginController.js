myApp.controller("LoginController", function($scope, $http, $state, AuthenticationService) {
	
	$scope.x = $scope.$parent.init('Applicant');
	var x = localStorage['x']; //Ducttape
	$scope.x = x;

	//Variables
	$scope.loginInfo = {
		username:undefined,
		password:undefined
	}

	$scope.login = function() {
		var data = {
			username:$scope.loginInfo.username,
			password:$scope.loginInfo.password
		}

		$http.post("../application/endpoints/login.php", data)
		.success(function(response) {
			response = String(response);
			localStorage.setItem("token", response);
			$state.go("home");
			$state.reload();
		}).error(function(error) {
			console.error(error);
		});
	}

	//Init
})