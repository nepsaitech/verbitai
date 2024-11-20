/* document.getElementById('uploadForm')?.addEventListener('submit', async (event: Event) => {
    console.log('Form submitted');
    event.preventDefault();

    // Get the selected file from the input
    const fileInput = document.getElementById('mediaFile') as HTMLInputElement;
    const file = fileInput?.files ? fileInput.files[0] : null;
    const jobId = "mockJobId";  // Use a mock job ID or generate one as needed

    if (file) {
        const statusOutput = document.getElementById('statusOutput') as HTMLElement;
        statusOutput.innerText = "Uploading file and starting process...";
        // Call the processJob function from your script (make sure it's loaded)
        await processJob(file, jobId);
    } else {
        alert("Please select a file to upload.");
    }
}); */

/*async function uploadMedia(file: File): Promise<string> {
    console.log(`Uploading file: ${file.name}`);

    // Real API call (uncomment when ready)
    
    try {
        const response = await fetch('https://api.example.com/job/add_asset', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ filename: file.name, fileType: file.type }),
        });
        const data = await response.json();

        if (response.ok && data.asset_id) {
            console.log("File uploaded successfully:", data.asset_id);
            return data.asset_id;
        } else {
            console.error("Failed to get upload URL", data.message);
            return null;
        }
    } catch (error) {
        console.error("Error uploading media:", error);
        return null;
    }
    

    // Mock upload (for testing)
    return new Promise((resolve) => setTimeout(() => resolve("mockAssetId"), 500));
}

async function startJobProcessing(jobId: string): Promise<void> {
    console.log(`Starting processing for job ID: ${jobId}`);

    // Real API call (uncomment when ready)
    
    try {
        const response = await fetch(`https://api.example.com/job/perform_transcription`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                job_id: jobId,
                finish_in: 60, // For testing, completes in 60 seconds
                finish_with_error: false, // Set to true to simulate an error
            }),
        });

        if (response.ok) {
            console.log("Job processing started successfully.");
        } else {
            console.error("Failed to start job processing:", response.statusText);
        }
    } catch (error) {
        console.error("Error starting job processing:", error);
    }
    

    // Mock processing start (for testing)
    return new Promise((resolve) => setTimeout(resolve, 500));
}

async function checkJobStatus(jobId: string): Promise<string> {
    console.log(`Checking status for job ID: ${jobId}`);

    // Real API call (uncomment when ready)
    
    try {
        const response = await fetch(`https://api.example.com/job/info?job_id=${jobId}`, {
            method: 'GET',
        });
        const data = await response.json();

        if (response.ok && data.status) {
            console.log("Current job status:", data.status);
            return data.status;
        } else {
            console.error("Failed to check job status:", response.statusText);
            return "Error";
        }
    } catch (error) {
        console.error("Error checking job status:", error);
        return "Error";
    }
    

    // Mock job status check (for testing)
    const statuses = ["In Progress", "Completed"];
    return new Promise((resolve) => setTimeout(() => resolve(statuses[Math.floor(Math.random() * statuses.length)]), 1000));
}

async function getJobCaption(jobId: string): Promise<void> {
    console.log(`Retrieving caption for job ID: ${jobId}`);

    // Real API call (uncomment when ready)
    /*
    try {
        const response = await fetch(`https://api.example.com/job/get_caption?job_id=${jobId}`, {
            method: 'GET',
        });
        const data = await response.json();

        if (response.ok && data.caption) {
            console.log("Caption data retrieved:", data.caption);
        } else {
            console.error("Failed to retrieve caption data:", response.statusText);
        }
    } catch (error) {
        console.error("Error retrieving caption data:", error);
    }
    

    // Mock caption retrieval (for testing)
    return new Promise((resolve) => setTimeout(() => {
        console.log("Mock caption data: 'This is a simulated caption.'");
        resolve();
    }, 500));
}

async function processJob(file: File, jobId: string) {
    // Step 1: Upload the media
    const assetId = await uploadMedia(file);

    if (assetId) {
        // Step 2: Start processing the job
        await startJobProcessing(jobId);


        // Step 3: Poll job status until completed
        let isCompleted = false;
        while (!isCompleted) {
            const status = await checkJobStatus(jobId);

            if (status === "Completed") {
                isCompleted = true;
                console.log("Job completed. Fetching results...");
                await getJobCaption(jobId);
            } else if (status === "Error" || status === "Failed") {
                console.error("Job encountered an error and cannot proceed.");
                break;
            } else {
                console.log("Job still in progress. Checking again...");
                await new Promise(resolve => setTimeout(resolve, 1000)); // Polling interval
            }
        }
    } else {
        console.error("Upload failed. Cannot proceed with job processing.");
    }
}

// Example usage
const mockFile = new File(["sample content"], "sample.mp3", { type: "audio/mpeg" });
processJob(mockFile, "mockJobId"); */








/* // Function to request an upload URL from a given endpoint
async function requestUploadURL(endpoint: string, payload: object): Promise<string | null> {
    console.log("Requesting upload URL from:", endpoint);

    try {
        const response = await fetch(endpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(payload),
        });

        const data = await response.json();

        if (response.ok && data.upload_url) {
            console.log("Upload URL obtained:", data.upload_url);
            return data.upload_url;
        } else {
            console.error("Failed to obtain upload URL:", data.message);
            return null;
        }
    } catch (error) {
        console.error("Error requesting upload URL:", error);
        return null;
    }
}

// Function to upload file to the provided URL (works for both file upload and URL upload)
async function uploadFile(file: File | null, uploadURL: string | null, mediaUrl: string | null): Promise<boolean> {
    if (mediaUrl) {
        console.log("Uploading media from URL:", mediaUrl);
        // Direct upload from URL
        return await uploadMediaFromUrl(mediaUrl);
    } else if (file && uploadURL) {
        console.log("Uploading file to URL:", uploadURL);
        // Upload file via URL
        return await uploadMediaFile(file, uploadURL);
    } else {
        console.error("No file or URL provided for upload.");
        return false;
    }
}

// Function to upload file from URL (this could use a method that processes the URL or downloads the file to the server)
async function uploadMediaFromUrl(mediaUrl: string): Promise<boolean> {
    try {
        const response = await fetch(mediaUrl, { method: 'GET' });
        
        if (response.ok) {
            console.log("Successfully fetched media from URL:", mediaUrl);
            return true;  // In real usage, process this URL and handle it accordingly
        } else {
            console.error("Failed to fetch media from URL:", response.statusText);
            return false;
        }
    } catch (error) {
        console.error("Error uploading media from URL:", error);
        return false;
    }
}

// Function to upload media file to the upload URL
async function uploadMediaFile(file: File, uploadURL: string): Promise<boolean> {
    try {
        const response = await fetch(uploadURL, {
            method: 'PUT',
            headers: {
                'Content-Type': file.type,
            },
            body: file,
        });

        if (response.ok) {
            console.log("File uploaded successfully.");
            return true;
        } else {
            console.error("Failed to upload file:", response.statusText);
            return false;
        }
    } catch (error) {
        console.error("Error uploading file:", error);
        return false;
    }
}

// Function to handle the upload process (combines file and URL upload)
async function handleFileUpload(jobId: string, file: File | null, mediaUrl: string | null, isDirectUpload: boolean) {
    const endpoint = isDirectUpload
        ? 'https://api.example.com/job/add_asset'
        : 'https://api.example.com/job/add_media';

    const payload = {
        filename: file ? file.name : "mock_file", // Fallback for URL upload
        fileType: file ? file.type : "", // Fallback for URL upload
        job_id: jobId,
    };

    // Step 1: Request upload URL
    const uploadURL = await requestUploadURL(endpoint, payload);

    if (uploadURL || mediaUrl) {
        // Step 2: Upload file or media from URL
        const uploadSuccess = await uploadFile(file, uploadURL, mediaUrl);

        if (uploadSuccess) {
            console.log("Upload complete. Ready for processing.");
        } else {
            console.error("Upload failed. Process aborted.");
        }
    } else {
        console.error("Failed to obtain upload URL. Process aborted.");
    }
}

// Event listener for form submission
document.getElementById('uploadForm')?.addEventListener('submit', async (event: Event) => {
    event.preventDefault();

    const fileInput = document.getElementById('mediaFile') as HTMLInputElement;
    const urlInput = document.getElementById('mediaUrl') as HTMLInputElement;

    const file = fileInput?.files ? fileInput.files[0] : null;
    const mediaUrl = urlInput.value.trim() ? urlInput.value.trim() : null;

    const jobId = "mockJobId";  // Mock job ID (replace with real job ID)

    if (file || mediaUrl) {
        document.getElementById('statusOutput')!.innerText = "Uploading media and starting process...";
        await handleFileUpload(jobId, file, mediaUrl, true);  // `true` for direct upload (you can make this dynamic if needed)
    } else {
        alert("Please select a file or provide a media URL.");
    }
});
 */