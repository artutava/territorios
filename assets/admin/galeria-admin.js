jQuery(function ($) {
  const $input = $("#galeria_imagens");
  const $preview = $("#tg_preview");

  function getIds() {
    const v = ($input.val() || "").trim();
    if (!v) return [];
    return v.split(",").map((n) => parseInt(n, 10)).filter(Boolean);
  }

  function setIds(ids) {
    $input.val(ids.join(","));
  }

  // Remove thumb
  $preview.on("click", ".tg-remove", function () {
    const $thumb = $(this).closest(".tg-thumb");
    const id = parseInt($thumb.data("id"), 10);
    const ids = getIds().filter((x) => x !== id);
    setIds(ids);
    $thumb.remove();
  });

  // Limpar
  $("#tg_clear_images").on("click", function () {
    setIds([]);
    $preview.empty();
  });

  // Adicionar imagens
  $("#tg_add_images").on("click", function (e) {
    e.preventDefault();

    const frame = wp.media({
      title: "Selecionar imagens da galeria",
      button: { text: "Usar imagens" },
      multiple: true,
      library: { type: "image" },
    });

    frame.on("select", function () {
      const selection = frame.state().get("selection");
      const ids = getIds();

      selection.each(function (attachment) {
        const a = attachment.toJSON();
        if (!a.id) return;

        if (!ids.includes(a.id)) {
          ids.push(a.id);

          const thumb = (a.sizes && a.sizes.thumbnail && a.sizes.thumbnail.url) ? a.sizes.thumbnail.url : a.url;

          $preview.append(`
            <div class="tg-thumb" data-id="${a.id}">
              <img src="${thumb}" alt="">
              <button type="button" class="tg-remove" title="Remover">×</button>
            </div>
          `);
        }
      });

      setIds(ids);
    });

    frame.open();
  });
});
