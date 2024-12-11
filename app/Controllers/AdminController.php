<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\TransporteursStaticModel;
use App\Models\AnnonceModel;

class AdminController extends BaseController
{
    public function dashboard()
    {
        // Load models
        $clientModel = new ClientModel();
        $transporterModel = new TransporteursStaticModel();
        $annonceModel = new AnnonceModel();

        // Fetch statistics
        $totalClients = $clientModel->countAll();
        $totalTransporters = $transporterModel->countAll();
        $totalRequests = $annonceModel->countAll();
        $requestStatuses = $annonceModel->select('status, COUNT(*) as count')
                                        ->groupBy('status')
                                        ->findAll();

        // Pass data to the view
        $data = [
            'totalClients' => $totalClients,
            'totalTransporters' => $totalTransporters,
            'totalRequests' => $totalRequests,
            'requestStatuses' => $requestStatuses
        ];

        return view('admin/dashboard', $data);
    }
}
