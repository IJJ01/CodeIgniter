<?php

namespace App\Controllers;

use App\Models\AnnonceModel;
use App\Models\ClientModel;
use App\Models\TransporteursStaticModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class ClientController extends BaseController
{
    protected $annonceModel;
    protected $clientModel;
    protected $transporterModel;
    protected $db;

    public function __construct()
    {
        $this->annonceModel = new AnnonceModel();
        $this->clientModel = new ClientModel();
        $this->transporterModel = new TransporteursStaticModel();

        $this->db = \Config\Database::connect();
    }
    public function createRequest()
    {
        $request = service('request'); // Load the request service

        // Validate the form input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'type_de_marchandise' => 'required',
            'tonnage'             => 'required|numeric',
            'ville_depart'        => 'required',
            'ville_arriver'       => 'required',
            'commentaire'         => 'permit_empty|string',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Redirect back with errors and old input
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Prepare data for insertion
        $data = [
            'type_de_marchandise' => $request->getPost('type_de_marchandise'),
            'tonnage'             => $request->getPost('tonnage'),
            'ville_depart'        => $request->getPost('ville_depart'),
            'ville_arriver'       => $request->getPost('ville_arriver'),
            'date'                => date('Y-m-d H:i:s'), // Current timestamp
            'commentaire'         => $request->getPost('commentaire'),
            'client_id'           => 1, // Placeholder client ID, replace with dynamic value when auth is implemented
            'status'              => 'Pending', // Default status
        ];

        // Insert data into the database
        $annonceModel = new AnnonceModel();
        if ($annonceModel->insert($data)) {
            // Redirect to success page or show success message
            return redirect()->to('/client/manage_requests')->with('success', 'Transport request created successfully!');
        } else {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to create transport request. Please try again.');
        }
    }

    public function manageRequests()
    {

        $clientId = 1; 
        $requests = $this->annonceModel->where('client_id', $clientId)->findAll();

        
        return view('client/manage_requests', ['requests' => $requests]);
    }

    public function requestDetails($id)
    {
        
        $request = $this->annonceModel->find($id);

        if (!$request) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Request not found.');
        }

        
        return view('client/request_details', ['request' => $request]);
    }
    public function deleteRequest($id)
    {
        
        $request = $this->annonceModel->find($id);
        if (!$request) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Request not found.');
        }

        // Delete the request
        $this->annonceModel->delete($id);

        // Redirect to manage_requests
        return redirect()->to('/client/manage_requests')->with('success', 'Request deleted successfully.');
    }
    public function editRequest($id)
    {
        $request = $this->annonceModel->find($id);
        if (!$request) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Request not found.');
        }

        return view('client/edit_request', ['request' => $request]);
    }
    public function updateRequest($id)
    {
        $data = $this->request->getPost();
        $this->annonceModel->update($id, [
            'type_de_marchandise' => $data['type_de_marchandise'],
            'tonnage' => $data['tonnage'],
            'ville_depart' => $data['ville_depart'],
            'ville_arriver' => $data['ville_arriver'],
            'commentaire' => $data['commentaire']
        ]);

        return redirect()->to('/client/manage_requests')->with('success', 'Request updated successfully.');
    }

    public function searchServices()
    {

        return view('client/search_services');
    }

    public function searchResults()
    {
        $criteria = $this->request->getPost();

        $builder = $this->db->table('transporteurs_static');

        if (!empty($criteria['location'])) {
            $builder->where('location', $criteria['location']);
        }
        if (!empty($criteria['capacity_kg'])) {
            $builder->where('capacity_kg >=', $criteria['capacity_kg']);
        }

        $results = $builder->get()->getResultArray();

        return view('client/search_results', ['results' => $results, 'criteria' => $criteria]);
    }

    public function requestPdf($id)
    {
        // Fetch the request by ID
        $request = $this->annonceModel->find($id);
        if (!$request) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Request not found.');
        }
    
        // Generate HTML content for the PDF
        $html = view('client/request_pdf_template', ['request' => $request]);
    
        // Set Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
    
        // Initialize Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait'); // Set paper size and orientation
        $dompdf->render();
    
        // Output the generated PDF
        $dompdf->stream("Request_{$id}.pdf", ["Attachment" => true]);
    }

}
