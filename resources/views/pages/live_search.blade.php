
    <div class="container">
        <div class="panel panel-default">
        <div class="panel-heading">Pretraži korisnike</div>
            <div class="panel-body">
                <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Pretraži korisnike" />
                </div>
                <div class="table-responsive">
                    <h3 align="center">Broj korisnika: <span id="total_records"></span></h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Prezime</th>
                                <th>Ime</th>
                                <th>Telefon</th>
                            </tr>
                        </thead>
                    <tbody>

                    </tbody>
                    </table>
                </div>
            </div>    
        </div>
    </div>

<script>
    $(document).ready(function(){

        fetch_customer_data();

        function fetch_customer_data(query = ''){
            $.ajax({
                url:"{{ route('live_search.action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
</script>
