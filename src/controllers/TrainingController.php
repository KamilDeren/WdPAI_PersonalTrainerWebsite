<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Training.php';
require_once __DIR__.'/../repository/TrainingRepository.php';

class TrainingController extends AppController {
    private $message = [];
    private $trainingRepository;

    public function __construct()
    {
        parent::__construct();
        $this->trainingRepository = new TrainingRepository();
    }

    public function trainings()
    {
        $trainings = $this->trainingRepository->getTrainings();
        $this->render('trainings-page', ['trainings' => $trainings]);
    }

    public function addTraining()
    {
        if ($this->isPost()) {
            $training = new Training($_POST['title'], $_POST['level'], $_POST['date'], $_POST['room'], $_POST['run_by']);
            $this->trainingRepository->addTraining($training);

            return $this->render('addtraining-page', ['messages' => $this->message]);
        }
        return $this->render('addtraining-page', ['messages' => $this->message]);
    }

    public function search(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->trainingRepository->getTrainingsByTitleOrRunby($decoded['search']));
        }
    }
}