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
                        <th>Gambar</th>
                        <th>Aktif</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $data->firstItem() + $loop->index }}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <img src="{{ asset($item->gambar) }}" alt="" width="50">
                            </td>
                            <td>
                                @if ($item->is_active)
                                <x-badge-label color="success" icon="fa fa-check"/>
                                @endif
                            </td>
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
    <x-modal title="{{ $title }}">
        <x-form-input name="nama" label="Nama" />
        <x-form-text-area name="keterangan" label="Keterangan" />
        <x-form-input type="file" name="gambar" label="Gambar" />
        <x-form-checkbox name="is_active" label="Aktif"/>

    </x-modal>

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
