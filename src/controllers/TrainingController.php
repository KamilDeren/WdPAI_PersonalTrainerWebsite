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

    public function addTraining()
    {
        if ($this->isPost()) {
            $training = new Training($_POST['title'], $_POST['level'], $_POST['date'], $_POST['room'], $_POST['run_by']);
            $this->trainingRepository->addTraining($training);

            return $this->render('addtraining', ['messages' => $this->message]);
        }
        return $this->render('addtraining', ['messages' => $this->message]);
    }
}