<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>


<form name="hidden" action="http://sso.maxim-ic.com/app/sso/index.php" method="post" id="hidden">
    <input type="hidden" name="callback" value="{{ $url }}" />
    <input type="hidden" name="apptitle" value="{{ $title }}" />
</form>
<script type="text/javascript">
    this.hidden.submit();
</script>
