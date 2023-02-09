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

    public function getTrainings(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT title, level, date, room, name, surname 
            FROM trainings 
            JOIN users ON trainings.run_by = users.id_user
            WHERE date between ? and ?;
        ');
        $stmt->execute([
            date("Y-m-d h:m:s",time()),
            date("Y-m-d h:m:s",time()+604800)
        ]);
        $trainings = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($trainings as $training) {
            $result[] = new Training(
                $training['title'],
                $training['level'],
                $training['date'],
                $training['room'],
                $training['name'].' '.$training['surname']
            );
        }

        return $result;
    }

    public function addTraining(Training $training): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.Trainings(title,level,date,room,run_by,created_at) 
            VALUES (?, ?, ?, ?, ?,?)
        ');

        //TODO you should get this value from logged user session

        $stmt->execute([
            $training->getTitle(),
            $training->getLevel(),
            $training->getDate(),
            $training->getRoom(),
            $training->getRunBy(),
            date("Y-m-d h:m:s",time())
        ]);
    }
}