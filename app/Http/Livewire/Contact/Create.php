<?php

namespace App\Http\Livewire\Contact;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Livewire\Component;

class Create extends Component
{
	public $name;
	public $phone;

	public function render()
	{
		return view('livewire.contact.create');
	}

	public function store()
	{
		$this->validate(ContactRequest::rulesStatic());
		$contact = Contact::create([
			'name' => $this->name,
			'phone' => $this->phone,
		]);
		$this->emit('contactStored', $contact);
		$this->setEmpty();
	}

	public function setEmpty()
	{
		$this->name = null;
		$this->phone = null;
	}
}
