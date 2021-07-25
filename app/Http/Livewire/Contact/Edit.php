<?php

namespace App\Http\Livewire\Contact;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Livewire\Component;

class Edit extends Component
{
	public $name;
	public $phone;
	public $contactId;
	protected $listeners = [
		'contactEdited' => 'show',
	];

	public function render()
	{
		return view('livewire.contact.edit');
	}

	public function update()
	{
		$this->validate(ContactRequest::rulesStatic());
		$contact = Contact::findOrFail($this->contactId);
		if ($this->contactId) {
			$contact->update([
				'name' => $this->name,
				'phone' => $this->phone,
			]);
			$this->emit('contactUpdated', $contact);
			$this->setEmpty();
		}
	}

	public function show(Contact $contact)
	{
		$this->name = $contact['name'];
		$this->phone = $contact['phone'];
		$this->contactId = $contact['id'];
	}

	public function setEmpty()
	{
		$this->name = null;
		$this->phone = null;
	}
}
