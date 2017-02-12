<?php
namespace App\Repositories\Member;

use Auth;
use App\Models\Member;
use Input;
use App\Repositories\BaseRepository;
use App\Repositories\Member\MemberRepositoryInterface;
use Hash;

class MemberRepository extends BaseRepository implements MemberRepositoryInterface
{
    public function __construct(Member $member)
    {
        $this->model = $member;
    }
    public function create($request)
    {
        if(isset($request['avatar'])) {
            $fileName = $this->uploadAvatar(null);
        } else {
            $fileName = "default.jpg";
        }

        return Member::create([
        	'user_id' => $request['user_id'],
        	'fullname' => $request['fullname'],
        	'gender' => $request['gender'],
            'avatar' => $fileName,
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);
    }

    public function update($inputs, $id)
    {
        try {
            if (isset($inputs['avatar'])) {
                $avatar = $this->uploadAvatar($inputs['avatar']);
                $inputs['avatar'] = $avatar;
            } else {
                unset($inputs['avatar']);
            }
            $data = $this->model->where('id', $id)->update($inputs);
        } catch (Exception $e) {
            return view('member')->withError(trans('message.update_error'));
        }
        if (!$data) {
            throw new Exception(trans('message.update_error'));
        }
        return $data;
    }

    public function uploadAvatar($oldImage)
    {
        $file = Input::file('avatar');
        $destinationPath = base_path() . trans('member.avatar_path');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        Input::file('avatar')->move($destinationPath, $fileName);

        if (!empty($oldImage) && file_exists($oldImage)) {
            File::delete($oldImage);
        }

        return $fileName;
    }
}
