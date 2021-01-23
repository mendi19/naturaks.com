 <h1>
        3D Pay Hosting Result Page</h1>
    <table class="tableClass">
        <tr>
            <td>
                <h3>
                    3D Authentication Result:&nbsp;</h3>
            </td>
            <td>
                <span>
                    <?php
					
					$storekey="SKEY0000";
					$mdStatus=$_POST['mdStatus'];       //Result of the 3D Secure authentication. 1,2,3,4 are successful; 5,6,7,8,9,0 are unsuccessful.

					$hashparams = $_POST["HASHPARAMS"];
					$hashparamsval = $_POST["HASHPARAMSVAL"];
					$hashparam = $_POST["HASH"];					
					$paramsval="";
					$index1=0;
					$index2=0;

					while($index1 < strlen($hashparams))
					{
						$index2 = strpos($hashparams,":",$index1);
						$vl = $_POST[substr($hashparams,$index1,$index2- $index1)];
						if($vl == null)
						$vl = "";
						$paramsval = $paramsval . $vl; 
						$index1 = $index2 + 1;
					}					
					$hashval = $paramsval.$storekey;

					$hash = base64_encode(pack('H*',sha1($hashval)));
					if ($hashparams != null)
					{
						if($paramsval != $hashparamsval || $hashparam != $hash) 	
						{
							echo "<font color=\"red\">Security warning. Hash values mismatch. </font>";
						}
						else
						{
							//dd($_REQUEST);
							if($mdStatus =="1" || $mdStatus == "2" || $mdStatus == "3" || $mdStatus == "4")
							{ 	
								echo "<font color=\"green\">3D Authentication is successful. </font>";
							}
							else						
							{
								echo "<font color=\"red\">3D authentication unsuccesful. </font>";
							}
						}
					}
					else
					{
						echo "<font color=\"red\">Hash values error. Please check parameters posted to 3D secure page. </font>";
					}					
					?>
                </span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h3>
                    3D Parameters:</h3>
            </td>
        </tr>
        <tr class="trHeader">
            <td>
                <b>Parameter Name:</b>
            </td>
            <td>
                <b>Parameter Value:</b>
            </td>
        </tr>
		<?php
			foreach($_POST as $key => $value)
			{
				echo "<tr><td>".$key."</td><td>".$value."</td></tr>";
			}
		?>
    </table>
        <br />
        <br />
	 <h3>Payment Result</h3><br /><br />
	 <table class="tableClass">
	 <tr><td><h3> Payment Result:&nbsp;</h3></td><td><span>
	 <?php
		
		
	
		if($mdStatus =="1" || $mdStatus == "2" || $mdStatus == "3" || $mdStatus == "4")
		{ 			   
		   $Response = $_POST["Response"];	
		   
		   if ( $Response == "Approved")
			{
				echo "<font color=\"green\">Your payment is approved.</font>";
			}
			else			
			{
				echo "<font color=\"red\">Your payment is not approved.</font>";
			}
		}	
		else
		{
			echo "<font color=\"red\">3D Authentication is not successful.</font>";
		}	
	 ?>
			</span>
		</td>
	</tr>	 
	<tr>
	 <tr> 
	<td><b>Parameter Name:</b></td> 
	<td><b>Parameter Value:</b></td> 
	</tr> 
	<?php
		$paymentParameters = array("AuthCode","Response","HostRefNum","ProcReturnCode","TransId","ErrMsg"); 
		for($i=0;$i<6;$i++)
		{
			$param = $paymentParameters[$i];
			echo "<tr><td>".$param."</td><td>".$_POST[$param]."</td></tr>";

		}
?>
	</table>   