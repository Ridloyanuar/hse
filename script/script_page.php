<?php include ('script/script.php');  ?>
<script>
    jQuery(function ($) {
        $("#treeview").shieldTreeView({
            events: {
                select: function(e) {
                    console.log(e.item.cls);
                }
            }
        });
    });

    // $("form").submit(function( event ) {
    //   console.log( $( this ).serializeArray() );
    //   event.preventDefault();
    // });

</script>