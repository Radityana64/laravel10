<a href="{{ route('spot.edit', $model) }}" class="btn btn-warning btn-sm">Edit</a>
<button href="{{ route('spot.destroy', $model) }}" class="btn btn-danger btn-sm" id="delete">Delete</button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('#delete').on('click', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        Swal.fire({
            title: 'kamu yakin',
            text: "Data telah terhapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {

                document.getElementById('deleteForm').action = href
                document.getElementById('deleteForm').submit()
                
                Swal.fire(
                    'Deleted!',
                    'Data Terhapus.',
                    'sukses'
                )
            }
        })
    })
</script>