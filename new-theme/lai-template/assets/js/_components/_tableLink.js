/* table */
$('tr[data-href]').click(function(e) {
  if(!$(e.target).is('a,input,button,[class ^= check]')){
    window.location = $(e.target).closest('tr').data('href');
  }
});
