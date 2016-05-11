<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Member;
use App\ClanRecord;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showInfo($id = 0)
    {
        $clan_info = ClanRecord::findOrFail(1);
        $clan_info = $clan_info->formatClanRecord($clan_info);
        $members = Member::orderBy('clanRank', 'asc')->get();
        if (0 == $id) {
            return view('member', ['clan' => $clan_info, 'members' => $members, 'member' => []]);
        }
        if (!$member_info = Member::findOrFail($id)) {
            return view('member', ['clan' => $clan_info, 'members' => $members, 'member' => []]);
        }
        return view('member', ['clan' => $clan_info, 'members' => $members, 'member' => $member_info]);
    }
}
