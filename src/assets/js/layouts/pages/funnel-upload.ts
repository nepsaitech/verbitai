import { fetchWithAuth } from "../../api/fetchWithAuth";

const urlInput = document.getElementById('url-upload') as HTMLInputElement;
const urlValidateBtn = document.getElementById("url-validate-btn") as HTMLButtonElement;
const urlUploading = document.querySelector('.js-url-uploading') as HTMLElement;
const urlInitial = document.querySelector('.js-url-initial') as HTMLElement;
const urlReady = document.querySelector('.js-url-ready') as HTMLElement;
const urlForm = document.querySelector('.js-url-form') as HTMLFormElement;
const urlReadyFilename = document.querySelector('.js-url-ready-fn') as HTMLElement;
const urlReadyLink = document.querySelector('.js-url-ready-link') as HTMLElement;
const urlTranscribeBtn = document.getElementById('url-transcribe-btn') as HTMLButtonElement;

urlInput?.addEventListener('input', () => {
    urlValidateBtn.disabled = urlInput.value.trim() === '';
});

urlValidateBtn?.addEventListener("click", validateURL);

let validUrl: string | null = null;

async function validateURL() {
    const url = urlInput.value.trim();
    console.log("Validating URL:", url);
    if (url) await validateURLMedia(url);
    urlUploading.remove();
}

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
    return decodeURIComponent(fileName.split('.').slice(0, -1).join('.'));
}

// Validate video URL, duration, and availability
let uploadedURL: string | null = null;

async function validateURLMedia(url: string): Promise<void> {
    const resultDiv = document.getElementById('url-result-msg')!;

    resultDiv.innerText = '';
    showUploadingStateHTML();

    /* await new Promise(resolve => setTimeout(resolve, 2000));

    const mediaRegex = /\.(mp4|webm|ogg|mp3|wav|m4a)$/i;
    if (!mediaRegex.test(url)) {
        resultDiv.innerText = 'Invalid file type. Please upload a valid video or audio file.';
        return handleErrorState();
    }

    const urlExist = await checkURLExist(url);
    if (!urlExist) {
        resultDiv.innerText = 'The video URL is either inaccessible or invalid.';
        return handleErrorState();
    } */
    /* validUrl = url; */
    try {
        const uploadResponse = await fetchWithAuth(
            "https://self-service-staging.verbit.co/api/v1/job/sample/public-url",
            "POST",
            {
                body: JSON.stringify({ file_url: url }),
                headers: { "Content-Type": "application/json" },
            }
        );

        if (!uploadResponse.ok) {
            console.error("Failed to fetch status:", uploadResponse.status);
            resultDiv.innerText = 'The video URL is either inaccessible or invalid.';
            handleErrorState();
        }

        if (uploadResponse.status === 201) {
            const uploadData = await uploadResponse.json();
            /* if (!uploadData.success) {
                console.error("Failed to upload URL:", uploadData);
                resultDiv.innerText = 'The video URL is either inaccessible or invalid.';
                return handleErrorState();
            } */
        
            const jobId = uploadData.content?.job_id;
            if (!jobId) {
                console.error("Job ID not found in the response.");
                return;
            }
        
            localStorage.setItem('vb_media_url', url);
            localStorage.setItem('vb_job_id', jobId);

            showReadyStateHTML();
        } else {
            console.error("Failed to upload URL here");
            resultDiv.innerText = 'The video URL is either inaccessible or invalid.';
            handleErrorState();
        }
    } catch (error) {
        console.error("Error occurred while uploading the URL:", error);
    }
}

function handleErrorState(): void {
    hideUploadingStateHTML();
}

let uploadedFile: File | null = null;
const fileInput = document.getElementById('file-upload');
const fileTranscribeBtn = document.getElementById("file-transcribe-btn");

fileInput?.addEventListener("change", (event) => handleFileUpload(event, "file"));
let isAssetRegistered = false;
async function handleFileUpload(event: Event, type: string) {
    const fileInput = event.target as HTMLInputElement;
    const fileNameEl = document.querySelector('.js-file-name') as HTMLElement;
    const browseBtn = document.querySelector('.js-browse-btn') as HTMLLabelElement;
    const resultEl = fileInput?.closest('li')?.querySelector('[data-upload="result"]') as HTMLElement;
    const uploadingEl = fileInput?.closest('li')?.querySelector('[data-upload="uploading"]') as HTMLElement;
    const trySampleEl = document.querySelector('.js-try-sample') as HTMLElement;

    // Ensure a file is selected
    if (!fileInput.files?.length) {
        console.warn("No file selected for upload.");
        return;
    }

    // Handle file selection
    uploadedFile = fileInput.files[0];
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

        const { upload_url, job_id, asset_id } = (await response.json()).content;

        if (!upload_url) {
            console.error("No upload URL provided.");
            return;
        }

        const s3UploadResponse = await fetch(
            upload_url, {
                method: "PUT",
                body: uploadedFile,
            }
        );

        if (s3UploadResponse.status === 200) {
            console.log("s3UploadResponse is 200.");
            // fileTranscribeBtn?.setAttribute("href", `/self-service/questions?job_id=${jobId}`);
        } else {
            console.error("File upload failed.");
        }

        const registerAssetApi = 'https://self-service-staging.verbit.co/api/v1/job/sample/register-asset';
        const registerAssetResponse = await fetchWithAuth(
            registerAssetApi,
            "POST",
            {
                body: JSON.stringify({
                    job_id: job_id,
                    asset_ids: [asset_id],
                }),
                headers: { "Content-Type": "application/json" },
            }
        );

        const registerAssetApiData = await registerAssetResponse.json();
        if (registerAssetApiData.status === 201) {
            console.log("registerAssetApiData.status:", registerAssetApiData.status);
            isAssetRegistered = true;
        } else {
            console.error("Failed to register asset:", registerAssetApiData);
        }

        // Store the job ID and media name in local storage
        localStorage.setItem("vb_job_id", job_id);
        localStorage.setItem("vb_job_link", upload_url);
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

urlTranscribeBtn?.addEventListener("click", () => handleTranscription("url"));
fileTranscribeBtn?.addEventListener("click", () => handleTranscription("file"));
async function handleTranscription(type: string) {
    try {
        const upload_link = localStorage.getItem("vb_job_link");
        if (!upload_link) {
            console.error("The upload link is missing.");
            return;
        }

        /* let body: FormData | string;
        let headers: HeadersInit;
 */
        // Handle file upload
        const jobId = localStorage.getItem("vb_job_id");
        if (type === "file" && uploadedFile) {
            await processFileUpload(upload_link, jobId, uploadedFile as File);
        } else if (type === "url") {
            /* await processUrlUpload(validUrl); */
        } else {
            console.warn("Invalid type or missing data.");
            return;
        }
    } catch (error) {
        console.error("An error occurred:", error);
    }
}

async function processFileUpload(uploadLink: string, jobId: string | null, file: File) {
    if (await isFileCorrupt(file)) {
        console.warn("The file appears to be corrupt.");
        return;
    }

    /* const parsedJobId = parseInt(jobId || '0');

    if (isNaN(parsedJobId) || parsedJobId <= 0) {
        console.error('Invalid or missing jobId:', jobId);
        return; // Exit or handle the error gracefully
    }

    try { 
        const transcriptionResponse = await fetchWithAuth(
            "https://self-service-staging.verbit.co/api/v1/job/sample/start-transcription",
            "POST",
            {
                body: JSON.stringify({ job_id: parsedJobId }),
                headers: { "Content-Type": "application/json" },
            }
        );
    
        const transcriptionData = await transcriptionResponse.json();


        console.log('transcriptionData: ', transcriptionData);

        if (transcriptionData.success) {
            urlTranscribeBtn?.setAttribute("href", `/self-service/questions?job_id=${jobId}`);
            console.log("Transcription started successfully:", transcriptionData);
        } else {
            console.error("Failed to start transcription:", transcriptionData);
        }
    } catch (error) {
        console.error("An error occurred while processing the file upload:", error);
    } */

    /* const body = new FormData();
    body.append("file", file);

    const s3UploadResponse = await fetchWithAuth(
        uploadLink, 
        "PUT", 
        { 
            body,
            headers: { "Content-Type": file.type || "application/octet-stream" }
        }
    );

    if (s3UploadResponse.status === 200) {
        fileTranscribeBtn?.setAttribute("href", `/self-service/questions?job_id=${jobId}`);
    } else {
        console.error("File upload failed.");
    } */
}

async function processUrlUpload(uploadedURL: string | null) {

    /* console.log('uploadedURL-->: ', uploadedURL);
    const uploadResponse = await fetchWithAuth(
        "https://self-service-staging.verbit.co/api/v1/job/sample/public-url",
        "POST",
        {
            body: JSON.stringify({ file_url: uploadedURL }),
            headers: { "Content-Type": "application/json" },
        }
    );

    const uploadData = await uploadResponse.json();
    if (!uploadData.success) {
        console.error("Failed to upload URL:", uploadData);
        return;
    }

    const jobId = uploadData.content?.job_id;
    if (!jobId) {
        console.error("Job ID not found in the response.");
        return;
    }

    const transcriptionResponse = await fetchWithAuth(
        "https://self-service-staging.verbit.co/api/v1/job/sample/start-transcription",
        "POST",
        {
            body: JSON.stringify({ job_id: jobId }),
            headers: { "Content-Type": "application/json" },
        }
    );

    const transcriptionData = await transcriptionResponse.json();
    if (transcriptionData.success) {
        urlTranscribeBtn?.setAttribute("href", `/self-service/questions?job_id=${jobId}`);
        console.log("Transcription started successfully:", transcriptionData);
    } else {
        console.error("Failed to start transcription:", transcriptionData);
    } */
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