<?php

namespace App\Repository;

class ContactRepository {
    public function create(array $data)
    {
        // Logic to create a contact
        // For example, you might want to validate the data and then save it to the database
        // return Contact::create($data);
    }

    public function update(array $data, int $id)
    {
        // Logic to update a contact
        // For example, you might want to find the contact by ID and then update its details
        // $contact = Contact::find($id);
        // $contact->update($data);
    }

    public function delete(int $id)
    {
        // Logic to delete a contact
        // For example, you might want to find the contact by ID and then delete it
        // $contact = Contact::find($id);
        // $contact->delete();
    }
    
    public function getOne(int $id)
    {
        // Logic to get a contact
        // For example, you might want to find the contact by ID and return it
        // return Contact::find($id);
    }

    public function getAll()
    {
        // Logic to get all contacts
        // For example, you might want to return all contacts from the database
        // return Contact::all();
    }
}