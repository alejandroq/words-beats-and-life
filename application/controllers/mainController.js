myApp.controller("MainController", function($scope, $state, $http, $location, AuthenticationService, ExchangeService) {

	$scope.user = {
		FirstName:undefined,
		UserType:undefined
	}

	$scope.userInfo = function() {
		
		if (localStorage['token']!=undefined) {
			var token = localStorage['token'];
			token = token.slice(1, (token.length-1));
			var data = {
			 	token:token
			}
			// READ NEW TO DOs
			$http.post("../application/endpoints/newToDo.php", data)
				 .success(function(response) {
				 	$scope.todos = response; 
				 	if ($scope.todos.length > 0) {
				 		$scope.TODO = 'new-to-dos'; //highlight if new TODOs
				 	}
				});

			if (localStorage['x'] == 5) {
				// var myEl = angular.element( document.querySelector( '#todos' ) );
				// myEl.empty();

				// $('#todos').clear();
				// ADMIN NOTIFICATIONS
				$http.post("../application/endpoints/adminNotifications.php", data)
					 .success(function(response) {
					 	$scope.admin = response; 
					 	if ($scope.admin.length > 0) {
					 		$scope.TODO = 'new-to-dos'; //highlight if new TODOs
					 	}
					});
			};
			if (localStorage['x'] == 2) {
				// var myEl = angular.element( document.querySelector( '#todos' ) );
				// myEl.empty();
				// $('#todos').clear();

				// PARENT NOTIFICATIONS
				$http.post("../application/endpoints/parentNotifications.php", data)
					 .success(function(response) {
					 	$scope.parents = response; 
					 	if ($scope.parents.length > 0) {
					 		$scope.TODO = 'new-to-dos'; //highlight if new TODOs
					 	}
					});
			};

			if (localStorage['x'] == 3) {
				// var myEl = angular.element( document.querySelector( '#todos' ) );
				// myEl.empty();

				// $('#todos').clear();
				// STUDENT NOTIFICATIONS
				$http.post("../application/endpoints/studentNotifications.php", data)
					 .success(function(response) {
					 	$scope.student = response; 
					 	if ($scope.student.length > 0) {
					 		$scope.TODO = 'new-to-dos'; //highlight if new TODOs
					 	} 
					});
			};

			// READ USER INFO 
			$http.post("../application/endpoints/readUserInfo.php", data)
				 .success(function(response) {
				 	$scope.user = response; 
				});
		}
	}

	$scope.levelUp = function() {
		
		var checkDate = new Date("April 20, 2016 3:00:00");
		var today = new Date();
		if (today > checkDate) { //Tiem to Level Up?
			var levels = ['Sojourner', 'Beginner Apprentice', 'Intermediate Apprentice'];

			if (localStorage['token']!=undefined) {
				var token = localStorage['token'];
				token = token.slice(1, (token.length-1));
				var data = {
			 		token:token
				}
				$http.post("../application/endpoints/levelup.php", data)
					 .success(function(response) {
					 	var x = response; 
					 	$scope.UserLevel = levels[x];
					});
			}
		}
	}

	$scope.init = function(permissions) {
		AuthenticationService.checkToken(permissions); // Authenticating User

		var x = localStorage['x']; //Ducttape
		$scope.x = x;

		if ($scope.x == 0 || $scope.x == null) { 
			$scope.myObj = {
	        	"margin-top":"0"
    		}
		} else {
			$scope.myObj = {
	        	"margin-top":"17em"
	        	// "margin-top":"25em"
    		}
		}

		$scope.userInfo();

		if ($scope.x == 3) {
			$scope.levelUp();
		}
	}

	$scope.logout = function() {
		
		var token = localStorage['token'];

		var data = {
			token:token,
		}

		$http.post('../application/endpoints/logout.php', data)
		.success(function(response) {
			localStorage.clear();
			$state.go("login");
		}).error(function(){
			console.error(error);
		})
	}

	$scope.setMaster = function(data) {
        $scope.selected === data;
        ExchangeService.addData(data);
        $state.go("evaluation");
	}

	$scope.checkNotification = function(data) {
		// $scope.selected === data;
        // ExchangeService.addData(data);
        $state.go("content");
	}
})