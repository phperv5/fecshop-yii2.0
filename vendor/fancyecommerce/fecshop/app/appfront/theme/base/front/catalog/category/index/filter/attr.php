<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
?>
<div class="category_left_filter">
<?php
//var_dump($parentThis);
//echo 1;
//echo Yii::$service->url->category->urlFormat('df-_ ??&sad');
if(isset($parentThis['filters']) && !empty($parentThis['filters']) && is_array($parentThis['filters'])){
	foreach($parentThis['filters']  as $attr => $filter){
		$attrUrlStr = Yii::$service->url->category->attrValConvertUrlStr($attr);
		if(is_array($filter) && !empty($filter)){
			$str = '';
			$str .= '<div class="filter_attr">';
			$str .= '<div class="filter_attr_title">'.Yii::$service->page->translate->__($attr).'</div>';
			$str .= '<div class="filter_attr_info">';
			$i = 0;
			foreach($filter as $item){
				$val = $item['_id'];
				$count = $item['count'];
				if($val){
					$i++;
					if($i == 1){
						echo $str;
					}
					$urlInfo = Yii::$service->url->category->getFilterChooseAttrUrl($attrUrlStr,$val,'p');
					$url = $urlInfo['url'];
					$selected = $urlInfo['selected'] ? 'class="checked"' : '';
					echo '<a '.$selected.' href="'.$url.'">'.Yii::$service->page->translate->__($val).'('.$count.')</a><br/>';
				}
			}
			if($i >= 1){ 
				echo '</div>';
				echo '</div>';
			}
		}
	}
}
?>
</div>