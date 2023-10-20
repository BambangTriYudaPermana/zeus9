<script>
    function topup() {
        var saldo = $('#topup_saldo').val();

        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/topup/",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        saldo: saldo
                    },
                    success: function (response) {
                        Swal.fire(
                            '{{Auth::user()->address->address}} <button class="btn btn-primary" onclick="copy_address()"><i class="fa fa-clipboard"></i></button>',
                            'TopUp melalui address dan tunggu beberapa saat saldo anda akan masuk ke balance',
                            // 'Your TopUp Success Wait a minute till available in your Wallet.',
                            'warning'
                        );
                        $('#modaldemo8').modal('toggle');
                    }
                });
            }
        });
    }

    function copy_address() {
        // Get the text field
        // var copyText = document.getElementById("myInput");

        // // Select the text field
        // copyText.select();
        // copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText('{{Auth::user()->address->address}}');
    }
</script>