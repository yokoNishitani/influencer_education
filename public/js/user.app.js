//未修の学年ボタンを非活性と非同期処理 
$(document).ready(function() {
  let userGradeId = parseInt($('#userGrade').data('grade-id'));

  $('.gradeBtn').each(function() {
    let buttonGradeId = parseInt($(this).data('grade-id'));
    if (buttonGradeId > userGradeId) {
        $(this).prop('disabled', true);
    }
  });

  $('.gradeBtn').click(function() {
    let url = $(this).data('url');
    $.ajax({
      url: url,
      type: 'GET',
      })

      .done(function(response) {
        $('#app').html(response);
      })
  
      .fail(function() {
        console.log('エラー');
      });
  });

  //月の切り替えの非同期処理
  $('.changeMonth').on('click', function(){
    let page = $(this).data('page');
    $.ajax({
        url: '/user/curriculum_list',
        type: 'GET',
        data: { page: page },
        })

        .done(function(response) {
          $('#app').html(response);
        })
    
        .fail(function() {
          console.log('エラー');
        });
    });
});
