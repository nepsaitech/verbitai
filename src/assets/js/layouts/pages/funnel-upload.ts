const funnelUploadWrap = document.querySelector('.funnel-upload') as HTMLElement;
const uploadWrap = document.querySelector('.before-platform-upload') as HTMLElement;
const form = document.querySelector('.js-upload-form') as HTMLFormElement;
const fileInput = form?.querySelector('.js-file-upload') as HTMLInputElement;
const readyFiles = form?.querySelector('.js-ready-files') as HTMLElement;
const fileName = form?.querySelector('.js-file-name') as HTMLElement;
const browseBtn = form?.querySelector('.js-browse-btn') as HTMLLabelElement;

fileInput?.addEventListener('change', () => {
    const file = fileInput.files ? fileInput.files[0] : null;
    if (file) {
        const fileURL = URL.createObjectURL(file);
        const mediaElement = document.createElement(file.type.startsWith("video/") ? 'video' : 'audio');
        mediaElement.src = fileURL; 
        mediaElement.onloadedmetadata = () => {
            /* const duration = mediaElement.duration; */
            // Check the duration (e.g., max 5 minutes)
            /* if (duration > 300) {  // Example limit of 5 minutes
                console.log("File is too long. Maximum allowed duration is 5 minutes.");
            } else { */
                    if (funnelUploadWrap) {
                        fileName.innerText = file.name;
                        browseBtn.classList.add('hidden');
                        console.log("File selected:", file.name);
                    } else {
                        readyFiles.innerHTML = file.name;
                    }

            /* } */
            URL.revokeObjectURL(fileURL);
        };
        mediaElement.onerror = () => {
            console.log("File could not be loaded. It may be corrupted or in an unsupported format.");
            URL.revokeObjectURL(fileURL);
        };
    } else {
        console.log("No file selected.");
    }
});


/* const urlInput = document.querySelector('.js-url-upload') as HTMLInputElement;
async function validateMedia(url: string): Promise<string> {
    // Step 1: Check if URL is a valid media file (basic regex for video/audio extensions)
    const mediaRegex = /\.(mp4|webm|ogg|mp3|wav|m4a)$/i;
    if (!mediaRegex.test(url)) {
        return 'The URL does not point to a valid video or audio file.';
    }

    // Step 2: Check if URL exists
    const exists = await checkIfUrlExists(url);
    if (!exists) {
        return 'The media URL does not exist or is unreachable.';
    }

    // Step 3: Check if URL is corrupt
    const isValidMedia = await validateMediaIntegrity(url);
    if (!isValidMedia) {
        return 'The media file is corrupt or cannot be loaded.';
    }

    return 'The media file is valid and accessible.';
}

async function checkIfUrlExists(url: string): Promise<boolean> {
    try {
        const response = await fetch(url, { method: 'HEAD' });
        return response.ok;
    } catch (error) {
        console.error('Error checking URL existence:', error);
        return false;
    }
}

async function validateMediaIntegrity(url: string): Promise<boolean> {
    return new Promise((resolve) => {
        // Create a hidden video/audio element
        const mediaElement = document.createElement('video'); // Change to 'audio' if needed
        mediaElement.src = url;
        mediaElement.style.display = 'none';
        document.body.appendChild(mediaElement);

        mediaElement.oncanplaythrough = () => {
            resolve(true); // Media is valid
            mediaElement.remove();
        };

        mediaElement.onerror = () => {
            resolve(false); // Media is corrupt
            mediaElement.remove();
        };
    });
}

// DOM Interaction Logic
urlInput?.addEventListener('input', async (event) => {
    const input = event.target as HTMLInputElement;
    const resultDiv = document.getElementById('result');

    if (!input.value.trim()) {
        resultDiv!.innerText = ''; // Clear result when input is empty
        return;
    }

    resultDiv!.innerText = 'Validating...';
    const validationResult = await validateMedia(input.value.trim());
    resultDiv!.innerText = validationResult;
}); */


form?.addEventListener('submit', async (event: Event) => {
    event.preventDefault();
    const file = fileInput?.files ? fileInput.files[0] : null;
    if (file) {
        localStorage.setItem('jobStatus', 'start');
        window.location.href = "/questions";
    } else {
        alert("Please select a file to upload.");
    }
});



// frontend
/* const urlInput = document.getElementById('js-url-upload') as HTMLInputElement;
const transcribeBtn = document.getElementById("js-transcribe-btn") as HTMLButtonElement;
urlInput?.addEventListener('input', () => {
    if (urlInput.value.trim() === '') {
        transcribeBtn.disabled = true;
    } else {
        transcribeBtn.disabled = false;
    }
});

const urlErrorMsg = document.getElementById('url-error-msg') as HTMLElement;
transcribeBtn?.addEventListener('click', async(event) => {
    const url = urlInput.value.trim();
    await validateMedia(url);
});

async function validateMedia(url: string): Promise<string> {
    // Check if URL is a valid media file (basic regex for video/audio extensions)
    const mediaRegex = /\.(mp4|webm|ogg|mp3|wav|m4a)$/i;
    if (!mediaRegex.test(url)) {
        urlErrorMsg.innerText = "The URL does not point to a valid video or audio file.";
    }

    // Check if URL is corrupt
    const isValidMedia = await validateMediaIntegrity(url);
    if (!isValidMedia) {
        urlErrorMsg.innerText = "The media file is corrupt or cannot be loaded.";
    }

    return '';
} */

/* async function checkIfUrlExists(url: string): Promise<boolean> {
    try {
        const response = await fetch(url, { 
            method: 'GET',
            mode: 'no-cors' 
        });
        return response.ok;
    } catch (error) {
        console.error('Error checking URL existence:', error);
        return false;
    }
} */

/* async function validateMediaIntegrity(url: string): Promise<boolean> {
    return new Promise((resolve) => {
        
        // Determine the media type based on the file extension or URL
        const isAudio = url.endsWith('.mp3') || url.endsWith('.ogg') || url.endsWith('.wav');
        const isVideo = url.endsWith('.mp4') || url.endsWith('.webm') || url.endsWith('.ogg');

        if (!isAudio && !isVideo) {
            console.log('is not video: ', url);
            resolve(false); // Not a valid media file type (audio or video)
            return;
        }


        // Create a media element dynamically based on the type
        const mediaElement = document.createElement(isAudio ? 'audio' : 'video');

        mediaElement.src = url;
        mediaElement.style.display = 'none';
        document.body.appendChild(mediaElement);

        mediaElement.oncanplaythrough = () => {
            resolve(true); // Media is valid
            mediaElement.remove();
        };

        mediaElement.onerror = () => {
            resolve(false); // Media is corrupt or unreachable
            mediaElement.remove();
        };
    });
} */


// Backend
/* document.getElementById('media-form')?.addEventListener('submit', async (event) => {
    event.preventDefault();

    const input = document.getElementById('media-url') as HTMLInputElement;
    const resultDiv = document.getElementById('result');

    if (!input.value.trim()) {
        resultDiv!.innerText = 'Please enter a media URL.';
        return;
    }

    const url = input.value.trim();

    // Step 1: Validate URL locally
    resultDiv!.innerText = 'Validating...';
    const isValid = await validateMedia(url);
    if (!isValid) {
        resultDiv!.innerText = 'Invalid or corrupt media URL.';
        return;
    }

    // Step 2: Send to backend for S3 operations
    resultDiv!.innerText = 'Uploading to S3...';
    const uploadResult = await uploadToS3(url);
    resultDiv!.innerText = uploadResult ? 'Upload successful!' : 'Failed to upload.';
});

// Media Validation Logic
async function validateMedia(url: string): Promise<boolean> {
    const mediaRegex = /\.(mp4|webm|ogg|mp3|wav|m4a)$/i;
    if (!mediaRegex.test(url)) return false;

    const response = await fetch(url, { method: 'HEAD' });
    return response.ok;
} */


const urlInput = document.getElementById('js-url-upload') as HTMLInputElement;
const urlErrorMsg = document.getElementById('url-result-msg') as HTMLElement;
const transcribeBtn = document.getElementById("js-transcribe-btn") as HTMLButtonElement;
const urlUploading = document.querySelector('.js-url-uploading') as HTMLElement;
const urlInitial = document.querySelector('.js-url-initial') as HTMLElement;
const urlReady = document.querySelector('.js-url-ready') as HTMLElement;
const urlForm = document.querySelector('.js-url-form') as HTMLFormElement;
const urlReadyFilename = document.querySelector('.js-url-ready-fn') as HTMLElement;
const urlReadyLink = document.querySelector('.js-url-ready-link') as HTMLElement;
const urlReadyBtn = document.getElementById('js-url-validate-btn') as HTMLButtonElement;


// Enable/disable the transcribe button based on the URL input
urlInput?.addEventListener('input', () => {
    if (urlInput.value.trim() === '') {
        transcribeBtn.disabled = true;
    } else {
        transcribeBtn.disabled = false;
    }
});

// Click event listener for the transcribe button
transcribeBtn?.addEventListener('click', async() => {
    const url = urlInput.value.trim();
    if (url) {
        await validateVideo(url);
    }
});

// Event listener for the "Ready" button
urlReadyBtn?.addEventListener('click', async () => {
    const final_url = localStorage.getItem('vb_media_url') || '';
    /* await uploadToS3(final_url); */
});

// Function to check if the URL exists
async function checkIfUrlExists(url: string): Promise<boolean> {
    try {
        const response = await fetch(url, { method: 'HEAD' });

        // Handle the case where the server responds with an error (e.g., 403 Forbidden or 404 Not Found)
        if (response.status === 403) {
            throw new Error('Access Denied: You do not have permission to view this video.');
        } else if (response.status === 404) {
            throw new Error('Not Found: The video URL does not exist.');
        } else if (!response.ok) {
            throw new Error(`Error: Received status code ${response.status}`);
        }

        return true; // URL exists and is accessible
    } catch (error) {
        console.error('Error checking URL existence:', error);
        return false;
    }
}

// Function to get video duration using HTML video element
function getVideoDuration(url: string): Promise<number> {
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
    return decodeURIComponent(fileName.split('.').slice(0, -1).join('.')); // Remove file extension
}

// Validate video URL, duration, and availability
async function validateVideo(url: string): Promise<void> {
    const resultDiv = document.getElementById('url-result-msg')!;
    
    resultDiv.innerText = '';
    showUploadingStateHTML();

    await new Promise(resolve => setTimeout(resolve, 2000));

    // Validate file type (only video or audio)
    const mediaRegex = /\.(mp4|webm|ogg|mp3|wav|m4a)$/i;
    if (!mediaRegex.test(url)) {
        resultDiv.innerText = 'Invalid file type. Please upload a valid video or audio file.';
        hideUploadingStateHTML();
        return;
    }

    // Check if the URL exists (i.e., the resource is reachable)
    const exists = await checkIfUrlExists(url);
    if (!exists) {
        resultDiv.innerText = 'The video URL is either inaccessible or invalid.';
        hideUploadingStateHTML();
        return;
    }

    // Get video duration
    try {
        const duration = await getVideoDuration(url);
        if (duration > 30 * 60) { // 30 minutes = 1800 seconds
            resultDiv.innerText = 'The video is more than 30 minutes long!';
            hideUploadingStateHTML();
        } else {
            resultDiv.innerText = ''; // The video is less than 30 minutes long.
            hideUploadingStateHTML();
            showReadyStateHTML();
            localStorage.setItem('vb_media_url', url);
        }
    } catch (error) {
        resultDiv.innerText = 'Error retrieving video duration. Please ensure the file is a valid video format.';
        console.error(error);
    }
}

// Upload the media URL to S3
/* async function uploadToS3(url: string): Promise<boolean> {
    try {
        const response = await fetch('/api/upload-to-s3', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ mediaUrl: url }),
        }); 
        let response = true; // Test
 
        if (response) {
            console.log('S3 Upload successful:', url);
            localStorage.removeItem('vb_media_url');

            // Start checking the upload status after upload
            return await checkUploadStatus(url);
        } else {
            console.error('S3 Upload failed:',  await response.text());
            return false;
        }
    } catch (error) {
        console.error('Error uploading to S3:', error);
        return false;
    }
} */

declare const duringSampleQuestions: any;
const transcriptProgressHTML: string = duringSampleQuestions.transcripting;
const transcriptReadyHTML: string = duringSampleQuestions.sample_ready;
const transcriptWrap = document.querySelector(".js-transcription-wrap") as HTMLElement;

// Function to check upload status
async function checkUploadStatus(url: string): Promise<boolean> {
    let status = 'in-progress'; // Initial status (mocked)

    while (status === 'in-progress') {
        console.log('Checking upload status for:', url);

        try {
            // Replace with actual API call to check status
            const response = await fetch(url);
            const data = await response.json();
            status = data.status; // Assuming the API response contains a 'status' field */

            // Simulate a request to check the upload status (replace with actual status check)
            await new Promise(resolve => setTimeout(resolve, 2000)); // 2 seconds delay

            // Mock response: after 5 seconds, the upload will be completed
            status = (Math.random() > 0.5) ? 'completed' : 'in-progress';

            if (status === 'completed') {
                transcriptWrap.innerHTML = transcriptReadyHTML;
                sendSampleReadyEmail();
                return true;
            } else {
                transcriptWrap.innerHTML = transcriptProgressHTML;
                return true;
            }
        } catch (error) {
            console.error('Error checking upload status:', error);
            return false;
        }
    }

    console.error('Upload failed or is still in progress:', url);
    return false;
}

/* function transcriptProcessHTML() {
    const sampleReady = localStorage.getItem('jobStatus');

    if ("completed" === sampleReady) {
        transcriptWrap.innerHTML = transcriptReadyHTML;
    } else {
        transcriptWrap.innerHTML = transcriptProgressHTML;

        setTimeout(() => {
            transcriptWrap.innerHTML = transcriptReadyHTML;
            localStorage.setItem("jobStatus", "completed");
        }, 2000);
    }
} */

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

/* document.addEventListener('DOMContentLoaded', async () => {
    transcriptProcessHTML();
}); */