<!-- Template script -->
<script>
    $(document).ready(function () {

        /**
         * Changes default for the modal plugin's 'keyboard' option to false
         */
        $.fn.modal.Constructor.DEFAULTS.keyboard = false;

        /**
         * Used to enable link to tab 
         */
        $('#myTabs a:first').tab('show');
        var url = document.location.toString();
        if (url.match('#')) {
            var tabId = url.split('#')[1];
            $('#myTabs a[href=#' + tabId + ']').tab('show');
        }

        /**
         * Change hash for page-reload
         */
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            window.location.hash = e.target.hash;
        });

        /**
         * This event is fired when the modal has loaded content using the remote option
         */
        $('#myModal').on('loaded.bs.modal', function (e) {

            /**
             * Prepend 'close' button at this modal view
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding: 10px"></div>
    </div>
</div>