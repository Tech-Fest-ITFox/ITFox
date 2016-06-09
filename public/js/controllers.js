angular.module('Controllers', ['ngResource'])
    .controller('MainController', ['$scope', '$http', '$resource', '$location', '$localStorage', '$sessionStorage', 'Main', 'keyboardManager', '$route',
        function($scope, $http, $resource, $location, $localStorage, $sessionStorage, Main, keyboardManager, $route) {
        
        $scope.signin = function() {
            var formData = {
                email: $scope.email,
                password: $scope.password
            };
            Main.signin(formData, function(res) {
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
                    $sessionStorage.foxToken = res.token;
                    $sessionStorage.$save();
                }
            }, function() {
                $rootScope.error = 'Failed to signin';
            })
        };
        $scope.auth = function() {
            return $sessionStorage.foxToken;
        };

        $scope.user = Main.currentUser();
        $scope.token = Main.getToken();
 
        $scope.logout = function() {
            Main.logout(function() {
                window.location = "/";
            }, function() {
                alert("Failed to logout!");
            });
        };


        $scope.placeholderRight = function() {
            //var plw = $('#' + plh).width() + 10;
            console.log('ffffffffffff');
        };

        $resource('/api/cities').get().$promise.then(function(data) {
            $scope.cities = data.cities;
        });
        $resource('/api/schools').get().$promise.then(function(data) {
            $scope.schools = data.schools;
        });
        $resource('/api/grades').get().$promise.then(function(data) {
            $scope.grades = data.grades;
        });

        $scope.activePage = 'home';
        $scope.setPageActive = function(page) {
            $scope.activePage = page;
        };
        $scope.pageActive = function(page) {
            return $scope.activePage === page;
        };

        /*

        $("body").on("focusin", " .input ", function() {
            var plw = $(this).siblings(" .placeholder ").width() + 10;
            $(this).siblings(" .placeholder ").css("width", plw).animate({
                left: (480 - plw)
            }, 400, "easeOutBack");
        });
        $("body").on("focusout", " .input ", function() {
            if( !$(this).val() ) {
                var plw = $(this).siblings(" .placeholder ").width() - 9;
                $(this).siblings(" .placeholder ").css("width", plw).animate({
                    left: 0
                }, 400, "easeOutBack");
            }
        });*/
    }])
    .controller('RegCtrl', ['$scope', '$http', '$resource', '$location', '$localStorage', '$sessionStorage', 'Main', 'keyboardManager', '$route',
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
;