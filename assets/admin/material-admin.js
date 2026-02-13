jQuery(function ($) {
  const $upload = $('#arquivo_upload');
  const $pick = $('#tm_pick_file');
  const $clear = $('#tm_clear_file');

  if (!$pick.length) return;

  let frame;

  $pick.on('click', function (e) {
    e.preventDefault();

    if (frame) {
      frame.open();
      return;
    }

    frame = wp.media({
      title: 'Selecione um arquivo (PDF)',
      button: { text: 'Usar este arquivo' },
      multiple: false,
      library: { type: ['application/pdf'] }, // pode tirar se quiser qualquer tipo
    });

    frame.on('select', function () {
      const attachment = frame.state().get('selection').first().toJSON();
      if (attachment && attachment.url) {
        $upload.val(attachment.url).trigger('change');
      }
    });

    frame.open();
  });

  $clear.on('click', function (e) {
    e.preventDefault();
    $upload.val('').trigger('change');
  });
});
