@php
	function menuParent_post($data_post,$parent=0,$str='--',$select=0){
		foreach($data_post as $val){
			$id = $val->id;
			$name = $val->name;
			$slug = $val->slug;
			if($val->parent_id==$parent){
				if($select!=0 && $id == $select){
					echo "<option value='$id' selected>$str $name</option>";
				}else{
					echo "<option value='$id'>$str $name</option>";
				}
				menuParent_post($data_post,$id,$str.'--',$select);
			}
		}
	}
@endphp