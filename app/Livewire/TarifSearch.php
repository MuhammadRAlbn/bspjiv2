<?php

namespace App\Livewire;

use App\Models\Komoditi;
use App\Models\Tarif;
use Illuminate\Support\Collection;
use Livewire\Component;

class TarifSearch extends Component
{
    public Collection $komoditi;
    public ?int $selectedKomoditi = null;
    public Collection $tarifList;
    public bool $hasSearched = false;
    public ?string $selectedKomoditiName = null;

    public function mount(Collection $komoditi): void
    {
        $this->komoditi = $komoditi;
        $this->tarifList = collect();
    }

    public function search(): void
    {
        if (!$this->selectedKomoditi) {
            $this->tarifList = collect();
            $this->hasSearched = false;
            return;
        }

        $this->hasSearched = true;

        $komoditiModel = Komoditi::find($this->selectedKomoditi);
        $this->selectedKomoditiName = $komoditiModel?->nama;

        $this->tarifList = Tarif::active()
            ->where('komoditi_id', $this->selectedKomoditi)
            ->get();
    }

    public function resetSearch(): void
    {
        $this->selectedKomoditi = null;
        $this->hasSearched = false;
        $this->tarifList = collect();
        $this->selectedKomoditiName = null;
    }

    public function render()
    {
        return view('livewire.tarif-search');
    }
}