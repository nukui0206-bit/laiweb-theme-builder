/* faq */
if(location.hash != '') {
  var hash = location.hash;
  $('.tab-pane').removeClass('show active');
  $('.list-group-item').removeClass('active');
  $(hash).addClass('show active');
  $(hash + '-list').addClass('active');
  console.log(hash);
}
