<?php
namespace App\Repositories\Book;

use Auth;
use App\Models\Book;
use Input;
use App\Repositories\BaseRepository;
use App\Repositories\Book\BookRepositoryInterface;
use Hash;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    public function __construct(Book $book)
    {
        $this->model = $book;
    }
    public function create($request)
    {
        if(isset($request['picture'])) {
            $fileName = $this->uploadPicture(null);
        } else {
            $fileName = "default.jpg";
        }

        return Book::create([
        	'member_id' => $request['member_id'],
        	'category_id' => $request['category_id'],
            'name' => $request['name'],
            'picture' => $fileName,
            'author' => $request['author'],
            'price' => $request['price'],
            'overview' => $request['overview'],
            'contact' => $request['contact'],
            'status' => '0',
        ]);
    }

    public function update($inputs, $id)
    {
        try {
            if (isset($inputs['picture'])) {
                $picture = $this->uploadPicture($inputs['picture']);
                $inputs['picture'] = $picture;
            } else {
                unset($inputs['picture']);
            }
            $data = $this->model->where('id', $id)->update($inputs);
        } catch (Exception $e) {
            return view('product')->withError(trans('message.update_error'));
        }
        if (!$data) {
            throw new Exception(trans('message.update_error'));
        }
        return $data;
    }

    public function uploadPicture($oldImage)
    {
        $file = Input::file('picture');
        $destinationPath = base_path() . trans('book.picture_path');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        Input::file('picture')->move($destinationPath, $fileName);

        if (!empty($oldImage) && file_exists($oldImage)) {
            File::delete($oldImage);
        }

        return $fileName;
    }
}
