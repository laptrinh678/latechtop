<?php
namespace App\Repository;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class UsersRepository extends BaseRepository
{
    public function getModel(): String
    {
        return User::class;
    }
   public function getUserTheoNhanh($user_id, $nhanh){

    return $this->model->where('parent_user_id',$user_id)->where('nhanh',$nhanh)->orderBy('id','desc')->get();
   }

   public function getUserCon($user_id){
       //0 nhanh trai;  1 nhanh phai mac dinh 0;
    return $this->model->where('parent_user_id',$user_id)->orderBy('nhanh','asc')->get();
   }

   public function getUserId($code){
        $userId =  $this->model->select('id')->where('code',$code)->first();
        return $userId->id;
   }

   public function getIdUserParent($parentUserId){
        $subUser = $this->model->select('sub_user')->where('id',$parentUserId)->first();
        if($subUser->sub_user<2){
            return $parentUserId ;
        }
       $parentUseridList = $this->model->where('parent_user_id',$parentUserId)->where('sub_user','<',2)->orderBy('id','asc')->pluck('id');

       if(count($parentUseridList)>0)
       {
           return $parentUseridList[0];
       }
       if(count($parentUseridList) == 0)
       {
           $id_user_con_cap1 = $this->model->where('parent_user_id',$parentUserId)->select('id','sub_user','parent_user_id')->orderBy('id','asc')->pluck('id');
           foreach($id_user_con_cap1 as $v)
           {

               $re = $this->kiemtraSoluongUserCon($v);
               if ($re < 2) {
                   return  $v;
               } else {
                   return $this->listUserCon($id_user_con_cap1);
               }
           }
       }

   }

    public function listUserCon($id_user_con_cap1){

        $id_user_con_cap2 = $this->model->whereIn('parent_user_id',$id_user_con_cap1)->where('sub_user','<',2)->orderBy('id','asc')->pluck('id');
        if(count($id_user_con_cap2)>0)
        {
            return $id_user_con_cap2[0];
        }else{
            $id_user_con_cap2 = $this->model->whereIn('parent_user_id',$id_user_con_cap1)->where('sub_user','=',2)->orderBy('id','asc')->pluck('id');
            $id_user_con_cap3 = $this->model->whereIn('parent_user_id',$id_user_con_cap2)->where('sub_user','<',2)->orderBy('id','asc')->pluck('id');
            if(count($id_user_con_cap3)>0){
                return $id_user_con_cap3[0];
            }else{
                dd('aa');
            }
        }
    }
    public function countSubUser($parentId)
    {
        $parentUseridList = $this->model->where('parent_user_id',$parentId)->orderBy('id','asc')->select('id')->get();
        return count($parentUseridList);
    }

    public function kiemtraSoluongUserCon($userId){
        $res = $this->model->select('sub_user')->where('id',$userId)->first();
        return $res->sub_user;
    }

    public  function updateSubUser($userId)
    {
        $subUser = $this->model->select('sub_user')->where('id',$userId)->first();
        return $this->update($userId, ['sub_user'=>$subUser->sub_user+1]);
    }
    public function getNhanhUserConCap1($parentUserid)
    {
        $nhanh = $this->model->where('parent_user_id',$parentUserid)->first();
        dd($nhanh);
    }

    public function getNhanhUser($userId){
        $nhanh = $this->model->where('id',$userId)->select('nhanh')->first();
        if($nhanh){
            return $nhanh->nhanh;
        }
    }


}


