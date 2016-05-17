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
        $clan_info = ClanRecord::orderBy('created_at', "DESC")->first();
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
    public function fetchDonationList()
    {
        $members = Member::where('donations' , ">", 0)->orderBy('clanRank', 'asc')->get();
        $label_array = [];
        $data_array = [];
        foreach ($members as $member) {
            $label_array[] = $member->name;
            $data_array[] = intval($member->donations);
        }
        return response()->json(['label_array' => $label_array, 'data_array' => $data_array]);
    }
}
