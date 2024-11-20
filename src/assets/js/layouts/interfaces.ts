export interface Question {
    id: number;
    title: string;
    answers: string[];
}

export interface Answers {
    question_id: number;
    answer_id: number;
}

export interface UserAnswers {
    answers: Answers[];
}