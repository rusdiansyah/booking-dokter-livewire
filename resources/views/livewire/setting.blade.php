<div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <form wire:submit.prevent="save">
            <div class="card-body">

                <x-form-input  name="nama_aplikasi" type="text" label="Nama Aplikasi"  />
                <x-form-input  name="nama_perusahaan" type="text" label="Nama Perusahaan"  />
                <x-form-input  name="copyright" type="text" label="Copyright"  />
                <x-form-text-area name="alamat" type="text" label="Alamat"  />

            </div>

            <div class="card-footer text-center">
                <x-layouts.button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </x-layouts.button>
            </div>
        </form>
    </div>
</div>
@script
    <script>
        document.addEventListener("swal", event => {
            Swal.fire({
                icon: event.detail[0].icon,
                title: event.detail[0].title,
                text: event.detail[0].text,
            });
        });
    </script>
@endscript
