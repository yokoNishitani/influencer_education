//バナー追加
$(document).on('click', '.btnAddBanner', function() {
    $.ajax({
        type: "get",
        url: "/admin/banner_edit",
        dataType: "html",
        })

        .done(function() {
          let html = `<tr>
                        <td>
                          <input type="file" name="image[]">
                          <input type="hidden" name="banner_id[]" value="">
                        </td>
                        <td>
                          <input data-banner_id="{{ $banner->id }}" type="button" class="btnBannerSakujo" value="-">
                        </td>
                      </tr>`;
          $('.bannerList').append(html);
        })

        .fail(function() {
            console.log('エラー');
        });
});


//バナー削除
$(document).on('click', '.btnBannerSakujo', function() {
  let deleteConfirm = confirm('削除しますか？');
  if(deleteConfirm == true) {
    let clickEle = $(this)
    let bannerID = clickEle.attr('data-banner_id');
    let row = $(this).closest('tr').remove();
    $(row).remove();

  $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'post',
        url: '/admin/destroy/'+bannerID,
        data: {'id':bannerID}
      })
          
      .done(function() {
        clickEle.parents('tr').remove();
      })

      .fail(function() {
        console.log('エラー');
      });

    } else {
      (function(e) {
        e.preventDefault()
      });
  };
});
