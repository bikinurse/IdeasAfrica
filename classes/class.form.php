<?php
class Form{
	
	public static function validate(){
		
	}
	public static function element_options($element_id,$formElement_id){
		$elementOpts = DBase::table_row_ids("elementopt where form_id = '$formElement_id'");
		$element = DBase::table_row($formElement_id,'forms');
		$Admin = "<span class='modifyFormElement' form_element_id='$form_element_id'> <i class='icon icon-pencil editFormElement'></i></span>&nbsp;<span class='deleteFormElement'><i class='icon icon-trash deleteFormElement' form_element_id='$form_element_id'></i></span>";
		
		$opts = "";
		switch($element_id){
			case 3:
			//Checkbox
			foreach($elementOpts as $elementOpt_id){
				$elementOpt = DBase::table_row($elementOpt_id,'elementopt');
				$opts.="
				<label class='checkbox'>
				<input type='checkbox' value='{$elementOpt['defaultValue']}' FE_id='$formElement_id' name='{$element['name']}[]' id='CB$elementOpt_id'/>{$elementOpt['label']}
				</label>
				";
				//isset($_SESSION['admin']) ? $opts.= $Admin : $opts.'';
			}
			break;
			
			case 4:
			//Radio
			$opts .="<span class='form-inline'>";
			foreach($elementOpts as $elementOpt_id){
				$elementOpt = DBase::table_row($elementOpt_id,'elementopt');
				$opts .="
				<label class='radio' style='text-transform:capitalize'>
				<input type='radio' value='{$elementOpt['defaultValue']}' FE_id='$formElement_id' name='{$element['name']}' id='CB$elementOpt_id'/>{$elementOpt['label']}
				</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				";
				//isset($_SESSION['admin']) ? $opts.= $Admin : $opts.'';
			}
			$opts .='</span>';
			break;
			
			case 12:
			//Select
			$opts.= "<select name='{$element['name']}' FE_id='$formElement_id'>";
			foreach($elementOpts as $elementOpt_id){
				$elementOpt = DBase::table_row($elementOpt_id,'elementopt');
				$opts .="
				<option value='{$elementOpt['defaultValue']}'>{$elementOpt['label']}</option>
				";
			}
			$opts.= "</select>";
			break;
			default:
			$opts.= "error!";
			break;
		}
		
		
		return $opts;
	}
	
	public static function generate_element($form_element_id,$user_id){
		$element = DBase::table_row($form_element_id,'forms');
		$userInput = DBase::table_row($user_id,$element['dbTable']);
		$value = $userInput[$element['dbFieldName']] != '' ? $userInput[$element['dbFieldName']] : $element['defaultValue'];
		$formElement = DBase::table_row($element['element_id'],'formelements');
		
		$elementHTML = "<label>".$element['label']."</label> ";
		if($element['element_id'] == 3 || $element['element_id'] == 4 || $element['element_id'] ==12){
			$elementHTML .="";
			$elementHTML .= self::element_options($element['element_id'], $form_element_id);
		}
		switch($formElement['element']){
			case 'text':
			$elementHTML .= "<input type='text' FE_id='$form_element_id' name='".$element['name']."' value='".$value."'/>";
			break;
			case 'password':
			$elementHTML .= "<input type='password' FE_id='$form_element_id' name='".$element['name']."'  value='".$value."'/>";
			break;
			case 'hidden':
			$elementHTML .= "<input type='hidden' FE_id='$form_element_id' name='".$element['name']."' value='".$value."' />";
			break;
			/*case 'checkbox':
			$elementHTML .= "<input type='checkbox' FE_id='$form_element_id' name='".$element['name']."[]' value='".$element['defaultValue']."' />";
			break;*/
			/*case 'radio':
			$elementHTML .= "<input type='radio' FE_id='$form_element_id' name='".$element['name']."' value='".$element['defaultValue']."'/>";
			break;*/
			case 'submit':
			$elementHTML .= "<input type='submit' FE_id='$form_element_id' value='".$value."'/>";
			break;
			case 'reset':
			$elementHTML .= "<input type='reset' FE_id='$form_element_id' value='".$value."'/>";
			break;
			case 'file':
			$elementHTML .= "<input type='file' FE_id='$form_element_id' name='".$element['name']."' value='".$value."'/>";
			break;
			case 'textarea':
			$elementHTML .= "<textarea name='".$element['name']."'  FE_id='$form_element_id'>".$value."</textarea>";
			break;
			case 'button':
			$elementHTML .= "<button FE_id='$form_element_id'>".$value."</button>";
			break;
		}
		if($element['help'] !=''){
			$elementHTML .="<span class='response'></span><i class='icon icon-question-sign help' data-original-title='".$element['help']."'></i>";
		}
		
		//Administrative
		if(isset($_SESSION['admin'])){
			$elementHTML .="<span class='modifyFormElement' form_element_id='$form_element_id'> <i class='icon icon-pencil editFormElement'></i></span>&nbsp;<span class='deleteFormElement'><i class='icon icon-trash deleteFormElement' form_element_id='$form_element_id'></i></span>";
		}
		
		
		return $elementHTML;
	}
	public static function switch_element(){
		
	}
}
?>