<?php

namespace App\Controller;

use App\Repository\BloodPressureObservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BloodPressureObservationController extends AbstractController
{
    /**
     * @Route("/bloodpressureobservation", methods={"GET"})
     */
    public function index(BloodPressureObservationRepository $bloodPressureObservationRepository): Response
    {
        $bloodPressureObservations = $bloodPressureObservationRepository->findAll();
        return $this->render('blood_pressure_observation/index.html.twig', ['bloodPressureObservations' => $bloodPressureObservations]);
    }
}