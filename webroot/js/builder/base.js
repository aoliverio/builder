/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {

    /**
     * DATATABLES - dataTable default builder constructor
     */
    $('.dataTable').dataTable();

    /**
     * MODAL - myModal default constructor
     * 
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

    /**
     * TABS - myTabs default constructor
     * 
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
});


