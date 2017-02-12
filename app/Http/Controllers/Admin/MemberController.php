<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Member\MemberRepository;
use App\Http\Requests\CreateMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Repositories\User\UserRepository;
use Session;

class MemberController extends Controller
{
    protected $memberRepository;

    public function __construct(UserRepository $userRepository,MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
        $this->userRepository = $userRepository;
    }
     public function index()
    {
        $members = $this->memberRepository->paginate(trans('member.limit'));

        return view('admin.member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {	
        return view('admin.member.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateMemberRequest $request)
    {
        $input = $request->only('user_id', 'fullname', 'avatar', 'gender', 'phone', 'address');
        $member = $this->memberRepository->create($input);
        Session::flash('msg', trans('member.create_member_successfully'));

        return redirect(route('member.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $member = $this->memberRepository->find($id);
        if (empty($member)) {
            Session::flash('msg', trans('member.member_not_found'));
            return redirect(route('member.index'));
        }

        return view('admin.member.show')->with('member', $member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $member = $this->memberRepository->find($id);
        if (empty($member)) {
            Session::flash('msg', trans('member.member_not_found'));
            return redirect(route('member.index'));
        }

        return view('admin.member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateMemberRequest $request)
    {
        $member = $this->memberRepository->find($id);
        if (empty($member)) {
            Session::flash('msg', trans('member.member_not_found'));
            return redirect(route('member.index'));
        }
        $input = $request->only('user_id', 'fullname', 'avatar', 'gender', 'phone', 'address');
        $member = $this->memberRepository->update($input, $id);
        Session::flash('msg', trans('member.update_member_successfully'));

        return redirect(route('member.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $member = $this->memberRepository->find($id);
        $user = $this->userRepository->find($id);
        if (empty($member)) {
            Session::flash('msg', trans('member.member_not_found'));
            return redirect(route('member.index'));
        }
        $this->memberRepository->delete($id);
        $this->userRepository->delete($id);
        Session::flash('msg', trans('member.delete_member_successfully'));

        return redirect(route('member.index'));
    }
}
