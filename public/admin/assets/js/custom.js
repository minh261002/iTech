(function($){
    "use strict";

    var ELEMENT = {};
    var _token = $('meta[name="csrf-token"]').attr('content');

    ELEMENT.switchery = () => {
        $('.js-switch').each(function(){
            var switchery = new Switchery(this, { color: '#1AB394'});
        })
    }

    //select2
    ELEMENT.select2 = () => {
        $('.select2').select2({
            theme: 'bootstrap-5',
        });
    }

    ELEMENT.sortui = () => {
        $( "#sortable" ).sortable();
		$( "#sortable" ).disableSelection();
    }

    ELEMENT.changeStatus = () => {
        $(document).on('change', '.status', function(e){
            let _this = $(this)
            let option = {
                'value' : _this.val(),
                'modelId' : _this.attr('data-modelId'),
                'model' : _this.attr('data-model'),
                'field' : _this.attr('data-field'),
                '_token' : _token
            }

            $.ajax({
                url: 'ajax/dashboard/changeStatus',
                type: 'POST',
                data: option,
                dataType: 'json',
                success: function(res) {
                    let inputValue = ((option.value == 1)?2:1)
                    if(res.flag == true){
                        _this.val(inputValue)
                    }

                    FuiToast.success('Thay đổi trạng thái thành công')

                },
                error: function(jqXHR, textStatus, errorThrown) {

                  console.log('Lỗi: ' + textStatus + ' ' + errorThrown);
                }
            });

            e.preventDefault()
        })
    }


   $(document).ready(() => {
        ELEMENT.switchery();
        ELEMENT.changeStatus();
        ELEMENT.select2();
        ELEMENT.sortui();
    });
})(jQuery);
