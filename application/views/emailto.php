<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?=$this->config->item('title')?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="This is a Codeigniter Initial Template." />
  <meta name="keywords" content="codeigniter, plugin, helper" />
  <meta name="author" content="Zaugola" />
  <link rel="shortcut icon" href="<?=base_url()?>images/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/welcome.css" />

  <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/jqueryui/jquery-ui-1.10.3.custom.css" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/datatables/jquery.dataTables.css" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/magnific/magnific-popup.css" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/magnific/magnific-effect.css" />

  <script type="text/javascript" src="<?=base_url()?>js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>js/datatables/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?=base_url()?>js/magnific/jquery.magnific-popup.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>js/jqueryui/jquery-ui-1.10.3.custom.js"></script>
  <script type="text/javascript" src="<?=base_url()?>js/jqueryui/jquery-ui-timepicker-addon.js"></script>

  <script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

</head>
<body>

<script>
jQuery.noConflict ();
    (function($) {
      $(document).ready(function() {

        $('a, input[type=submit], button', '.ln')
        .button();

        $("#radioset" ).buttonset();

        // Datepicker
        $('#datepicker').datetimepicker({
          dateFormat: "yy-mm-dd",
          timeFormat: "hh:mm:ss",
          showSecond: true,
          showMillisec: false,
          ampm: false,
          stepHour: 1,
          stepMinute:1,
          stepSecond: 5
        });

        $('.ajax-popup-link').magnificPopup({
          type: 'iframe'
        });

        // Inline popups
        $('#inline-popups').magnificPopup({
          type: 'iframe',
          delegate: 'a',
          removalDelay: 500, //delay removal by X to allow out-animation
          callbacks: {
            beforeOpen: function() {
               this.st.mainClass = this.st.el.attr('data-effect');
            }
          },
          midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
        });

        // Image popups
        $('#image-popups').magnificPopup({
          type: 'iframe',
          delegate: 'a',
          type: 'image',
          removalDelay: 500, //delay removal by X to allow out-animation
          callbacks: {
            beforeOpen: function() {
              // just a hack that adds mfp-anim class to markup 
               this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
               this.st.mainClass = this.st.el.attr('data-effect');
            }
          },
          closeOnContentClick: true,
          midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
        });

        // Hinge effect popup
        $('a.hinge').magnificPopup({
          type: 'iframe',
          mainClass: 'mfp-with-fade',
          removalDelay: 1000, //delay removal by X to allow out-animation
          callbacks: {
            beforeClose: function() {
                this.content.addClass('hinge');
            }, 
            close: function() {
                this.content.removeClass('hinge'); 
            }
          },
          midClick: true
        });

        CKEDITOR.replace( 'editor' );
    });
})(jQuery);
</script>



<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">

		<p><?=@$info?></p>

		<?=form_open()?>

		<p><?=form_label('Subject : ', 'subject')?><?=form_input('subject', set_value('subject'), 'id="subject"')?><br /><?=form_error('subject')?></p>
		<p><?=form_textarea('editor', set_value('editor'), 'id="editor1"')?>
		<?php
			// Create a textarea element and attach CKEditor to it.
			// $this->myckeditor->editor('editor', set_value('editor'), array('toolbar' => 'Basic'));
		?>
		<br /><?=form_error('editor')?>
		</p>

		<div class="ln"><?=form_submit('send', 'Send')?></div>

		<?=form_close()?>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and <strong>{memory_usage}</strong>. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>