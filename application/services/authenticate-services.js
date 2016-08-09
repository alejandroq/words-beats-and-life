myApp.service('AuthenticationService', ["$http", "$state", "$location", function($http, $state, $location) {
	var y = 0;

	this.checkToken = function(permissions) {
		var data;
		var token;

		if (localStorage['token']) {
			token = localStorage['token'];
			token = token.slice(1, (token.length-1));
		} else {
			token = null;
		}

		data = {
			token:token,
			permissions:permissions
		};

		switch (permissions) {
			case 'Administrator':x = 5;break;
			case 'Staff':x = 4;break;
			case 'Student':x = 3;break;
			case 'Parent':x = 2;break;
			case 'Cipher':x = 1;break;
			case 'Applicant':x = 1;break;
			default:x=0;break;
		}

		$http.post("../application/endpoints/checkToken.php", data)
		.success(function(response) {

			y = parseInt(JSON.parse(response));
			if (y >= x) {
				console.log(y);
				if ($location.path()=='/login') {
					$state.go("home");
				}
			} else if (y>0) {
				$state.go("home");
			} else {
				$state.go("login");
			}
			localStorage.setItem("x", y);
		}).error(function(error) {
			$state.go("login");
		})
	};

	this.getX = function() {
		return y;
	}
}])