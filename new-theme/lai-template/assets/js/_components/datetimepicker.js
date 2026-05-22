/* 日付 */
$('#datetimepicker-search').datetimepicker({
  locale: 'ja',
  format: 'L',
  todayHighlight: true,
  minDate: moment(new Date()).format('YYYY-MM-DD'),
  maxDate: moment().add(14, "day"),
  debug: true,
  defaultDate: null,
});
$('#datetimepicker-search-footer').datetimepicker({
  locale: 'ja',
  format: 'L',
  todayHighlight: true,
  minDate: moment(new Date()).format('YYYY-MM-DD'),
  maxDate: moment().add(14, "day"),
  debug: true,
  defaultDate: null,
});
