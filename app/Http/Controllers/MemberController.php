<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showInfo($id = 0)
    {
        $members = Member::orderBy('created_at', 'asc')->get();
        if (0 == $id) {
            return view('member', ['members' => $members, 'member' => []]);
        }
        if (!$member_info = Member::findOrFail($id)) {
            return view('member', ['members' => $members, 'member' => []]);
        }
        return view('member', ['members' => $members, 'member' => $member_info]);
    }
}
