<script>
    function topup() {
        let amount = $('#topup_saldo').val();

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
        let balance = $('#wallet-user').val();
        $('#wd_balance').val(balance);    
    }

    function withdraw() {
        let amount = $('#wd_balance').val();
        let address_destination = $('#address_destination').val();
        let balance = $('#wallet-user').val();
        let wagger = $('#total-wagger').val();

        if (wagger < 100) {
            let need = (100 - wagger);
            Swal.fire({
                text: "Please play more game, you need more ("+need+" trx) wager to withdraw the funds",
                icon: "warning"
            });
        }else{
            if (amount > balance) {
                Swal.fire({
                    text: "You have exceeded the current limit, please make a withdrawal according to the available balance.",
                    icon: "warning"
                });
            }else{
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
        }
    }
</script>