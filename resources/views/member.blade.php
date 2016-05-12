@extends('common.base')

@section('content')

<div class="header-image">
    <h1>COC record</h1>
</div>
<div class="col-md-12">
    <div class="jumbotron">
    <div class="container">
    <!-- 新任務的表單 -->
    {{ csrf_field() }}
    <div class="col-md-2">
        <img src="{{$clan->large_icon}}" style="max-width:150px; max-height: 150px;">
    </div>
    <div class="col-md-2">
        <h3>{{$clan->name}}</h3>
    </div>
    <div class="col-md-8">
        <ul class="list-group">
            <li class="list-group-item">
                <span class="">
                    <i class="material-icons mdl-list__item-icon">cake</i>
                    {{$clan->level}}
                </span>
            </li>
            <li class="list-group-item">
                <span class="">
                    <i class="material-icons mdl-list__item-icon">person</i>
                    {{$clan->members}}
                </span>
            </li>
            <li class="list-group-item">
                <span class="">
                    <i class="material-icons mdl-list__item-icon">check circle</i>
                    {{$clan->wins}}
                </span>
            </li>
            <li class="list-group-item">
                <span class="">
                    <i class="material-icons mdl-list__item-icon">add</i>
                    {{$clan->win_streak}}
                </span>
            </li>
        </ul>
    </div>
    </div>
    </div>
</div>
    <div class="col-md-12">
    @if (count($members) > 0)
        @foreach ($members as $member)
        <div class="col-md-4">
            <div class="thumbnail">
            <div class="card-header">
                <h2 class="mdl-card__title-text">{{ $member->name  }}</h2>
            </div>
                <div class="list-group">
                    <a class="list-group-item">
                        <p class="text-center">
                            <i class="fa fa-2x fa-trophy" aria-hidden="true"></i>
                            {{ $member->trophies }}
                            (
                            {{ ($member->diff('trophies')) > 0 ? '+' : ''}}{{ $member->diff('trophies') }}
                            )
                        </p>
                    </a>
                    <a class="list-group-item">
                        <p class="text-center">
                            <i class="fa fa-2x fa-flag"></i>
                            From
                            {{ $member->previousClanRank }}
                            To
                            {{ $member->clanRank  }}
                        </p>
                    </a>
                    <a class="list-group-item">
                        <p class="text-center">
                            <i class="fa fa-2x fa-level-down"></i>
                            {{ $member->donationsReceived }}
                            (
                            {{ ($member->diff('donationsReceived')) > 0 ? '+' : ''}}{{ $member->diff('donationsReceived') }}
                            )
                        </p>
                    </a>
                    <a class="list-group-item">
                        <p class="text-center">
                            <i class="fa fa-2x fa-level-down fa-rotate-180"></i>
                            {{ $member->donations }}
                            (
                            {{ ($member->diff('donations')) > 0 ? '+' : ''}}{{ $member->diff('donations') }}
                            )
                        </p>
                    </a>
                </div>
                <a class="btn btn-info btn-block">
                      View Detail
                </a>
            </div>
        </div>
        @endforeach
    @endif
    </div>
</div>

<!-- 代辦：目前任務 -->
@endsection
