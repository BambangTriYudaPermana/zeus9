<script>
    function topup() {
        var amount = $('#topup_saldo').val();

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
                    url: "/topup",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        amount: amount,
                        type: "topup"
                    },
                    success: function (response) {
                        // $('#modaldemo8').modal('toggle');
                        $('#address_topup').show();
                    }
                });
            }
        });
    }

    function copy_address(address) {
        navigator.clipboard.writeText(address);
    }

    function max_balance(){
        var balance = $('#wallet-user').val();
        $('#wd_balance').val(balance);    
    }

    function withdraw() {
        var amount = $('#wd_balance').val();
        var address_destination = $('#address_destination').val();

        if (amount == '' || address_destination == '') {
            Swal.fire({
                text: "Please enter your Amount and your Address!",
                icon: "warning"
            });
        }else{
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
                        url: "/withdraw",
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            amount: amount,
                            address_destination: address_destination,
                            type: "withdrawal"
                        },
                        success: function (response) {
                            Swal.fire({
                                text: "Your Withdraw Request has been Received and Processed",
                                icon: "success"
                            }).then(function() {
                                location.reload();
                            });
                        }
                    });
                }
            });
        }
    }
</script>