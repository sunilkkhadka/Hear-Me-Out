
$(document).ready(function(){

    
    $('#search').on('keyup', function() {
        
        var searchTerm = $(this).val();
        
        if (searchTerm != '') {
            $.ajax({
                url: 'backend/search.php',
                type: 'POST',
                data: {
                    search: searchTerm
                },
                success: function(data) {
                    $('#search-result').html(data);
                }
            });
        } else {
            $('#search-result').html('');
        }
        
        $('body').click(function() {
            
            $('#search-result').html('');
        });
    });

    $(document).on('click', "#delete-record", function(){
        
        if(confirm("Do you want to delete the record?")){
            var id = $(this).data('id');

            $.ajax({
                url: 'backend/delete.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(data){
                    if(data == 'success'){
                        window.location = 'listarticle.php';
                    }
                    else{
                        alert('cannot delete');
                    }
                }
            });
        }
    });

});

