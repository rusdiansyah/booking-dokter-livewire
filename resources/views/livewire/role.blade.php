<div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">{{$title}} Table</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-sm btn-primary" wire:click="addPost" data-toggle="modal" data-target="#modalForm">
                    <i class="fas fa-plus"></i>
                    Tambah
                </button>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <div class="m-2 d-flex justify-content-between">
                <div class="col-1">
                    <select wire:model.live="paginate" class="form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="col-6">
                    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Pencarian ..." class="form-control">
                </div>
            </div>

            <table class="table table-hover text-nowrap table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $data->firstItem() + $loop->index }}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <button wire:click="edit({{ $item->id }})"
                                    data-toggle="modal" data-target="#modalForm"
                                    class="btn btn-sm btn-success">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button wire:click="cofirmDelete({{ $item->id }})"
                                    class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            {{ $data->links() }}
        </div>


    </div>

    {{-- modal --}}
    <div wire:ignore.self class="modal fade" id="modalForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form {{ $isStatus }} Modal</h4>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="save">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" wire:model="nama"
                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                placeholder="Nama Aplikasi">
                            @error('nama')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"
                            wire:click="close">Close</button>
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>
@script
    <script>
        $wire.on('close-modal', () => {
            $(".btn-close").trigger("click");
        });

        $wire.on("confirm", (event) => {
            Swal.fire({
                title: "Yakin dihapus?",
                text: "Anda tidak dapat mengembalikannya!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $wire.dispatch("delete", {
                        id: event.id
                    });
                }
            });
        });
    </script>
@endscript
