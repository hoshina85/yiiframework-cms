<div id="cse" style="width: 100%;"><?php echo Yii::t('search', 'Loading...'); ?></div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
  google.load('search', '1', {language : '<?php echo Yii::app()->language; ?>'});
  google.setOnLoadCallback(function() {
    var customSearchControl = new google.search.CustomSearchControl('017799262773432056544:bczjgrhry0e');
    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
    var options = new google.search.DrawOptions();
    options.setAutoComplete(true);
    customSearchControl.draw('cse', options);
  }, true);
</script>
<link rel="stylesheet" href="http://www.google.com/cse/style/look/default.css" type="text/css" />
