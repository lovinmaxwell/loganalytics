@extends('backend.templates.default-nofooter-nosidebar-search')

@section('content')

    <section class="content-header">
        <div class="row">
            <div class="col-lg-6 col-mg-6 col-sm-12 col-xs-12">
                <h4>
                    <i class="fa fa-user"></i> {{ trans('users.pageHeader') }}
                    <small>{{ trans('users.pageDescription') }}</small>
                </h4>
            </div>
            <div class="col-lg-6 col-mg-6 col-sm-12 col-xs-12">
                @if (Session::has('message'))
                    <div class="alert alert-primary alert-dismissable flash-alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-info-circle"></i> {{ Session::get('message') }}
                    </div>
                @endif
            </div>
        </div>

    </section>

    <section class="content no-padding">
        <div ng-app="users">
            <div ng-controller="crudController">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">

                                @can('add user records')
                                <li><a href="#addRecordsTab" id="addRecordsTabHeader" data-toggle="tab">{{ trans('crud.addRecordsTabHeader') }}</a></li>
                                @endcan

                                @can('list user records')
                                <li class="active"><a href="#listRecordsTab" id="listRecordsTabHeader" data-toggle="tab">{{ trans('crud.listRecordsTabHeader') }}</a></li>
                                @endcan

                                @can('view user detail')
                                <li class="init-hide"><a href="#viewRecordsTab" id="viewRecordsTabHeader" data-toggle="tab">{{ trans('crud.viewRecordsTabHeader') }}</a></li>
                                @endcan

                                @can('edit user records')
                                <li class="init-hide"><a href="#editRecordsTab" id="editRecordsTabHeader" data-toggle="tab">{{ trans('crud.editRecordsTabHeader') }}</a></li>
                                @endcan

                                @can('allow user bulk operations')
                                <li class="dropdown pull-right text-muted link-muted link-disabled" id="bulkOperationsDropDown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                                        <i class="fa fa-gear"></i> {{ trans('crud.bulkActionsTabHeader') }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu ">
                                        @can('export user records')
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);"><i class="fa fa-file-excel-o"></i> {{ trans('crud.csvExportLink') }}</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);"><i class="fa fa-file-pdf-o"></i> {{ trans('crud.xlsExportLink') }}</a></li>
                                        <li role="presentation" class="divider"></li>
                                        @endcan
                                        @can('delete user records')
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" ng-click="bulkActions('delete')"><i class="fa fa-trash"></i> {{ trans('crud.trashRecordsLink') }}</a></li>
                                        @endcan
                                    </ul>
                                </li>
                                @endcan

                            </ul>
                            <div class="tab-content">

                                @can('add user records')
                                <div class="tab-pane" id="addRecordsTab">

                                    {!! Form::open(['id' => 'storeUsersForm' ,'route' => 'users.store','method' => 'POST', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}

                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th colspan="4"><i class="fa fa-user-plus"></i> {{ trans('users.panelHeader') }}</th>
                                        </tr>
                                        </thead>
                                        <tr>
                                            <td>{!! Form::label('title', trans('users.nameFieldLabel'), ['class' => 'control-label pull-right']) !!}</td>
                                            <td>
                                                {!! Form::text('name', null, ['class' => 'form-control required', 'required' => 'required']) !!}
                                                <div class="help-block with-errors"></div>
                                            </td>
                                            <td>{!! Form::label('title', trans('users.emailFieldLabel'), ['class' => 'control-label pull-right']) !!}</td>
                                            <td>
                                                {!! Form::text('email', null, ['class' => 'form-control required', 'required' => 'required']) !!}
                                                <div class="help-block with-errors"></div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>{!! Form::label('password', trans('users.passwordFieldLabel'), ['class' => 'control-label pull-right']) !!}</td>
                                            <td>
                                                {!! Form::password('password', ['class' => 'form-control required', 'required' => 'required']) !!}
                                                <div class="help-block with-errors"></div>
                                            </td>
                                            <td>{!! Form::label('role', trans('users.roleFieldLabel'), ['class' => 'control-label pull-right']) !!}</td>
                                            <td>
                                                {!! Form::select('role', $rolesList, null, ['class' => 'form-control required select2', 'required' => 'required', 'style' => 'width:100%']) !!}
                                                <div class="help-block with-errors"></div>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td colspan="4">
                                                {!! Form::button( '<i class="fa fa-check"></i> '.trans('users.createRecordSubmitButton'), ['type'=>'submit','class' => 'btn btn-success pull-right']) !!}
                                                {!! Form::reset( trans('users.resetButton'), ['class' => 'btn btn-default']) !!}
                                            </td>
                                        </tr>

                                    </table>
                                    {!! Form::close() !!}

                                </div>
                                @endcan

                                @can('list user records')
                                <div class="tab-pane active" id="listRecordsTab">
                                    <table st-table="displayedCollection" st-safe-src="rowCollection" class="table smart-table table-striped table-hover table-bordered">
                                        <thead>
                                        <tr class="table-header">
                                            <th class="text-center hidden-sm hidden-xs"><input type="checkbox" id="checkAll"/></th>
                                            <th st-sort="name">{{ trans('users.crudTableNameColumn') }}</th>
                                            <th st-sort="email">{{ trans('users.crudTableEmailColumn') }}</th>
                                            <th st-sort="email">{{ trans('users.crudTableRoleColumn') }}</th>
                                            <th st-sort="created_at" class="hidden-sm hidden-xs">{{ trans('users.crudTableCreatedAtColumn') }}</th>
                                            <th st-sort="updated_at" class="hidden-sm hidden-xs">{{ trans('users.crudTableUpdatedAtColumn') }}</th>
                                            <th class="text-center" colspan="3">{{ trans('users.crudTableActionsColumn') }}</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center hidden-sm hidden-xs"></th>
                                            <th>
                                                <input st-search="name" placeholder="{{ trans('users.crudTableNameFilterColumnPlaceholder') }}" class="input-sm form-control" type="search"/>
                                            </th>
                                            <th>
                                                <input st-search="email" placeholder="{{ trans('users.crudTableEmailFilterColumnPlaceholder') }}" class="input-sm form-control" type="search"/>
                                            </th>
                                            <th>
                                                <input st-search="role" placeholder="{{ trans('users.crudTableRoleFilterColumnPlaceholder') }}" class="input-sm form-control" type="search"/>
                                            </th>
                                            <th class="hidden-sm hidden-xs">
                                                <input st-search="created_at" placeholder="{{ trans('users.crudTableCreatedAtFilterColumnPlaceholder') }}" class="input-sm form-control" type="search"/>
                                            </th>
                                            <th class="hidden-sm hidden-xs">
                                                <input st-search="updated_at" placeholder="{{ trans('users.crudTableUpdatedAtFilterColumnPlaceholder') }}" class="input-sm form-control" type="search"/>
                                            </th>
                                            <th colspan="3"></th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr ng-repeat="row in displayedCollection">
                                            <td cs-select="row" class="text-center hidden-sm hidden-xs"></td>
                                            <td>[[ row.name ]]</td>
                                            <td>[[ row.email ]]</td>
                                            <td>[[ row.role | capitalize ]]</td>
                                            <td class="hidden-sm hidden-xs">[[ row.created_at | datetime ]]</td>
                                            <td class="hidden-sm hidden-xs">[[ row.updated_at | datetime ]]</td>
                                            <td class="text-center">
                                                @can('view user detail')
                                                    <a href="javascript:void(0);" ng-click="viewRecord(row.id)"><i class="fa fa-eye"></i></a>
                                                @else
                                                    <a href="javascript:void(0);" class="text-muted link-muted link-disabled" disabled><i class="fa fa-eye"></i></a>
                                                    @endcan
                                            </td>
                                            <td class="text-center">
                                                @can('edit user records')
                                                    <a href="javascript:void(0);" ng-click="modifyRecord(row.id)" ng-class=" checkIfDisableFirstRow(row.id) ? 'text-muted link-muted link-disabled' : ''"><i class="fa fa-pencil"></i></a>
                                                @else
                                                    <a href="javascript:void(0);" class="text-muted link-muted link-disabled" disabled><i class="fa fa-pencil"></i></a>
                                                    @endcan
                                            </td>
                                            <td class="text-center">
                                                @can('delete user records')
                                                    <a href="javascript:void(0);" ng-click="deleteRecord(row.id)" ng-class=" checkIfDisableFirstRow(row.id) ? 'text-muted link-muted link-disabled' : ''"><i class="fa fa-trash"></i></a>
                                                @else
                                                    <a href="javascript:void(0);" class="text-muted link-muted link-disabled" disabled><i class="fa fa-trash"></i></a>
                                                @endcan
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="9" class="text-right">
                                                <div st-pagination="" st-items-by-page="itemsByPage" st-displayed-pages=""></div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                @endcan

                                @can('view user detail')
                                <div class="tab-pane init-hide" id="viewRecordsTab">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th colspan="7"><i class="fa fa-user"></i> {{ trans('users.panelHeader') }}</th>
                                        </tr>
                                        </thead>
                                        <tr>
                                            <td>{!! Form::label('title', trans('users.recordCollectionNameFieldLabel'), ['class' => 'control-label pull-right']) !!}</td>
                                            <td> [[ recordDataCollection.name ]]</td>

                                            <td>{!! Form::label('title', trans('users.recordCollectionCreatedAtFieldLabel'), ['class' => 'control-label pull-right']) !!}</td>
                                            <td> [[ recordDataCollection.created_at ]]</td>

                                            <td>{!! Form::label('title', trans('users.recordCollectionUpdatedAtFieldLabel'), ['class' => 'control-label pull-right']) !!}</td>
                                            <td> [[ recordDataCollection.updated_at ]]</td>
                                        </tr>
                                        <tr>
                                            <td>{!! Form::label('title', trans('users.recordCollectionEmailFieldLabel'), ['class' => 'control-label pull-right']) !!}</td>
                                            <td> [[ recordDataCollection.email ]]</td>

                                            <td>{!! Form::label('title', trans('users.recordCollectionRoleFieldLabel'), ['class' => 'control-label pull-right']) !!}</td>
                                            <td> [[ recordDataCollection.role ]]</td>

                                        </tr>
                                    </table>
                                </div>
                                @endcan

                                @can('edit user records')
                                <div class="tab-pane init-hide" id="editRecordsTab">
                                    {!! Form::open(['id' => 'editUsersForm','method' => 'PATCH', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}

                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th colspan="4"><i class="fa fa-pencil"></i> {{ trans('users.panelHeader') }}</th>
                                        </tr>
                                        </thead>
                                        <tr>
                                            <td>{!! Form::label('title', trans('users.nameFieldLabel'), ['class' => 'control-label pull-right']) !!}</td>
                                            <td>
                                                {!! Form::text('name', null, ['id' => 'editUserName','class' => 'form-control', 'required' => 'required']) !!}
                                                <div class="help-block with-errors"></div>
                                            </td>
                                            <td>{!! Form::label('title', trans('users.emailFieldLabel'), ['class' => 'control-label pull-right']) !!}</td>
                                            <td>
                                                {!! Form::text('email', null, ['id' => 'editUserEmail','class' => 'form-control', 'required' => 'required']) !!}
                                                <div class="help-block with-errors"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{!! Form::label('password', trans('users.passwordFieldLabel'), ['class' => 'control-label pull-right']) !!}</td>
                                            <td>
                                                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                                                <div class="help-block with-errors"></div>
                                            </td>
                                            <td>{!! Form::label('role', trans('users.roleFieldLabel'), ['class' => 'control-label pull-right']) !!}</td>
                                            <td>
                                                {!! Form::select('role', $rolesList, null, ['class' => 'form-control required select2', 'required' => 'required', 'style' => 'width:100%']) !!}
                                                <div class="help-block with-errors"></div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4">
                                                {!! Form::button( '<i class="fa fa-check"></i> '.trans('users.editRecordSubmitButton'), ['type'=>'submit','class' => 'btn btn-primary pull-right']) !!}
                                            </td>
                                        </tr>

                                    </table>
                                    {!! Form::close() !!}
                                </div>
                                @endcan

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('extra_scripts')

    <script type="application/javascript">

        /*
         * Module: CRUD
         * Description: Angular JS Module to list all users from Users table
         * Developer: Shankar
         * Version: 0.0.1
         * Dated: 18-Mar-2016
         *
         * Dependencies
         * -----------------------------------------------------
         * jQuery, bootstrap.min.js, angularjs
         * Smart Table:  https://github.com/lorenzofox3/Smart-Table
         */

        var disableFirstRowFlag = false;
        app = angular.module('users', ['smart-table']).constant('API_URL', '/users/');

        /*
         * Overriding angular { { } } syntax to [ [ ] ]
         * for all variable value outputs in HTML
         */
        app.config(['$interpolateProvider', function ($interpolateProvider) {

            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');


        }]);

        app.filter('capitalize', function() {
            return function(token) {
                return token.charAt(0).toUpperCase() + token.slice(1);
            }
        });

        app.filter('datetime', function($filter) {
            return function(input) {

                if(input == null){ return ""; }

                var _date = $filter('date')(new Date(input), 'MMM dd yyyy - HH:mm:ss');

                return _date.toUpperCase();

            };
        });

        app.directive('csSelect', function () {
            return {
                require: '^stTable',
                template: checkBoxMultiSelectTemplate(disableFirstRowFlag),
                scope: {
                    row: '=csSelect'
                },
                link: function (scope, element, attr, ctrl) {

                    element.bind('change', function (evt) {
                        scope.$apply(function () {
                            ctrl.select(scope.row, 'multiple');
                        });
                    });

                    scope.$watch('row.isSelected', function (newValue, oldValue) {
                        if (newValue === true) {
                            element.parent().addClass('st-selected');
                        } else {
                            element.parent().removeClass('st-selected');
                        }

                        if($('input:checkbox:checked').length > 0) {
                            $("#bulkOperationsDropDown").removeClass("text-muted link-muted link-disabled");
                        } else {
                            $("#bulkOperationsDropDown").addClass("text-muted link-muted link-disabled");
                        }

                    });
                }
            };
        });

        /*
         * Parent CRUD controller responsible to carry on REST calls
         */
        app.controller('crudController', function ($http, $scope, API_URL) {

            $scope.disableFirstRowFlag = disableFirstRowFlag;
            $scope.rowCollection = [];
            $scope.getData = function() {
                $http.get(API_URL).success(function (data) {
                    $scope.rowCollection = data;
                    console.log(data);
                });
            };

            $scope.checkIfDisableFirstRow = function (rowId) {
                if(($scope.disableFirstRowFlag) && (rowId == 1)) {
                    return true;
                }
                return false;
            };

            $scope.getData();

            $scope.itemsByPage = 12;

            $scope.modifyRecord = function ($recordId) {

                $("#editUsersForm").attr('action', API_URL + $recordId);
                $http.get(API_URL + $recordId).success(function (data) {
                    $scope.editRecordDataCollection = data;
                    $("#editUserName").val($scope.editRecordDataCollection.name);
                    $("#editUserEmail").val($scope.editRecordDataCollection.email);
                    console.log(data);
                    switchTabs("#listRecordsTabHeader", "#listRecordsTab", "#editRecordsTabHeader", "#editRecordsTab", "#bulkOperationsDropDown");
                });

            };

            $scope.viewRecord = function ($recordId) {

                $http.get(API_URL + $recordId).success(function (data) {
                    $scope.recordDataCollection = data;
                    console.log(data);
                    switchTabs("#listRecordsTabHeader", "#listRecordsTab", "#viewRecordsTabHeader", "#viewRecordsTab", "#bulkOperationsDropDown");
                });

            };

            $scope.deleteRecord = function ($recordId) {

                $http({
                    url: API_URL + $recordId,
                    method: 'DELETE'
                }).then(function (res) {
                    console.log(res.data);
                    $scope.getData();
                }, function (error) {
                    console.log(error);
                });

            };

            $scope.bulkActions = function (action) {

                if (action === "delete") {

                    var checkedValues = $('input:checkbox:checked').map(function () {
                        return this.value;
                    }).get();

                    $scope.deleteRecord(checkedValues);

                }

                // Un-check the check-all checkbox
                $("#checkAll").prop('checked', null);

            };

        });

        /*
        * Set bulk operations as disabled if nothing is selected
        */
        if($('input:checkbox:checked').length == 0) { $("#bulkOperationsDropDown").addClass("text-muted link-muted link-disabled"); }

        /*
         * Tab switch events and form-reset handlers
         */
        $("a[href='#listRecordsTab']").on('show.bs.tab', function (e) {
            /* Hide VIEW / MODIFY tabs */
            $("#storeUsersForm, #editUsersForm").trigger("reset");
            $("#storeUsersForm, #editUsersForm").find('.help-block:visible').toggle();
            $("#viewRecordsTabHeader, #editRecordsTabHeader").parent('li').addClass("init-hide");
            $("#viewRecordsTab, #editRecordsTab").addClass("init-hide");
            if($('input:checkbox:checked').length > 0) {
                $("#bulkOperationsDropDown").removeClass("text-muted link-muted link-disabled");
            }
        });

        $("a[href='#addRecordsTab']").on('shown.bs.tab', function (e) {
            $("#bulkOperationsDropDown").addClass("text-muted link-muted link-disabled");
        });


        /*
         * Switch between tabs, used for
         * showing / hiding VIEW and MODIFY tabs
         */
        function switchTabs(fromTabHeader, fromTab, toTabHeader, toTab, stateChangeSelectors) {
            $(fromTabHeader).parent('li').removeClass("active");
            $(fromTab).removeClass("active");
            $(toTabHeader).parent('li').removeClass("init-hide").addClass("active");
            $(toTab).addClass("active").removeClass("init-hide");
            if (stateChangeSelectors != null) {
                $(stateChangeSelectors).addClass("text-muted link-muted link-disabled");
            }
        }

        /*
         * Checkbox multi-select template with boolean
         * flag to disable selecting the very first row
         * flag might be required if a table cannot
         * have any null rows
         */
        function checkBoxMultiSelectTemplate(disableFirstRowFlag) {
            if (disableFirstRowFlag) {
                return '<input type="checkbox" value="[[row.id]]" ng-class=" (row.id == 1) ? \'text-muted link-muted link-disabled\' : \'\'" ng-disabled=\'row.id == 1\' />'
            }
            return '<input type="checkbox" value="[[row.id]]" />'
        }

        /*
         * Check all function
         */
        $("#checkAll").change(function () {

            $("input:checkbox:not(:disabled)").prop('checked', $(this).prop("checked"));

            if($('input:checkbox:checked').length > 0) {

                $("#bulkOperationsDropDown").removeClass("text-muted link-muted link-disabled");

            } else {

                $("#bulkOperationsDropDown").addClass("text-muted link-muted link-disabled");

            }

        });


    </script>


    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\CreateNewUserRequest', '#storeUsersForm') !!}

    {!! JsValidator::formRequest('App\Http\Requests\EditUserRequest', '#editUsersForm') !!}

@stop
