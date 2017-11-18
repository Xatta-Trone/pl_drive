<!DOCTYPE html>
<html>
<head>
	<title>acdadf</title>
</head>
<body>
<p id="xatta" data-id="15">sdscsdv</p>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		$("#xatta").on('click', function() {
			var id = $(this).data('id');
			console.log(id);
			return false;

		});
	});
</script>
</body>
</html>