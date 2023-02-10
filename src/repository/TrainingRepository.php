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
            $training['run_by'],
            $training['id_training']
        );
    }

    public function getTrainings(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT  id_training, 
                    title, 
                    level, 
                    date, 
                    room, 
                    name, 
                    surname 
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
                $training['name'].' '.$training['surname'],
                $training['id_training']
            );
        }

        return $result;
    }

    public function getTrainingsByTitleOrRunby(string $searchString){
        $searchString = '%' . trim(strtolower($searchString)) . '%';

        $stmt = $this->database->connect()->prepare("
            SELECT id_training,
                   title, 
                   level, 
                   date, 
                   room, 
                   CONCAT(name,' ',surname) as run_by
            FROM trainings
            JOIN users ON trainings.run_by = users.id_user
            WHERE LOWER(title) LIKE :search OR LOWER(CONCAT(name,' ',surname)) LIKE :search;
        ");

        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTraining(Training $training): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.Trainings(title,level,date,room,run_by,created_at) 
            VALUES (?, ?, ?, ?, ?,?)
        ');

        $stmt->execute([
            $training->getTitle(),
            $training->getLevel(),
            $training->getDate(),
            $training->getRoom(),
            $training->getRunBy(),
            date("Y-m-d h:m:s",time())
        ]);
    }

    public function signUpToTraining(int $id_selectedTraining){
        session_start();

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.user_trainings(id_user,id_training) 
            VALUES (?, ?)
        ');

        $stmt->execute([
            (int)$_SESSION['id'],
            $id_selectedTraining
        ]);
    }

    public function withdrawFromTraining(int $id_selectedTraining){
        session_start();

        $stmt = $this->database->connect()->prepare('
            DELETE FROM public.user_trainings
            WHERE id_user = ? AND id_training = ?
        ');

        $stmt->execute([
            (int)$_SESSION['id'],
            $id_selectedTraining
        ]);
    }
}