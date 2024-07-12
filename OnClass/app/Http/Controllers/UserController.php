<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Concat;

class UserController extends Controller
{
    function showUser()
    {
//        //1. get all user from table (SELECT * FROM users)
//        $listUsers = DB::table('users')->get();
//        dd($listUsers);

//        //2. get user with id = 4 (SELECT * FROM users WHERE id = 4)
//        $result = DB::table('users')->where('id', '=','4')->first();
//        //$result = DB::table('users')->find('4'); //only with ID
//        dd($result);

//        //3. get 'name' of user with id = 16
//        $result = DB::table('users')->where('id', '16')->value('name');
//        //$result = DB::table('users')->where('id', '16')->pluck('name'); //for many to many relationship
//        dd($result);

//        //4. get idUsers of field 'Ban Giam Hieu'
//        $idPhongBan = DB::table('phongban')->where('ten_donvi', 'like', '%Ban giám hiệu%')
//            ->value('id');
//
//        $result = DB::table('users')->where('phongban_id', $idPhongBan)->pluck('id');
//        dd($result);

//        //5. Tìm user có độ tuổi lớn nhất trong công ty
//        $result = DB::table('users')
//            ->where('tuoi', DB::table('users')->max('tuoi'))
//            ->get();
//        dd($result);

//        //6. Tìm user có độ tuổi nhỏ nhất trong công ty
//        $result = DB::table('users')->where('tuoi', DB::table('users')->min('tuoi'))
//            ->get();
//        dd($result);

//        //7. Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user
//        $idPhongBan = DB::table('phongban')->where('ten_donvi', 'like', '%Ban giám hiệu%')
//        ->value('id');
//        $result = DB::table('users')
//            ->where('phongban_id', $idPhongBan)
//            ->count('id');
//        dd($result);

//        //8. Lấy danh sách tuổi các user
//        $result = DB::table('users')->distinct()
//        ->pluck('tuoi');
//        dd($result);

//        //9. Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
//        $result = DB::table('users')->where('name', 'like', '%Khải')
//        ->orWhere('name', 'like', '%Thanh')
//        ->get();
//        dd($result);

//        //10. Lấy danh sách user ở phòng ban 'Ban đào tạo'
//        $idPhongBan = DB::table('phongban')->where('ten_donvi', 'like', '%Ban đào tạo%')->value('id');
//        $result = DB::table('users')->where('phongban_id', $idPhongBan)->get();
//        dd($result);

//        // 11. Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
//        $result = DB::table('users')->where('tuoi', '>=', '30')
//        ->orderBy('tuoi', 'asc')
//        ->get();
//        dd($result);

//        //12. Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
//        $result = DB::table('users')->orderBy('tuoi', 'desc')->offset(5)
//            ->limit(10)
//            ->get();
//        dd($result);

//        //13. Thêm một user mới vào công ty
//
//        $data = [
//            'name' => 'Nguyen Trung Hieu',
//            'email' => 'hieu@gmail.com',
//            'phongban_id' => '1',
//            'songaynghi' => '0',
//            'tuoi' => '22',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ];
//        DB::table('users')->insert($data);

        //14. Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo'
//        $idPhongBan = DB::table('phongban')->where('ten_donvi', 'like', '%Ban đào tạo%')
//        ->value('id');
//
//        DB::table('users')->where('phongban_id', $idPhongBan)->update([
//            'name' => DB::raw("CONCAT(name, ' PDT')"),
//        ]);

//        $idPhongBan = DB::table('phongban')->where('ten_donvi', 'like', '%Ban đào tạo%')
//        ->value('id');
//
//        $result = DB::table('users')->where('phongban_id', $idPhongBan)->get();
//
//        foreach ($result as $item) {
//            DB::table('users')->where('id', $item->id)->update([
//                'name' => $item->name . 'PDT',
//            ]);
//        }
//    }

//        //15. Xóa user nghỉ quá 15 ngày
//        DB::table('users')
//            ->where('songaynghi', '>', '15')
//            ->delete();
//
//        function getUser($id, $name = '')
//        {
//            echo $id;
//            echo $name;
//        }
//
//        function updateUser(Request $request)
//        {
//            echo $request->id;
//        }

        //Lab1
        function info()
        {
            $info = [
                'name' => 'N.T.Hieu',
                'age' => '22',
                'occupation' => 'student'
            ];
            return view('information')->with(['info' => $info]);
        }
    }

    public function listUser()
    {
        $list = DB::table('users')
            ->select('users.id', 'users.name', 'users.email', 'users.phongban_id', 'phongban.ten_donvi')
            ->join('phongban', 'phongban.id', '=', 'users.phongban_id')
            ->get();
        return view('user/list-user')->with(['list' => $list]);
    }

    public function addUser()
    {
        $phongBan = DB::table('phongban')->select('id', 'ten_donvi')->get();
        return view('user/add-user')->with(['phongBan' => $phongBan]);
    }

    public function createUser(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phongban_id' => $request->phongban,
            'tuoi' => $request->age,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $insert = DB::table('users')->insert($data);
        return redirect()->route('users.listUser');
    }

    public function editUser($id)
    {
        $user = DB::table('users')
            ->select('users.id', 'users.name', 'users.email', 'users.tuoi', 'users.phongban_id', 'phongban.ten_donvi')
            ->join('phongban', 'phongban.id', '=', 'users.phongban_id')
            ->where('users.id', $id)
            ->first();

        $phongBan = DB::table('phongban')->select('id', 'ten_donvi')->get();

        return view('user/edit-user')->with(['user' => $user, 'phongBan' => $phongBan]);
    }

    public function updateUser(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phongban_id' => $request->phongban,
            'tuoi' => $request->age,
            'updated_at' => Carbon::now()
        ];
        $update = DB::table('users')->where('id', $id)->update($data);
        return redirect()->route('users.listUser');
    }

    public function deleteUser($id)
    {
        $delete = DB::table('users')->where('id', $id)->delete();
        return redirect()->route('users.listUser');
    }
}
