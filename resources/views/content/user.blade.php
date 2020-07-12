@extends('layouts.master')

@section('content')
<style>
    p{
        margin-top: 0;
        margin-bottom: 0;
    }
    .profile-user-info-striped {
        border: 1px solid #DCEBF7;
    }

    .profile-user-info {
        display: table;
        width: 98%;
        width: calc(100% - 24px);
        margin: 0 auto;
    }
    .profile-info-row {
        display: table-row;
    }
    .profile-info-row:first-child .profile-info-name, .profile-info-row:first-child .profile-info-value {
        border-top: none;
    }
    .profile-user-info-striped .profile-info-name {
        color: #336199;
        background-color: #EDF3F4;
        border-top: 1px solid #F7FBFF;
    }
    .profile-info-name {
        text-align: right;
        padding: 6px 10px 6px 4px;
        font-weight: 400;
        color: #667E99;
        background-color: transparent;
        width: 150px;
        vertical-align: middle;
    }
    .profile-info-row:first-child .profile-info-name, .profile-info-row:first-child .profile-info-value {
        border-top: none;
    }
    .profile-user-info-striped .profile-info-value {
        border-top: 1px dotted #DCEBF7;
        padding-left: 12px;
    }
    .profile-info-value {
        padding: 6px 4px 6px 6px;
    }
    .profile-info-name, .profile-info-value {
        display: table-cell;
        border-top: 1px dotted #D5E4F1;
    }
    .profile-picture {
        border: 1px solid #CCC;
        background-color: #FFF;
        padding: 4px;
        display: inline-block;
        max-width: 100%;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        box-shadow: 1px 1px 1px rgba(0,0,0,.15);
    }
    .space-4, [class*=vspace-4] {
        max-height: 1px;
        min-height: 1px;
        overflow: hidden;
        margin: 4px 0 3px;
    }
    .label-xlg.arrowed-in-right, .label-xlg.arrowed-right {
        margin-right: 7px;
    }
    .label-xlg.arrowed, .label-xlg.arrowed-in {
        margin-left: 7px;
    }
    .label.arrowed-in-right, .label.arrowed-right {
        position: relative;
        z-index: 1;
    }
    .label.arrowed, .label.arrowed-in {
        position: relative;
        z-index: 1;
    }
    .badge-info, .badge.badge-info, .label-info, .label.label-info {
        background-color: #3A87AD;
    }
    .label.arrowed, .label.arrowed-in {
        margin-left: 5px;
    }
    .label.arrowed-in-right, .label.arrowed-right {
        margin-right: 5px;
    }
    .label-xlg {
        padding: .3em .7em .4em;
        font-size: 14px;
        line-height: 1.3;
        height: 28px;
    }
    .label {
        line-height: 1.15;
        height: 28px;
    }
    .label {
        color: #FFF;
        display: inline-block;
    }
    .badge.no-radius, .btn.btn-app.no-radius>.badge.no-radius, .btn.btn-app.radius-4>.badge.no-radius, .label {
        border-radius: 0;
    }
    .badge, .label {
        font-size: 16px;
    }
    .badge, .label {
        font-weight: 400;
        background-color: #ABBAC3;
        text-shadow: none;
    }
    .width-80 {
        width: 80%!important;
    }
    .pos-rel, .position-relative {
        position: relative;
    }

    .inline {
        display: inline-block!important;
    }
    .light-green {
        color: #B0D877!important;
    }
    .ace-icon {
        text-align: center;
    }
    .align-center, .center {
        text-align: center!important;
    }
    .hr-dotted, .hr.dotted {
        border-style: dotted;
    }

    .hr-12, .hr12 {
        margin: 12px 0;
    }
    .hr {
        display: block;
        height: 0;
        overflow: hidden;
        font-size: 0;
        border-width: 1px 0 0;
        border-top: 1px solid #E3E3E3;
        margin: 12px 0;
        border-top-color: rgba(0,0,0,.11);
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-3">
      <ul class="list-group">
        <li class="list-group-item"><a href="/" ><i class="fas fa-home"></i> Home</a></li>
        <li class="list-group-item list-group-item-warning"><a href="#" ><i class="fas fa-tags"></i> Tags</a></li>
        <li class="list-group-item list-group-item-warning"><a href="/user" ><i class="fas fa-user"></i> User</a></li>
      </ul>
    </div>
    <div class="col-9">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-8 mt-2">
                    <h6 class="m-0 font-weight-bold text-primary">User</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-3 center">
                    <div>
                        <span class="profile-picture">
                            <img id="avatar" class="img-fluid" alt="Admin Image" src="{{asset('img/profile-pic.jpg')}}" />
                        </span>

                        <div class="space-4"></div>

                        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                            <div class="inline position-relative">
                                <i class="ace-icon fa fa-circle light-green"></i>
                                <span class="white">Aditia</span>
                            </div>
                        </div>
                    </div>
                    <div class="hr hr12 dotted"></div>
                </div>

                <div class="col-xs-12 col-sm-9">
                    <div class="space-12"></div>
                    <div class="profile-user-info profile-user-info-striped">
                        
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nama </div>
                            <div class="profile-info-value">
                                {{ $data->name }}
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Email </div>
                            <div class="profile-info-value">
                                {{ $data->email }}
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Reputation Poin </div>
                            <div class="profile-info-value">
                                {{ $data->reputation == null ? '0' : number_format($data->reputation) }}
                            </div>
                        </div>

                    </div>
                    <div class="space-20"></div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  
</div>

@endsection