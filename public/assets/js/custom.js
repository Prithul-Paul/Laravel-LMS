$(document).ready(function(){
    // $('.js-example-basic-multiple').select2();
    $(document).on("click", "button#author_delete, button#publisher_delete, button#category_delete, button#book_delete", function(){
        var element = $(this).closest("tr");
        var delete_url = $(this).data('url');
        // alert(delete_url);
        if(confirm("Are U sure To delete this record?")){
            $.ajax({
                type:"GET",
                dataType: 'json', 
                encode  : true, 
                url: delete_url,
                success: $(element).fadeOut()
            });
        }
    })
});