$(document).ready(function() {


    let currentPage = 1; // Initial page

    function fetchContent(page) {
        $.ajax({
            url: 'paginateemployee', // Replace with your server-side endpoint
            method: 'GET',
            data: { page: page },
            success: function(response) {
                // Parse the HTML using jQuery
                var $parsedHtml = $(response);

                // Find the <tbody> element within the parsed HTML
                var $tbody = $parsedHtml.find('tbody');
                console.log($tbody.html().length)
                if ($tbody.html().length > 9) {
                     $('#emplyeetable').html(response);
                }
                else{
                    currentPage--;
                }
            },
            error: function() {
                // Handle error
            }
        });
    }
    // Initial content load
    fetchContent(currentPage);
    // Pagination click event
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        currentPageText = $(this).text();
        if(currentPageText==="Next" ){
            currentPage++;
        }
        else if(currentPageText==="Previous"){
            if(  currentPage > 1)
                currentPage--;
        }
        else{
            currentPage=currentPageText;
        }

        fetchContent(currentPage);
    });

    // Update pagination links
    function updatePagination(totalPages) {
        const paginationContainer = $('.pagination');
        paginationContainer.empty();

        for (let i = 1; i <= totalPages; i++) {
            const activeClass = i === currentPage ? 'active' : '';
            paginationContainer.append('<li class="page-item ' + activeClass + '"><a class="page-link" href="#">' + i + '</a></li>');
        }
    }
});
