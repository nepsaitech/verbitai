export function getVideoDuration(element: HTMLVideoElement | HTMLIFrameElement): void {
    if (element.tagName.toLowerCase() === "video") {
        // Handle <video> tag
        element.addEventListener("loadedmetadata", () => {
            const duration = (element as HTMLVideoElement).duration;
            console.log("HTML5 Video duration (in seconds):", duration);
            console.log("Formatted duration:", formatTime(duration));
        });
    } else if (element.tagName.toLowerCase() === "iframe") {
        const src = element.getAttribute("src");

        if (src && src.includes("youtube.com")) {
            // Handle YouTube iframe
            const tag = document.createElement("script");
            tag.src = "https://www.youtube.com/iframe_api";
            document.head.appendChild(tag);

            (window as any).onYouTubeIframeAPIReady = () => {
                const player = new (window as any).YT.Player(element, {
                    events: {
                        onReady: (event: any) => {
                            const duration = event.target.getDuration();
                            console.log("YouTube Video duration (in seconds):", duration);
                            console.log("Formatted duration:", formatTime(duration));
                        },
                    },
                });
                console.log("player here..", player);
            };
        } else if (src && src.includes("vimeo.com")) {
            // Handle Vimeo iframe
            const script = document.createElement("script");
            script.src = "https://player.vimeo.com/api/player.js";
            document.head.appendChild(script);

            script.onload = () => {
                const player = new (window as any).Vimeo.Player(element);
                player.getDuration().then((duration: number) => {
                    console.log("Vimeo Video duration (in seconds):", duration);
                    console.log("Formatted duration:", formatTime(duration));
                }).catch((error: any) => {
                    console.error("Error getting Vimeo duration:", error);
                });
            };
        } else {
            console.error("Unsupported iframe source:", src);
        }
    } else {
        console.error("Unsupported element type:", element.tagName);
    }
}

function formatTime(seconds: number): string {
    const mins = Math.floor(seconds / 60);
    const secs = Math.floor(seconds % 60);
    return `${mins}:${secs < 10 ? "0" : ""}${secs}`;
}

// Example Usage
window.onload = () => {
    const playerContainer = document.querySelector("#smart-player-video");

    if (playerContainer) {
        const videoElement = playerContainer.querySelector("video") as HTMLVideoElement;
        const iframeElement = playerContainer.querySelector("iframe") as HTMLIFrameElement;

        if (videoElement) {
            getVideoDuration(videoElement);
        } else if (iframeElement) {
            getVideoDuration(iframeElement);
        } else {
            console.error("No video or iframe found inside #smart-player-video");
        }
    } else {
        console.error("#smart-player-video not found in the DOM");
    }
}