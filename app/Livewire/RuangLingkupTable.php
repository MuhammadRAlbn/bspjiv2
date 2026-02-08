<?php

namespace App\Livewire;

use App\Models\Laboratorium;
use App\Models\RuangLingkup;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class RuangLingkupTable extends Component
{
    public Collection $laboratorium;
    public ?int $selectedLab = null;
    public Collection $ruangLingkup;
    public bool $hasSearched = false;

    public function mount(Collection $laboratorium): void
    {
        $this->laboratorium = $laboratorium;
        $this->loadAllData();
    }

    public function loadAllData(): void
    {
        $this->ruangLingkup = RuangLingkup::active()
            ->with('laboratorium')
            ->get();
    }

    public function search(): void
    {
        $this->hasSearched = true;

        $query = RuangLingkup::active()->with('laboratorium');

        if ($this->selectedLab) {
            $query->where('laboratorium_id', $this->selectedLab);
        }

        $this->ruangLingkup = $query->get();
    }

    public function resetFilter(): void
    {
        $this->selectedLab = null;
        $this->hasSearched = false;
        $this->loadAllData();
    }

    public function render()
    {
        return view('livewire.ruang-lingkup-table');
    }
}