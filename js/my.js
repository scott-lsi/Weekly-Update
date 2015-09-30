$(document).ready(function(){

  $('form').masonry({
    itemSelector: 'fieldset',
    columnwidth: 400,
    isAnimated: true
  });
  
  $('#fixlayout').click(function(){
    $('form').masonry('reload');
  });
  
  $('textarea, input[type=text]').each(function(){
    if($(this).val()){
      $(this).siblings('input[type=checkbox]').prop('checked','true');
      $(this).show(function(){
        $('form').masonry('reload');
      });
    }
  });
  
  $('#date').datepicker({
    beforeShowDay: function(date){ return [date.getDay() == 1,""] }, // Only allow Mondays
    dateFormat: 'ddmmyy'
  });
  
  $('.load, .new').click(function(){
    var answer = confirm('Are you sure? You will lose any unsaved changes.');
    if(answer) {
      return;
    }
    else {
      return false;
    }
  });
  
  $('input:checkbox').change(function(){
    $(this).siblings('textarea').slideToggle(function(){
      $(this).focus();
      $('form').masonry('reload');
    });
  });
  
  $('.horizontal input:checkbox').change(function(){
    $(this).siblings('.text').slideToggle(function(){
      $(this).focus();
      $('form').masonry('reload');
    });
  });
  
});