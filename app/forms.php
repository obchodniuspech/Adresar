<?php

/**
* Universal Form
*/
class Form {

	function create($settings,$fields) {
		
		$inputs = array();
		foreach ($fields AS $key=>$value) {
// 				echo "$key>$value<br>";
			$type = $fields[$key]['type'];
			$required = "";
			
				switch ($type) {
					case "textarea":
						$placeholder = $fields[$key]['placeholder'];
						$invalue = $fields[$key]['value'];
						$name = $fields[$key]['name'];
						$class = $fields[$key]['class'];
						$id = $fields[$key]['id'];
						$this_input = array("type"=>$type,"name"=>$placeholder,"html"=>"<textarea name='$name' id='$id' type='$type' placeholder='$placeholder' class='$class'>$invalue</textarea>\n");
					break;
					
					case "text":
						$placeholder = $fields[$key]['placeholder'];
						$invalue = $fields[$key]['value'];
						if(isset($fields[$key]['required'])) {
							if ($fields[$key]['required']=="required") {$required = " required='required'";}
						}
						else {$required = "";}
						$name = $fields[$key]['name'];
						$id = $fields[$key]['id'];
						$class = $fields[$key]['class'];
						$this_input = array("type"=>$type,"name"=>$placeholder,"html"=>"<input name='$name' id='$id' type='$type' placeholder='$placeholder' value='$invalue' class='$class' $required>\n");
					break;
					
					case "email":
						$placeholder = $fields[$key]['placeholder'];
						$invalue = $fields[$key]['value'];
						if(isset($fields[$key]['required'])) {
							if ($fields[$key]['required']=="required") {$required = " required='required'";}
						}
						else {$required = "";}
						$name = $fields[$key]['name'];
						$id = $fields[$key]['id'];
						$class = $fields[$key]['class'];
						$this_input = array("type"=>$type,"name"=>$placeholder,"html"=>"<input name='$name' id='$id' type='$type' placeholder='$placeholder' value='$invalue' class='$class' $required>\n");
					break;
					
					case "checkbox":
						$placeholder = $fields[$key]['placeholder'];
						$invalue = $fields[$key]['value'];
						$name = $fields[$key]['name'];
						$id = $fields[$key]['id'];
						$class = $fields[$key]['class'];
						if ($fields[$key]['selected']=="selected") {$checked="checked=checked";} else {$checked = ""; }
						
						$this_input = array("type"=>$type,"name"=>$placeholder,"html"=>"<input name='$name' id='$id' type='$type' $checked value='$invalue' class='$class'> $placeholder\n");
					break;
					
					case "hidden":
						$invalue = $fields[$key]['value'];
						$name = $fields[$key]['name'];
						$class = $fields[$key]['class'];
						$id = $fields[$key]['id'];
						$this_input = array("type"=>$type,"name"=>$name,"html"=>"<input name='$name' id='$id' type='$type' value='$invalue'>\n");
					break;
					
					case "number":
						$placeholder = $fields[$key]['placeholder'];
						$invalue = $fields[$key]['value'];
						$name = $fields[$key]['name'];
						$class = $fields[$key]['class'];
						$id = $fields[$key]['id'];
						$this_input = array("type"=>$type,"name"=>$placeholder,"html"=>"<input name='$name' id='$id' type='$type' placeholder='$placeholder' value='$invalue' class='$class'>\n");
					break;
					
					case "email":
						$placeholder = $fields[$key]['placeholder'];
						$invalue = $fields[$key]['value'];
						$name = $fields[$key]['name'];
						$class = $fields[$key]['class'];
						$id = $fields[$key]['id'];
						$this_input = array("type"=>$type,"name"=>$placeholder,"html"=>"<input name='$name' id='$id' type='$type' placeholder='$placeholder' value='$invalue' class='$class'>\n");
					break;
					
					case "button":
						$placeholder = $fields[$key]['placeholder'];
						$invalue = $fields[$key]['value'];
						$name = $fields[$key]['name'];
						$class = $fields[$key]['class'];
						$id = $fields[$key]['id'];
						$this_input = array("type"=>$type,"name"=>$placeholder,"html"=>"<button name='$name' id='$id' class='$class'>$placeholder</button>\n");
					break;
					
					case "select":
						$placeholder = $fields[$key]['placeholder'];
						$name = $fields[$key]['name'];
						$options = "";
						$invalue = $fields[$key]['value'];
						$class = $fields[$key]['class'];
						$id = $fields[$key]['id'];
						
							foreach ($fields[$key]['options'] AS $opt_key=>$opt_val) {
								$options.= "\n\t<option value='".$fields[$key]['options'][$opt_key]['value']."'>".$fields[$key]['options'][$opt_key]['name']."</option>";
							}
						
						$this_input = array("type"=>$type,"name"=>$placeholder,"html"=>"\n<select id='$id' name='$name' placeholder='$placeholder' class='$class'>$options</select>\n");

						
					break;
					
					case radio:
						$placeholder = $fields[$key]['placeholder'];
						$name = $fields[$key]['name'];
						$options = "";
						$class = $fields[$key]['class'];
						
							foreach ($fields[$key]['options'] AS $opt_key=>$opt_val) {
								$checked = $fields[$key]['options'][$opt_key]['selected'];
								if ($checked=="selected") {$checked="checked";} else {$checked="";}
								$options.= "\n\t<input class='$class' $checked type=radio name=$name value='".$fields[$key]['options'][$opt_key]['value']."'>".$fields[$key]['options'][$opt_key]['name']."";
							}
						
						$this_input = array("type"=>$type,"name"=>$placeholder,"html"=>"\n$options\n");
						
					break;
					
					
					case select_multiple:
						$placeholder = $fields[$key]['placeholder'];
						$name = $fields[$key]['name'];
						$options = "";
						$class = $fields[$key]['class'];

							foreach ($fields[$key]['options'] AS $opt_key=>$opt_val) {
								$options.= "\n<option value='".$fields[$key]['options'][$opt_key]['name']."'>".$fields[$key]['options'][$opt_key]['name']."</option>\n";
							}
						
						$this_input = array("type"=>$type,"name"=>$placeholder,"html"=>"\n<select multiple=multiple name='$name' placeholder='$placeholder' class='$class'>$options</select>\n");

						
					break;
					
				}
			
				array_push($inputs, $this_input);
			
			
		}
		
		$write = "";
		foreach ($inputs AS $k=>$v) {
			if ($inputs[$k]['type']!="button" AND $inputs[$k]['type']!="submit" AND $inputs[$k]['type']!="hidden") {
				$write.= "<tr><td>".$inputs[$k]['name']."</td><td>".$inputs[$k]['html']."</td></tr>";
			}
			else {
				if ($inputs[$k]['type']=="hidden") {
					$write.= "".$inputs[$k]['html']."";
				}
				else {
					$write.= "<tr><td>&nbsp;</td><td>".$inputs[$k]['html']."</td></tr>";
				}
			}
		}
		
		if (isset($settings['name'])) {
			$formName = "<h1>
			  ".$settings['name']."
			  <small class=\"text-muted\">".$settings['nameSub']."</small>
			  </h1>";
		}
		else {
			$formName = "";
		}
 		
		$form = "$formName
		<form method='".$settings['method']."' action='".$settings['action']."'>\n
			<table class='table table-striped'>\n
				$write\n
			</table>\n
		</form>\n
		
		";
		
		return $form;
	}
	
	
		
}

