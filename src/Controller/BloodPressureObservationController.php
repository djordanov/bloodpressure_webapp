<?php

namespace App\Controller;

use App\Entity\BloodPressureObservation;
use App\Repository\BloodPressureObservationRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/bloodpressureobservation", methods={"POST"})
     */
    public function add(Request $request, BloodPressureObservationRepository $bloodPressureObservationRepository): Response
    {
        $observationTime = new DateTime($request->request->get('date') . ' ' . $request->request->get('time'));

        $bloodPressureObservation = new BloodPressureObservation();
        $bloodPressureObservation
            ->setObservationTime($observationTime)
            ->setSystolic($request->request->get('systolic'))
            ->setDiastolic($request->request->get('diastolic'))
            ->setPulse($request->request->get('pulse'))
            ->setComment($request->request->get('comment'));

        $bloodPressureObservationRepository->add($bloodPressureObservation, true);
        
        return new RedirectResponse('/bloodpressureobservation');
    }
    
    /**
     * @Route("/bloodpressureobservation/{id}", methods={"DELETE"})
     */
    public function delete(int $id, BloodPressureObservationRepository $bloodPressureObservationRepository): Response
    {
        $bloodPressureObservation = $bloodPressureObservationRepository->find($id);
        $bloodPressureObservationRepository->remove($bloodPressureObservation, true);
        return new Response('');
    }
}