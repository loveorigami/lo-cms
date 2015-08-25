<ul class="nav nav-tabs">
    <li ng-repeat="menu in headerMenu" ng-class="{active:isRouteActive(menu.id)}">
        <a ng-href="{{menu.url}}" ng-bind="menu.label"></a>
    </li>
</ul>
<div class="clear_small"></div>