<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Book\BookRepository;
use App\Repositories\Category\CategoryRepository;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Session;
use App\Models\Book;

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
        $books = Book::with('category', 'member')->orderBy('id', 'desc')->paginate(trans('book.limit'));
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {	
    	$categories = $this->categoryRepository->getCategory();
        return view('admin.book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateBookRequest $request)
    {
        $input = $request->only('user_id', 'category_id', 'name', 'picture', 'author', 'price', 'overview', 'contact');
        
        if ($this->bookRepository->create($input)) {
            return redirect()->route('book.index')->with('success', trans('book.create_book_successfully'));
        }

        return redirect()->route('book.index')->with('errors', trans('book.create_book_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $book = $this->bookRepository->find($id);
        $categories = $this->categoryRepository->getCategory();
        if (empty($book)) {
            Session::flash('msg', trans('book.book_not_found'));
            return redirect(route('book.index'));
        }

        return view('admin.book.show', compact('book','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $book = $this->bookRepository->find($id);
        $categories = $this->categoryRepository->getCategory();
        if (empty($book)) {
            Session::flash('msg', trans('book.book_not_found'));
            return redirect(route('book.index'));
        }

        return view('admin.book.edit', compact('book','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateBookRequest $request)
    {
        $input = $request->only('member_id', 'category_id', 'name', 'picture', 'author', 'price', 'overview', 'contact');

        if ($this->bookRepository->update($input, $id)) {
            return redirect()->route('book.index')->with('success', trans('book.update_book_successfully'));
        }

        return redirect()->route('book.index')->with('errors', trans('book.update_book_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
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
    public function  updateStatus(Request $request, $id)
    {
        $input = $request->only('status');
        if ($this->bookRepository->update($input, $id)) {
            return redirect()->route('book.index')->with('success', trans('book.update_book_successfully'));
        }
        return redirect()->route('book.index')->with('errors', trans('book.update_book_fail'));
    }
}
