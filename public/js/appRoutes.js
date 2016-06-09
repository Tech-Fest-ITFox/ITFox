angular.module('appRoutes', ['ngStorage'])
	.config(['$routeProvider', '$locationProvider', '$httpProvider',
		function($routeProvider, $locationProvider, $httpProvider) {

	$routeProvider

		.when('/', {
			templateUrl: 'views/home.html',
			controller: 'MainController'
		})
		.when('/register', {
			templateUrl: 'views/register.html',
			controller: 'MainController'
		})
		.when('/login', {
			templateUrl: 'views/login.html',
			controller: 'MainController'
		})
		.when('/lessons', {
			templateUrl: 'views/lessons.html',
			controller: 'MainController'
		})
		.when('/lessons/:grade', {
			templateUrl: 'views/lessons-grade.html',
			controller: 'MainController'
		})
		.when('/lessons/:category', {
			templateUrl: 'views/lessons-category.html',
			controller: 'MainController'
		})
		.when('/lessons/:id', {
			templateUrl: 'views/lesson.html',
			controller: 'MainController'
		})
		.when('/add-lesson', {
			templateUrl: 'views/add-lesson.html',
			controller: 'MainController'
		})
		.when('/edit-lesson', {
			templateUrl: 'views/edit-lesson.html',
			controller: 'MainController'
		})
		.when('/delete-lesson', {
			templateUrl: 'views/delete-lesson.html',
			controller: 'MainController'
		})
		.when('/exercises', {
			templateUrl: 'views/exercises.html',
			controller: 'MainController'
		})
		.when('/exercises/:id', {
			templateUrl: 'views/exercise.html',
			controller: 'MainController'
		})
		.when('/add-exercise', {
			templateUrl: 'views/add-exercise.html',
			controller: 'MainController'
		})
		.when('/edit-exercise', {
			templateUrl: 'views/edit-exercise.html',
			controller: 'MainController'
		})
		.when('/delete-exercise', {
			templateUrl: 'views/delete-exercise.html',
			controller: 'MainController'
		})
		.when('/files', {
			templateUrl: 'views/files.html',
			controller: 'MainController'
		})
		.when('/files/:id', {
			templateUrl: 'views/file.html',
			controller: 'MainController'
		})
		.when('/add-file', {
			templateUrl: 'views/add-file.html',
			controller: 'MainController'
		})
		.when('/edit-file', {
			templateUrl: 'views/edit-file.html',
			controller: 'MainController'
		})
		.when('/delete-file', {
			templateUrl: 'views/delete-file.html',
			controller: 'MainController'
		})
		.when('/groups', {
			templateUrl: 'views/groups.html',
			controller: 'MainController'
		})
		.when('/groups/:id', {
			templateUrl: 'views/group.html',
			controller: 'MainController'
		})
		.when('/add-group', {
			templateUrl: 'views/add-group.html',
			controller: 'MainController'
		})
		.when('/edit-group', {
			templateUrl: 'views/edit-group.html',
			controller: 'MainController'
		})
		.when('/delete-group', {
			templateUrl: 'views/delete-group.html',
			controller: 'MainController'
		})
		.when('/projects', {
			templateUrl: 'views/projects.html',
			controller: 'MainController'
		})
		.when('/projects/:id', {
			templateUrl: 'views/project.html',
			controller: 'MainController'
		})
		.when('/add-project', {
			templateUrl: 'views/add-project.html',
			controller: 'MainController'
		})
		.when('/edit-project', {
			templateUrl: 'views/edit-project.html',
			controller: 'MainController'
		})
		.when('/delete-project', {
			templateUrl: 'views/delete-project.html',
			controller: 'MainController'
		})
		.when('/users', {
			templateUrl: 'views/users.html',
			controller: 'MainController'
		})
		.when('/users/:id', {
			templateUrl: 'views/user-profile.html',
			controller: 'MainController'
		})
		.when('/edit-user', {
			templateUrl: 'views/edit-user.html',
			controller: 'MainController'
		})
		.when('/delete-user', {
			templateUrl: 'views/delete-user.html',
			controller: 'MainController'
		})
		.when('/search-results', {
			templateUrl: 'views/search-results.html',
			controller: 'MainController'
		})
		.when('/about', {
			templateUrl: 'views/about.html',
			controller: 'MainController'
		})
		.when('/contacts', {
			templateUrl: 'views/contacts.html',
			controller: 'MainController'
		})

	$locationProvider.html5Mode(true);

	$httpProvider.interceptors.push(['$q', '$location', '$localStorage', '$sessionStorage', '$rootScope', 
		function($q, $location, $localStorage, $sessionStorage, $rootScope) {
            return {
                'request': function (config) {
                	config.headers = config.headers || {};
                    if ($sessionStorage.foxToken) {
                        config.headers['Authorization'] = 'Bearer ' + $sessionStorage.foxToken;
                        config.headers.Authorization = 'Bearer ' + $sessionStorage.foxToken;
                    	console.log(config.headers);
                    }
                    return config;
                },
                'responseError': function(res) {
                    if(res.status === 401 || res.status === 403) {
                        $location.path('/error');
                    	$rootScope.message = res.data.message;	
                    	$rootScope.resStatus = res.status;	
                    }
                    return $q.reject(res);
                }
            };
        }]);

}]);