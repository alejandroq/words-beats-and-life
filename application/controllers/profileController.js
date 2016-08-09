myApp.controller("ProfileController", function($scope, $http, $state, AuthenticationService, ExchangeService) {
	
	$scope.$parent.init('Student');
	var x = localStorage['x']; //Ducttape
	$scope.x = x;
	
	var token = localStorage['token'];
		token = token.slice(1, (token.length-1));
		var data = {
		 	token:token
		}

    $http.post("../application/endpoints/myprofile.php", data)
    .success(function(response) {
        $scope.data = response;
    });
})