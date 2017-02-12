<?php
namespace App\Repositories\User;

use Auth;
use App\User;
use App\Models\Member;
use Input;
use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;
use Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create($request)
    {   
        if(isset($request['avatar'])) {
            $fileName = $this->uploadAvatar(null);
        } else {
            $fileName = "default.jpg";
        }

        $data = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'admin' => '0',
        ]);
        $member = Member::create([
            'user_id' => $data->id,
            'fullname' => $data->name,
            ]);
        return $data;
    }

    public function update($inputs, $id)
    {
        try {
            if(empty($inputs['password'])) {
                unset($inputs['password']);
            }
            if (isset($inputs['avatar'])) {
                $image = $this->uploadAvatar($oldImage);
                $inputs['avatar'] = $image;
            } else {
                unset($inputs['avatar']);
            }
            $data = $this->model->where('id', $id)->update($inputs);
        } catch (Exception $e) {
            return view('user/home')->withError(trans('message.update_error'));
        }
        if (!$data) {
            throw new Exception(trans('message.update_error'));
        }
        return $data;
    }

    public function uploadAvatar($oldImage)
    {
        $file = Input::file('avatar');
        $destinationPath = base_path() . trans('user.avatar_path');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        Input::file('avatar')->move($destinationPath, $fileName);

        if (!empty($oldImage) && file_exists($oldImage)) {
            File::delete($oldImage);
        }

        return $fileName;
    }
    public function getUsers()
    {
        return $this->model->pluck('name', 'id')->toArray();
    }
}
