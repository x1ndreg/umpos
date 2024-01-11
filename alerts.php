<?php  
    //put alerts here

    //get the current page
    $currpage = str_replace('.php', '', basename($_SERVER['PHP_SELF']));

    $added_on = @$_GET['note'];

    if ($added_on == "error") {
        echo "
            <script>
                toastr.error('Error');
            </script>
        ";
    } else if ($added_on == "invalid") {
        echo "  
            <script>
                toastr.error('Invalid');
            </script>
        ";
    } else {

        // userlist member

        if ($currpage == "_userlist_member") {
            
            if ($added_on == "added") {
                echo "
                    <script>
                        toastr.success('Fruit Added');
                    </script>
                ";
            } else if ($added_on == "update") {
                echo "
                    <script>
                        toastr.success('Changes Saved');
                    </script>
                ";
            } else if ($added_on == "delete") {
                echo "
                    <script>
                        toastr.success('Fruit Removed');
                    </script>
                ";
            } else {
                echo "";
            }

        }
        
    }
?>