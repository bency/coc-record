@extends('common.base')

@section('content')


<div class="mdl-cell mdl-cell--12-col section--center mdl-grid">
    <!-- 新任務的表單 -->
    {{ csrf_field() }}
    <div class="mdl-cell mdl-cell--2-col">
        <img src="{{$clan->large_icon}}" style="max-width:150px; max-height: 150px;">
    </div>
    <div class="mdl-cell mdl-cell--2-col">
        <h3>{{$clan->name}}</h3>
    </div>
    <div class="clanInfo mdl-cell--8-col">
        <ul class="mdl-list">
            <li>
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">cake</i>
                    {{$clan->level}}
                </span>
            </li>
            <li>
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">person</i>
                    {{$clan->members}}
                </span>
            </li>
            <li>
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">check circle</i>
                    {{$clan->wins}}
                </span>
            </li>
            <li>
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">add</i>
                    {{$clan->win_streak}}
                </span>
            </li>
        </ul>
    </div>
</div>
    <div class="mdl-cell mdl-cell--12-col mdl-grid">
    @if (count($members) > 0)
        @foreach ($members as $member)
        <div class="mdl-cell mdl-card mdl-shadow--4dp">
            <div class="mdl-card__title card-header">
                <h2 class="mdl-card__title-text">{{ $member->name  }}</h2>
            </div>
            <div class="mdl-card__supporting-text">
                <ul class="mdl-list">
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="fa fa-2x fa-trophy mdl-list__item-icon" aria-hidden="true"></i>
                            {{ $member->trophies }}
                            (
                            {{ ($member->diff('trophies')) > 0 ? '+' : ''}}{{ $member->diff('trophies') }}
                            )
                        </span>
                    </li>
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">gavel</i>
                            From
                            {{ $member->previousClanRank }}
                            To
                            {{ $member->clanRank  }}
                        </span>
                    </li>
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">call_received</i>
                            {{ $member->donationsReceived }}
                            (
                            {{ ($member->diff('donationsReceived')) > 0 ? '+' : ''}}{{ $member->diff('donationsReceived') }}
                            )
                        </span>
                    </li>
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">call_made</i>
                            {{ $member->donations }}
                            (
                            {{ ($member->diff('donations')) > 0 ? '+' : ''}}{{ $member->diff('donations') }}
                            )
                        </span>
                    </li>
                </ul>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
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
