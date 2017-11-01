<!doctype html>
<html ng-app="searchModule">
<head>
  <meta charset="utf-8">
  <title>Angular Live Search</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body ng-controller="searchController">
  <h1>Angular Live Search</h1>

  <!-- Search -->
  <input type="text" placeholder="Search" ng-model="query" ng-focus="focus=true">
  <div id="search-results" ng-show="focus">
    <div class="search-result" ng-repeat="item in data | search:query" ng-bind="item" ng-click="setQuery(item)"></div>
  </div>

  <!-- Load JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0/angular.min.js"></script>
  <script>
     var data = {!! $customers !!};
  </script>
  <script src="{{ asset('js/appsearch.js') }}"></script>
</body>
</html>