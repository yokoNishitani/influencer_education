$(document).ready(function() {
  //未修の学年ボタンを非活性と非同期処理 
  let userGradeId = $('#userGrade').data('user-grade-id');
 
  $('.gradeBtn').each(function() {
    let buttonGradeId = $(this).data('grade-id');
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
    let gradeId = $(this).data('grade-id');
    $.ajax({
        url: '/user/curriculum_list',
        type: 'GET',
        data: { page: page, grade_id: gradeId },
        })

        .done(function(response) {
          $('#app').html(response);
        })
    
        .fail(function() {
          console.log('エラー');
        });
    });
});
