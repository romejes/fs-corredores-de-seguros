$('#sel-seguros').on('change', ev => {
  const url = $(ev.target)
    .find(':selected')
    .data('href');
  window.location.href = url;
});
