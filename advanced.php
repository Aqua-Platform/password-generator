<?php
/*
|-----------------
| POST
|------------------
*/

if( $_POST ) {

	require_once("class.password_generator.php");
	
	/*
	|-----------------
	| Demo Manipulation
	|------------------
	*/
	
	$length = ( empty( $_POST['length'] ) ) ? 16 : $_POST['length'];
	$alpha_upper_include = ( empty( $_POST['alpha_upper_include'] ) || $_POST['alpha_upper_include'] == 'no' ) ? FALSE : TRUE;
	$alpha_lower_include = ( empty( $_POST['alpha_lower_include'] ) || $_POST['alpha_lower_include'] == 'no' ) ? FALSE : TRUE;
	$number_include = ( empty( $_POST['number_include'] ) || $_POST['number_include'] == 'no' ) ? FALSE : TRUE;
	$symbol_include = ( empty( $_POST['symbol_include'] ) || $_POST['symbol_include'] == 'no' ) ? FALSE : TRUE;
	
	/*
	|-----------------
	| Class Instance
	|------------------
	*/
	
	 $args = array(
				'length'				=>	$length,
				'alpha_upper_include'	=>	$alpha_upper_include,
				'alpha_lower_include'	=>	$alpha_lower_include,						
				'number_include'		=>	$number_include,
				'symbol_include'		=>	$symbol_include,	
			);
	$object = new password_generator( $args );
	
	/*
	|-----------------
	| Generate Password
	|------------------
	*/
	
	$password = $object->get_password();

} // if( $_POST )

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="all" href="style.css" />
<title>Secure password generator</title>
</head>

<body>

<div id="wrap">
  <div id="wrapdata">
    
    
    <div id="header">
      <div id="headerdata">      
        
        <div class="passwordboxw1 passwordstyle1">
          <div class="passwordboxw1data">          
            <h2 class="margin0">Secure password generator</h2>
          </div>
        </div>
        
            
      </div>
    </div>
    
    <div id="content">
      <div id="contentdata">
        
        <?php if( !empty($password) ): ?>
        <div class="passwordboxw1 passwordstyle2">
          <div class="passwordboxw1data">          
            <h2 class="margin0">Password: <?php echo $password; ?></h2>
          </div>
        </div>
        <?php endif; ?>
        
        <div class="passwordboxw1 passwordstyle1">
          <div class="passwordboxw1data">          
              <form method="post" action="">
                
                <p>
                  Include Alpha Upper (A-Z): <select name="alpha_upper_include" id="alpha_upper_include">
                  <?php
                  $alpha_upper_include = array( 'yes' => "Yes", 'no' => "No" );
				  foreach( $alpha_upper_include as $key => $val ):
				  $selected = '';
				  $value = isset($_POST['alpha_upper_included']) ? $_POST['alpha_upper_included'] : '';
				  if( $key == $value ) {
					  $selected = 'selected="selected"';					  
				  }
				  ?>
                  <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                  <?php
                  endforeach;
				  ?> 
                  </select>
                </p>
                
                <p>
                  Include Alpha Lower (a-z): <select name="alpha_lower_include" id="alpha_lower_include">
                  <?php
                  $alpha_lower_include = array( 'yes' => "Yes", 'no' => "No" );
				  foreach( $alpha_lower_include as $key => $val ):
				  $selected = '';
				  $value = isset($_POST['alpha_lower_included']) ? $_POST['alpha_lower_included'] : '';
				  if( $key == $value ) {
					  $selected = 'selected="selected"';					  
				  }
				  ?>
                  <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                  <?php
                  endforeach;
				  ?> 
                  </select>
                </p>
                
                <p>
                  Include Number (0-9): <select name="number_include" id="number_include">
                  <?php
                  $number_include = array( 'yes' => "Yes", 'no' => "No" );
				  foreach( $number_include as $key => $val ):
				  $selected = '';
				  $value = isset($_POST['number_include']) ? $_POST['number_include'] : '';
				  if( $key == $value ) {
					  $selected = 'selected="selected"';					  
				  }
				  ?>
                  <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                  <?php
                  endforeach;
				  ?> 
                  </select>
                </p>
                
                <p>
                  Include Symbol: <select name="symbol_include" id="symbol_include">
                  <?php
                  $symbol_include = array( 'yes' => "Yes", 'no' => "No" );
				  foreach( $symbol_include as $key => $val ):
				  $selected = '';
				  $value = isset($_POST['symbol_include']) ? $_POST['symbol_include'] : '';
				  if( $key == $value ) {
					  $selected = 'selected="selected"';					  
				  }
				  ?>
                  <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                  <?php
                  endforeach;
				  ?> 
                  </select>
                </p>
                
                <?php
                $length = ( empty($_POST['length']) ) ? 16 : $_POST['length'] ;
				?>
                <p>Password Length: <input type="text" name="length" value="<?php echo $length; ?>" /></p>
                
                <input type="submit" name="submit" value="Generate Password" />
              </form>
          </div>
        </div>
        
      </div>
    </div>
    
  </div>
</div>

</body>
</html>
