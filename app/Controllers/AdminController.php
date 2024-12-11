<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\TransporteursStaticModel;
use App\Models\AnnonceModel;

class AdminController extends BaseController
{
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
}
