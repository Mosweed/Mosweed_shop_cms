@script
    <script>
        window.addEventListener('swal_save', function(e) {
            //         Swal.fire({
            //             toast: true,
            //   position: "top-end",
            //   showConfirmButton: false,
            //   timer: 3000,
            //   timerProgressBar: true,
            //   didOpen: (toast) => {
            //     toast.onmouseenter = Swal.stopTimer;
            //     toast.onmouseleave = Swal.resumeTimer;
            //   }

            //         });

            //         Toast.fire({
            //   icon: "success",
            //   title: "Signed in successfully"
            // });



            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "success",
                title: "Data saved successfully",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: "black",
                color: 'red',

            });



        });

        window.addEventListener('swal_confirm_delete', function(e) {
            console.log(e.detail[0]['name']);
            Swal.fire({

               
                title: "Are you sure?",
                text: "You won't be able to revert this! " + e.detail[0]['name']+"",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                   Livewire.dispatch('deleteCustomer',{id:e.detail[0]['id']});
                    // Swal.fire(
                    //     "Deleted!",
                    //     "Your file has been deleted.",
                    //     "success"
                    // );
                }
            });
        });
    </script>
@endscript
