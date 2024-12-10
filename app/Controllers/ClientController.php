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
        if ($this->request->getMethod() === 'post') {
            
            $type = $this->request->getPost('type');
            $weight = $this->request->getPost('weight');
            $pickup = $this->request->getPost('pickup');
            $dropoff = $this->request->getPost('dropoff');
            $comments = $this->request->getPost('comments');

            
            $date = date('Y-m-d');
            $status = 'Pending';
            $client_id = 1; 

            
            $this->annonceModel->save([
                'type_de_marchandise' => $type,
                'tonnage' => $weight,
                'ville_depart' => $pickup,
                'ville_arriver' => $dropoff,
                'date' => $date,
                'commentaire' => $comments,
                'client_id' => $client_id,
                'status' => $status
            ]);

            return redirect()->to('/client/manage_requests')->with('success', 'Request created successfully.');
        }

        return view('client/create_request');
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
