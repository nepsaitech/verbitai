import { fetchWithAuth } from "../../api/fetchWithAuth";
import { AuthTokenManager } from "../../api/AuthTokenManager";

const form = document.querySelector('.js-upload-form') as HTMLFormElement;
const funnelUploadWrap = document.querySelector('.funnel-upload') as HTMLElement;
const readyFiles = form?.querySelector('.js-ready-files') as HTMLElement;


/* fileInput?.addEventListener('change', () => {
    const file = fileInput.files ? fileInput.files[0] : null;
    if (file) {
        const fileURL = URL.createObjectURL(file);
        const mediaElement = document.createElement(file.type.startsWith("video/") ? 'video' : 'audio');
        mediaElement.src = fileURL;
        mediaElement.onloadedmetadata = () => {
            if (funnelUploadWrap) {
                fileName.innerText = file.name;
                browseBtn.classList.add('hidden');
            } else {
                readyFiles.innerHTML = file.name;
            }
            URL.revokeObjectURL(fileURL);
        };
        mediaElement.onerror = () => {
            console.log("File could not be loaded. It may be corrupted or in an unsupported format.");
            URL.revokeObjectURL(fileURL);
        };
    } else {
        console.log("No file selected.");
    }
}); */

const urlInput = document.getElementById('url-upload') as HTMLInputElement;
const urlValidateBtn = document.getElementById("url-validate-btn") as HTMLButtonElement;
const urlUploading = document.querySelector('.js-url-uploading') as HTMLElement;
const urlInitial = document.querySelector('.js-url-initial') as HTMLElement;
const urlReady = document.querySelector('.js-url-ready') as HTMLElement;
const urlForm = document.querySelector('.js-url-form') as HTMLFormElement;
const urlReadyFilename = document.querySelector('.js-url-ready-fn') as HTMLElement;
const urlReadyLink = document.querySelector('.js-url-ready-link') as HTMLElement;
const urlTranscribeBtn = document.getElementById('url-transcribe-btn') as HTMLButtonElement;


// Enable/disable the transcribe button based on the URL input
/* urlInput?.addEventListener('input', () => {
    transcribeBtn.disabled = false;
    if (urlInput.value.trim() === '') {
        transcribeBtn.disabled = true;
    }
});
 */
urlInput?.addEventListener('input', () => {
    urlValidateBtn.disabled = urlInput.value.trim() === '';
});

/* urlTranscribeBtn?.addEventListener("click", () => handleTranscription("url")); */
urlValidateBtn?.addEventListener("click", validateURL);

async function validateURL() {
    const url = urlInput.value.trim();
    if (url) await validateURLMedia(url);
    urlUploading.remove();
}

/* urlTranscribeBtn?.addEventListener('click', async () => {  
}); */

// Event listener for the "Ready" button
/* urlTranscribeBtn?.addEventListener('click', async () => {
    const final_url = localStorage.getItem('vb_media_url') || '';
    await uploadToS3(final_url); 
});*/

// Function to check if the URL exists
async function checkURLExist(url: string): Promise<boolean> {
    try {
        const response = await fetch(url, { method: 'HEAD' });
        if (response.status === 403) {
            throw new Error('Access Denied: You do not have permission to view this video.');
        } else if (response.status === 404) {
            throw new Error('Not Found: The video URL does not exist.');
        } else if (!response.ok) {
            throw new Error(`Error: Received status code ${response.status}`);
        }
        return true;
    } catch (error) {
        console.error('Error checking URL existence:', error);
        return false;
    }
}

// Function to get video duration using HTML video element
/* function getVideoDuration(url: string): Promise<number> {
    return new Promise((resolve, reject) => {
        const video = document.createElement('video');
        video.src = url;

        // Event triggered when video metadata (including duration) is loaded
        video.onloadedmetadata = () => {
            const duration = video.duration; // Duration in seconds
            resolve(duration);
        };

        // Handle errors in loading the video
        video.onerror = (e) => {
            reject(new Error('Error loading video metadata'));
        };
    });
} */

// Function to display the uploading state in the UI
function showUploadingStateHTML() {
    urlUploading?.classList.remove('hidden');
    urlUploading?.classList.add('max-md:flex');
    urlInitial?.classList.remove('max-md:flex');
    urlInitial?.classList.add('hidden');
}

// Function to hide the uploading state in the UI
function hideUploadingStateHTML() {
    urlUploading?.classList.add('hidden');
    urlUploading?.classList.remove('max-md:flex');
    urlInitial?.classList.add('max-md:flex');
    urlInitial?.classList.remove('hidden');
}

// Function to display the ready state in the UI
function showReadyStateHTML() {
    urlReady?.classList.remove('hidden');
    urlReady?.classList.add('max-md:block');
    urlInitial?.classList.remove('max-md:flex');
    urlInitial?.classList.add('hidden');
    urlForm?.classList.add('hidden');
    urlReadyFilename.innerText = extractTitleFromUrl(urlInput.value.trim());
    urlReadyLink.innerText = urlInput.value.trim();
}

// Helper function to extract the title from the URL
function extractTitleFromUrl(url: string): string {
    const urlParts = url.split('/');
    const fileName = urlParts[urlParts.length - 1];
    return decodeURIComponent(fileName.split('.').slice(0, -1).join('.')); // Remove file extension
}

// Validate video URL, duration, and availability
let uploadedURL: string | null = null;

async function validateURLMedia(url: string): Promise<void> {
    const resultDiv = document.getElementById('url-result-msg')!;

    resultDiv.innerText = '';
    showUploadingStateHTML();

    await new Promise(resolve => setTimeout(resolve, 2000));

    // Validate file type (only video or audio)
    const mediaRegex = /\.(mp4|webm|ogg|mp3|wav|m4a)$/i;
    if (!mediaRegex.test(url)) {
        resultDiv.innerText = 'Invalid file type. Please upload a valid video or audio file.';
        return handleErrorState();
    }

    const urlExist = await checkURLExist(url);
    if (!urlExist) {
        resultDiv.innerText = 'The video URL is either inaccessible or invalid.';
        return handleErrorState();
    }

    uploadedURL = localStorage.getItem('vb_media_url');
    showReadyStateHTML();
}

// Handle error state and hide uploading state
function handleErrorState(): void {
    hideUploadingStateHTML();
}

let uploadedFile: File | null = null;
const fileInput = document.getElementById('file-upload');
const fileTranscribeBtn = document.getElementById("file-transcribe-btn");

fileInput?.addEventListener("change", (event) => handleFileUpload(event, "file"));
fileTranscribeBtn?.addEventListener("click", () => handleTranscription("file"));

async function handleFileUpload(event: Event, type: string) {
    const fileInput = event.target as HTMLInputElement;
    const fileNameEl = document.querySelector('.js-file-name') as HTMLElement;
    const browseBtn = document.querySelector('.js-browse-btn') as HTMLLabelElement;
    const resultEl = fileInput?.closest('li')?.querySelector('[data-upload="result"]') as HTMLElement;
    const uploadingEl = fileInput?.closest('li')?.querySelector('[data-upload="uploading"]') as HTMLElement;
    const trySampleEl = document.querySelector('.js-try-sample') as HTMLElement;
    

    console.log("fileInput: ", fileInput);
    console.log("resultEl: ", resultEl);

    // Ensure a file is selected
    if (!fileInput.files?.length) {
        console.warn("No file selected for upload.");
        return;
    }

    // Handle file selection
    uploadedFile = fileInput.files[0];
    console.log("Selected file:", uploadedFile.name);
    fileNameEl.textContent = uploadedFile.name;
    browseBtn?.classList.add('hidden');

    // API URL for job creation
    const sampleApi = 'https://self-service-staging.verbit.co/api/v1/job/sample';

    try {
        // Display the uploading state
        uploadingEl?.classList.remove('hidden');
        uploadingEl?.classList.add('max-md:flex');
        trySampleEl?.classList.add('hidden');
        trySampleEl.nextElementSibling?.classList.add('mt-[45px]');

        // Request upload link and job ID from the API
        const response = await fetchWithAuth(sampleApi, 'POST');
        const { upload_link, job_id } = (await response.json()).content;

        // Store the job ID and media name in local storage
        localStorage.setItem("vb_job_id", "1");
        localStorage.setItem("vb_job_link", upload_link);
        localStorage.setItem("vb_media_name", uploadedFile.name);

        // Display the result state
        uploadingEl?.classList.remove('max-md:flex');
        uploadingEl?.classList.add('hidden');
        trySampleEl?.classList.add('hidden');
        trySampleEl.nextElementSibling?.classList.add('hidden');
        resultEl?.classList.remove('hidden');
        resultEl?.classList.add('max-md:block');
    } catch (error) {
        console.error("An error occurred while processing the file upload:", error);
    }
}

async function handleTranscription(type: string) {
    try {
        const upload_link = localStorage.getItem("vb_job_link");
        if (!upload_link) {
            console.error("The upload link is missing.");
            return;
        }

        // Prepare the request body and content type based on the file type
        let body: FormData | string;
        let headers: HeadersInit;

        if (type === "file" && uploadedFile) {

            if (!uploadedFile) return;

            body = new FormData();
            body.append("file", uploadedFile);
            headers = {
                'Content-Type': uploadedFile.type || 'application/octet-stream',
            };

            if (await isFileCorrupt(uploadedFile)) {
                console.warn("The file appears to be corrupt.");
                return;
            }

        } else if (type === "url" && uploadedURL) {

            if (!uploadedURL) return;

            body = JSON.stringify({ file_url: uploadedURL });
            headers = {
                'Content-Type': 'application/json',
            };

        } else {
            return;
        }

        const s3UploadResponse = await fetchWithAuth(upload_link, 'PUT', { body, headers });

        if (s3UploadResponse.status === 200) {
            /* fileTranscribeBtn?.setAttribute("href", "/questions?job_id=" + localStorage.getItem("vb_job_id")); */
            console.log("Transcription completed successfully");
        } else {
            throw new Error("PUT request failed");
        }
    } catch (error) {
        console.error("An error occurred:", error);
    }
}

// Dummy PUT request function to simulate API behavior
async function mockPutRequest(url: string, formData: FormData) {
    console.log(`Simulating PUT request to: ${url}`);
    await new Promise(resolve => setTimeout(resolve, 1000));
    return {
        ok: true,
        json: async () => ({ message: "File uploaded successfully", jobId: 1234 }),
    };
}


// Function to check if the file is corrupt (audio or video)
async function isFileCorrupt(file: File): Promise<boolean> {
    try {
        // For video and audio files, check by attempting to load them into respective HTML elements
        if (file.type.startsWith("video")) {
            const video = document.createElement("video");
            const objectURL = URL.createObjectURL(file);
            
            return new Promise((resolve) => {
                video.onloadeddata = () => resolve(false); // Not corrupt if the data loads
                video.onerror = () => resolve(true); // Corrupt if error occurs while loading
                video.src = objectURL;
            });
        }

        if (file.type.startsWith("audio")) {
            const audio = document.createElement("audio");
            const objectURL = URL.createObjectURL(file);
            
            return new Promise((resolve) => {
                audio.onloadeddata = () => resolve(false); // Not corrupt if the data loads
                audio.onerror = () => resolve(true); // Corrupt if error occurs while loading
                audio.src = objectURL;
            });
        }

        // If the file type is not audio or video, assume it's not supported
        return false;
    } catch (error) {
        console.error("Error during file corruption check:", error);
        return true; // Assume corrupt if an error occurs
    }
}