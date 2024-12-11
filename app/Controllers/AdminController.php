<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\TransporteursStaticModel;
use App\Models\AnnonceModel;

class AdminController extends BaseController
{

    protected $annonceModel;
    protected $clientModel;
    protected $transporterModel;
    protected $db;
    public function __construct()
    {
        $this->clientModel = new ClientModel();
        $this->transporterModel = new TransporteursStaticModel();

        $this->db = \Config\Database::connect();
    }
    public function dashboard()
    {
        $clientModel = new ClientModel();
        $transporterModel = new TransporteursStaticModel();
        $annonceModel = new AnnonceModel();

        // Fetch age ranges for clients
        $clientAges = $clientModel->select("CASE 
            WHEN age BETWEEN 20 AND 30 THEN '20-30'
            WHEN age BETWEEN 31 AND 40 THEN '31-40'
            WHEN age BETWEEN 41 AND 50 THEN '41-50'
            ELSE '51+' END as age_range, COUNT(*) as count")
            ->groupBy('age_range')
            ->findAll();

        // Fetch transporter cities
        $transporterCities = $transporterModel->select('location as city, COUNT(*) as count')
            ->groupBy('city')
            ->findAll();

        // Fetch tonnage categories for requests
        $tonnageData = $annonceModel->select("CASE 
            WHEN tonnage BETWEEN 0 AND 500 THEN '0-500kg'
            WHEN tonnage BETWEEN 501 AND 1000 THEN '501-1000kg'
            WHEN tonnage BETWEEN 1001 AND 2000 THEN '1001-2000kg'
            ELSE '2000kg+' END as tonnage_range, COUNT(*) as count")
            ->groupBy('tonnage_range')
            ->findAll();

        $data = [
            'clientAges' => $clientAges,
            'transporterCities' => $transporterCities,
            'tonnageData' => $tonnageData,
        ];

        return view('admin/dashboard', $data);
    }
    public function manageClients()
{
    $clientModel = new \App\Models\ClientModel();

    // Fetch all clients from the database
    $clients = $clientModel->findAll();

    // Pass the clients data to the view
    return view('admin/manage_clients', ['clients' => $clients]);
}
public function addClient()
{
    if ($this->request->getMethod() === 'post') {
        // Validate the input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nom'     => 'required|min_length[2]|max_length[50]',
            'prenom'  => 'required|min_length[2]|max_length[50]',
            'age'     => 'required|integer|greater_than[0]',
            'ville'   => 'required|min_length[2]|max_length[50]',
            'numero_telephone' => 'required|numeric|exact_length[10]', // Assuming phone number is 10 digits
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Return errors and redirect back with input
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Insert data into the database
        $clientModel = new \App\Models\ClientModel();
        $compteModel = new \App\Models\CompteModel();

        // Create the client account first
        $compteId = $compteModel->insert([
            'numero_telephone' => $this->request->getPost('numero_telephone'),
            'mot_de_passe' => password_hash('default_password', PASSWORD_BCRYPT),
        ]);

       
        $clientModel->insert([
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'age' => $this->request->getPost('age'),
            'ville' => $this->request->getPost('ville'),
            'compte_id' => $compteId,
        ]);

        return redirect()->to('/admin/manage_clients')->with('success', 'Client added successfully!');
    }

    return view('admin/add_client');

}
public function editClient($id)
{
    $client = $this->clientModel->find($id); // Retrieve the client by ID

    if (!$client) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Client not found.');
    }

    return view('admin/edit_client', ['client' => $client]); // Pass client data to the view
}


public function updateClient($id)
{
    $data = $this->request->getPost(); // Get data from the form

    $this->clientModel->update($id, [
        'nom' => $data['nom'],
        'prenom' => $data['prenom'],
        'age' => $data['age'],
        'ville' => $data['ville']
    ]);

    return redirect()->to('/admin/manage_clients')->with('success', 'Client updated successfully.');
}
public function deleteClient($id)
{
    // Check if the client exists
    $client = $this->clientModel->find($id);

    if (!$client) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Client not found.');
    }

    // Delete the client
    $this->clientModel->delete($id);

    // Redirect to manage clients with success message
    return redirect()->to('/admin/manage_clients')->with('success', 'Client deleted successfully.');
}



}