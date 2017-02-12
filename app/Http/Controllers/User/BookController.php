<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Book\BookRepository;
use App\Repositories\Category\CategoryRepository;
use Session;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    protected $bookRepository;
    protected $categoryRepository;

    public function __construct(BookRepository $bookRepository, CategoryRepository $categoryRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
    }
     public function index()
    {
        $books = Book::where('status', '=', '1')->with('category')->orderBy('id', 'desc')->paginate(trans('book.limit'));
        $categories = $this->categoryRepository->getCategory();
        $categoriesMenus = Category::all();
        return view('user.book.index', compact('books', 'categories', 'categoriesMenus'));
    }

    public function show($id)
    {
        $book = Book::with('member', 'category')->get()->find($id);
        $categories = $this->categoryRepository->getCategory();
        if (empty($book)) {
            Session::flash('msg', trans('book.book_not_found'));
            return redirect(route('book.index'));
        }

        return view('user.book.detail', compact('book','categories'));
    }

    public function store(Request $request)
    {   
        $input = $request->only('member_id', 'category_id', 'name', 'picture', 'author', 'price', 'overview', 'contact');
        if ($this->bookRepository->create($input)) {
            return redirect()->action('User\BookController@index')->with('success', trans('book.post_book_successfully'));
        }

        return redirect()->action('User\BookController@index')->with('success', trans('book.post_book_fail'));
    }

    public function update($id, Request $request)
    {
        $input = $request->only('member_id', 'category_id', 'name', 'picture', 'author', 'price', 'overview', 'contact');

        if ($this->bookRepository->update($input, $id)) {
            
            return redirect()->to(url('/user/profile', $request['member_id']));
        }

        return redirect()->to(url('/user/profile', $request['member_id']));
    }
    
    public function destroy($id)
    {
        $book = $this->bookRepository->find($id);
        if (empty($book)) {
            Session::flash('msg', trans('book.book_not_found'));
            return redirect(route('book.index'));
        }
        $this->bookRepository->delete($id);
        Session::flash('msg', trans('book.delete_book_successfully'));

        return redirect(route('book.index'));

    }

    public function category($id)
    {   
        $books = Book::where('category_id', '=', $id)->paginate(trans('book.limit'));
        $categories = $this->categoryRepository->getCategory();
        $categoriesMenus = Category::all();
        return view('user.book.index', compact('books', 'categories', 'categoriesMenus'));
    }
    public function edit($id)
    {
        $book = $this->bookRepository->find($id);
        $categories = $this->categoryRepository->getCategory();
        if (empty($book)) {
            Session::flash('msg', trans('book.book_not_found'));
            return redirect(route('book.index'));
        }

        return view('user.book.edit', compact('book','categories'));
    }

    public function search(Request $request)
    {   
        $books = Book::where('name', 'LIKE', '%'.$request['search'].'%')->with('category')->orderBy('id', 'desc')->paginate(trans('book.limit'));
        $categories = $this->categoryRepository->getCategory();
        $categoriesMenus = Category::all();
        return view('user.book.index', compact('books', 'categories', 'categoriesMenus'));
    }

}
