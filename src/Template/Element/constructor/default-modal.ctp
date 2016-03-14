<!-- Builder default modal script -->
<script>
    $(document).ready(function () {

        /**
         * Changes default for the modal plugin's 'keyboard' option to false
         */
        $.fn.modal.Constructor.DEFAULTS.keyboard = false;

        /**
         * This event is fired when the modal has loaded content using the remote option
         */
        $('#myModal').on('loaded.bs.modal', function (e) {

            /**
             * Insert close button for modal view
             */
            $('.modal-content').prepend('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');

            /**
             * 
             */
            $('form').submit(function (event) {

                /**
                 * stop form from submitting normally
                 */
                event.preventDefault();
                var formData = new FormData($(this)[0]);
                var formAction = $(this).attr('action');
                $.ajax({
                    url: formAction,
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function (data) {
                    console.log(data);
                });

                /**
                 * myModal hide
                 */
                $('#myModal').modal('hide');

                /**
                 * Page reload
                 */
                location.reload();
            });
        });

        /**
         * Remove data on hidden bs modal
         */
        $('#myModal').on('hidden.bs.modal', function (e) {
            $(this).removeData('bs.modal');
        });
    });
</script>
<!-- myModal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding: 10px"></div>
    </div>
</div>