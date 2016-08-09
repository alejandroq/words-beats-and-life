var myApp = angular.module("myApp", ["ui.router"]);

myApp.config(function ($stateProvider, $urlRouterProvider) {
			$urlRouterProvider
			.otherwise('/');

			$stateProvider
				.state('login', {
					url:'/login',
					templateUrl:"../application/views/login.php",
					controller:"LoginController"
				})
				.state('home', {
					url:'/',
					templateUrl:"../application/views/home.php",
					controller:"HomeController"
				})
				.state('edit', {
					url:'/edit',
					templateUrl:"../application/views/addProfilePicture.php",
				})
				.state('directory', {
					url:'/directory',
					templateUrl:"../application/views/directory.php",
					controller:"TableController"
				})
				.state('directory.manage', {
			        url: '/manage',
			        parent:'directory',
			        templateUrl:"../application/views/directoryManage.php",
			        controller:"DirectoryController"
			    })
			    .state('content', {
					url:'/content',
					templateUrl:"../application/views/content.php",
					controller:"ContentController"
				})
				.state('courses', {
					url:'/courses',
					templateUrl:"../application/views/courses.php",
					controller:"TableController"
				})
				.state('courses.manage', {
			        url: '/manage',
			        parent:'courses',
			        templateUrl:"../application/views/coursesManage.php",
			        controller:"CourseController"
			    })
			    .state('courses.enroll', {
			        url: '/enroll',
			        parent:'courses',
			        templateUrl:"../application/views/courseEnroll.php",
			        controller:"EnrollController"
			    })
				.state('events', {
					url:'/events',
					templateUrl:"../application/views/events.php",
					controller:"TableController"
				})
				.state('events.manage', {
			        url: '/manage',
			        parent:'events',
			        templateUrl:"../application/views/eventsManage.php",
			        controller:"EventsController"
			    })
			    .state('login.signup', {
			        url: '/signup',
			        parent:'login',
			        templateUrl:"../application/views/registration.php",
			        controller:"RegisterController"
			    })
			    .state('evaluation', {
					url:'/evaluation',
					templateUrl:"../application/views/evaluation.php",
					controller:"EvaluationController"
				})
				.state('evaluations', {
					url:'/evaluations',
					templateUrl:"../application/views/evaluations.php",
					controller:"MyContentController"
				})
				.state('evaluations.detail', {
					url:'/detail',
					templateUrl:"../application/views/evaluationDetail.php",
				})
				.state('content.add', {
					url:'/add',
					parent:'content',
					templateUrl:"../application/views/addContent.php"
				})
				.state('buckshop', {
					url:'/buckshop',
					templateUrl:"../application/views/buckshop.php",
				})
		})