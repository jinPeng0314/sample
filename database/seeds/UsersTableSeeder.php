<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * times 和 make 方法是由 FactoryBuilder 类 提供的 API
     * times 接受一个参数用于指定要创建的模型数量
     * make 方法调用后将为模型创建一个集合。
     * makeVisible 方法临时显示 User 模型里指定的隐藏属性 $hidden
     * 使用了insert方法来将生成假用户列表数据批量插入到数据库中
     */
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);
        $user->name = 'jinpeng';
        $user->email = 'jinpeng0314@126.com';
        $user->password = bcrypt('123456');
        $user->is_admin = true;
        $user->save();
    }
}
