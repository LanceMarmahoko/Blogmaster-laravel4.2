{{HTML::script("js/jquery-1.10.2.min.js")}}
{{HTML::script("js/bootstrap.min.js")}}
{{HTML::script("js/flatui-checkbox.js")}}
{{HTML::script("js/bootstrap.file-input.js")}}

{{HTML::script("packages/ckeditor/plugins/styles/styles/default.js")}}
{{HTML::script("packages/ckeditor/plugins/pastefromword/filter/default.js")}}
{{HTML::script("packages/ckeditor/plugins/templates/templates/default.js")}}
{{HTML::script("packages/ckeditor/config.js")}}
{{HTML::script("packages/ckeditor/ckeditor.js")}}

<script>
    CKEDITOR.replace( 'editor_area' );
    $('input[type=file]').bootstrapFileInput();
	$('.file-inputs').bootstrapFileInput();
	</script>
</body>
</html>
