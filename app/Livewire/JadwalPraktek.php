<?php

namespace App\Livewire;

use App\Models\Dokter;
use App\Models\JadwalPraktek as ModelsJadwalPraktek;
use App\Models\Poli;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class JadwalPraktek extends Component
{
    use WithPagination;
    #[Title('Jadwal Praktek')]
    public $title = 'Jadwal Praktek';
    public $id, $dokter_id, $poli_id, $hari, $pukul,$isActive;
    public $postAdd = false;
    public $isStatus;
    public $paginate = 10;
    public $search;
    public function mount()
    {
        $this->title;
        $this->isStatus = 'create';
    }
    #[Computed()]
    public function listPoli()
    {
        return Poli::orderBy('nama')->get();
    }
    #[Computed()]
    public function listDokter()
    {
        return Dokter::orderBy('nama')->get();
    }
    #[Computed()]
    public function listHari()
    {
        return [
            'Senin' => 'Senin',
            'Selasa' => 'Selasa',
            'Rabu' => 'Rabu',
            'Kamis' => 'Kamis',
            'Jumat' => 'Jumat',
            'Sabtu' => 'Sabtu',
            'Minggu' => 'Minggu',
        ];
    }
    public function render()
    {
        $data = ModelsJadwalPraktek::whereHas('poli',function($q){
            return $q->where('nama', 'like', '%' . $this->search . '%');
        })
        ->whereHas('dokter', function ($q) {
            return $q->where('nama', 'like', '%' . $this->search . '%');
        })
        ->with('dokter','poli')
            ->paginate($this->paginate);
        return view('livewire.jadwal-praktek',compact('data'));
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function blankForm()
    {
        $this->id = '';
        $this->poli_id = '';
        $this->dokter_id = '';
        $this->hari = '';
        $this->pukul = '';
        $this->isActive = (bool) false;
    }
    public function addPost()
    {
        $this->postAdd = true;
        $this->isStatus = 'create';
        $this->blankForm();
    }
    public function close()
    {
        $this->postAdd = false;
    }
    public function edit($id)
    {
        $this->isStatus = 'edit';
        $data = ModelsJadwalPraktek::find($id);
        $this->id = $data->id;
        $this->poli_id = $data->poli_id;
        $this->dokter_id = $data->dokter_id;
        $this->hari = $data->hari;
        $this->pukul = $data->pukul;
        $this->isActive = (bool) $data->isActive;
    }
    public function save()
    {
        // dd($this->all());
        $this->validate([
            'poli_id' => 'required',
            'dokter_id' => 'required',
            'hari' => 'required',
            'pukul' => 'required',
        ]);
        ModelsJadwalPraktek::updateOrCreate(['id' => $this->id], [
            'poli_id' => $this->poli_id,
            'dokter_id' => $this->dokter_id,
            'hari' => $this->hari,
            'pukul' => $this->pukul,
            'isActive' => $this->isActive,
        ]);
        if ($this->isStatus == 'create') {
            $this->dispatch('swal', [
                'title' => 'Success!',
                'text' => 'Data berhasil disimpan',
                'icon' => 'success',
            ]);
        } else {
            $this->dispatch('swal', [
                'title' => 'Success!',
                'text' => 'Data berhasil diedit',
                'icon' => 'success',
            ]);
        }
        $this->dispatch('close-modal');
    }
    public function cofirmDelete($id)
    {
        $this->dispatch('confirm', id: $id);
    }
    #[On('delete')]
    public function delete($id)
    {
        ModelsJadwalPraktek::find($id)->delete();
        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Data berhasil dihapus',
            'icon' => 'success',
        ]);
    }
}
