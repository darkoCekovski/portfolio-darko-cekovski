<?php

//namespace App\Livewire;
//
//use App\Models\Service;
//use Livewire\Component;
//
//class ServiceDetail extends Component
//{
//    public $serviceName;
//
//    public function mount($service)
//    {
//        $this->serviceName = $service;
//    }
//
//    public function render()
//    {
//        $service = Service::where('name', $this->serviceName)->firstOrFail();
//        return view('livewire.pages.service-detail', compact('service'))
//            ->layout('layouts.app', ['title' => $service->translated_title]);
//    }
//}
