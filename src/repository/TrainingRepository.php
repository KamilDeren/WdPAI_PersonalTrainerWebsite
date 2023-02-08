<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Training.php';

class TrainingRepository extends Repository
{

    public function getTraining(int $id): Training
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM Trainings WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $training = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($training == false) {
            throw new Exception('Training doesn\'t exist');
        }

        return new Training(
            $training['title'],
            $training['level'],
            $training['date'],
            $training['room'],
            $training['run_by']
        );
    }

    public function addTraining(Training $training): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.Trainings(title,level,date,room,run_by) 
            VALUES (?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session

        $stmt->execute([
            $training->getTitle(),
            $training->getLevel(),
            $training->getDate(),
            $training->getRoom(),
            $training->getRunBy()
        ]);
    }
}