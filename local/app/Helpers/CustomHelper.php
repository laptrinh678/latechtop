

<?php
use Illuminate\Support\Facades\DB;
function getCateName( int $parent_id, $getAll= null)
{
    if($parent_id !=0){
        $data =DB::table('cates')->select('name','id','type_menu','slug')->where('id', $parent_id)->first();
        if($data){
            $result['name'] = $data->name;
            $result['id'] = $parent_id;
            $result['type_menu'] = $data->type_menu;
            $result['slug'] = $data->slug;
            $result['url'] = 'danh-muc-tong/'.$parent_id.'/'.$data->type_menu.'/'.$data->slug.'.html';
            $result['url_hai'] = 'danh-muc-hai/'.$parent_id.'/'.$data->type_menu.'/'.$data->slug.'.html';
            if($data && $getAll !=''){
                return $result;
            }
            if($data && $getAll ==''){
                return $result['name'];
            }
        }


    }
}

function getMenuCon(int $parent_id){
    if($parent_id !=0){
        $data =DB::table('cates')->select('name','slug','id')->where('parent_id', $parent_id)->get();
        if($data){
            return $data;
        }
    }
}

function getMenuCha(int $cat_id_parent){
    if($cat_id_parent !=0){
        $data =DB::table('cates')->select('name','slug','id')->where('id', $cat_id_parent)->first();
        if($data){
            return $data;
        }
    }
}

function diemNhanhtrai(int $userIdParent){
    $diemNhanhtrai =DB::table('users')->select('diem_nhanhtrai')
        ->where('parent_user_id', $userIdParent)
        ->where('nhanh',0)->first();
    if($diemNhanhtrai){
        return $diemNhanhtrai->diem_nhanhtrai;
    }
}
function diemNhanhPhai(int $userIdParent){
    $diemNhanhPhai =DB::table('users')->select('diem_nhanhphai')
        ->where('parent_user_id', $userIdParent)
        ->where('nhanh',1)->first();
    if($diemNhanhPhai){
        return $diemNhanhPhai->diem_nhanhphai;
    }
}
?>
