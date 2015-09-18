portfolio.controller('skillset', ['$scope', function( $scope ){
  $scope.skills = [
    {'title': 'AJAX',                    'level': 3},
    {'title': 'Algolia',                 'level': 4},
    {'title': 'AngularJS',               'level': 3},
    {'title': 'Apex',                    'level': 3},
    {'title': 'Bootstrap 2 & 3',         'level': 3},
    {'title': 'CSS3',                    'level': 3},
    {'title': 'Express.js',              'level': 3},
    {'title': 'Git',                     'level': 3},
    {'title': 'HTML5',                   'level': 3},
    {'title': 'JavaScript | jQuery',     'level': 3},
    {'title': 'LAMP stack',              'level': 3},
    {'title': 'MEAN stack',              'level': 3},
    {'title': 'MongoDB',                 'level': 3},
    {'title': 'MySQL',                   'level': 3},
    {'title': 'Node.js',                 'level': 3},
    {'title': 'NoSQL',                   'level': 3},
    {'title': 'PHP',                     'level': 3},
    {'title': 'Salesforce',              'level': 3},
    {'title': 'Smarty',                  'level': 3},
    {'title': 'SOQL',                    'level': 3},
    {'title': 'SQL',                     'level': 3},
    {'title': 'Velocity',                'level': 3},
    {'title': 'Web Accessibility (WAI)', 'level': 3},
    {'title': 'Wordpress theming',       'level': 3}
  ];

  $scope.getNumber = function( num ){
    return new Array(num);
  }
}]);








