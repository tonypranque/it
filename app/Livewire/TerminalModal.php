<?php

namespace App\Livewire;

use Livewire\Component;

class TerminalModal extends Component
{
    public $name = '';
    public $phone = '';
    public $step = 1; // 1 - имя, 2 - телефон
    public $isOpen = false;

    protected $rules = [
        'name' => 'required|min:2|max:255',
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    ];

    public function openModal()
    {
        $this->isOpen = true;
        $this->resetInputFields();
    }

    public function nextStep()
    {
        if ($this->step === 1) {
            $this->validateOnly('name');
            $this->step = 2;
        } else {
            $this->validate();
            // Здесь можно добавить логику для сохранения данных, например:
            // \App\Models\Appointment::create([
            //     'name' => $this->name,
            //     'phone' => $this->phone,
            // ]);
            $this->isOpen = false;
            $this->resetInputFields();
            $this->dispatch('appointment-submitted'); // Замена emit на dispatch
        }
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->phone = '';
        $this->step = 1;
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.terminal-modal');
    }
}
