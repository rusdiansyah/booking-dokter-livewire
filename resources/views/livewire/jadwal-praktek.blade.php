<div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">{{ $title }} Table</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-sm btn-primary" wire:click="addPost" data-toggle="modal"
                    data-target="#modalForm">
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
                    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Pencarian ..."
                        class="form-control">
                </div>
            </div>

            <table class="table table-hover text-nowrap table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Poli</th>
                        <th>Dokter</th>
                        <th>Hari</th>
                        <th>Pukul</th>
                        <th>Aktif</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $data->firstItem() + $loop->index }}</td>
                            <td>{{ $item->poli->nama }}</td>
                            <td>{{ $item->dokter->nama }}</td>
                            <td>{{ $item->hari }}</td>
                            <td>{{ $item->pukul }}</td>
                            <td>
                                @if ($item->isActive == 1)
                                    <x-badge-label color="success" icon="fa-check" />
                                @else
                                    <x-badge-label color="warning" icon="fa-times" />
                                @endif
                            </td>
                            <td>
                                <button wire:click="edit({{ $item->id }})" data-toggle="modal"
                                    data-target="#modalForm" class="btn btn-sm btn-success">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button wire:click="cofirmDelete({{ $item->id }})" class="btn btn-sm btn-danger">
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
        <x-form-select name="poli_id" label="Poli">
            <option value="" selected>-Pilih-</option>
            @foreach ($this->listPoli() as $index => $poli)
                <option value="{{ $poli->id }}">{{ $poli->nama }}</option>
            @endforeach
        </x-form-select>
        <x-form-select name="dokter_id" label="Dokter">
            <option value="" selected>-Pilih-</option>
            @foreach ($this->listDokter() as $index => $dokter)
                <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
            @endforeach
        </x-form-select>
        <x-form-select name="hari" label="Hari">
            <option value="" selected>-Pilih-</option>
            @foreach ($this->listHari() as $index => $item)
                <option value="{{ $index }}">{{ $item }}</option>
            @endforeach
        </x-form-select>
        <x-form-input name="pukul" label="Pukul" />
        <x-form-checkbox name="isActive" label="Aktif" />

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
