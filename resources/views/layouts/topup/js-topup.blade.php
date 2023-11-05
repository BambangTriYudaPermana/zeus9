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
                    url: "/topup",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        saldo: saldo
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
        if (Auth::user()) {
            $('#balance').val({{Auth::user()->wallet}});    
        }else{
            $('#balance').val();
        }
        
    }
</script>