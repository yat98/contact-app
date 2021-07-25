<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;
use Session;

class Index extends Component
{
	use WithPagination;

	public $isEdited = false;
	public $paginatePage = 5;
	public $search;
	protected $paginationTheme = 'bootstrap';
	protected $listeners = ['contactStored', 'contactUpdated'];
	protected $queryString = ['search'];

	public function mount()
	{
		$this->search = request()->query('search', $this->search);
	}

	public function render()
	{
		$contacts = Contact::latest();
		$contacts = null !== $this->search ? $contacts->where('name', 'like', "%{$this->search}%") : $contacts;
		$contacts = $contacts->paginate($this->paginatePage);

		return view('livewire.contact.index', compact('contacts'));
	}

	public function contactStored($contact)
	{
		Session::flash('message', __("Contact {$contact['name']} was stored!"));
	}

	public function contactUpdated($contact)
	{
		$this->isEdited = false;
		Session::flash('message', __("Contact {$contact['name']} was updated!"));
	}

	public function getContact(Contact $contact)
	{
		$this->isEdited = true;
		$this->emit('contactEdited', $contact);
	}

	public function destroy(Contact $contact)
	{
		Session::flash('message', __("Contact {$contact['name']} was deleted!"));
		$contact->delete();
	}
}
