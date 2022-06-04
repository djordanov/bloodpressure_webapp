<?php

namespace App\Controller;

use App\Entity\BloodPressureObservation;
use App\Repository\BloodPressureObservationRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BloodPressureObservationController extends AbstractController
{
    /**
     * @Route("/api/bloodpressureobservation/{id}", methods={"GET"})
     */
    public function get(int $id, BloodPressureObservationRepository $bloodPressureObservationRepository): Response
    {

        // return new JsonResponse(1);
        return new JsonResponse([$bloodPressureObservationRepository->find($id)->toJson()]);
    }

    /**
     * @Route("/api/bloodpressureobservation", methods={"GET"})
     */
    public function getAll(BloodPressureObservationRepository $bloodPressureObservationRepository): Response
    {
        return new JsonResponse([$bloodPressureObservationRepository->findAll()]);
    }

        /**
     * @Route("/api/bloodpressureobservation", methods={"POST"})
     */
    public function add(Request $request, BloodPressureObservationRepository $bloodPressureObservationRepository): Response
    {
        $bloodPressureObservation = new BloodPressureObservation(
            $request->request->get('systolic'),
            $request->request->get('diastolic'),
            $request->request->get('pulse'),
            $request->request->get('comment')
        );
        try {
            $bloodPressureObservationRepository->persist($bloodPressureObservation);
            $bloodPressureObservationRepository->flush();
        } catch(Exception $e) {
            throw $e; // TODO
        }
        return $this->redirectToRoute('/'); // TODO
    }
}