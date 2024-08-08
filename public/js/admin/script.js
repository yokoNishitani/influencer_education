$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    console.log("JavaScript file loaded successfully.");

    function articlesRemoveEvent() {
        $(document).off('click', '.articles-list__btn--remove').on('click', '.articles-list__btn--remove', function (e) {
            e.preventDefault();

            console.log("Delete button clicked.");

            var form = $(this).closest('form');
            var url = form.attr('action');
            var row = $(this).closest('tr');

            if (confirm('本当に削除しますか？')) {
                console.log("Confirmed deletion.");
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: form.serialize(),
                    success: function (response) {
                        if (response.success) {
                            row.remove();
                        } else {
                            alert('削除に失敗しました: ' + response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('削除に失敗しました: ' + error);
                    }
                });
            } else {
                setTimeout(function() {
                    alert('削除をキャンセルしました。');
                }, 300);
            }
        });
    }

    articlesRemoveEvent();
});
