import { Question, UserAnswers } from '../interfaces';

declare const beforePlatformQuestions: any;
const selectedAnswers: UserAnswers[] = [];
const bpQuestions: Question[] = beforePlatformQuestions.questions;
const bpSlogan: string = beforePlatformQuestions.slogan;
const bpResult: string = beforePlatformQuestions.result;
let bpCurrentIndex = 0;
const bpWrap = document.querySelector(".js-question-wrap") as HTMLElement;
const questionsSubmitted = localStorage.getItem('questionsSubmitted') ?? "false";

function renderBPQuestion(index: number) {

    const question = bpQuestions[index];

    bpWrap.innerHTML = `
    <div class="question-slogan">${bpSlogan}</div>
    <div class="mb-[23px] max-[980px]:text-center" data-id="${question.id}">
        <h2 class="text-primary text-[22px] leading-[30px] font-extrabold mb-[7px] max-[880px]:mb-0">${question.title}</h2>
    </div>
    <ul class="flex flex-col gap-y-2.5 mb-[23px]">
        ${question.answers
        .map((answer, i) => `
        <li class="max-w-[302px] w-full">
        <input type="radio" id="${i}" class="peer hidden" name="question" value="${i}">
        <label for="${i}" class="bg-white relative border border-[#303030] rounded-[8px] block leading-[38px] font-bold w-full py-[7px] pl-[47px] cursor-pointer peer-checked:border-primary option">${answer}</label>
        </li>`
        ).join('')}
    </ul>
    <div class="flex items-center gap-x-[18px]">
        <button class="!border-0 flex-[1_0_auto] bg-primary !text-white leading-[51px] text-center text-[17px] py-[5.5px] px-2 rounded-[56px] font-bold max-w-[142px] w-full js-continue-btn">Continue</button>
        <button class="!border-0 flex-[1_0_auto] bg-transparent !text-[#42424266] leading-[51px] text-center text-[17px] py-[5.5px] px-2 rounded-[56px] max-w-[142px] w-full js-skip-btn">Skip</button>
    </div>
    `; 
    
    const continueBtn = document.querySelector(".js-continue-btn") as HTMLButtonElement;
    const skipBtn = document.querySelector(".js-skip-btn") as HTMLButtonElement;

    continueBtn.addEventListener("click", () => showNextBPQuestion("continue", question.id));
    skipBtn.addEventListener("click", () => showNextBPQuestion("skip", question.id));
}

function showNextBPQuestion(action: string, question_id: number) {
    const selectedOption = bpWrap.querySelector('input[name="question"]:checked') as HTMLInputElement;
    const quizList = bpWrap.querySelector("ul") as HTMLElement;
    let errorMessage = document.querySelector(".error-message");

    if ("continue" === action && !selectedOption) {
        if (!errorMessage) {
            errorMessage = document.createElement("div");
            errorMessage.className ="error-message";
            errorMessage.textContent = "Please select an answer to continue.";
            bpWrap.insertBefore(errorMessage, quizList);
        }
        return;
    }

    if ("skip" != action && selectedOption) {
        const customer_id = parseInt(localStorage.getItem('customer_id') || '0', 10);
        const answer_id = parseInt(selectedOption.value, 10);

        // Find existing user answers
        /* let userAnswers = selectedAnswers.find(entry => entry.customer_id === customer_id);

        if (!userAnswers) {
            // If user does not exist, create a new entry
            userAnswers = { customer_id: customer_id, answers: [] };
            selectedAnswers.push(userAnswers);
        }

        // Push the new answer to the user's answers array
        userAnswers.answers.push({
            question_id: question_id,
            answer_id: answer_id
        }); */
    }

    if (errorMessage) errorMessage.remove();

    if (bpCurrentIndex < bpQuestions.length - 1) {
        bpCurrentIndex++;
        renderBPQuestion(bpCurrentIndex);
    } else {
        finishBPQuestion();
    }
}


function finishBPQuestion() {
    const segment = document.querySelector(".js-pf-segment");
    if (segment) {
        segment.classList.add("items-center", "justify-center", "pl-0");
    }

    bpWrap.innerHTML = bpResult;

    localStorage.setItem("selectedAnswers", JSON.stringify(selectedAnswers));
    localStorage.setItem("questionsSubmitted", "true");
}

if ("true" === questionsSubmitted) {
    finishBPQuestion();
} else {
    renderBPQuestion(bpCurrentIndex);
}