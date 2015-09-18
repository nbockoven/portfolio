portfolio.config(function( $stateProvider, $urlRouterProvider ){

  // For any unmatched url, redirect to /state1
  $urlRouterProvider.otherwise("/");

  // Now set up the states
  $stateProvider

  .state('lost', {
    url: "/lost",
    templateUrl: "app/components/lost/view.html",
    data: {
      pagetitle: 'Page Not Found'
    }
  })

  .state('home', {
    url: "/",
    data: {
      pagetitle: 'Welcome'
    },
    views: {
      "": {
        controller: "home",
        templateUrl: "app/components/home/view.html"
      },
      "about":{
        controller: "about",
        templateUrl: "app/components/about/view.html"
      },
      "skillset":{
        controller: "skillset",
        templateUrl: "app/components/skillset/view.html"
      },
      "web":{
        controller: "web",
        templateUrl: "app/components/web/view.html"
      }
    }
  })

  ;
});
