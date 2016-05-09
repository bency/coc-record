@extends('layouts.app')

@section('content')


<div class="mdl-cell mdl-cell--12-col section--center mdl-grid">
    <!-- 新任務的表單 -->
    {{ csrf_field() }}
    <div class="list mdl-cell mdl-cell--3-col">
    @if (count($members) > 0)
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                <tr>
                    <td>
                        {{ $member->id }}
                    </td>
                    <td>
                        {{ $member->name }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </div>
    <div class="mdl-cell mdl-cell--9-col mdl-grid">
    @if (count($members) > 0)
        @foreach ($members as $member)
        <div class="mdl-cell mdl-card mdl-shadow--4dp">
            <div class="mdl-card__media">
                <img src="//cdn.supercell.com/supercell.com/160503105756/all/themes/supercell/img/parallax/coc1512_parallax_bg.jpg" style="max-width: 400px">
            </div>
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">{{ $member->name  }}</h2>
            </div>
            <div class="mdl-card__supporting-text">
                <ul class="mdl-list">
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
                            <i class="material-icons mdl-list__item-icon">archive</i>
                            {{ $member->donationsReceived }}
                        </span>
                    </li>
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">unarchive</i>
                            {{ $member->donations }}
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
