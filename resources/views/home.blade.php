@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Account Information</div>
                    <div class="panel-body">
                        <div class="row sideStat">
                            <div class="col-md-6 title">Main Domain</div>
                            <div class="col-md-6 content">{{$account->domain}}</div>
                        </div>
                        <div class="row sideStat">
                            <div class="col-md-6 title">Home Directory</div>
                            <div class="col-md-6 content">{{sy_exec('eval echo ~'.$account->username)}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Domains</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="col-md-12 optionIcon red"><span class="fa fa-globe"></span></div>
                                <div class="col-md-12 optionText">AddOn Domain</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
