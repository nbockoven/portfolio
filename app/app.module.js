var portfolio = angular.module('portfolio', ['ui.router', 'ngSanitize']);

portfolio.run(['$rootScope', '$state', '$stateParams', function( $rootScope, $state, $stateParams ){

  $rootScope.$on('$stateNotFound', function (event, toState, toParams) {
    event.preventDefault();
    $state.go("lost");
  });

  $rootScope.$state       = $state;
  $rootScope.$stateParams = $stateParams;
}]);
