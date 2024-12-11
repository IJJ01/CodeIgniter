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
    public function createRequestView(){
        return view('client/create_request');
    }
    public function createRequest()
{
        // Handle form submission
        $data = [
            'type_de_marchandise' => $this->request->getPost('type_de_marchandise'),
            'tonnage'             => $this->request->getPost('tonnage'),
            'ville_depart'        => $this->request->getPost('ville_depart'),
            'ville_arriver'       => $this->request->getPost('ville_arriver'),
            'date'                => date('Y-m-d H:i:s'),
            'commentaire'         => $this->request->getPost('commentaire'),
            'client_id'           => 1, // Replace with dynamic ID later
            'status'              => 'Pending',
        ];

        $annonceModel = new \App\Models\AnnonceModel();
        if ($annonceModel->insert($data)) {
            return redirect()->to('/client/manage_requests');
        } else {
            return redirect()->back();
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

        
        $this->annonceModel->delete($id);

        
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
        
        $request = $this->annonceModel->find($id);
        if (!$request) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Request not found.');
        }
    
        
        $html = view('client/request_pdf_template', ['request' => $request]);
    
        
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
    
        
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait'); 
        $dompdf->render();
    
        // Output the generated PDF
        $dompdf->stream("Request_{$id}.pdf", ["Attachment" => true]);
    }

}
