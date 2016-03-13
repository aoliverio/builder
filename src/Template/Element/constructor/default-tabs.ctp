<!-- Builder default tabs script -->
<script>
    $(document).ready(function () {

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
    });
</script>