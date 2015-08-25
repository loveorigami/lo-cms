<ul class="nav nav-tabs" ng-controller="HeaderMenuCtrl">
    <li ng-repeat="menu in headerMenu" ng-class="{active:location.path().indexOf(menu.id)===0}">
        <a ng-href="{{menu.url}}" ng-bind="menu.label"></a>
    </li>
</ul>
<div class="clear_small"></div>