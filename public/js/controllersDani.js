angular.module('ControllersDani', ['ngResource'])
    .controller('RegCtrlD', ['$scope', '$http', '$resource', '$location', '$localStorage', '$sessionStorage', 'Main', 'keyboardManager', '$route',
        function($scope, $http, $resource, $location, $localStorage, $sessionStorage, Main, keyboardManager, $route) {
        
        $scope.register = function() {
            var formData = {
                name: $scope.name,
                email: $scope.email,
                password: $scope.password,
                role: $scope.role,
                grade: $scope.grade_id
            };
            Main.register(formData, function(res) {
                if (res.success == false) {
                    $scope.message = {
                        text: res.message,
                        status: 'error'
                    };
                } else {
                    window.location = "/";
                    $scope.message = {
                        text: res.message,
                        status: 'success'
                    };
                    $sessionStorage.foxToken = res._token;
                    $sessionStorage.$save();
                }
            }, function() {
                $scope.error = 'Failed to register';
            })
        };
    }])
    .controller('AddLessonCtrl', ['$scope', '$http', '$resource', '$location', '$localStorage', '$sessionStorage', 'Main', 'keyboardManager', '$route',
        function($scope, $http, $resource, $location, $localStorage, $sessionStorage, Main, keyboardManager, $route) {
        
        $scope.addLesson = function() {
            var formData = {
                title: $scope.title,
                category: $scope.category,
                content: $scope.content,
                grade: $scope.grade,
                author: $scope.user.name
            };
            Main.addLesson(formData, function(res) {
                if (res.success == false) {
                    $scope.message = {
                        text: res.message,
                        status: 'error'
                    };
                } else {
                    window.location = "/lessons";
                    $scope.message = {
                        text: res.message,
                        status: 'success'
                    };
                }
            }, function() {
                $scope.error = 'Failed to upload';
            })
        };
    }])
;