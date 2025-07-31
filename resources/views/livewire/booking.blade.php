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
                        <th>User</th>
                        <th>Waktu</th>
                        <th>Jadwal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $data->firstItem() + $loop->index }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                {{ $item->tanggal }} -
                                {{ $item->jam }}
                            </td>
                            <td>
                                {{ $item->jadwal_praktek->poli->nama }} -
                                {{ $item->jadwal_praktek->dokter->nama }} -
                                {{ $item->jadwal_praktek->hari }} -
                                {{ $item->jadwal_praktek->pukul }}
                            </td>
                            <td>{{ $item->status_booking->nama }}</td>
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
        <x-form-select name="user_id" label="Pasien">
            <option value="" selected>-Pilih-</option>
            @foreach ($this->listUser() as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </x-form-select>
        <x-form-input type="date" name="tanggal" label="Tanggal" />
        <x-form-input type="time" name="jam" label="Jam" />
        <x-form-text-area name="keluhan" label="Keluhan" />
        <x-form-select name="jadwal_praktek_id" label="Jadwal">
            <option value="" selected>-Pilih-</option>
            @foreach ($this->listJadwal() as $jadwal)
                <option value="{{ $jadwal->id }}">
                    {{ $jadwal->poli->nama }} -
                    {{ $jadwal->dokter->nama }} -
                    {{ $jadwal->hari }} -
                    {{ $jadwal->pukul }}
                </option>
            @endforeach
        </x-form-select>
        <x-form-select name="status_booking_id" label="Status">
            <option value="" selected>-Pilih-</option>
            @foreach ($this->listStatus() as $status)
                <option value="{{ $status->id }}">{{ $status->nama }}</option>
            @endforeach
        </x-form-select>
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
