import { Question, UserAnswers } from '../interfaces';

declare const duringSampleQuestions: any;
declare const completeSegmentLogoUrl: string;
declare const completeSegmentLogoAlt: string;
const selectedAnswers: UserAnswers[] = [];
const dsQuestions: Question[] = duringSampleQuestions.questions;
const dsSlogan: string = duringSampleQuestions.slogan;
const dsResult: string = duringSampleQuestions.result;
const dsTranscripting: string = duringSampleQuestions.transcripting;
const dsSampleReady: string = duringSampleQuestions.sample_ready;
let dsCurrentIndex = 0;
const dsWrap = document.querySelector(".js-question-wrap") as HTMLElement;
const questionsSubmitted = localStorage.getItem('questionsSubmitted') ?? "false";
const transcriptWrap = document.querySelector(".js-transcription-wrap") as HTMLElement;

function renderDSQuestion(index: number) {

    const question = dsQuestions[index];

    dsWrap.innerHTML = `
    <div class="leading-[23px] text-[#041D3488] -tracking-[0.17px] mb-12 max-[880px]:text-center max-[880px]:mb-6">${dsSlogan}</div>
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

    continueBtn.addEventListener("click", () => showNextDSQuestion("continue", question.id));
    skipBtn.addEventListener("click", () => showNextDSQuestion("skip", question.id));
}

// Initialize the answer array if not already present in localStorage
let answerData = JSON.parse(localStorage.getItem('answerData') || '{}') || {
    customer_token: localStorage.getItem('customer_token'),
    answers: []
};

function showNextDSQuestion(action: string, question_id: number) {
    const selectedOption = dsWrap.querySelector('input[name="question"]:checked') as HTMLInputElement;
    const quizList = dsWrap.querySelector("ul") as HTMLElement;
    let errorMessage = document.querySelector(".error-message");

    if ("continue" === action && !selectedOption) {
        if (!errorMessage) {
            errorMessage = document.createElement("div");
            errorMessage.className ="error-message";
            errorMessage.textContent = "Please select an answer to continue.";
            dsWrap.insertBefore(errorMessage, quizList);
        }
        return;
    }

    if ("skip" != action && selectedOption) {

        const customer_token = localStorage.getItem('customer_token');
        const answer_id = parseInt(selectedOption.value, 10);
        
        // Ensure `answerData.answers` is defined as an array
        if (!Array.isArray(answerData.answers)) {
            answerData.answers = [];
        }

        if (customer_token) {
            answerData.answers.push({
                question_id: question_id,
                answer_id: answer_id
            });
        }
        console.log('Answer data:', answerData);

        // Store the updated answerData in localStorage
        /* localStorage.setItem('answerData', JSON.stringify(answerData));

        // When ready to submit the accumulated answers
        if (customer_token) {
            console.log('Answer data to submit:', answerData);
            fetch('http://localhost:3000/wp-json/questions/v1/submit-answers', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(answerData)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Answer submitted successfully:', data);
                // Clear answer data from localStorage after successful submission
                localStorage.removeItem('answerData');
            })
            .catch(error => {
                console.error('Error submitting answer:', error);
            });
        } */
    }

    if (errorMessage) errorMessage.remove();

    if (dsCurrentIndex < dsQuestions.length - 1) {
        dsCurrentIndex++;
        renderDSQuestion(dsCurrentIndex);
    } else {
        finishDSQuestion();
    }
}

function finishDSQuestion() {
    const segment = document.querySelector(".js-segment");
    if (segment) {
        segment.classList.remove("bg-[#F6F6FF]");
        segment.classList.add("bg-primary", "items-center");
    }

    dsWrap.innerHTML = dsResult;

    // Initialize the answer array if not already present in localStorage
    const answerData = JSON.parse(localStorage.getItem('answerData') || '{}') || {
        customer_token: localStorage.getItem('customer_token'),
        answers: []
    };

    localStorage.setItem('answerData', JSON.stringify(answerData));
    /* localStorage.setItem("selectedAnswers", JSON.stringify(selectedAnswers)); */
    localStorage.setItem("questionsSubmitted", "true");

    const questionsSubmitted = localStorage.getItem('questionsSubmitted');
    if ("true" === questionsSubmitted) {
        const logo = document.getElementById('site-logo') as HTMLImageElement;
        if (logo) {
            logo.src = completeSegmentLogoUrl; 
            logo.alt = completeSegmentLogoAlt;
        }
    }
}

if ("true" === questionsSubmitted) {
    finishDSQuestion();
} else {
    renderDSQuestion(dsCurrentIndex);
}

/* function transcriptProcessHTML() {
    const sampleReady = localStorage.getItem('jobStatus');

    if ("completed" === sampleReady) {
        transcriptWrap.innerHTML = dsSampleReady;
    } else {
        transcriptWrap.innerHTML = dsTranscripting;

        setTimeout(() => {
            transcriptWrap.innerHTML = dsSampleReady;
            localStorage.setItem("jobStatus", "completed");
        }, 2000);

        // Send AJAX request to notify WordPress to send an email
        fetch(`${window.location.origin}/wp-admin/admin-ajax.php?action=send_sample_ready_email`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            credentials: 'same-origin',
            body: JSON.stringify({
                email: 'enadnep@gmail.com'
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log("Email sent successfully.");
            } else {
                console.error("Failed to send email:", data.message);
            }
        })
        .catch(error => console.error("Error:", error));
    }
} 

document.addEventListener('DOMContentLoaded', async () => {
    transcriptProcessHTML();
}); */


// Send AJAX request to notify WordPress to send an email
function sendSampleReadyEmail() {
    fetch(`${window.location.origin}/wp-admin/admin-ajax.php?action=send_sample_ready_email`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        credentials: 'same-origin',
        body: JSON.stringify({
            email: 'enadnep@gmail.com'
        }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log("Email sent successfully.");
            } else {
                console.error("Failed to send email:", data.message);
            }
        })
        .catch(error => console.error("Error:", error));
}

// Dummy Mock Test for file status (for testing when the real API is not available)
const mockStatusResponse = {
    content: {
        status: "in-progress", // Change this to "in-process" to simulate different scenarios
    },
};

// Simulate a delay like an actual API call
const simulateStatusCheck = async () => {
    return new Promise<any>((resolve) => {
        setTimeout(() => {
            console.log("Mocked Job Status:", mockStatusResponse.content.status);
            resolve(mockStatusResponse);
        }, 1000); // Simulate a 2-second delay for the API response
    });
};

// Polling to check upload status
import { fetchWithAuth } from '../../api/fetchWithAuth';

window.onload = async () => {
    const jobID = localStorage.getItem("vb_job_id");
    const transcriptWrap = document.querySelector(".js-transcription-wrap") as HTMLElement;

    const mediaName = localStorage.getItem("vb_media_name");

    const updateMediaName = () => {
        const mediaNameEl = document.getElementById("media-filename");
        if (mediaName && mediaNameEl) {
            mediaNameEl.textContent = mediaName;
        }
    };

    const checkStatus = async () => {
        /* const jobApi = `https://self-service-staging.verbit.co/api/v1/job/check?job_id=${jobID}`;
        const jobResponse = await fetchWithAuth(jobApi);

        if (!jobResponse.ok) {
            console.error("Failed to fetch status:", jobResponse.status);
            return;
        }

        const jobData = await jobResponse.json(); */
        
        const isCompleted = localStorage.getItem("vb_job_completed");
        if (isCompleted === "true") {
            console.log("Processing already completed. Skipping polling.");
            transcriptWrap.innerHTML = dsSampleReady;
            return;
        }

        const statusResponse = await simulateStatusCheck();
        const { status } = statusResponse.content;
        
        // Log to verify polling interval
        console.log("Job Status:", status);
        console.log("Polling... Next check in 5 seconds");

        if (status === "complete") {
            console.log("File processing complete!");
            transcriptWrap.innerHTML = dsSampleReady;
            updateMediaName();
            /* sendSampleReadyEmail(); */
            localStorage.setItem("vb_job_completed", "true");
            clearInterval(statusInterval);
        } else if (status === "in-progress") {
            transcriptWrap.innerHTML = dsTranscripting;
            updateMediaName();
            console.log("File is still being processed...");
        }
    };

    updateMediaName();

    // Start polling every 3 seconds
    const statusInterval = setInterval(checkStatus, 3000);

    // Change status to "complete" after 8 seconds for testing
    setTimeout(() => {
        mockStatusResponse.content.status = "complete";
    }, 10000);
}