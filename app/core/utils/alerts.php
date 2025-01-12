<?php
function showAlert($type, $title, $text, $redirectUrl = null, $timer = 1500)
{
    echo "
    <script>
        setTimeout(function() {
            Swal.fire({
                icon: '$type',
                title: '$title',
                text: '$text',
                showConfirmButton: false,
                timer: $timer
            }).then(function() {
                " . ($redirectUrl ? "location.href='$redirectUrl';" : "") . "
            });
        }, 300);
    </script>
    ";
}
