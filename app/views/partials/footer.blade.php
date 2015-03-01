<hr>
<!--<footer>
<p>Eishdigital.2015</p>
</footer>-->
{{HTML::script("js/jquery-1.10.2.min.js")}}
{{HTML::script("js/bootstrap.min.js")}}
<script>

window.setTimeout(function() {
    $("#alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);

//http://heera.it/bootstrap-3-delete-confirm-dialog#.VN3O2PmUdqU
  $('#confirmation').on('show.bs.modal', function (e) {
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title h3').text($title);
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
      $message = $(e.relatedTarget).attr('data-cancel');
      $(this).find('.modal-cancel').text($message);      
      $message = $(e.relatedTarget).attr('data-danger');
      $(this).find('.modal-danger').text($message);
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });

  $('#confirmation').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });
</script>

{{HTML::script("packages/ckeditor/plugins/styles/styles/default.js")}}
{{HTML::script("packages/ckeditor/plugins/pastefromword/filter/default.js")}}
{{HTML::script("packages/ckeditor/plugins/templates/templates/default.js")}}
{{HTML::script("packages/ckeditor/config.js")}}
{{HTML::script("packages/ckeditor/ckeditor.js")}}
<script>
    CKEDITOR.replace( 'editor_area' );
</script>

<script>
function goBack() {
    window.history.go(-1)
}
</script>

</body>
</html>
