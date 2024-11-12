<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2023</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
{{-- <script src="assets/demo/chart-area-demo.js"></script> --}}
{{-- <script src="assets/demo/chart-bar-demo.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
{{-- <script src="js/datatables-simple-demo.js"></script> --}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.btn-delete-category').click(function(event) {
        // console.log('hi');
        // event.preventDefault();
        // return confirm('Are you sure to delete?');

        let td = $(this).parents('td');
        let url = td.attr('data-url');
        console.log(url);
        if (confirm('Are you sure to delete')) {

            $.ajax({
                method: 'delete',
                url: url,
                success: function(response) {
                    console.log(response);
                    alert(response.success)
                    console.log($(this).parents('tr'))
                    td.parents('tr').remove()
                    location.reload();
                }
            })

        }

    })

    $('.btn-delete-department').click(function(event) {

        let td = $(this).parents('td');
        let url = td.attr('data-url');
        console.log(url);
        if (confirm('Are you sure to delete')) {

            $.ajax({
                method: 'delete',
                url: url,
                success: function(response) {
                    // console.log(response);
                    alert(response.success)
                    // console.log($(this).parents('tr'))
                    td.parents('tr').remove()
                    location.reload();
                }
            })

        }

    })

    $('.btn-delete-role').click(function(event) {

        let td = $(this).parents('td');
        let url = td.attr('data-url');
        console.log(url);
        if (confirm('Are you sure to delete')) {

            $.ajax({
                method: 'delete',
                url: url,
                success: function(response) {
                    // console.log(response);
                    alert(response.success)
                    // console.log($(this).parents('tr'))
                    td.parents('tr').remove()
                    location.reload();
                }
            })

        }

    })

    $('.btn-delete-team').click(function(event) {

        let td = $(this).parents('td');
        let url = td.attr('data-url');
        console.log(url);
        if (confirm('Are you sure to delete')) {

            $.ajax({
                method: 'delete',
                url: url,
                success: function(response) {
                    // console.log(response);
                    alert(response.success)
                    // console.log($(this).parents('tr'))
                    td.parents('tr').remove()
                    location.reload();
                }
            })

        }

    })

    // $('.btn-forward').click(function(event) {
    //     console.log('hi');
    //     let td = $(this).parents('td');
    //     let url = td.attr('data-url');
    //     console.log(url);
    //     if (confirm('Are you sure to forward')) {

    //         $.ajax({
    //             method: 'get',
    //             url: url,
    //             success: function(response) {
    //                 alert(response.success)
    //             },
    //             error: function(message) {
    //                 console.log(message);
    //             }
    //         })

    //     }
    // })
</script>
</body>

</html>
