<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
            </div>
            <div class="modal-body">
                <h2>{{ $modal }}</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="rem-mod btn btn-secondary" data-dismiss="modal">Zatvori</button>
                <button type="button" class="bck-mod test btn btn-danger" data-dismiss="modal">Obriši korisnika</button>
            </div>
        </div>
    </div>
</div>
<!-- Korisnici i search bar -->
<div class="container">
    <div class="panel panel-default">
    <div class="panel-heading">Pretraži korisnike</div>
        <div class="panel-body">
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Pretraži korisnike" />
            </div>
            <div class="table-responsive">
                <h3 align="center">Broj korisnika: <span id="total_records"></span></h3>
                    <table id="users" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Prezime</th>
                                <th>Ime</th>
                                <th>Telefon</th>
                                <th>Rola</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    <button type="submit" id="potvrdi" class="potvrdi-button btn btn-primary">
                        <div class="potvrdi">Potvrdi</div>
                    </button>
                    <button id="ispisi" class="ispisi-button btn btn-primary">
                        <div class="ispisi">Ispiši</div>
                    </button>
            </div>
        </div>    
    </div>
</div>


<script>   
    $(document).ready(function(){
        fetch_user_data();
        function fetch_user_data(query = ''){
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

        $(document).on('click', '.potvrdi-button', function(){
            var id = $(this).data('id');
            var admin_role = $(this).parent().parent().find('td:nth-child(4) .checkbox1:checkbox:checked').length;
            console.log(admin_role);
            var korisnik_role = $(this).parent().parent().find('td:nth-child(4) .checkbox2:checkbox:checked').length;
            console.log(korisnik_role);
            $.ajax({
                url: "{{ route('live_search.postUserRole') }}",
                method: "post",
                data: {
                    id:id,
                    admin_role: admin_role,
                    korisnik_role: korisnik_role,
                    _token:'{{ csrf_token() }}'
                    },
                dataType: 'json',
                success: function(data) {
                    $('.checkbox1').prop('checked', false);
                    $('.checkbox2').prop('checked', false);
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        })

        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_user_data(query);
        });
        
        $('#users').on('click', '.remove-button', function(){
            var id = $(this).data('id');
            $(".test").attr('data-id', id);
            $("#deleteModal").modal("show");
        });

        $(document).on('click', '.bck-mod', function(){
            var id = $(this).data('id');
            $.ajax({
                //url:"{{ route('live_search.destroy') }}",
                url:"/live_search/destroy",
                method:"get",
                data:{id:id},
                dataType:'json',
                success:function(data)
                {
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                },
                error: function(data)
                {
                    console.log(data);
                }
            })
        });
    });
</script>
