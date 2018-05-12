<html>
<head>
<title>EPAYLINK Testing</title>
</head>
<body bgcolor="#FFFFFF" text="#000000">
	<form method="post" action="https://www.thaiepay.com/epaylink/payment.aspx">
		<input type="hidden" name="refno" value="99999">
		<input type="hidden" name="merchantid" value="00000500">
		<input type="hidden" name="lang" value="TH">
		<input type="hidden" name="cc" value="00">
		<input type="hidden" name="postbackurl" value="localhost/ooomgg/complete.php?rid=0003444">
		<input type="hidden" name="returnurl" value="localhost/ooomgg">
		<input type="hidden" name="customeremail" value="pakonchiraksa@gmail.com"> 
		<input type="hidden" name="productdetail" value="Testing Product">
		<input type="hidden" name="total" value="9999"><br>
		<input type="submit" name="Submit" value="Comfirm Order">
	</form>
</body>
</html>
