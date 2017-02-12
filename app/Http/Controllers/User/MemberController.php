<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Member\MemberRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Book\BookRepository;
use Session;
use App\Models\Book;
use App\Models\Member;
use App\User;

class MemberController extends Controller
{
    protected $memberRepository;
    protected $bookRepository;
    protected $userRepository;
    protected $categoryRepository;

    public function __construct(MemberRepository $memberRepository, BookRepository $bookRepository, CategoryRepository $categoryRepository)
    {
        $this->memberRepository = $memberRepository;
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
    }
     public function show($id)
    {
        $member = Member::where('user_id', '=', $id)->with('user')->first();
        $categories = $this->categoryRepository->getCategory();
        $books = Book::where('member_id', '=', $id)->paginate(trans('book.limit'));
        return view('user.member.profile', compact('member', 'books', 'categories'));
    }
    public function update($id, Request $request)
    {
        $member = $this->memberRepository->find($id);
        if (empty($member)) {
            Session::flash('msg', trans('member.member_not_found'));
            return redirect()->to(url('/user/profile', $id));
        }
        $input = $request->only('user_id', 'fullname', 'avatar', 'gender', 'phone', 'address');
        $member = $this->memberRepository->update($input, $id);
        Session::flash('msg', trans('member.update_member_successfully'));

        return redirect()->to(url('/user/profile', $id));
    }

}
