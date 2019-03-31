<?php 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Banners;
use App\User;
use App\Category_relation;

function fooBar(){
        return 'it works!';
    }
function getCategory()
{
	$categories  = Category::where('parent',0)->where('type','product')->get();
    return $categories;
}

function getCatte()
{
	$categories  = Category::where('parent','<>',0)->where('type','product')->get();
    return $categories;
}

if (! function_exists('radioCategory')) {
    function radioCategory($datas,$old_cat=false,$parent=0,$checked='checked'){
        if($datas->count()): ?>
			<ul class="post-category">
		  <?php foreach($datas as $key => $cat): 
		  $checked = ($old_cat && $cat->id == $old_cat) ? 'checked' : '';
		  if($cat->parent == $parent) : 
		  
		  ?>
			    <li class="radio">
			      <label>
			        <input name="cat_id" type="radio" value="<?php echo $cat->id; ?>" <?php echo $checked; ?>/>
			        <?php echo $cat->name; ?>
			      </label>
			      <?php unset($datas[$key]); radioCategory($datas,$old_cat,$cat->id); ?>
			    </li>
		    <?php endif; endforeach;  ?>
		    </ul>
		<?php endif;
    }
}

if (! function_exists('list_category')) {
    function list_category($datas,$parent=0,$char=''){
       	if($datas->count()): foreach($datas as $key => $model): 
		    if($model->parent == $parent) :
		?>
	      <tr>
	        <td ><input type="checkbox" name="id[]" class="item-check" value="<?php echo $model->id ?>"></td>
	        <td><?php echo $char.$model->name; ?></td>
	        <td><?php echo $model->created_at; ?></td>
	        <td align="right" class="table-action">
	           
	            <?php if($model->products) : ?>
		            <a href="" class="label label-success">
		                <i class="fa fa-edit"></i>
		            </a> 
		            <?php if($model->products->count() <= 0) : ?>
						<a href="<?php echo route('backend.category-delete',['id'=>$model->id]) ?>" class="label label-danger"  onclick="return confirm('Bạn có chắc muốn xóa?')">
			              <i class="fa fa-trash"></i>
			            </a>
		            <?php endif; ?>
		        <?php else: ?>
		        	<a href="<?php echo route('backend.category-edit',['id'=>$model->id]); ?>" class="label label-success">
		                <i class="fa fa-edit"></i>
		            </a> 
					<a href="<?php echo route('backend.category-delete',['id'=>$model->id]) ?>" class="label label-danger"  onclick="return confirm('Bạn có chắc muốn xóa?')">
		              <i class="fa fa-trash"></i>
		            </a>
				<?php endif; ?>
	            
	        </td>
	      </tr>
	      <?php 
	      unset($datas[$key]);
	        list_category($datas,$model->id,$char.'|-->') ;
	      endif;
		endforeach;
		endif;
    }
}

if (! function_exists('dropdownCategory')) {
    function dropdownCategory($datas,$model=false,$parent=0,$char=''){
       foreach ($datas as $key => $item) {
       	$selected = ($model && $model->parent == $item->id) ? 'selected' : '';
	        if ($item->parent == $parent) {
	            echo '<option value="'.$item->id.'" '.$selected.'>';
	                echo $char . $item->name;
	            echo '</option>';
	            unset($datas[$key]);
	             
	            dropdownCategory($datas,false,$item->id, $char.'--');
	        }
	    }
    }
}

if (! function_exists('price_fm')) {
	function price_fm($number){
		echo number_format($number,0,'',',').' VND';
	}
}

function getlogo(){
	$logo = Banners::where('status','3')->first();
	return $logo->link;
}
function getinfo(){
	$info = User::where('type','admin')->first();
	return $info;
}
   
?>