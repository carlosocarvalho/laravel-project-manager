var app = angular.module('app',['app.controllers','ngRoute', 'angular-oauth2']);




angular.module('app.controllers',['angular-oauth2','ngMessages']);

app.config(['$routeProvider' , 'OAuthProvider' , function($routeProvider, OAuthProvider){


    $routeProvider.when('/login',{
          templateUrl:'build/views/login.html',
           controller:'loginController.index'
    });

    $routeProvider.when('/home',{
        templateUrl:'build/views/home.html',
        controller:'homeController.index'

    });

    OAuthProvider.configure({
        baseUrl:  SITE_URL ,
        clientId: 'app_01',
        clientSecret: 'secret', // optional
        grantPath:'oauth/access_token'
    });

}]);

app.run(['$rootScope', '$window', 'OAuth', function($rootScope, $window, OAuth) {
    $rootScope.$on('oauth:error', function(event, rejection) {
        // Ignore `invalid_grant` error - should be catched on `LoginController`.
        if ('invalid_grant' === rejection.data.error) {
            return;
        }

        // Refresh token when a `invalid_token` error occurs.
        if ('invalid_token' === rejection.data.error) {
            return OAuth.getRefreshToken();
        }

        // Redirect to `/login` with the `error_reason`.
        return $window.location.href = '/login?error_reason=' + rejection.data.error;
    });
}]);